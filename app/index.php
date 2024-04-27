<?php


$host = "mysql"; // The host is the name of the service, present in the docker-compose.yml
$dbname = "my-wonderful-website";
$pass = "super-secret-password";
$username = 'root';

//$dbname = getenv('MYSQL_DATABASE');
//$username = getenv('MYSQL_USER');
//$pass = getenv('MYSQL_ROOT_PASSWORD');

//var_dump($pass);
//var_dump($dbname);

$charset = "utf8";
$port = "3306";

try {
    $pdo = new PDO(
        dsn: "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port",
        username: $username,
        password: $pass,
    );

    $persons = $pdo->query("SELECT * FROM Persons");

    echo '<pre>';
    foreach ($persons->fetchAll(PDO::FETCH_ASSOC) as $person) {
        print_r($person);
    }
    echo '</pre>';

} catch (PDOException $e) {
    throw new PDOException(
        message: $e->getMessage(),
        code: (int)$e->getCode()
    );
}