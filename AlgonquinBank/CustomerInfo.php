<?php
    session_start();
    if(!isset($_SESSION["disclaimer"]))
    {
        echo '<script>window.location.href = "Disclaimer.php";</script>';
        header("Disclaimer.php");
        exit();
    }
    // ---------------------- VAriables -----------------------
    
    $name = ""; $postal =""; $phoneNumber =""; $emailAddress = "";
    $nameErr =""; $emailErr =""; $postalErr = ""; $phoneNumberErr = "";
    $methodErr=""; 
    $morning = "";$afternoon = ""; $evening = "";
    $phoneEmail= ""; $phoneEmailError = "";
    
    $anyErr= false;
    
    
    
    $morningcheck = ""; $afternooncheck=""; $eveningcheck="";
    $phonecheck=""; $emailcheck="";
    
    // ----------- Contact METHOD ------------------
    
    if(isset($_POST["method"]))
    {
        if($_POST["method"] == "Morning")
        {
                $morningcheck = "checked";
                 $_SESSION["morning"] = "Morning";
        }
        elseif($_POST["method"] == "Afternoon")
        {
                $afternooncheck = "checked";
        }
        elseif($_POST["method"] == "Evening")
        {
                $eveningcheck = "checked";
        }
        else{
            $anyErr=true;
        }
        
    }
    //------------ METHOD SESSION -------------
    
     if(isset($_POST["contact"]))
    {
        if($_POST["method"] == "phone")
        {
                $phonecheck = "checked";
        }
        elseif($_POST["method"] == "email")
        {
                $emailcheck = "checked";
        }
        else{
            $anyErr=true;
        }
        
    }
    
    // ------------------- Clicked NEXT --------------------
    
    if (isset($_POST["next"]))
    {
        $name = test_input($_POST["name"]);
        $postal = test_input($_POST["postalcode"]);
        $phoneNumber = test_input($_POST["phonenumber"]);
        $emailAddress = test_input($_POST["emailaddress"]);
        
        // ------------- Name ------------------------
        
        if( empty($name) )
        {
                $nameErr = "Name can not be blank";
                $anyErr= true;
        }
        elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
         {
              $nameErr = "Only letters and white space allowed";
              $anyErr= true;
        }
        else
        {
            $_SESSION["name"] = $name;
            $anyErr= false;    
        }
        
        //----------- Postal code ----------------------------------------
        
        if(!empty($postal))
        {
            $expression = '/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/';
            $postalLower = strtolower(test_input(test_input($postal)));


            
            
            if(preg_match($expression, $postalLower))
            { 
                $anyErr= false;

            }
            else
            {
                $postalErr = "Postal Code can not be in that format";
                $anyErr= true;
               
            }
            
        }
        elseif(empty($postal))
        {
                 $postalErr = "Postal Code can not be blank";
                 $anyErr= true;
        }
        else
        {
            $_SESSION["postalcode"] = $postal;
            $anyErr= false;
        }
        
        //-------------- PHONE NUMBER ---------------------------
            
// ...

// -------------- PHONE NUMBER ---------------------------

if (!empty($phoneNumber)) {
    // Use a regular expression to validate the phone number
    if (preg_match("/^(613-)?\d{3}-?\d{4}$/", $phoneNumber) || preg_match("/^\d{10}$/", $phoneNumber)) {
        $_SESSION["phonenumber"] = $phoneNumber;
        $anyErr = false;
        // $phone is valid
    } else {
        $anyErr = true;
        $phoneNumberErr = "Invalid Phone number format. Use format XXX-XXX-XXXX or XXXXXXXXXX";
    }
} elseif (empty($phoneNumber)) {
    $phoneNumberErr = "Phone Number can not be blank";
    $anyErr = true;
} else {
    // If no condition is met, $phoneNumber is an empty string
    // You might want to add additional handling here if needed.
}

// ...

                
// ------------------------- EMAIL ADDRESS ------------------
                
            if(!empty($_POST["emailaddress"]))
            {
                if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                    $anyErr= true;
                }
                else
                {
                    $emailErr = "";
                    $emailAdress = $_POST["emailaddress"];
                    $_SESSION["emailaddress"] = $emailAdress;
                    $anyErr= false;
                }    
            }
            elseif(empty($_POST["emailaddress"])) 
            {
                 $emailErr = "Email Address required";
                 $anyErr= true;
            } else{
                 $emailErr = "";
            }
           
//            ----------------- CONTACT METHODE -------------------
            
            if(isset($_POST["contact"]))
            {
                    $phoneEmail= $_POST ['contact'];
                    $anyErr= false;
                    $_SESSION["contact"] = $phoneEmail;
                     
            } 
            else 
            {
                    $phoneEmailError= "No prefered contact method selected";
                    $anyErr= true;
            }

//            ------------------- CONTACT TIME----------------------
   
            if($phoneEmail == "phone")
            {
                $phonecheck = "checked";
                if(empty($_POST["method"]))
                {
                    $methodErr = "<br/>When prefered contact method is phone, you have to select one or more contact times";
                    $anyErr= true;
               }
               else
               {
                    $method = test_input($_POST["method"]);
                    $_SESSION["method"] = $method;
                    $anyErr= false;
                }
                
            }
            
            if($phoneEmail == "email")
            {
                $emailcheck = "checked";
                if(empty($_POST["name"])&& empty($_POST["phonenumber"]) && empty($_POST["emailaddress"]))
                {  
                    $anyErr= true;
               }
               else
               {
                    $anyErr= false;
                }
                
            }
            
             if(isset($_POST["method"]))
            {
                
                if(empty($_POST["name"])&& empty($_POST["phonenumber"]) && empty($_POST["emailaddress"]))
                {  
                    $anyErr= true;
               }
               else
               {
                    $anyErr= false;
                }
                
            }
            
            if(!$anyErr)
            {
                $_SESSION["customerInfo"] = $name;
                 $_SESSION["phonenumber"]= $phoneNumber;
                echo '<script>window.location.href = "DepositCalculator.php";</script>';
                exit();
            }
            
            
    }
    else 
    {
       //-------------------------------- returned --------------------
        
        if(isset($_SESSION["name"]))
        {
           $name = $_SESSION["name"];
        }
        
        if(isset($_SESSION["postalcode"]))
        {
           $postal = $_SESSION["postalcode"];
        }
        
        if(isset($_SESSION["phonenumber"]))
        {
           $phoneNumber = $_SESSION["phonenumber"];
        }
        
        if(isset($_SESSION["emailaddress"]))
        {
           $emailaddress = $_SESSION["emailaddress"];
        }
        
        if(isset($_SESSION["contact"]))
        {
           $phoneEmail = $_SESSION["contact"];
        }
        
        if(isset($_SESSION["method"]))
        {
           $method = $_SESSION["method"];
        }
    }
    
        function test_input($data) 
        {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        } 

    include("./common/header.php"); 
?>

        <style>
            
               *{
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
            box-sizing: border-box;
        }


            html {
  font-size: 14px;
}

/*--------------------Table for the result---------------------*/

@media (min-width: 768px) {
  html {
    font-size: 16px;
  }

}

html {
  position: relative;
  min-height: 100%;
}

body {
  margin-bottom: 60px;
}

input{
    position:relative;
/*    background-color: gainsboro;*/
    
}

input:hover{
    
    background-color: gainsboro;
    
}

* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 250px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    margin-right: 1000px;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
   
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

    input[type=submit]:hover {
      
    }

.container {
    border-radius: 5px;
    
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
        .row{
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
    }
    
   .display-4{
        text-align: center;    
    }
  
}

@media screen and (max-width: 300px) {
    .row{
        display: flex;
        flex-direction: column;
    }
    
    .display-4{
        text-align: center;
        margin-left: 600px;
    }
    
    
}

#lname{
    margin-right:1000px;
    margin-top: 10px;
}

label{
    margin-left: 18px;
}

#lblresult{
    margin-right: 450px;
    font-weight: bold;
}

.result{
    font-weight: bold;
}


.form2{
    visibility: hidden;
}

.lblresult {
    visibility: hidden;

}

.btn{
    
 background-color: #4CAF50; /* Green */
  border: none;
  border-radius: 8px;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer; 
}

#btns{
   display: inline;
   margin-left: -18px;
   background-color: red;
}
.btn:hover{
   background-color: #008000; 
}
.display-4{
    
   text-align: center;
   margin-right: 190px;
   
}

.error {
    color: #FF0000;
    margin-right: auto;
    font-size: 12px;
}

#error{
    margin-left: 4px;
   
    display: inline;
}
#btnc {
  
  border: none;
  color: white;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left:-18px;
  cursor: pointer;
}

        </style>

<div class="container">
<h1>Customer Information</h1>
<br/>

 <form action="" method="POST">
        <div class="row">
        <div class="col-25">
          <label for="fname">Name</label>
        </div>
        <div class="col-75">
          <input type="text" name="name"
          placeholder="Enter Name ..."value="<?php echo $name ?>">
        </div>
        <div class="col-75">
           <span id="error"  class="error"> <?php echo $nameErr;?></span>
        </div>
         </div>

        <div class="row">
          <div class="col-25">
            <label for="lname">Postal Code</label>
          </div>
          <div class="col-75">
            <input type="text"  name="postalcode"
            placeholder="Enter Postal code..." value="<?php echo $postal ?>">
          </div>
          <div class="col-75">
            <span id="error"  class="error"> <?php echo $postalErr;?></span>
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="lname">Phone Number</label>
          </div>
          <div class="col-75">
            <input type="text" name="phonenumber"
            placeholder=" Enter Phone Number ..." value="<?php echo $phoneNumber ?>">
          </div>
          <div class="col-75">
            <span id="error" class="error"> <?php echo $phoneNumberErr;?></span>
          </div> 
        </div>
  
        <div class="row">
            <div class="col-25">
              <label for="lname">Email Address</label>
            </div>
            <div class="col-75">
               <input type="text" name="emailaddress" 
                placeholder="example@outlook.com" value="<?php echo $emailAddress ?>">
            </div>
                <div class="col-75">
                <span id="error" class="error"> <?php echo $emailErr;?></span>
            </div>
        </div> 
  
        <div class="row">
            <div class="col-25">
                <label for="lname">Preferred contact Method:</label>
            </div>
            <div class="col-75">
                <input type="radio" id="thirdnumber" name="contact" value ="phone"  <?php echo $phonecheck; ?>>
                <label for="phone">Phone</label>

                <input type="radio" id="thirdnumber" name="contact" value="email"  <?php echo $emailcheck; ?>>
                <label for="email">Email</label>
                <span  class="error"> <?php echo $phoneEmailError;?></span>
            </div>
        </div>
  
        <div class="row">
                <p>if phone is selected, when can we contact you?</p>
             <div class="">
                <input type="checkbox" id="thirdnumber" name="method" value ="Morning" <?php echo $morningcheck; ?>>
                 <label for="morning">Morning</label>

                <input type="checkbox" id="thirdnumber" name="method" value="Afternoon"  <?php echo $afternooncheck; ?>>
                <label for="afternoon">Afternoon</label>

                <input type="checkbox" id="thirdnumber" name="method" value="Evening"  <?php echo $eveningcheck; ?>>
                <label for="evening">Evening</label>
                <span class="error"> <?php echo $methodErr;?></span>
             </div>   
        </div>
  
         <br>
          
            
        <input style="visibility:hidden;" type="submit" name="next" value="Next >" class="btn-primary" /> 
        <button id="btnc" type="submit" name="next" value="Next >" class="btn-primary" > Next ></button>
            
               
         

</form>

</div>
<?php include('./common/footer.php'); ?>

