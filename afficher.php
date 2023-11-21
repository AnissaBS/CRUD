<form action="ajouter.php" method="post">
    <input type="text" name="nom" />
    <input type="text" name="prenom" />
    <input type="text" name="email" />
    <input type="submit" name="Envoyer" />
</form>
    
<?php
    $servername = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'tp_php';

    $conx = new mysqli($servername, $user, $password, $dbname);
    if($conx -> connect_error){
        die("Connection failed : ".$conx->connect_error);
    }

        $query = "SELECT * FROM utilisateur";
        $result = $conx -> query($query);

        if($result -> num_rows > 0){
            while($row = $result ->fetch_assoc()){
                echo"ID : ".$row["ID_util"].
                " - Nom : ".$row["nom"].
                " - Prénom : ".$row["prenom"].
                " - Email : ".$row["email"]."<br>";
                // ou sur la même ligne avec : "ID : ".$row["id_util"]."Nom : ".$row["nom"]."Prénom : ".$row["prenom"]."Email : ".$row["email"]."<br>";
            }
        }else{
            echo "0 résultats";
        }

    $conx -> close();

?>