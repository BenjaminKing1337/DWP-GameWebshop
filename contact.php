<html>
<?php include("navigation/header.php"); ?>

<div class="contactFormContainer">
<h2>Here you can write us an email!</h2>
<form method="post" action="/DWP-GameWebshop/users/includes/contact_pro.php">
    First Name: <br><input type="text" name="firstname"> <br><br>
    Last Name: <br><input type="text" name="lastname"> <br><br>
    Your Email: <br><input type="text" name="email"> <br><br>
    Subject: <br><input type="text" name="subject"> <br><br>
    Message: <br><textarea cols="21" rows="10" name="message"></textarea> <br><br>
    <input type="submit" name="submit">
</form>

</div>


<?php include("navigation/footer.php"); ?>
<html>