<?php

$ip = 'localhost';
$username = 'root';
$pwd = '';
$database ='parchi';
$connection= new mysqli($ip, $username, $pwd, $database);
if($connection->connect_error){
    die('c\è stato un errore: '. $connection->connect_error);
}

$sql="CREATE TABLE `parchi`.`parco` (`nome` VARCHAR(255) NOT NULL , `Regione` VARCHAR(255) NOT NULL , PRIMARY KEY (`nome`)) ENGINE = InnoDB;

CREATE TABLE `parchi`.`ordine` (`nome` VARCHAR(255) NOT NULL , PRIMARY KEY (`nome`)) ENGINE = InnoDB;

CREATE TABLE `parchi`.`specie` (`nome` VARCHAR(255) NOT NULL , `ordine` VARCHAR(255) NOT NULL , PRIMARY KEY (`nome`), INDEX `idx_ordine` (`ordine`)) ENGINE = InnoDB;

CREATE TABLE `parchi`.`animale` (`id` INT NOT NULL AUTO_INCREMENT , `stato_salute` VARCHAR(255) NOT NULL , `data_nascita` DATE NOT NULL , `sesso` BOOLEAN NOT NULL , `specie` VARCHAR(255) NOT NULL , `parco` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`), INDEX `idx_specie` (`specie`), INDEX `idx_parco` (`parco`)) ENGINE = InnoDB;



ALTER TABLE `animale` ADD CONSTRAINT `parco` FOREIGN KEY (`parco`) REFERENCES `parco`(`nome`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `animale` ADD CONSTRAINT `specie` FOREIGN KEY (`specie`) REFERENCES `specie`(`nome`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `specie` ADD CONSTRAINT `ordine` FOREIGN KEY (`ordine`) REFERENCES `ordine`(`nome`) ON DELETE RESTRICT ON UPDATE RESTRICT;




INSERT INTO `parco` (`nome`, `Regione`) VALUES ('Parco Nazionale dello Stelvio', 'Lombardia');

INSERT INTO `ordine` (`nome`) VALUES ('Mammiferi');

INSERT INTO `specie` (`nome`, `ordine`) VALUES ('Scoiattolo', 'Mammiferi');

INSERT INTO `animale` (`id`, `stato_salute`, `data_nascita`, `sesso`, `specie`, `parco`) VALUES (NULL, 'ottimo', '2023-01-12', '1', 'Scoiattolo', 'Parco Nazionale dello Stelvio');";


$connection->query($sql);

?>