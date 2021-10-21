<?php 

?>

<!DOCTYPE html>
<html>
    <?php include('navigation/header.php'); ?>

    <div class="content">
        <div class="hero">
            <h1>Digital codes.</h1>
            <h1>Instant delivery.</h1>
            <h1>Best price on the market</h1>
        </div>

        <div class="best-sales">
        <h2>Best sales ATM</h2>
        <div class="cards">
                <?php for ($i = 0; $i <4; $i++){ ?>
                    
                    <div class="card"><img width="190px" height="180px" src="https://image.api.playstation.com/vulcan/img/cfn/11307DTu3lzL6thuipVwZruYSmRFn1_SpucegJYgtAzcjZLIRPxpCVJkr5C8vfVy5FYMRdHbaJHQXOZldbhjm9ypcA4w51iZ.png" alt=""></div>

                <?php } ?>
            </div>
            <div class="button">
                <h2>See all</h2>
                <span class="material-icons">keyboard_arrow_right</span>
            </div>
        </div>

        <div class="best-sales">
        <h2>New releases</h2>
        <div class="cards">
                <?php for ($i = 0; $i <4; $i++){ ?>
                    
                    <div class="card"><img width="190px" height="180px" src="https://image.api.playstation.com/vulcan/img/cfn/11307DTu3lzL6thuipVwZruYSmRFn1_SpucegJYgtAzcjZLIRPxpCVJkr5C8vfVy5FYMRdHbaJHQXOZldbhjm9ypcA4w51iZ.png" alt=""></div>

                <?php } ?>
            </div>
            <div class="button">
                <h2>See all</h2>
                <span class="material-icons">keyboard_arrow_right</span>
            </div>
        </div>

        <div class="best-sales">
        <h2>Most popular games</h2>
        <div class="cards">
                <?php for ($i = 0; $i <4; $i++){ ?>
                    
                    <div class="card"><img width="190px" height="180px" src="https://image.api.playstation.com/vulcan/img/cfn/11307DTu3lzL6thuipVwZruYSmRFn1_SpucegJYgtAzcjZLIRPxpCVJkr5C8vfVy5FYMRdHbaJHQXOZldbhjm9ypcA4w51iZ.png" alt=""></div>

                <?php } ?>
            </div>
            <div class="button">
                <h2>See all</h2>
                <span class="material-icons">keyboard_arrow_right</span>
            </div>
        </div>
        
        <div class="platform">
            <h2>Pick your platform</h2>
            <div class="pbox pc"><img height="72px" src="https://lh3.googleusercontent.com/proxy/vzzBzYX27mlwAvaiAjGtB5w0Xjrse0l7n1teDUp8OGuKaoyxPvDbFVUT1g7lxvFbj5SNHNwOc3_XSPWDvi9m7o4fwHEoCzzuiHGXGmE5Tt8iaY5WAZbuAF3ygKocIkdgsZPUAd7N2X7oMQ" alt=""></div>
            <div class="pbox ps"><img height="72px" src="https://i.kym-cdn.com/entries/icons/original/000/012/368/playstation-wallpaper-46825-48282-hd-wallpapers.jpg" alt=""></div>
            <div class="pbox xb"><img height="72px" src="data:image/png;base64,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" alt=""></div>
            <div class="pbox nt"><img height="50px" src="https://games.mxdwn.com/wp-content/uploads/2018/07/2000px-Nintendo.svg_.png" alt=""></div>
        </div>
    </div>
    
    <?php include('navigation/footer.php'); ?>
</html>