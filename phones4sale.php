<?php

// Connect to server/database
$mysqli = mysqli_connect("localhost", "2010604", "YES", "Phones 4 Sale");
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
} else {
echo "Connected to the database successfully.";
}

// Run SQL query
$res = mysqli_query($mysqli, "SELECT Brand, Model, Stock FROM Phones 4 Sale");

// Are there any errors in my SQL statement?
if(!$res) {
  print("MySQL error: " . mysqli_error($mysqli));
  exit;
}

// How many rows were returned?
echo("<p>" . mysqli_num_rows($res) . " record(s) were returned...</p>");

// Loop through resultset and display each field's value
while($row = mysqli_fetch_assoc($res)) {
  echo $row['Brand']. " - ". $row['Model'] ."<br>". " - ". $row['Stock']. " - ".$row[Price];
}

?>