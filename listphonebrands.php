<?php

// Connect to server/database
$mysqli = mysqli_connect("localhost", "2010604", "YES", "Phones 4 Sale");
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
} else {
echo "Connected to the database successfully.";
}
$sql = "SELECT * FROM Phones 4 Sale ORDER BY Price";
$results = mysqli_query($mysqli, $sql);
while($a_row = mysqli_fetch_assoc($results)) {
print("<a href='phones4sale?id={$a_row['Brand']}'>{$a_row['Price']}</a><br>");
}
$id = $_GET['id'];
$sql = "SELECT * FROM Brand WHERE Price = {$id}";
$rst = mysqli_query($mysqli, $sql);
