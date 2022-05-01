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
    public function login(){
        try{
            require '../src/DBconnection.php';
    
            $sql = "SELECT * FROM user WHERE email = :email AND password = :password";

            $statement = $connection->prepare($sql);
            $statement->bindParam(":email", $this->email, PDO::PARAM_STR);
            $statement->bindParam(":password", $this->password, PDO::PARAM_STR);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
    

            if($user['email'] == $this->email &&  $user['password'] == $this->password){

                    $_SESSION['Username'] = $this->email;
                    $_SESSION['pWord'] = $this->password;
                    $_SESSION['Active'] = true;
                    $_SESSION['id'] = $_GET['id'];
                    
                    header("location:profile.php");
            }
            else{
                echo ("Unsuccessful login, Please try again");
            }
        }
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }       
    }


    function create(): void{
        include_once '../src/common.php';

        if(isset($this->email) && isset($this->password)){
            try {
                $sql = "INSERT INTO user VALUES (:email, :password)";

                $user = [
                    "email" =>  $this->email,     "password" =>  $this->password
                ];

                insert($sql, $user, "", "location:profile.php");
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















