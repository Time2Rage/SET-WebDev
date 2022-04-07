<?php 
    require_once "../layout/header.php"; 
    require_once "../lib/User.php";
    require "../lib/Customer.php";


    if (isset($_SESSION['Username'])) { 
        try {
            require_once '../src/DBconnection.php';


            $userName = $_SESSION['Username'];
            $browserID = $_GET['id'];


            //Pull user ID from customer table to find the right records associated with user 
            $sql = "SELECT * FROM customer WHERE email = '$userName'";
            $statement = $connection->prepare($sql);
            $statement->execute(); //work that sql magic baby yeah! 
            $userID = $statement->fetch(PDO::FETCH_ASSOC);


            $userIDContainer = ($userID['custID']);

            
            //Populate email & password table 
            $sql1 = "SELECT * FROM user WHERE email = '$userName'";
            $statement = $connection->prepare($sql1);
            $statement->execute(); //work that sql magic baby yeah! 
            $result1 = $statement->fetchAll();
            

            //Populate address table 
            $sql2 = "SELECT * FROM contact WHERE custID = '$userIDContainer'"; //get record with same custID as $arr
            $statement = $connection->prepare($sql2);
            $statement->execute(); 
            $result2 = $statement->fetchAll();


            //Populate payment details table 
            $sql3 = "SELECT * FROM payment WHERE custID = '$userIDContainer'"; //same as above 
            $statement = $connection->prepare($sql3);
            $statement->execute();           
            $result3 = $statement->fetchAll();
        } 
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } 
    else {
        echo "Something went wrong!";
        exit;
    }

    

    

    /*

    When done in the same class arguments passed to methods, and updates database fine, but when placed in different file does not work. 
    
    Screen just goes white after submitting  


    */
    if(isset($_POST['updateUser'])){
        $Customer->changeUser($_POST['email'], $_POST['password']);
    }
    else if (isset($_POST['updateBillAddress'])){
        $Customer->changeBillAddress($_POST['fName'], $_POST['sName'], 
                        $_POST['addressLine1'],$_POST['addressLine2'],
                        $_POST['postCode'],$_POST['country'],
                        );
                        
    }
    else if (isset($_POST['updateCreditCard'])){
        $Customer->changeCreditCard($_POST['nameOnCard'], $_POST['ccNr'],
                        $_POST['expDate'], $_POST['secCode'], 
                        );
    }
    else if (isset($_POST['insertBillAddress'])){
        $Customer = new Customer($_SESSION('Username'),"1234");
        $Customer->insertBillAddress($userIDContainer, $userIDContainer, $_POST['fName'], $_POST['sName'],
                        $_POST['addLine1'], $_POST['addLine2'], 
                        $_POST['zip'],$_POST['country'], 
                        );
                        
    }
    else if (isset($_POST['insertCreditCard'])){
        $Customer->insertCreditCard($userIDContainer, $_POST['ccNr'], 
                        $_POST['fName'], $_POST['sName'],
                        $_POST['expDate'], $_POST['secNr'], 
                        );
    }
?> 



<?php 
    if($result2!=NULL){ ?>
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


                    <input type="submit" name="updateBillAddress" value="Submit">
                </form>
            <?php endforeach;

            
    } 
    else{ ?>
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

                
                <input type="submit" name="insertBillAddress" value="Submit">
            </form>
<?php }



    if($result3!=NULL){ ?>
        <h2>Edit Card details</h2>
            <?php foreach ($result3 as $row) : ?>
                <form method="post">
                    <label for="ccNr">Ccnr </label>
                    <input type="text" name="ccNr" id="ccNr" value = "<?php echo ($row["ccNr"]); ?>">
                    <label for="fName">First Name </label>
                    <input type="text" name="fName" id="fName" value = "<?php echo ($row["fName"]); ?>">
                    <label for="sName">Second Name</label>
                    <input type="text" name="sName" id="sName" value = "<?php echo ($row["sName"]); ?>">
                    <label for="expDate">Expiry Date</label>
                    <input type="text" name="expDate" id="expDate" value = "<?php echo ($row["expDate"]); ?>">
                    <label for="secNr">Security Number</label>
                    <input type="text" name="secNr" id="secNr" value = "<?php echo ($row["secNr"]); ?>">


                    <input type="submit" name="updateCreditCard" value="Submit">
                </form>
            <?php endforeach;
    } 
        else { ?>
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


                <input type="submit" name="insertCreditCard" value="Submit">
            </form>
    <?php } ?>

    <h2>Edit Username and Password</h2>
    <?php foreach ($result1 as $row): ?>
        <form method="post">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" value = "<?php echo ($row["email"]); ?>">

            <label for="password">Password</label>
            <input type="text" name="password" id="password" value = "<?php echo ($row["password"]); ?>">

            <input type="submit" name="updateUser" value="Submit">
        </form>
    <?php endforeach; 
    
    include "../layout/footer.php"; ?>