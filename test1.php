<?php
echo "Ex1";

    $servername = 'localhost';
    $user = 'toto';
    $password = 'tata';
    $dbname = 'mabaseauto';


    $conx = new mysqli($servername, $user, $password, $dbname);
    if($conx -> connect_error){
        die("Connection failed : ".$conx->connect_error);
    }

        $pers = "SELECT * FROM personnes";
        $result = $conx -> query($pers);

        if($result -> num_rows > 0){
            while($row = $result ->fetch_assoc()){
                echo"ID : ".$row["id_pers"].
                " - Nom : ".$row["nom"].
                " - Prénom : ".$row["prenom"].
                " - Date de naissance : ".$row["date_naissance"].
                " - Sexe : ".$row["sexe"]."<br>";
                // ou sur la même ligne avec : "ID : ".$row["id_util"]."Nom : ".$row["nom"]."Prénom : ".$row["prenom"]."Email : ".$row["email"]."<br>";
            }
        }else{
            echo "0 résultats";
        }

    $conx -> close();

    
echo "Ex2";

$servername = 'localhost';
$user = 'root';
$password = '';
// $dbname = 'mabaseauto';

?>