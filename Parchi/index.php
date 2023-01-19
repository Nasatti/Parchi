<?php 
session_start();
session_destroy(); 
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
        <div class="p-3 mb-2 bg-primary text-white">
            <h1 class="text-center">Gestione Parchi</h1>
        </div>
        <form name="myform" method='GET' action='regione.php'>
            <div style="display:flex; justify-content:center;">
                <div style="flex-basis: 30%;">
                    <img class="rounded mx-auto d-block" src="./img/mappa.jpg" usemap="#Italia">
                    <map name="Italia">
                        <area style="cursor: pointer;" shape="poly" coords="131,66,155,155,253,140,194,35" onclick="Regione(1)" alt="Submit request" >
                        <area style="cursor: pointer;" shape="poly" coords="423,350,601,442,604,416,481,316,433,322" onclick="Regione(2)" alt="Submit request" >
                        <area style="cursor: pointer;" shape="poly" coords="110,379,111,519,170,506,176,367" onclick="Regione(3)" alt="Submit request" >
                        <area style="cursor: pointer;" shape="poly" coords="173,171,160,314,255,298,297,210" onclick="Regione(4)" alt="Submit request" >
                        <area style="cursor: pointer;" shape="poly" coords="466,366,478,569,546,498,512,427" onclick="Regione(5)" alt="Submit request" >

                    </map>
                </div>
                <div style="top:200px">
                    <select name="reg" class="btn btn-outline-primary" id="reg" onchange="Set()">
                        <option>Seleziona regione</option>
                        <?php
                        $ip = '127.0.0.1';
                        $username = 'root';
                        $pwd = '';
                        $database ='parchi';
                        $connection= new mysqli($ip, $username, $pwd, $database);
                        if($connection->connect_error){
                            die('c\è stato un errore: '.$connection->connect_error);
                        }

                        $sql = "SELECT Regione FROM parco";
                        $result = $connection->query($sql);
                        if($result->num_rows >0){
                            $array = [];
                            while($row = $result->fetch_assoc()){
                                if(!in_array($row, $array)){
                                    array_push($array, $row);
                                    
                                }
                            }
                            sort($array);
                            foreach($array as $ar){
                                echo '<option>'.$ar['Regione'].'</option>';
                            }
                            unset($array);
                        }
                        ?>
                    </select>
                    <input type="submit" class="btn btn-outline-primary" id="submit"value="🔍"> 

                </div>
            </div>       
            <input id="regione" name="regione" value="" hidden>
        </form>
    </body>
</html>