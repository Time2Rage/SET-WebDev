<?php declare(strict_types=1);
/**
 * User Class - Base for Customer, Admin, Printer
 */
class User {
    public $email, $password;


    function __construct($email, $password){
        $this->email = $email;
        $this->password= $password;
    }
    

    public function login(String $email, String $password){

        try{
            include '../src/DBconnection.php';
    
            $sql = "SELECT * FROM user WHERE email= '$email' AND password = '$password'";
    
            $statement = $connection->prepare($sql);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
    

            if($user['email'] == $email && $user['password'] == $password){

                    $_SESSION['Username'] = $email;
                    $_SESSION['Active'] = true;
                    
                    header("location:index.php");
            }
            else{
                header("location:profile.php");
            }
        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }       
    }

    function create(String $email, String $password): void{
        include '../src/DBconnection.php';

        try {
            $new_user = array(
                "email" => $_POST['email'],
                "password" => $_POST['password'],
            );
    
            $sql = sprintf("INSERT INTO %s (%s) values (%s)", "user", implode(", ", array_keys($new_user)), ":" . implode(", :", array_keys($new_user)));

            $statement = $connection->prepare($sql)->execute($new_user);
    
            header("location:profile.php");
    
        } 
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
}















