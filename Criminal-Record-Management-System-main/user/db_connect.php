<?php
$conn = mysqli_connect('localhost', 'root', '', 'crms');
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
