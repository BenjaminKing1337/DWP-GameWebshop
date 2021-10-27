<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$message = $_POST["message"];
$subject = $_POST['subject'];


$mymail = "emil96k0@easv365.dk";

$regexp1 = "/^[A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";
$regexp2 = "/^[A-z0-9_-]{2,600}$/";

if (
    !preg_match($regexp1, $_POST['email'])
) {
    echo " Incorrect Email.";
} elseif (
    !preg_match($regexp2, $_POST['subject'])
    || !preg_match($regexp2, $_POST['message'])
) {
    echo " Subject and/or Message not meeting criteria.";
} elseif (
    !preg_match($regexp2, $_POST['firstname'])
    || !preg_match($regexp2, $_POST['lastname'])
) {
    echo " First and/or last named incorrectly filled out.";
} elseif (
    empty($email)
    || empty($firstname)
    || empty($lastname)
    || empty($subject)
    || empty($message)
) {
    echo "Empty fields";
} else {
    $timestamp = date("h:i:sa");
    $body = "$message\n\nE-mail: $email";
    $body2 = "Thank you for your message \n\n$body";
    mail($mymail, $subject, $body, "From: $email\n");
    mail($email, $body2, $timestamp, "From: noreply@DWPGames.dk");
    echo "Thanks for your E-mail" . "<br> Sent at" . date("h:i:sa");
}

