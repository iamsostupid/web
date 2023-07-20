<?php
ob_start();
$db = new mysqli('db', 'root', 'MYSQL_ROOT_PASSWORD', 'CTF1');
if ($db->connect_errno) {
  die("Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error);
}

$gameid = $_POST['gameid'];
$query = "SELECT * FROM games WHERE id = '$gameid'";
$result = $db->query($query);

if (!$result) {
  die("Error: " . $db->error);
}

if ($_POST['format'] === 'xml') {
    header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<games>';
    while ($game = $result->fetch_assoc()) {
      echo '<game>';
      echo '<id>' . $game['id'] . '</id>';
      echo '<name>' . $game['name'] . '</name>';
      echo '<image>' . $game['image'] . '</image>';
      echo '<description>' . $game['description'] . '</description>';
      echo '</game>';
    }
    echo '</games>';
} else {
    // handle other formats or default format
}
header("Location: /games2.php");
exit;
?>
