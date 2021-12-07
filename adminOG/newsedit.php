<?php
require('../includes/connection.php');
require('../includes/session.php');
if (!admin()) {
    redirect_to("../index.php");
}

$sale = $date = $rate = '';
$errors = array('sale' => '', 'date' => '', 'rate' => '');
$numerror = 0;

if (isset($_POST['submit'])) {
    $sale = $_POST['sale'];
    $date = $_POST['date'];
    $rate = $_POST['rate'];

    $query = "UPDATE `news` SET `sale`='$sale', `date`='$date', `rate`='$rate'";

    $regexpSale = "/^[0-9]{2,3}$/";
    $regexpDate = "/^[0-9 ]{1}$/";
    $regexpRate = "/^[0-9]{1}$/";

    if (
        !preg_match($regexpSale, $_POST['sale'])
    ) {
        $errors['sale'] = " Must have a sale.";
        $numerror++;
    } if (
        !preg_match($regexpDate, $_POST['date'])
    ) {
        $errors['date'] = " Must have a date.";
        $numerror++;
    }
    if (
        !preg_match($regexpRate, $_POST['rate'])
    ) {
        $errors['rate'] = " Must have a rate.";
        $numerror++;
    }
    if ($numerror == 0) {
        if (!mysqli_query($connection, $query)) {
            die("DB error: " . mysqli_error($connection));
        }
        echo "Homepage news updated" . "<br> at " . date("h:i:sa");
    }
}
include("../navigation/adminNav.php");
?>
<div class="adminContent">

    <div class="newsContainer">
    <form method="post" action="newsedit.php">
        <fieldset>
            <legend>Here you can adjust the frontpage</legend>
            Sale Limit (Everything below this number is displayed as on sale):<br><input type="text" name="sale" value="<?php echo $sale ?>">
            <div style="color:red;"><?php echo $errors['sale']; ?></div> <br>
            New Releases Interval (From today's date and how far back in months):<br><input type="text" name="date" value="<?php echo $date ?>">
            <div style="color:red;"><?php echo $errors['date']; ?></div> <br>
            Rating (Everything above this number is displayed in highly rated):<br><input type="text" name="rate" value="<?php echo $rate ?>">
            <div style="color:red;"><?php echo $errors['rate']; ?></div> <br>
            <input class="subButton" type="submit" name="submit" value="SUBMIT"> <br>

        </fieldset>
    </form>
    </div>
</div>