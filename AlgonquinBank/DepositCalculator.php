<?php session_start(); ?>

<?php
    // retrieve PHP session!
   if (!isset($_SESSION["customerInfo"]))
    {
        echo '<script>window.location.href = "CustomerInfo.php";</script>';
        header("CustomerInfo.php");
        exit();
    }  
        
        // defined variables and are set  to empty values
        $principal = "";  $interest =""; $years = "";  
        $email = "";
       
        $methodErr="";
        
        
        // define variables and set to empty values
        $interestErr = "";
        $principalErr =""; $yearsErr = "";
       
        $anyErr= false;
       
        
        if (isset($_POST["calculate"])) 
        {
//     ------------- PRINCIPAL AMOUNT ------------------
            
            if(empty($_POST["principalamount"])){
                $principalErr = " The principal amount must be numeric and greater than 0";
                $principal = test_input($_POST["principalamount"]);
                 $anyErr= true;
            }
            else if ($_POST["principalamount"]<=0)
            {
               $principalErr = " The principal amount must be numeric and non-negative"; 
               $anyErr= true;
               $principal = test_input($_POST["principalamount"]);
            }
            else{
                $principal = test_input($_POST["principalamount"]);
            
            }
            
            
            
//            ------------- Interest Rate ------------------
            
            if(empty($_POST["interestrate"])){
                $interestErr = "Interest rate required";
                 $anyErr= true;
                  $interest = test_input($_POST["interestrate"]);
                 
            }
            else if ( $_POST["interestrate"]<=0 )
            {
                 $interestErr = "Interest can not be negative";
                 $anyErr= true;
                  $interest = test_input($_POST["interestrate"]);
            }else{
               $interest = test_input($_POST["interestrate"]); 
            }
            

            
//            -------------------------- YEARS TO DEPOSIT ------------
             $years = test_input($_POST["yearstodeposit"]);
            if($_POST["yearstodeposit"] <=0  ){
                $yearsErr = "Years required";
                
                 $anyErr= true;
                 
            }else{
                $years = test_input($_POST["yearstodeposit"]);
            }
            

        }
        
        
        if(isset($_POST["prev"]))
        {
            if (isset($_POST["yearstodeposit"]))
            {
                $_SESSION["yearstodeposit"] = $_POST["yearstodeposit"];
            }
            
            if (isset($_POST["principalamount"]))
            {
                $_SESSION["principalamount"] = $_POST["principalamount"];
            }
            
            if (isset($_POST["interestrate"]))
            {
                $_SESSION["interestrate"] = $_POST["interestrate"];
            }
                    echo '<script>window.location.href = "CustomerInfo.php";</script>';
                    exit();
            
        }
        
        if(isset($_POST["complete"]))
        {
            if(isset($_POST["yearstodeposit"]) && isset($_POST["principalamount"]) && isset($_POST["interestrate"]))
            {
                if(!$anyErr)
                {
                    echo '<script>window.location.href = "Complete.php";</script>';
                    exit();
                }
            }

        }
   
        

        function test_input($data) 
        {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }  


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

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}





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
   margin-left: -300px;
    font-size: 12px;
}

#errory{
    margin-left: 18px;
    display: inline;
}

#thirdnumber{
    margin-right: 500px;
    
}

#btn2{
    margin-right: 700px;
}
#btn1{
    margin-left: 100px;
}

#btn3{
    margin-right: 300px;
    margin-top: -33px; 
}
.c2ol-md-2{
    margin-left: -150px;
}

        </style>
    </head>
    <body>
        <?php include('./common/header.php'); ?>
        
   
  
        <div class="text-center">
    
    <br/>

<div class="container">
    

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h1 class="display-4">Deposit Calculator</h1>
<br>
 
   <div class="row">
    <div class="col-25">
      <label for="fname">Principal Amount</label>
    </div>
    <div class="col-75">
      <input type="text" id="firstnumber" name="principalamount" placeholder="Enter Amount..." value="<?php echo $principal ?>">
      

    </div>
            <div class="col-75">
     <span  id="errors" class="error"> <?php echo $principalErr;?></span>
        
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="lname">Interest Rate (%) </label>
    </div>
    <div class="col-75">
      <input type="text" id="secondnumber" name="interestrate" placeholder=" Enter Interest Rate..." value="<?php echo $interest ?>">

    </div>
    <div class="col-75">
    <span id="errors"  class="error"> <?php echo $interestErr;?></span>
    </div>
  </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">Years to deposit</label>
        </div>
        <div class="col-75">          
               <select name="yearstodeposit" id="thirdnumber" <?php echo $years;?> >
                   <option   id="selection" value="-1" <?php echo $years;?> ><?php if(isset($_POST["yearstodeposit"])){ echo $years;}else{ echo "Select ...";}?> </option>
              <option value="1"> 1</option> 
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
               <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11"> 11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
               <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
            </select>
            <br><br>

        </div>
                 <div class="col-75">
        <span  id="errory"  class="error"> <?php echo $yearsErr;?></span>
    </div>
     </div>
        
</div>
  
  
             <br>
          <div class="row">
         <div id="btns" class="offset-md-2 ">

            <div class="c2ol-md-2">
                <button class="btn btn-primary" id="btn01" name="prev" type="submit" value="<Previous">< Previous</button>
                
       
                <button class="btn btn-primary" id="btn02" name="calculate" type="submit">Calculate</button>
         
                <button class="btn btn-primary" id="btn03" name="complete" type="submit" value="Complete">Complete ></button>
               
            </div>
       
                
 
        </div>
   
        </div>

            
      </div>
  <br>

  </form>
    
    
    <div class="container">
        
        <div class="errorPage">
            
        </div>
      
       <br>
       
      <div class="resultPage">
          
          
          
          
          
          
          
        <!----------- - HIDE UNLESS THERE IS RESULT TO DISPLAY -- ----->
          
            <?php
             if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
                 if (isset($_POST["calculate"])) {
        if(!$anyErr){
         
         
        
         
         echo " <br> <p>The following is the result of the calculation</p> <br>";
         
              echo "<table>
            <tr>
              <th>Year</th>
              <th>Principal at Year Start</th>
              <th>Interest for the year</th>
            </tr>";
     $money = (float)$principal;
     $rate = ((float)$interest) / 100.0;
     
     for($i = 1; $i<= (int)$years; $i++)
     {
         $gained = $money * $rate;
         
         echo "  <tr>
                <td> $i</td>
                <td> \$".sprintf("%.2f", $money)." </td>
                <td> \$".sprintf("%.2f", $gained)." </td>
              </tr>";
         $money = $money + $gained;
         
         
     }
     
     echo "</table>";
     }
     

     
        }}
     ?>
  

         
   
      </div>
     </div>  
</div>
<?php include('./common/footer.php'); ?>
    </body>

