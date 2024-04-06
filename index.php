<?php

// Database connection

// 1. Define some constants
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', '01_university');

// 2. Create an instance of the new connection
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// 3. Check if there is a connection error
if ($connection && $connection->connect_error) {

    echo "Connection failed: " . $connection->connect_error;

    die;
}

// var_dump($connection);

if (!empty($_POST['year'])) {

    $year_of_birth = $_POST['year'];
    var_dump($year_of_birth);
}

$sql = "SELECT * FROM `students` WHERE `date_of_birth` LIKE " . $year_of_birth . "%";
var_dump($sql);
// $result = $connection->query($sql);

// var_dump($result);




$connection->close();

?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University</title>
</head>

<body>

    <form action="" method="post" class="mb-5">

        <input type="number" name="year" id="year" placeholder="Filter by year" value="1990">
        <button class="btn btn-primary" type="submit">Search</button>
        <a href="http://localhost/PHP/php-mysqli-university/index.php">Reset</a>

    </form>

    <?php if ($result->num_rows > 0) :
        while ($row = $result->fetch_assoc()) : ?>

            <div><?= $row['name'] ?></div>


    <?php endwhile;
    endif; ?>

</body>

</html>