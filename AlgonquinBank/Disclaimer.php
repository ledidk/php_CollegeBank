<?php

    session_start(); 
        if(!isset($_SESSION["index"]))
        {
            echo '<script>window.location.href = "index.php";</script>';
            header("Location: index.php");
            exit();
        }
    
        $errorMessage = "";

        $check = "";

       if(isset($_POST["start"]))
       {
            $index = $_SESSION["index"];

            if(isset($_POST["disclaimer"]))
            {
                $check = "checked";
                $_SESSION["disclaimer"] = $_POST["disclaimer"];
                echo '<script>window.location.href = "CustomerInfo.php";</script>';
                exit();
            }
            else{
                $errorMessage = "You must check the box to agree to our the terms and conditions !";
            } 
       }

    include("./common/header.php"); 
?>

<style>


td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
.error {
    color: #FF0000;
    margin-right: auto;
    font-size: 14px;
}
.btn-primary{
    margin-left: -15px;
   
}



</style>
<div class="container">
<h1>Terms and Conditions </h1>
<br/>
 <form action="" method="POST">
    <div class="row">
            <table>
     
                <tr>
                     <td>
                         I agree to abide by the Bank's terms and rules in force
                         and the changes therefore in terms and conditions from 
                         to time relating to my accounts communicated and made 
                         available on the Bank's website.
                     </td>
                 </tr>
                 <tr>
                     <td>
                         I agree what the Bank before opening any account, will 
                         carry out a due  as required under below Your
                         customer guidelines of the bank. I would be required to
                         submit necessary documents or proofs such as identity, 
                         address, photograph, and such information. I agree to 
                         submit the above documents at period intervals as may 
                         be required by the Bank.
                     </td>
                 </tr>        
                <tr>
                     <td>
                         I agree that the bank can at its sole discretion, amend 
                         any of the services facilities given in my account 
                         either as wholly or  at any time by giving  me 
                         at least 30 days notice and provide an option to me to 
                         switch to other services facilities.
                     </td>
                 </tr>
         
            </table>
    

    </div>
     
             <div class="row">
                 
              <br/><span class="error"> <?php echo $errorMessage;?></span><br/>
             <div class="">   
          <input type="checkbox"  name="disclaimer" value="checked" <?php echo $check; ?>>
          <label for="agree">I have read and agree with the terms and conditions</label>
             </div>       
        </div>
    <div class="row">
        <div class="col-md-offset-1 col-md-2">
                  <button type="submit" name="start" value="Start >" class="btn-primary" >
                   Start >
                  </button>
            
        </div>
    </div>
                  <button  style="visibility :hidden;" value="<?php $index ?>" class="btn-primary" >
                   
                  </button>
</form>
</div>
<?php include('./common/footer.php'); ?>