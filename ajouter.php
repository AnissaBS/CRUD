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

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];

        $query = "INSERT INTO utilisateur (nom, prenom, email) VALUES ('$nom', '$prenom', '$email')";

        if($conx -> query($query) === TRUE){
            echo "Bravo ! Utilisateur ajouté avec succès.";
        }else{
            echo "Erreur : ".$query."<br>".$conx->error;
        }
    }

    $conx -> close();

?>