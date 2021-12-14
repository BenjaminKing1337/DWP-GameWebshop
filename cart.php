<?php
require("includes/head.php");

if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo"Product has been removed from cart";
            }
        }
    }
  }

include("navigation/header.php");
?>


<fieldset>
    <legend>
        <h1>My cart</h1>
    </legend>
    <?php 
    $total = 0;
    if(isset($_SESSION['cart'])){
        $product_id = array_column($_SESSION['cart'], 'product_id');
        $sql = "SELECT id, Thumbnail, Title, Price FROM games ";
        $result = mysqli_query($connection, $sql);

        while ($products = mysqli_fetch_assoc($result)){
            foreach($product_id as $id){
                if($products['id'] == $id){ ?>
                    <form action="cart.php?action=remove&id=<?php echo $products['id'] ?>" method="post">
                        <div class="cart_item">
                            <img src="<?php echo $products['Thumbnail'] ?>" alt="">
                            <div class="info">
                                <div class="title">
                                    <h2><?php echo $products['Title'] ?></h2>
                                </div>
                                <div class="price">
                                    <h3><?php echo $products['Price'] ?> DKK</h3>
                                </div>
                            </div>
                            <button type="submit" name="remove">Remove</button>
                        </div>
                    </form>
                    <?php $total = $total + $products['Price']; ?>
                <?php }
            }
        }
    }
    ?>
    <?php 
    if($total > 0){ ?>
        <h2>Total: <?php echo $total ?> DKK</h2>
        <button class="order_button">Order & Pay</button>
    <?php }
    else{ ?>
        <h1>Cart is empty.</h1>
    <?php } ?>
    
    
    
</fieldset>