<form action="" method="get">
    <input type="text" name="ID_util" />
    <input type="submit" name="Envoyer" />
</form>

<?php
$servername = 'localhost';
$username = "root";
$password = "";
$dbname = "tp_php";

$conx = new mysqli($servername, $username, $password, $dbname);
if($conx->connect_error){
    die("Erreur de connexion : ".$conx->connect_error);
}

if(isset($_GET["ID_util"])){
    $ID_util = $_GET["ID_util"];

    $query = "DELETE FROM utilisateur WHERE ID_util=$ID_util";

if($conx->query($query) === TRUE){
    echo "Bravo, l'utilisateur a été définitivement supprimé !<br>";
}else{
    echo "Erreur lors de la suppression : " .$query."<br>".$conx->error;
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
}

$conx->close();
?>