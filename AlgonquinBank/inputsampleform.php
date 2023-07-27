<html>
    <form action="" method="post">
        <h1>
            <center>
                Product Information
            </h1>
        </center>
        <br>
        <center>
            <table border=0>
                <tr>
                    <td>
                        Product
                    </td>
                    <td>
                        <input type=text name="t1" value="Product Name">
                    </td>
                </tr>
                <td>
                    Company
                </td>
                <td>
                    <input type=text name="t2" value="Company name">
                </td>
            </tr>
            <tr>
                <td>
                    Customer Address
                </td>
                <td>
                    <input type=text name="t3" value="Customer address">
                    <td>
                </tr>
            <tr>
                <td>
                    Phone number
                </td>
                <td>
                    <input type=text name="t4" value="Phone number">
                </td>
            </tr>
            <tr>
                <td>
                    Country
                </td>
                <td>
                    <input type=checkbox name="c1" value="India">
                    India
                </td>
                <td>
                    <input type=checkbox name="c2" value="USA">
                    USA
                </td>
                <td>
                    <input type=checkbox name="c3" value="Russia">
                    Russia
                </td>
            </tr>
            <tr>
                <td>
                    Selling
                </td>
                <td>
                    <input type=radio name="r1" value="Ship">
                    Ship
                </td>
                <td>
                    <input type=radio name="r1" value="Plane">
                    Plane
                </td>
            </tr>
            <tr>
                <td>
                    Selling Date
                </td>
                <td>
                    <select name="y">
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                    </select>
                    Year
                </td>
                <td>
                    <select name="m">
                        <option value="January">January </option>
                        <option value="February">February </option>
                        <option value="March"> March </option>
                        <option value="April"> April </option>
                        <option value="May"> May </option>
                        <option value="June"> June </option>
                        <option value="July"> July </option>
                        <option value="August"> August </option>
                        <option value="September">September </option>
                        <option value="October">October </option>
                        <option value="November">November </option>
                        <option value="December">December </option>
                    </select>
                    Month
                </td>
                <td>
                    <select name="d">
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                        <option value="4"> 4 </option>
                        <option value="5"> 5 </option>
                        <option value="6"> 6 </option>
                        <option value="7"> 7 </option>
                        <option value="8"> 8 </option>
                        <option value="9"> 9 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                        <option value="12"> 12 </option>
                        <option value="13"> 13 </option>
                        <option value="14"> 14 </option>
                        <option value="15"> 15 </option>
                        <option value="16"> 16 </option>
                        <option value="17"> 17 </option>
                        <option value="18"> 18 </option>
                        <option value="19"> 19 </option>
                        <option value="20"> 20 </option>
                        <option value="21"> 21 </option>
                        <option value="22"> 22 </option>
                        <option value="23"> 23 </option>
                        <option value="24"> 24 </option>
                        <option value="25"> 25 </option>
                        <option value="26"> 26 </option>
                        <option value="27"> 27 </option>
                        <option value="28"> 28 </option>
                        <option value="29"> 29 </option>
                        <option value="30"> 30 </option>
                        <option value="31"> 31 </option>
                    </select>
                    Day
                </td>
            </tr>
        </table>
    </center>
    <br>
    <br>
    <center>
        <input type=submit value="submit" name="s">
        <input type=submit value="reset" name="s1">
    </center>
</form>
<?php
if(isset($_POST['s']))
{
    $y=array(); //array creation
    $t=-1;
    $a=$_POST['t1']; //accessing value for first text box
    $b=$_POST['t2']; //accessing value for second text box
    $c=$_POST['t3']; //accessing value for third text box
    $d=$_POST['t4']; //accessing value for 4th text box
    $f=$_POST['y']; //accessing value from first Combobox
    $g=$_POST['m']; //accessing value from second Combobox
    $h=$_POST['d']; //accessing value from third Combobox
    $i1=$_POST['r1']; //accessing value for radio button
    $j=$f." ".$g." ".$h; //Selling date
    if(isset($_POST['c1']))
    {
        $y[++$t]=$_POST['c1'];
    }
    if(isset($_POST['c2']))
    {
        $y[++$t]=$_POST['c2'];
    }
    if(isset($_POST['c3']))
    {
        $y[++$t]=$_POST['c3'];
    }
    echo "<center><h1>Product Details</h1></center>";
    echo "<center><font size=4><b>Product:-</b></font>".$a."</center><br>";
    echo "<center><font size=4 ><b>Company:-</b></font>".$b."</center><br>";
    echo "<center><font size=4><b>Customer Address:-</b></font>".$c."</center><br>";
    echo "<center><font size=4><b>Phone Number:-</b></font>".$d."</center><br>";
    echo "<center><font size=4><b>Country:-</b></font></center>";
    for($i=0;$i<count($y);$i=$i+1)
    {
        echo "<center>".$y[$i]." <center>"; //specifying values for each array element
    }
    echo "<center><font size=4><b>Way of Selling:-</b></font>".$i1."</center><br>";
    echo "<center><font size=4><b>Date of Selling</b></font>".$j."</center><br>";
}
?>
</html>