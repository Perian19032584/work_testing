<?php


$pdo = new PDO('mysql:host=localhost;dbname=users', 'root', 'root');


foreach ($pdo->query('SELECT * FROM users T1 WHERE (SELECT COUNT(*) FROM users T2 WHERE T1.login = T2.login) > 1') as $row) {
    echo "<center><h2>".$row['name']."</h2>";
    echo "<h2>".$row['login']."</h2>";
    echo "<h2>".$row['password']."</h2>";
    echo "<hr></center>";
}
