<?php
spl_autoload_register(function ($class) {
    include "../classes/" . $class . ".php";
});
require('../includes/connection.php');
require('../includes/session.php');
if (!admin()) {
    $redirect = new Redirector("../index.php");
}
$query = mysqli_query($connection, "SELECT * FROM `news`");
$data = mysqli_fetch_array($query);
$hero1 = $data['hero1'];
$hero2 = $data['hero2'];
$hero3 = $data['hero3'];
$sale = $data['sale'];
$date = $data['date'];
$rate = $data['rate'];
$errors = array('hero1' => '', 'hero2' => '', 'hero3' => '', 'sale' => '', 'date' => '', 'rate' => '');
$numerror = 0;

if (isset($_POST['submit'])) {
    $hero1 = $_POST['hero1'];
    $hero2 = $_POST['hero2'];
    $hero3 = $_POST['hero3'];
    $sale = $_POST['sale'];
    $date = $_POST['date'];
    $rate = $_POST['rate'];

    $sql = "UPDATE `news` SET `hero1`='$hero1', `hero2`='$hero2', `hero3`='$hero3', `sale`='$sale', `date`='$date', `rate`='$rate'";

    $regexpHero = "/^[A-z0-9-_ ]{100}$/";
    $regexpSale = "/^[0-9]{2,3}$/";
    $regexpDate = "/^[0-9]{1,2}$/";
    $regexpRate = "/^[0-9]{1}$/";

    if (
        !preg_match($regexpHero, $_POST['hero1'])
    ) {
        $errors['hero1'] = " Must be between 2 and 3 digits.";
        $numerror++;
    }
    if (
        !preg_match($regexpHero, $_POST['hero1'])
    ) {
        $errors['hero1'] = " Must be between 2 and 3 digits.";
        $numerror++;
    }
    if (
        !preg_match($regexpHero, $_POST['hero1'])
    ) {
        $errors['hero1'] = " Must be between 2 and 3 digits.";
        $numerror++;
    }
    if (
        !preg_match($regexpSale, $_POST['sale'])
    ) {
        $errors['sale'] = " Must be between 2 and 3 digits.";
        $numerror++;
    }
    if (
        !preg_match($regexpDate, $_POST['date'])
    ) {
        $errors['date'] = " Must be between 2 and 3 digits.";
        $numerror++;
    }
    if (
        !preg_match($regexpRate, $_POST['rate'])
    ) {
        $errors['rate'] = " Must be a single digit.";
        $numerror++;
    }
    if ($numerror == 0) {
        if (!mysqli_query($connection, $sql)) {
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
                <legend>
                    <h2>Here you can adjust the frontpage</h2>
                </legend>
               <div class="news1">
               <h3>Hero</h3><br>
               Line 1:<br><input type="text" name="hero1" value="<?php echo $hero1 ?>">
                <div style="color:red;"><?php echo $errors['hero1']; ?></div> <br>
                Line 2:<br><input type="text" name="hero1" value="<?php echo $hero2 ?>">
                <div style="color:red;"><?php echo $errors['hero2']; ?></div> <br>
                Line 3:<br><input type="text" name="hero1" value="<?php echo $hero3 ?>">
                <div style="color:red;"><?php echo $errors['hero3']; ?></div> <br>
               </div>
                
                <div class="news2">
                Sale Limit <br>(Everything below this number is displayed as on sale; input 2 to 3 digits):<br><input type="text" name="sale" value="<?php echo $sale ?>">
                <div style="color:red;"><?php echo $errors['sale']; ?></div> <br>
                New Releases Interval <br>(This number determines how many months back from today's date this section displays; input 1 to 2 digits):<br><input type="text" name="date" value="<?php echo $date ?>">
                <div style="color:red;"><?php echo $errors['date']; ?></div> <br>
                Rating <br>(Everything above this number is displayed in highly rated; input 1 digit):<br><input type="text" name="rate" value="<?php echo $rate ?>">
                <div style="color:red;"><?php echo $errors['rate']; ?></div> <br>
                <input class="subButton" type="submit" name="submit" value="SUBMIT"> <br>
                </div>

            </fieldset>
        </form>
    </div>
</div>