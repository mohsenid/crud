<?php
session_start();
// print_r($_SESSION);
if (isset($_SESSION['login'])) {
    echo 'Bonjour ' . $_SESSION['login'] . 'Dernière connexion: ' ;
} else {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crud en php</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
    <style>
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row my-5">
            <h2>Crud en Php</h2>
        </div>
        <a href="add.php" class="btn  btn-success mb-5">Ajouter un user</a>
        <a href="logout.php" class="btn btn-danger mb-5">Deconnexion</a>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Firstname</th>
                    <th>Age</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Pays</th>
                    <th>Comment</th>
                    <th>metier</th>
                    <th>Url</th>
                    <th>Image</th>
                    <th colspan="3">Edition</th>
                </thead>
                <tbody>
                    <?php include 'database.php'; //on inclut notre fichier de connection 
                    $pdo = Database::connect(); //on se connecte à la base 
                    $sql = 'SELECT * FROM user ORDER BY id DESC'; //on formule notre requete 
                    foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['firstname'] . '</td>';
                        echo '<td>' . $row['age'] . '</td>';
                        echo '<td>' . $row['tel'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['pays'] . '</td>';
                        echo '<td>' . $row['comment'] . '</td>';
                        echo '<td>' . $row['metier'] . '</td>';
                        echo '<td>' . $row['url'] . '</td>';
                        if (!empty($row['image'])) {
                            echo '<td>' . '<img src="./img/' . $row['image'] . '"alt="' . $row['image'] . '"></td>';
                        } else {
                            echo '<td>' . '<img src="./img/default.jpg" alt="' . $row['image'] . '"></td>';
                        }
                        echo '<td>';
                        echo ' <a class="btn btn-primary" href="edit.php?id= ' . $row['id'] . '">Read</a>'; // un autre td pour le bouton d'edition
                        echo '</td>';
                        echo '<td>';
                        echo '<a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a>'; // un autre td pour le bouton d'update
                        echo '</td>';
                        echo '<td>';
                        echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Delete</a>'; // un autre td pour le bouton de suppression
                        echo '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect(); //on se deconnecte de la base
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>