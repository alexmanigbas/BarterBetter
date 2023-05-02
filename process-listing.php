<?php
if (empty($_POST["title"])) {
    die("Title is required");
}

if (empty($_POST["descript"])) {
    die("Description is required");
}

if (empty($_POST["category"])) {
    die("Category is required");
}

if (empty((int)$_POST["quantity"])) {
    die("Quantity is required");
}

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO createlisting (title, descript, category, quantity)
        VALUES (?, ?, ?, ?)";
/* create a prepared statement */
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL Error: " . $mysqli->error);
}
$stmt->bind_param("sssi",
                  $_POST["title"],
                  $_POST["descript"],
                  $_POST["category"],
                  $_POST["quantity"]);

if ($stmt->execute()) {

    header("Location: success-posted.html");
    exit;
} else{
    die("Check error: ". $mysqli->errno);
};


?>