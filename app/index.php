<?php


$host = "mysql"; // The host is the name of the service, present in the docker-compose.yml
$charset = "utf8";
$port = "3306";

$dbname = "testdb";
$pass = "password";
$username = 'root';


// Set in docker-compose.yaml
$debug = getenv('DEBUG');   var_dump($debug);

// Set in .env (as well as docker-compose.yaml)
$env_debug = getenv('ENV_DEBUG'); var_dump($env_debug);
$env_project = getenv('ENV_PROJECT'); var_dump($env_project);



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