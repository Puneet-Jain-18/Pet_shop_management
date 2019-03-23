

<?php
include 'head.php';
include 'sql_conn.php';
//parsing the url
$url=$_SERVER["REQUEST_URI"];
$parts = parse_url($url);
parse_str($parts['query'], $query);

//removing filters as data found
unset($_COOKIE["animal"]);
setcookie("animal","", time() - 3600,'/');

unset($_COOKIE["max_price"]);
setcookie("max_price","", time() - 3600,'/');


$query='select * from pet,animals where pet.a_id=animals.aid and pet.p_id='.$query["id"].';';
$res=$conn->query($query);
if($res->num_rows > 0)
{
    $row=$res->fetch_assoc();
    echo('
    <br><br><br>
    <img src="pet_images/'.$row["PIC"].'" id="petpic">
    <table id="details" align="center">
    <tr>
        <td class="details">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <table align="center">
            
                <tr style="background-color:white;">
                    <td>Type</td>
                    <td>'.$row["TYPE"].'</td>
                </tr>
                <tr style="background-color:white;">
                    <td>Breed</td>
                    <td>'.$row["BREED"].'</td>
                </tr> 
                <tr style="background-color:white;">
                    <td>Color</td>
                    <td>'.$row["color"].'</td>
                </tr> 
                <tr style="background-color:white;">
                    <td>Price</td>
                    <td>'.$row["PRICE"].'</td>
                </tr> 
                <tr style="background-color:white;">
                    <td>Weight</td>
                    <td>'.$row["WEIGHT"].'</td>
                </tr>
                 
                <tr style="background-color:white;">
                    <td>Avalability</td>
                    <td>'.$row["AVALABILITY"].'</td>
                </tr>
            </table>
        </td>
        
    </tr>
    </table>');
    $button="";
    if($row["AVALABILITY"]=='n')
    {
        $button='disabled style="opacity: 0.5;"';

    }
}
else
echo(" No data found");
$conn->close();


?>
<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./add_cart.php?id=<?php echo($row["P_ID"]);?>
"><button type="submit" <?php echo(" ".$button);?>>Add To cart</button>