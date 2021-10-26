<?php
session_start();
if (isset($_SESSION['login'])) {
    echo 'Bonjour ' . $_SESSION['login'];
} else {
    header('location:login.php');
}
?>
<?php
require('database.php'); //on appelle notre fichier de config 
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (null == $id) {
    header("location:index.php");
} else { //on lance la connection et la requete 
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
        $sql = "SELECT * FROM user where id =?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
    <style>
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="span10 offset1">

            <div class="row">

                <h3>Edition</h3>
                <p>
                    <?php
                    if (!empty($data['image'])) {
                        echo '<td>' . '<img src="./img/' . $data['image'] .  '" alt="' . $data['image'] . '"></td>';
                    } else {
                        echo '<td>' . '<img src="./img/default.jpg" alt="' . $data['image'] . '"></td>';
                    }
                    ?>
            </div>
            <p>

            <div class="form-horizontal">

                <div class="control-group">
                    <label class="control-label">Name</label>

                    <div class="controls">
                        <label class="checkbox"><?php echo $data['name']; ?></label>
                    </div>
                    <p>

                </div>
                <p>

                <div class="control-group">
                    <label class="control-label">Firstname</label>

                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['firstname']; ?>
                        </label>
                    </div>
                    <p>
                </div>
                <p>

                <div class="control-group">
                    <label class="control-label">Email Address</label>

                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['email']; ?>
                        </label>
                    </div>
                    <p>
                </div>
                <p>

                <div class="control-group">
                    <label class="control-label">Phone</label>


                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['tel']; ?>
                        </label>
                    </div>
                    <p>
                </div>
                <p>

                <div class="control-group">
                    <label class="control-label">Pays</label>

                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['pays']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>

                <div class="control-group">
                    <label class="control-label">Metier</label>

                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['metier']; ?>
                        </label>
                    </div>
                    <p>
                </div>
                <p>

                <div class="control-group">
                    <label class="control-label">Url</label>

                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['url']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>

                <div class="control-group">
                    <label class="control-label">Comment</label>

                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['comment']; ?>
                        </label>
                    </div>
                    <p>
                </div>
                <p>

                <div class="form-actions">
                    <a class="btn btn-success" href="index.php">Back</a>
                </div>
                <p>
            </div>
            <p>
        </div>
        <p>
    </div>
    <p>
        <!-- /container -->
</body>

</html>