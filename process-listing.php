<?php
if (empty($_POST["Title"])) {
    die("Title is required");
}

if (empty($_POST["Description"])) {
    die("Description is required");
}

if (empty($_POST["Category"])) {
    die("Category is required");
}

if (empty($_POST["Quantity"])) {
    die("Quantity is required");
}

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO createListing (Title, Description, Category, Quantity)
        VALUES (?, ?, ?,?)";
/* create a prepared statement */
$stmt = $mysqli->stmt_init();
if ( ! $stmt->prepare($sql)) {
    die("SQL Error: " . $mysqli->error);
}
$stmt->bind_param("sssi",
                  $Title,
                  $Description,
                  $Category,
                  $Quantity);

$stmt->execute();

    echo "Listing Successfuly Posted";

     
print_r($_POST); 

?>