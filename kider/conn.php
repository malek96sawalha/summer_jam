<?php
$serverName = 'localhost';
$usernName = 'root';
$password = '';
$dbName = 'kids';

$conn = new mysqli($serverName, $usernName, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->error);
}

class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function addKid(
        $name,
        $age,
        $message,
        $phone,
        $email,
        $activity
    ) {
        $sql = "
    INSERT INTO kids (
        name, age, message,
        phone, email, activity
        ) 
    VALUES (
        '$name',
        '$age',
        '$message',
        '$phone',
        '$email',
        '$activity'
    )";

        $result = $this->db->query($sql);

        if ($result === true) {
            return true;
        } else {
            return false;
        }
    }

}

$crudObj = new crud($conn);