<?php
session_start();
include_once('../includes/datacon.php');
if (isset($_SESSION['logged_in'])) {
?>

<?php include_once('headeradmin.php') ?>
    <h3>Artikel uploaden</h3>
    <form action="../includes/insertarticle.php" method="post">
        <p>
            <textarea rows="1" cols="30" name="articletitel" id="articletitel" placeholder="Titel"></textarea>
        </p>
        <p>
            <textarea rows="1" cols="30" name="articleshorttext" id="articleshorttext" placeholder="Kurzbeschreibung für Startseite"></textarea>
        </p>
        <p>
            <textarea rows="5" cols="30" name="articlecontenttext" id="articlecontenttext" placeholder="Inhalt"></textarea>
        </p>
        <p>
            <textarea rows="5" cols="30" name="articlecode" id="articlecode" placeholder="Source Code"></textarea>
        </p>
        <input type="submit" value="Submit">
    </form>
<?php include_once('footeradmin.php') ?>


<?php
} else {
  header('Location: index.php');
}
 ?>
