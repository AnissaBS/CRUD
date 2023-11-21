<form action="" method="post">
    <label for="">Insérer l'ID : </label> <br>
    <input type="text" name="ID_util" /> <br>
    <label for="">Insérer le nom : </label> <br>
    <input type="text" name="nom" /> <br>
    <label for="">Insérer le prénom : </label> <br>
    <input type="text" name="prenom" /> <br>
    <label for="">Insérer l'email : </label> <br>
    <input type="text" name="email" /> <br><br>
    <input type="submit" name="Envoyer" />
</form>

<?php
$servername = 'localhost';
$username = "root";
$password = "";
$dbname = "tp_php";

$conx = new mysqli($servername, $username, $password, $dbname);
if($conx->connect_error){
    die("connection failed : ".$conx->connect_error);
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

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ID_util = $_POST["ID_util"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];

    $query = "UPDATE utilisateur SET nom = '$nom', prenom='$prenom', email='$email' WHERE ID_util=$ID_util";

if($conx->query($query) === TRUE){
    echo "Bravo, l'utilisateur a été mis à jour avec succès !";
}else{
    echo "Erreur :" .$query."<br>".$conx->error;
}
}
?>