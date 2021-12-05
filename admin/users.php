<?php
require("../includes/connection.php");
require("../includes/session.php");

$query = "SELECT * FROM `accounts`";
$result = mysqli_query($connection, $query) or die("nada joy!");
$users = mysqli_fetch_array($result);

$username = $_POST['username'];

class User {
    public $username;
    public $Fname;
    public $Lname;
    private $email;
    public $description;
    public $role = 'user';

    public function __construct($username, $Fname, $Lname, $email, $description, $role){
        $this->username = $username;
        $this->Fname = $Fname;
        $this->Lname = $Lname;
        $this->email = $email;
        $this->description = $description;
        $this->role = $role;
    }

    public function __destruct(){
        echo "the user $this->username was removed <br>";
    }

    public function __clone(){
        $this->username= $this->username . '(cloned)<br>';
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        if(strpos($email, '@') > -1){
            $this->email = $email;
        }
    }
}

class Admin extends User {
    public $role = 'admin';

    public function __construct($username, $Fname, $Lname, $email, $description, $role){
        $this->role = $role;
        parent:: __construct($username, $Fname, $Lname, $email, $description);
    }
    
}


// $userOne = New User('h','h@h.h');
// $userTwo = New User('g','g@g.g');
// $userThree = New User('b','b@b.b');
// $userFour = New User('t','t@t.t');



// print_r(get_class_vars('User'));
// print_r(get_class_methods('User'));
mysqli_free_result($result);
mysqli_close($connection);