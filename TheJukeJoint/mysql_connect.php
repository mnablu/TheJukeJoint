/**
* Created by PhpStorm.
* User: Marc
* Date: 21/04/2016
* Time: 12:28 PM
*/

<?php
$servername = "localhost";
$username = "root";
$password = "test";
$dbname = "JukeJoint";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
