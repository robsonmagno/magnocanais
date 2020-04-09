<?php
$my_con = mysqli_connect("localhost", "root", "gppai", "magnocanais");

//PostgreSQL
$host = "ec2-3-223-21-106.compute-1.amazonaws.com";
$db = "d27tqvhr6mqc7";
$user = "ycqqbiqeaqsyiy";
$port = "5432";
$pass = "02b67e8277ec74d8bedfb11b7e605446b7cf71592aa7cbfedb4b9c378830715e";

$pg_con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")or die("Can't connect to database".pg_last_error());

/*
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
*/
?>