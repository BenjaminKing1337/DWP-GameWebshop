<?php

class Userviewer
{
   public function displayUser()
    {
        $db = new DbCon();
        $query = $db->dbCon->prepare("SELECT * FROM accounts");
        if ($query->execute()) {
            $rows = $query->fetchAll();
             // var_dump($rows);
            foreach ($rows as $row) {
                echo
                "<div class='user'> No.: " . $row["ID"] . "<br>" .
                    "Username: " . "<b>" . $row["username"] . "</b><br>" .
                    "First Name: " . "<i>" . $row["Fname"] . "</i><br>" .
                    "Last Name: " . "<i>" . $row["Lname"] . "</i><br>" .
                    "Email: " . "<a href=''>" . $row["email"] . "</a><br>" .
                    "Description: " . $row["description"] . "<br>" .
                    "Usertype: " . $row["usertype"] . "<br>" .
                    "<a style='text-decoration: none;' href='../admin/deluser.php?id=" . $row['ID'] . "'" ?>
                onclick="return confirm('Are you sure you want to annihilate?');"
                <?php echo "> <button>Delete</button></a>" .
                    "<a style='text-decoration: none;' href='../admin/edituser.php?id=" . $row['ID'] . "'" ?>
                onclick="return confirm('Are you sure you want to influence changes?');"
<?php echo ">  <button> Edit </button></a><br></div>";
            }
        }
    }
}
