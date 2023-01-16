<?php 
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
        <br>

        <br><div class="d-flex justify-content-center">
        <form method='GET' action='regione.php'>
            <select name="parco" class="btn btn-outline-primary">
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
            <input type="submit" class="btn btn-outline-primary" value="🔍">
            
            <br><br>
        </form>
        </div>
        <div class="d-flex justify-content-center">
        <form method='GET' action='regione.php'>
            
        <select name="specie" class="btn btn-outline-primary" >
        <option>Seleziona specie</option>
            <?php
            if(isset($_GET['parco'])){
                $_SESSION['parco']=$_GET['parco'];
                echo "<script>document.getElementById('pa').textContent='Parco: ".$_SESSION['parco']."'</script>";            
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
        <input type="submit" class="btn btn-outline-primary" id="btn_sub"value="🔍" > 
        <br><br>
        </form>
        </div>

        <ul class="list-group">
            <li class="list-group-item list-group-item-primary" id="pa" hidden>Parco: -</li>
            <li class="list-group-item list-group-item-primary" id="spe" hidden>Specie: -</li>
            <li class="list-group-item list-group-item-primary" id="eta" hidden>Età media: -</li>
            <li class="list-group-item list-group-item-primary" id="num" hidden>Numero esemplari: -</li>
        </ul>

        <?php
            echo '<input id="regione" name="regione" value="'.$_SESSION['regione'].'" hidden>';
            if(isset($_GET['specie'])){
                $_SESSION['specie']=$_GET['specie'];
                echo "<script>document.getElementById('pa').textContent='Parco: ".$_SESSION['parco']."'</script>";
                echo "<script>document.getElementById('spe').textContent='Specie: ".$_SESSION['specie']."'</script>";
                echo "<script>document.getElementById('pa').hidden=false</script>";
                echo "<script>document.getElementById('spe').hidden=false</script>";
                
                $sql = "SELECT id, stato_salute, data_nascita, sesso FROM animale WHERE parco='".$_SESSION['parco']."' AND specie='".$_SESSION['specie']."';";//AND specie=".$_SESSION['specie'].";"
                $result = $connection->query($sql);
                if($result->num_rows >0){
                    $i=0;
                    $eta=0;
                    while($row = $result->fetch_assoc()){
                        $data_nascita = new DateTime($row["data_nascita"]);
                        $data_oggi = new DateTime('00:00:00');
                        $diff = $data_oggi->diff($data_nascita);
                        $diff = $diff->format('%y');
                        $eta = $eta + $diff;
                        $i++;
                    }
                }
                $media = $eta / $i;
                echo "<script>document.getElementById('num').textContent='Numero esemplari : ".$i."'</script>";
                echo "<script>document.getElementById('eta').textContent='età media : ".$eta." anni'</script>";
                echo "<script>document.getElementById('eta').hidden=false</script>";
                echo "<script>document.getElementById('num').hidden=false</script>";
            }
        ?>
        <br><br>
        <div class="text-center">
            <button type="button" class="btn btn-outline-danger" onclick="location.href='./index.php'">Indietro</button>
        </div>
    </body>
</html>