<?php
session_start();
include_once('../includes/datacon.php');
if (isset($_SESSION['logged_in'])) {
  ?>

<?php include_once('headeradmin.php') ?>
      <ul>
        <li><a href="addarticle.php">Artikel hinzufügen</a></li>
        <li><a href="deletearticle.php">Artikel Löschen</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
<?php include_once('footeradmin.php') ?>

  <?php
} else {
  if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if (empty($username) or empty($password)) {
      $error = 'Alle Felder benötigt';
    } else {
      $query=$pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");
      $query->bindValue(1, $username);
      $query->bindValue(2, $password);
      $query->execute();
      $num=$query->rowCount();

      if ($num == 1) {
        $_SESSION['logged_in'] = true;
        header('Location: index.php');
        exit();
      } else {
        $error = 'Falsche Angaben';
      }
    }
  }
  ?>
<?php include_once('headeradmin.php') ?>
      <?php if (isset($error)) { ?>
        <small><?php echo $error; ?></small>
      <?php } ?>
      <form action="index.php" method="post" autocomplete="off">
        <input type="text" name="username" placeholder="username" /></br>
        <input type="password" name="password" placeholder="password" /></br>
        <input type="submit" value="Login" />
      </form>
<?php include_once('footeradmin.php') ?>
  <?php
}
 ?>
