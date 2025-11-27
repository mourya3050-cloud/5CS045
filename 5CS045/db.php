<?php
$mysqli = new mysqli("localhost","2444369","Dolphin@54321","db2444369");
if ($mysqli -> connect_errno) {
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}
?>