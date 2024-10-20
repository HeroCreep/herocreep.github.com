 <?php
$servername = $_GET["host"];
$username = $_GET["username"];
$password = $_GET["pass"];

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE chat_bot_db";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
$dbname = "chat_bot";

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn1->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql1 = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
display_name VARCHAR(30) NOT NULL,
password VARCHAR(50),
creation_date DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if ($conn1->query($sql1) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn1->close();

$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn1->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql2 = "CREATE TABLE messages (
id INT AUTO_INCREMENT PRIMARY KEY,
        message TEXT,
        sender VARCHAR(50),
        recipient VARCHAR(50),
        time_sent DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (sender) REFERENCES users(username),
        FOREIGN KEY (recipient) REFERENCES users(username)
)";

if ($conn2->query($sql2) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn2->close();
?> 
