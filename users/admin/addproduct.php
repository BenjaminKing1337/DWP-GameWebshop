<html>
<?php include('../../../DWP-GameWebshop/navigation/header.php'); ?>

<div class="addProductContainer">
    <h2>Here you can add a new product.</h2>    
<form method="post" action="addPtoDB.php">
        Title:<br><input type="text" name="Title"> <br><br>
        Price:<br><input type="text" name="Price"> <br><br>
        Release Date:<br><input type="text" name="ReleaseDate"> <br><br>
        Description:<br><textarea type="text" name="Description"></textarea> <br><br>
        Rating:<br><input type="text" name="Rating"> <br><br>
        Platform:<br><input type="text" name="Platform"> <br><br>
        <input type="submit" name="submit"> <br>
    </form>
</div>

<?php include('../../../DWP-GameWebshop/navigation/footer.php'); ?>

</html>