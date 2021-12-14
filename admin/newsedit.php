<?php
require("../includes/adminhead.php");
if (!admin()) {
    $redirect = new Redirector("../index.php");
}
$query = mysqli_query($connection, "SELECT * FROM `news`");
$data = mysqli_fetch_array($query);
$hero1 = $data['hero1'];
$hero2 = $data['hero2'];
$hero3 = $data['hero3'];
$wHead = $data['wHead'];
$wMsg = $data['wMsg'];
$sale = $data['sale'];
$date = $data['date'];
$rate = $data['rate'];
$hours = $data['hours'];
$info = $data['info'];
$errors = array('hero1' => '', 'hero2' => '', 'hero3' => '', 'wHead' => '', 'wMsg' => '', 'sale' => '', 'date' => '', 'rate' => '', 'hours' => '', 'info' => '');
$numerror = 0;

if (isset($_POST['submit'])) {
    $hero1 = $_POST['hero1'];
    $hero2 = $_POST['hero2'];
    $hero3 = $_POST['hero3'];
    $hero3 = $_POST['wHead'];
    $hero3 = $_POST['wMsg'];
    $sale = $_POST['sale'];
    $date = $_POST['date'];
    $rate = $_POST['rate'];
    $hours = $_POST['hours'];
    $info = $_POST['info'];
    
    $sql = "UPDATE `news` SET `hero1`='$hero1', `hero2`='$hero2', `hero3`='$hero3', `wHead`='$wHead', `wMsg`='$wMsg', `sale`='$sale', `date`='$date', `rate`='$rate', `hours`='$hours', `info`='$info'";

    $regexpHero = "/^[A-z0-9-_. ]{1,100}$/";
    $regexpSale = "/^[0-9]{2,3}$/";
    $regexpDate = "/^[0-9]{1,2}$/";
    $regexpRate = "/^[0-9]{1}$/";
    // $regexpHours = "/^[A-z0-9-_ ]{1,500}$/";
    // $regexpInfo = "/^[A-z0-9-_ ]{1,1200}$/";

    // if (
    //     !preg_match($regexpHero, $_POST['hero1'])
    // ) {
    //     $errors['hero1'] = " Must be filled";
    //     $numerror++;
    // }
    // if (
    //     !preg_match($regexpHero, $_POST['hero2'])
    // ) {
    //     $errors['hero2'] = " Must be filled";
    //     $numerror++;
    // }
    // if (
    //     !preg_match($regexpHero, $_POST['hero3'])
    // ) {
    //     $errors['hero3'] = " Must be filled";
    //     $numerror++;
    // }
    // if (
    //     !preg_match($regexpW, $_POST['wHead'])
    // ) {
    //     $errors['wHead'] = " Must be filled";
    //     $numerror++;
    // }
    // if (
    //     !preg_match($regexpW, $_POST['wMsg'])
    // ) {
    //     $errors['wMsg'] = " Must be filled";
    //     $numerror++;
    // }
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
    // if (
    //     !preg_match($regexpHours, $_POST['hours'])
    // ) {
    //     $errors['hours'] = " Must have opening hours.";
    //     $numerror++;
    // }
    // if (
    //     !preg_match($regexpInfo, $_POST['info'])
    // ) {
    //     $errors['info'] = " Must have company info.";
    //     $numerror++;
    // }
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
                    Line 2:<br><input type="text" name="hero2" value="<?php echo $hero2 ?>">
                    <div style="color:red;"><?php echo $errors['hero2']; ?></div> <br>
                    Line 3:<br><input type="text" name="hero3" value="<?php echo $hero3 ?>">
                    <div style="color:red;"><?php echo $errors['hero3']; ?></div> <br>
                </div>

                <div class="weekly">
                    <h3>Weekly News</h3>
                    Headline:<br><input type="text" name="wHead" value="<?php echo $wHead ?>">
                    <div style="color:red;"><?php echo $errors['wHead']; ?></div> <br>
                    Message:<br><input type="text" name="wMsg" value="<?php echo $wMsg ?>">
                    <div style="color:red;"><?php echo $errors['wMsg']; ?></div> <br>
                </div>

                <div class="news2">
                    <h3>Product Displays</h3>
                    Sale Limit <br>(Everything below this number is displayed as on sale; input 2 to 3 digits):<br><input type="text" name="sale" value="<?php echo $sale ?>">
                    <div style="color:red;"><?php echo $errors['sale']; ?></div> <br>
                    New Releases Interval <br>(This number determines how many months back from today's date this section displays; input 1 to 2 digits):<br><input type="text" name="date" value="<?php echo $date ?>">
                    <div style="color:red;"><?php echo $errors['date']; ?></div> <br>
                    Rating <br>(Everything above this number is displayed in highly rated; input 1 digit):<br><input type="text" name="rate" value="<?php echo $rate ?>">
                    <div style="color:red;"><?php echo $errors['rate']; ?></div> <br>
                </div>
                <div class="info">
                    <h3>Company Info</h3>
                    Opening Hours:<br><input type="text" name="hours" value="<?= $hours ?>">
                    <div style="color:red;"><?= $errors['hours']; ?></div> <br>
                    Company Info:<br><textarea type="text" name="info"><?= $info ?></textarea>
                    <div style="color:red;"><?= $errors['info']; ?></div> <br>
                </div>
                <input class="subButton" type="submit" name="submit" value="SUBMIT"> <br>
            </fieldset>
        </form>
    </div>
</div>