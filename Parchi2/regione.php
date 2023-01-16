<?php 
include "functions.php";
session_start();
if(!isset($_SESSION['regione'])){
    $_SESSION['regione'] = $_GET['regione'];
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="script.js"></script>
        <title>Parchi</title>
    </head>
    <body>
        <?php
        echo '<div class="p-3 mb-2 bg-primary text-white"><h1 class="text-center" id="regione">'.$_SESSION['regione'].'</h1></div>';
        ?>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
          <button type="button" class="btn btn-outline-primary">Età media</button>
          <button type="button" class="btn btn-outline-primary">Numero esemplari</button>
          <button type="button" class="btn btn-outline-primary">Ricerca</button>
        </div><br><br>
        <form method='GET' action='regione.php'>
            <select name="parco" class="btn btn-primary">
                <option>Seleziona parco</option>
            <?php
                    $ip = '127.0.0.1';
                    $username = 'root';
                    $pwd = '';
                    $database ='parchi';
                    $connection= new mysqli($ip, $username, $pwd, $database);
                    if($connection->connect_error){
                        die('c\è stato un errore: '.$connection->connect_error);
                    }

                    $sql = "SELECT nome FROM parco WHERE Regione='".$_SESSION['regione']."';";
                    $result = $connection->query($sql);

                if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){
                        echo '<option>'.$row['nome'].'</option>';
                    }
                }
            ?>
            </select>
            <input type="submit" class="btn btn-primary">

            <br><br>
        </form>

        <form method='GET' action='regione.php'>
            
        <select name="specie" class="btn btn-primary">
        <option>Seleziona specie</option>
            <?php
            if(isset($_GET['parco'])){
                $_SESSION['parco']=$_GET['parco'];
                $sql = "SELECT specie FROM animale WHERE parco='".$_SESSION['parco']."';";
                $result = $connection->query($sql);
                if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){
                        echo '<option>'.$row['specie'].'</option>';
                    }
                }
            }
            ?>
        </select>
        <input type="submit" class="btn btn-primary">
        <br><br>
        </form>
        

        
        <?php
            echo '<input id="regione" name="regione" value="'.$_SESSION['regione'].'" hidden>';
        ?>

<label>eta media</label>
<label>numero esemplari</label>
            <?php
            
            if(isset($_GET['specie'])){

                $_SESSION['specie']=$_GET['specie'];
                $sql = "SELECT id, stato_salute, data_nascita, sesso FROM animale WHERE parco='".$_SESSION['parco']."' AND WHERE specie=".$_SESSION['specie'].";";
                $result = $connection->query($sql);
                if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){
                        echo $row['specie'];
                    }
                }
            }
            ?>

        <br><br>
    </body>
</html>