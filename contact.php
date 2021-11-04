
<?php

$errors = array ('firstname'=>'','lastname'=>'','email'=>'','subject'=>'','message'=>'');
$numerror = 0;

if (isset($_POST['submit'])) {

    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST["message"]);



    $mymail = "emil96k0@easv365.dk";

    $regexp1 = "/^[A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";
    $regexp2 = "/^[A-z ]{2,600}$/";

    if (
        !preg_match($regexp1, $_POST['email'])
    ) {
        $errors['email'] = " Email not valid.";
        $numerror++;
    } if (
        !preg_match($regexp2, $_POST['subject'])
    ) {
        $errors['subject'] = " Subject is required.";
        $numerror++;
    } if (
        !preg_match($regexp2, $_POST['message'])
    ) {
        $errors['message'] = " Message must contain something...";
        $numerror++;
    } if (
        !preg_match($regexp2, $_POST['firstname'])
        || !preg_match($regexp2, $_POST['lastname'])
    ) {
        $errors['firstname'] = " First name incorrectly filled out.";
        $errors['lastname'] = " Last name incorrectly filled out.";
        $numerror++;
    } if (
        empty($email)
        || empty($firstname)
        || empty($lastname)
        || empty($subject)
        || empty($message)
    ) {
        echo "Empty fields";
    } if ($numerror == 0) {
            $timestamp = date("h:i:sa");
            $body = "$message\n\nE-mail: $email";
            $body2 = "Thank you for your message \n\n$body";
            mail($mymail, $subject, $body, "From: $email\n");
            mail($email, $body2, $timestamp, "From: noreply@DWPGames.dk");
            echo "Thanks for your E-mail" . "<br> Sent at" . date("h:i:sa");
    }
} ?>


<html>
<?php include("navigation/header.php"); ?>

<div class="contactFormContainer">
    <h2>Here you can write us an email!</h2>
    <form method="post" action="/DWP-GameWebshop/contact.php">
        First Name: <br><input type="text" name="firstname">
        <div style="color:red;"><?php echo $errors['firstname']; ?></div> <br><br>
        Last Name: <br><input type="text" name="lastname">
        <div style="color:red;"><?php echo $errors['lastname']; ?></div> <br><br>
        Your Email: <br><input type="text" name="email">
        <div style="color:red;"><?php echo $errors['email']; ?></div> <br><br>
        Subject: <br><input type="text" name="subject">
        <div style="color:red;"><?php echo $errors['subject']; ?></div> <br><br>
        Message: <br><textarea cols="21" rows="10" name="message"></textarea>
        <div style="color:red;"><?php echo $errors['message']; ?></div> <br><br>
        <input type="submit" name="submit">
    </form>

</div>


<?php include("navigation/footer.php"); ?>
<html>