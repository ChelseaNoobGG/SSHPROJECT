<?php
// Get POST data
$hostname = $_POST['hostname'];
$port = $_POST['port'];
$username = $_POST['username'];
$password = $_POST['password'];

// Validate input (You may need more thorough validation)
if(empty($hostname) || empty($port) || empty($username) || empty($password)) {
    echo "failure";
    exit;
}

// Attempt SSH connection
$connection = ssh2_connect($hostname, $port);

if(!$connection) {
    echo "failure";
    exit;
}

// Attempt authentication
if(!ssh2_auth_password($connection, $username, $password)) {
    echo "failure";
    exit;
}

// Close the SSH connection
ssh2_disconnect($connection);

// If all checks passed, return success
echo "success";
?>
