

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/DWP-GameWebshop/styles/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
 -->    <script src="../main.js"></script>
</head>

<body>
    <header>
        <input type="checkbox" id="check" class="check1">
        <input type="checkbox" id="check2" class="check2">

        <div class="logo">
            <img onclick="window.location='/DWP-GameWebshop/index.php';" src="/DWP-GameWebshop/assets/logo.png" alt="DWP" height="65px">
            <h1>DWP Games</h1>
        </div>
        <ul class="platformMenu" id="platformMenu">
            <div class="dropdown">
                <li class="desktop_link"><a href="#">Platform</a></li>
                <div class="dropdown-content">
                    <li><a href="/DWP-GameWebshop/all.php">PC</a></li>
                    <li><a href="/DWP-GameWebshop/all.php">Playstation</a></li>
                    <li><a href="/DWP-GameWebshop/all.php">Xbox</a></li>
                    <li><a href="/DWP-GameWebshop/all.php">Nintendo</a></li>
                </div>
            </div>
            <li class="mobile_link"><a href="/DWP-GameWebshop/all.php">PC</a></li>
            <li class="mobile_link"><a href="/DWP-GameWebshop/all.php">Playstation</a></li>
            <li class="mobile_link"><a href="/DWP-GameWebshop/all.php">Xbox</a></li>
            <li class="mobile_link"><a href="/DWP-GameWebshop/all.php">Nintendo</a></li>
            <li><a href="/DWP-GameWebshop/all.php">Sales</a></li>
            <li><a href="/DWP-GameWebshop/all.php">Genres</a></li>
        </ul>

        <ul class="userMenu"  id="userMenu">
            <div class="dropdown">
                <li class="desktop_link"><a href="#">User</a></li>
                <div class="dropdown-content">
                    <li><a href="/DWP-GameWebshop/users/newuser.php">Create New User</a></li>
                    <li><a href="/DWP-GameWebshop/users/accounts.php">User List</a></li>
                    <li><a href="/DWP-GameWebshop/users/admin/addproduct.php">Add Product</a></li>
                    <li><a href="/DWP-GameWebshop/users/login.php">Login</a></li>
                    <li><a href="/DWP-GameWebshop/users/logout.php">Logout</a></li>
                </div>
            </div>
            <li class="mobile_link"><a href="/DWP-GameWebshop/users/newuser.php">Create New User</a></li>
            <li class="mobile_link"><a href="/DWP-GameWebshop/users/accounts.php">User List</a></li>
            <li class="mobile_link"><a href="/DWP-GameWebshop/users/admin/addproduct.php">Add Product</a></li>
            <li class="mobile_link"><a href="/DWP-GameWebshop/users/login.php">Login</a></li>
            <li class="mobile_link"><a href="/DWP-GameWebshop/users/logout.php">Logout</a></li>
        </ul>

        <div class="icons">
            <span class="material-icons icon cart">shopping_cart</span>
            <label for="check" id="addlayer1" class="material-icons icon menu">menu</label>
            <label for="check2"  id="addlayer2"  class="material-icons icon menu">account_circle</label>
        </div>
    </header>


    <script>

    document.getElementById("addlayer1").addEventListener("click", function() {
     console.log("lameo")

        var element = document.getElementById("platformMenu");
        element.classList.toggle("addlayer");
    });


    document.getElementById("addlayer2").addEventListener("click", function() {
     console.log("lameo")

        var element = document.getElementById("userMenu");
        element.classList.toggle("addlayer");
    });


    </script>