<?php 
    require_once "../layout/header.php"; 
    require_once "../lib/User.php";


    if (isset($_SESSION['Username'])) {
        try {
            require_once '../src/DBconnection.php';
            require "../lib/Customer.php"; 

            $un = $_SESSION['Username'];


            //get custID from customer with same email as session 
            $sql1 = "SELECT custID FROM customer WHERE 'email' = '$un'"; 
            $statement = $connection->prepare($sql1);
            $statement->execute(); //work that sql magic baby yeah! 
            $arr = $statement->fetchAll();

            var_dump($arr['custID']);

            if(isset($_POST['addr'])){
                if(var_dump($arr['custID']) == NULL){

                }
                else{
                    echo ("Please update details in Profile");
                }
            }
            else if(isset($_POST['card'])){
                if(var_dump($arr['custID']) == NULL){

                }
                else{
                    echo ("Please update details in Profile");
                }
            }

            
            //Populate email & password table 
            $sql2 = "SELECT * FROM user WHERE `email` = '$un'";
            $statement = $connection->prepare($sql2);
            $statement->execute(); //work that sql magic baby yeah! 
            $result1 = $statement->fetchAll();

            


            //Populate address table 
            $sql3 = "SELECT * 'FROM' contact WHERE `custID` = $arr"; //get record with same custID as $arr
            $statement = $connection->prepare($sql3);
            $statement->execute(); 
            $result2 = $statement->fetch(PDO::FETCH_ASSOC);


            //Populate payment details table 
            $sql4 = "SELECT * FROM payment WHERE `custID` = $arr"; //same as above 
            $statement = $connection->prepare($sql4);
            $statement->execute();           
            $result3 = $statement->fetch(PDO::FETCH_ASSOC);
        } 
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } 
    else {
        echo "Something went wrong!";
        exit;



        if(isset($_POST['user'])){
            $Customer->changeUser($_POST['email'], $_POST['password']);
        }
        else if (isset($_POST['billAddress'])){
            $Customer->billAddress($_POST['fName'], $_POST['sName'], 
                            $_POST['addressLine1'],$_POST['addressLine2'],
                            $_POST['postCode'],$_POST['country'],
                            );
        }
        else if (isset($_POST['creditCard'])){
            $Customer->creditCard($_POST['nameOnCard'], $_POST['ccNr'],
                            $_POST['expDate'], $_POST['secCode'], 
                            );
        }
    }   


    require_once "../layout/header.php";

?> 

<?php if(var_dump($arr)==NULL){ ?>
    <h3>Please insert address data</h3>
    <form method="post">
    <label for="fName">First Name</label>
    <input type="text" name="fName" id="fName">
    <label for="SName">Second Name</label>
    <input type="text" name="SName" id="SName">
    <label for="addLine1">Address Line 1</label>
    <input type="text" name="addLine1" id="addLine1">
    <label for="addLine2">Address Line 2</label>
    <input type="text" name="addLine2" id="addLine2">
    <label for="zip">Zip Code</label>
    <input type="text" name="zip" id="zip">
    <label for="country">Country</label>
    <input type="text" name="country" id="country">

    <input type="submit" name="addr" value="Submit">



    <h3>Please insert card data</h3>
    <form method="post">
    <label for="ccNr">Credit Card Number </label>
    <input type="text" name="ccNr" id="ccNr" >
    <label for="fName">First Name </label>
    <input type="text" name="fName" id="fName">
    <label for="sName">Second Name</label>
    <input type="text" name="sName" id="sName" >
    <label for="expDate">Expiry Date</label>
    <input type="text" name="expDate" id="expDate" >
    <label for="secNr">Security Number</label>
    <input type="text" name="secNr" id="secNr" >

    <input type="submit" name="card" value="Submit">
</form>
</form>

<?php }
    else{ ?>
    <h2>Edit a user</h2>


    

<?php foreach ($result1 as $row) : ?>
    <form method="post">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" value = "<?php echo ($row["email"]); ?>">

        <label for="password">Password</label>
        <input type="text" name="password" id="password" value = "<?php echo ($row["password"]); ?>">

        <input type="submit" name="login" value="Submit">
    </form>
<?php endforeach; ?>


<?php
/**
 * Couldnt get working, maybe try after finish database insert 
<!-- <form method="post">
    <?php foreach ($result1 as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key;?>" value="
        <?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    
    <input type="submit" name="user" value="Submit">
</form> -->
*/
?>





    <?php } ?>    



<?php include "../layout/footer.php"; ?> 