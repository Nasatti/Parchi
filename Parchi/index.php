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
            <img class="rounded mx-auto d-block" src="./img/mappa.jpg" usemap="#Italia">
            <map name="Italia">
                <area shape="poly" coords="131,66,155,155,253,140,194,35" onclick="Regione(1)" alt="Submit request" >
                <area shape="poly" coords="423,350,601,442,604,416,481,316,433,322" onclick="Regione(2)" alt="Submit request" >
                <area shape="poly" coords="110,379,111,519,170,506,176,367" onclick="Regione(3)" alt="Submit request" >
            </map>
            <input id="regione" name="regione" value="" hidden>
            <input type="submit" id="submit" hidden>
        </form>
        <div id="session"></div>
    </body>
</html>