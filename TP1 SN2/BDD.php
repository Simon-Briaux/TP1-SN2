<?php
    $ipServerSQL ="192.168.64.200";
    $NomBase = "BDD";
    $userBDD = "debian";
    $PassBDD = "debian";
    try {
        $BasePDO = new PDO('mysql:host='.$ipServerSQL.';dbname='.$NomBase.';port=3306',$userBDD, $PassBDD);
    }catch (Exception $e) {
        echo $e->getMessage();
        }
    ?>