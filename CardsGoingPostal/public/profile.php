<?php 
    require_once "../layout/header.php"; 
    require_once "../lib/User.php";


    if (isset($_SESSION['Username'])) {
        try {
            require_once '../src/DBconnection.php';
            require "../lib/Customer.php"; 

            $un = $_SESSION['Username'];
            $id = $_GET['id'];

            if(isset($_POST['addr'])){
                $sql = "SELECT * FROM contact WHERE ctcID = '$id'";
                $statement = $connection->prepare($sql);
                $statement->execute(); //work that sql magic baby yeah! 
                $var = $statement->fetch(PDO::FETCH_ASSOC);

               if(($var['ctcID'])==NULL){
                    $sql = "SELECT * FROM customer WHERE email = '$un'";
                    $statement = $connection->prepare($sql);
                    $statement->execute(); //work that sql magic baby yeah! 
                    $var1 = $statement->fetch(PDO::FETCH_ASSOC);
                    $vart = ($var1['custID']);
                    

                    try {
                        $new_user = array(
                            "ctcID" => $_GET['id'],
                            "custID" => $vart,
                            "fName" => $_POST['fName'],
                            "sName" => $_POST['sName'],
                            "addLine1" => $_POST['addLine1'],
                            "addLine2" => $_POST['addLine2'],
                            "zip" => $_POST['zip'],
                            "country" => $_POST['country'],
                        );
                
                        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "contact", implode(", ", array_keys($new_user)), ":" . implode(", :", array_keys($new_user)));
                        $statement = $connection->prepare($sql)->execute($new_user);
                        echo("Address entered successfully");
                    } 
                    catch(PDOException $error) {
                        echo $sql . "<br>" . $error->getMessage();
                    }
                }
                else{
                   echo ("Please update details in Profile");
                }
            }
            else if(isset($_POST['card'])){
                include '../src/DBconnection.php';
                $un = $_SESSION['Username'];

                $sql = "SELECT * FROM customer WHERE email = '$un'";
                $statement = $connection->prepare($sql);
                $statement->execute(); //work that sql magic baby yeah! 
                $var1 = $statement->fetch(PDO::FETCH_ASSOC);
                    
                $vart = ($var1['custID']);
                var_dump($var1['custID']);

                try {
                    $new_user = array(
                        "custID" => $vart,
                        "ccNr" => $_POST['ccNr'],
                        "fName" => $_POST['fName'],
                        "sName" => $_POST['sName'],
                        "expDate" => $_POST['expDate'],
                        "secNr" => $_POST['secNr'],
                    );
                
                    $sql = sprintf("INSERT INTO %s (%s) values (%s)", "payment", implode(", ", array_keys($new_user)), ":" . implode(", :", array_keys($new_user)));
                    $statement = $connection->prepare($sql)->execute($new_user);
                    echo ("Card Details entered successfully");
                } 
                catch(PDOException $error) {
                    echo $sql . "<br>" . $error->getMessage();
                }
            }
            $un = $_SESSION['Username'];
            $id = $_SESSION[$vart];


            //Populate email & password table 
            $sql = "SELECT * FROM user WHERE email = '$un'";
            $statement = $connection->prepare($sql);
            $statement->execute(); //work that sql magic baby yeah! 
            $result1 = $statement->fetchAll();
            


            //Populate address table 
            $sql3 = "SELECT * FROM contact WHERE custID = '$vart'"; //get record with same custID as $arr
            $statement = $connection->prepare($sql3);
            $statement->execute(); 
            $result2 = $statement->fetchAll();


            //Populate payment details table 
            $sql4 = "SELECT * FROM payment WHERE custID = '$vart'"; //same as above 
            $statement = $connection->prepare($sql4);
            $statement->execute();           
            $result3 = $statement->fetchAll();
        } 
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } 
    else {

        //Logic to update details in Customer class, didnt get time to do this. 
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
    </form>



    <h3>Please insert card data</h3>
    <form method="post">
        <label for="ccNr">Ccnr </label>
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

<h2>Edit Username and Password</h2>
<?php foreach ($result1 as $row) : ?>
    <form method="post">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" value = "<?php echo ($row["email"]); ?>">

        <label for="password">Password</label>
        <input type="text" name="password" id="password" value = "<?php echo ($row["password"]); ?>">

        <input type="submit" name="login" value="Submit">
    </form>
<?php endforeach; ?>


<h2>Edit Address</h2>
<?php foreach ($result2 as $row) : ?>
    <form method="post">
        <label for="fName">First Name</label>
        <input type="text" name="fName" id="fName" value = "<?php echo ($row["fName"]); ?>">
        <label for="SName">Second Name</label>
        <input type="text" name="SName" id="SName" value = "<?php echo ($row["sName"]); ?>">
        <label for="addLine1">Address Line 1</label>
        <input type="text" name="addLine1" id="addLine1" value = "<?php echo ($row["addLine1"]); ?>">
        <label for="addLine2">Address Line 2</label>
        <input type="text" name="addLine2" id="addLine2" value = "<?php echo ($row["addLine2"]); ?>">
        <label for="zip">Zip Code</label>
        <input type="text" name="zip" id="zip" value = "<?php echo ($row["zip"]); ?>">
        <label for="country">Country</label>
        <input type="text" name="country" id="country" value = "<?php echo ($row["country"]); ?>">

        <input type="submit" name="addr" value="Submit">
    </form>
<?php endforeach; ?>

<h2>Edit Card details</h2>
<?php foreach ($result3 as $row) : ?>
    <form method="post">
        <label for="ccNr">Ccnr </label>
        <input type="text" name="ccNr" id="ccNr" value = "<?php echo ($row["ccNr"]); ?>">
        <label for="fName">First Name </label>
        <input type="text" name="fName" id="fName"> value = "<?php echo ($row["fName"]); ?>">
        <label for="sName">Second Name</label>
        <input type="text" name="sName" id="sName" value = "<?php echo ($row["sName"]); ?>">
        <label for="expDate">Expiry Date</label>
        <input type="text" name="expDate" id="expDate" value = "<?php echo ($row["expDate"]); ?>">
        <label for="secNr">Security Number</label>
        <input type="text" name="secNr" id="secNr" value = "<?php echo ($row["secNr"]); ?>">

        <input type="submit" name="card" value="Submit">
    </form>
<?php endforeach; ?>

<?php }


    else{ ?>
    


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