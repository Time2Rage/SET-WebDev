<?php 
    require_once "../layout/header.php";
    require_once "../lib/User.php";
    require "../lib/Customer.php";
    include_once "../src/common.php";


    if (isset($_SESSION['Username'])) { 
        try {
            $userIDContainer = userIDCont($_SESSION['Username']);
            $result1 = res1($_SESSION['Username']);
            $result2 = res2($userIDContainer);
            $result3 = res3($userIDContainer);
        }
        catch(PDOException $error) {
            echo $error->getMessage();
        }
    }
    else {
        echo "Something went wrong!";
        exit;
    }

    $Customer = new Customer($_SESSION['Username'], $_SESSION['pWord']);

    if (isset($_POST['updateUser']))
        $Customer->updateUser(escape($_POST['email']), escape($_POST['password']));
    if (isset($_POST['insertBillAddress']))
        $Customer->insertBillAddress(escape($userIDContainer), escape($userIDContainer), escape($_POST['fName']), escape($_POST['sName']), escape($_POST['addLine1']), escape($_POST['addLine2']), escape($_POST['zip']), escape($_POST['country']));
    if (isset($_POST['updateBillAddress']))
        $Customer->updateBillAddress(escape($userIDContainer), escape($userIDContainer), escape($_POST['fName']), escape($_POST['sName']), escape($_POST['addLine1']), escape($_POST['addLine2']), escape($_POST['zip']), escape($_POST['country']));
    if (isset($_POST['deleteAddress']))
        $Customer->deleteAddress(escape($userIDContainer));
    if (isset($_POST['insertCreditCard']))
        $Customer->insertCreditCard(escape($userIDContainer), escape($_POST['ccNr']), escape($_POST['fName']), escape($_POST['sName']), escape($_POST['expDate']), escape($_POST['secNr']));
    if (isset($_POST['updateCreditCard']))
        $Customer->updateCreditCard(escape($userIDContainer), escape($_POST['ccNr']), escape($_POST['fName']), escape($_POST['sName']), escape($_POST['expDate']), escape($_POST['secNr']));
    if (isset($_POST['deleteCard']))
        $Customer->deleteCard(escape($userIDContainer));
?>


   <!-- ======= Username and Password Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
            <div class="row content">
                <h2>Edit Username and Password</h2>
                <form method="post">

                    <?php foreach ($result1 as $key => $value):
                        if($key == 'ctcID' || $key == 'custID'){ continue; } ?>
                        <label for="<?php echo $key;?>"> <?php echo ucfirst($key); ?> </label>
                        <input type="text" name=<?php echo $key; ?> id=<?php echo $key;?> value="<?php echo escape($value); ?>"
                            <?php echo ($key === 'id' ? 'readonly' : null);?> required >
                    <?php endforeach; ?>

                    <input type="submit" name="updateUser" value="Submit">
                </form>
            </div>
        </div>
    </section>
    <!-- End Username and Password Section -->


    <!-- ======= Address Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">


            <?php if($result2!=NULL){ ?>
                <h2>Edit address</h2>
                <form method="post">

                    <?php foreach ($result2 as $key => $value):
                        if($key == 'ctcID' || $key == 'custID'){ continue; } ?>
                            <label for="<?php echo $key;?>"> <?php echo ucfirst($key); ?> </label>
                            <input type="text" name=<?php echo $key; ?> id=<?php echo $key;?> value="<?php echo escape($value); ?>"
                            <?php echo ($key === 'id' ? 'readonly' : null);?> required >
                    <?php endforeach; ?>

                    <input type="submit" name="updateBillAddress" value="Submit">
                    <input type="submit" name="deleteAddress" value="Delete">
                </form>
            <?php }
            else { ?>
                <h2>Insert address</h2>
                    <form method="post">
                        <label for="fName">First Name</label>
                        <input type="text" name="fName" id="fName">
                        <label for="sName">Second Name</label>
                        <input type="text" name="sName" id="sName">
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
            <?php } ?>
        </div>
    </section>
    <!-- End Address Section -->


    <!-- ======= Card Details Section ======= -->
    <section id="skills" class="skills">
        <div class="container" data-aos="fade-up" >
            <div class="row skills-content" >

                <?php if($result3!=NULL){ ?>
                    <h2>Edit Card details</h2>
                        <form method="post">

                            <?php foreach ($result3 as $key => $value) :
                                if($key == 'custID'){ continue; } ?>
                                    <label for="<?php echo $key;?>"> <?php echo ucfirst($key); ?> </label>
                                    <input type="text" name=<?php echo $key; ?> id=<?php echo $key;?> value="<?php echo escape($value); ?>"
                                    <?php echo ($key === 'id' ? 'readonly' : null); ?> required>
                            <?php endforeach; ?>

                            <input type="submit" name="updateCreditCard" value="Submit">
                            <input type="submit" name="deleteCard" value="Delete">
                        </form>
                <?php }
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
            </div>
        </div>
    </section>
    <!-- End Card Details Section -->


    <?php include "../layout/footer.php"; ?>