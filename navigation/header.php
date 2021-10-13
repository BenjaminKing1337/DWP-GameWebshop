<?php require_once("./styles/./styles.php") ?>


<html>

<body>
    <div id="Header">
        <div id="LogoContainer">
            <img id="Logo" height="50px" src="./assets/logo.png" alt="Logo">

        </div>
        <div id="SearchBarContainer">
            <div id="SearchBar"><input type="text" placeholder="Search.."><button id="SearchBtn" type="submit"><img src="./assets/icons/magnify.svg" alt="Search"></button></div>
        </div>
        <div id="CustomerCorner">
            <div id="NavDropdown">
                <button id="NavDropdownBtn"><img src="./assets/icons/arrow-down-drop-circle.svg" alt="NavBar"></button>
                <div id="DropdownContent">

                    <a href="#"><button id="Home" onclick="window.location.href='./index.php'" style="background-color:magenta; font-weight:bold;">Home</button></a>
                    <a href="#"><button id="PC" onclick="window.location.href='./all.php'" style="background-color:black; font-weight:bold;">PC</button></a>
                    <a href="#"><button id="PlayStation" onclick="window.location.href='./all.php'" style="background-color:blue; font-weight:bold;">PlayStation</button></a>
                    <a href="#"><button id="XBOX" onclick="window.location.href='./all.php'" style="background-color:green; font-weight:bold;">XBOX</button></a>
                    <a href="#"><button id="Nintendo" onclick="window.location.href='./all.php'" style="background-color:red; font-weight:bold;">Nintendo</button></a>

                </div>
            </div>
            <div id="Basket">
                <button id="CheckoutBtn"><img src="./assets/icons/basket.svg" alt="Checkout"></button>
            </div>
            <div id="UserOptions">
                <button id="DropdownBtn"><img src="./assets/icons/account-circle.svg" alt="User"></button>
                <div id="DropdownContent">
                <a href="#"><button id="New User" onclick="window.location.href='users/newuser.php'" style="background-color:crimson; font-weight:bold;">New User</button></a>

                    <a href="#"><button id="All Users" onclick="window.location.href='users/accounts.php'" style="background-color:salmon; font-weight:bold;">All Users</button></a>
                    <a href="#"><button id="LogOut" onclick="window.location.href='users/logout.php'" style="background-color:teal; font-weight:bold;">Log Out</button>
                    </a>
                </div>
            </div>
        </div>


    </div>


</body>

</html>