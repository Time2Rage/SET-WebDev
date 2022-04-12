<?php declare(strict_types=1);
/**
 * User Class - Base for Customer, Printer
 */
class User {
    public $email, $password;


    function __construct($email, $password){
        $this->email = $email;
        $this->password= $password;
    }
    

    #!RD Change to bind instead of direct call
    #!RD thinking about modularization: uncoupling bind execute for email+password
    public function login(String $email, String $password){

        try{
            include '../src/DBconnection.php';
    
            $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
    
            $statement = $connection->prepare($sql);
            $statement->bindParam(":email", $email, PDO::PARAM_STR);
            $statement->bindParam(":password", $password, PDO::PARAM_STR);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
    

            if($user['email'] == $email && $user['password'] == $password){

                    $_SESSION['Username'] = $email;
                    $_SESSION['Active'] = true;
                    $_SESSION['id'] = $_GET['id'];
                    
                    header("location:profile.php");
            }
            else{
                header("location:profile.php");
            }
        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }       
    }

    #!RD Change to bind insted of string explode for consistency
    #!RD replaced new_user array, this is the user class and won't be needed in this form since customer creation is covered by different class
    #!RD scrapped arguments. Those are fetched from $_POST
    function create(): void{
        include '../src/DBconnection.php';

        if(isset($_POST["email"]) && isset($_POST["password"]))
        {
            $email = $_POST["email"];
            $password = $_POST["password"];

            try {
                /* Simplify trough easy parameter
                $new_user = array(
                    "email" => $_POST['email'],
                    "password" => $_POST['password'],
                );
                */

                #!RD Maybe overly complex
                $sql = "INSERT INTO user VALUES (:email, :password)";
                #$sql = sprintf("INSERT INTO %s (%s) values (%s)", "user", implode(", ", array_keys($new_user)), ":" . implode(", :", array_keys($new_user)));

                $statement = $connection->prepare($sql);
                $statement->bindParam(":email", $email, PDO::PARAM_STR);
                $statement->bindParam(":password", $password, PDO::PARAM_STR);
                $statement->execute();

                #!RD This is not the place for customer insertion.
                /*
                $new_customer = array(
                    "custID" => $_GET['id'],
                    "email" => $_POST['email'],
                );

                $sql2 = sprintf("INSERT INTO %s (%s) values (%s)", "customer", implode(", ", array_keys($new_customer)), ":" . implode(", :", array_keys($new_customer)));

                $statement = $connection->prepare($sql2)->execute($new_customer);
                */
                
                header("location:profile.php");
            } 
            catch(PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
            }
        }
        else {
            echo "THROW MISSING DATA ERROR AND DO NOTHING";
        }
    }
}















