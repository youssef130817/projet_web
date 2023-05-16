<?php
    $local="localhost";
    $user="root";
    $pass="";
    $dbname="testprojet";
    try{
        $bdd=new PDO("mysql:host=$local;dbname=$dbname",$user,$pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException)
    {
        echo "IR".$e->getMessage();
    }
?>