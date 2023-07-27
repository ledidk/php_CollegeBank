<?php 
    session_start(); 	// retrieve PHP session!
    if (!isset($_SESSION["name"]))
    {
        echo '<script>window.location.href = "DepositCalculator.php";</script>';
        header("DepositCalculator.php");
        exit();
    }

    include("./common/header.php"); 
?>
<?php
    include("./common/header.php"); 
?>

<div class="container">
<br/>

	<h1>Thank you, <span class="text-primary"><?php echo $_SESSION["name"] ?></span>, for using our deposit calculator!</h1>
        <p>Our customer service department will call you tomorrow afternoon .
              or evening at <span class="text-primary"><?php echo $_SESSION["phonenumber"] ?> </p>
     
	<?php session_destroy();?>
</div>

<?php include('./common/footer.php'); ?>













































