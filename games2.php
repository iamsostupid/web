<?php
$db = new mysqli('db', 'root', 'MYSQL_ROOT_PASSWORD', 'CTF1');

if ($db->connect_errno) {
    die("Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error);
}
$query = "SELECT * FROM games";
$result = $db->query($query);

if (!$result) {
    die("Error: " . $db->error);
}

$games = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Game</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            background-color: #F5F5F5;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 1em;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        nav li {
            float: left;
        }

        nav a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #111;
        }

        main {
            text-align: center;
            padding: 2em;
        }

        h1 {
            font-size: 2em;
            color: #4CAF50;
        }

        img {
            width: 50%;
            border-radius: 5px;
            box-shadow: 2px 2px 5px #888888;
        }

        p {
            font-size: 1.2em;
            line-height: 1.5;
            text-align: left;
            padding: 1em;
            background-color: #FFFFFF;
            border-radius: 5px;
            box-shadow: 2px 2px 5px #888888;
        }
        .image-class {
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Apps</a></li>
                <li><a href="#">Games</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <?php
foreach ($games as $game) {
  echo '<form method="post" action="game.php">';
  echo '<input type="hidden" name="gameid" value="' . $game['id'] . '">';
  echo '<input type="hidden" name="format" value="xml">';
  echo '<input type="image" src="' . $game['image'] . '" alt="' . $game['name'] . '" class="image-class">';
  echo '<p>' . $game['description'] . '</p>';
  echo '</form>';
}
?>



    </main>
</body>
</html>