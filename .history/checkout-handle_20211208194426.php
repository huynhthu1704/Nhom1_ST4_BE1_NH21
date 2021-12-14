<?php
if (isset($_POST['submit'])) {
    echo "hi";
    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipcode = $_POST['zip-code'];
    $telephone = $_POST['tel'];
   // $note = $_POST['note'];
    echo $firstname."<br>";
    echo $lastname."<br>";
    echo $email."<br>";
    echo $address."<br>";
    echo $city."<br>";
    echo $zipcode."<br>";
    echo $telephone."<br>";
}
