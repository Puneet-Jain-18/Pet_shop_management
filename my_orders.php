<?php
include 'sql_conn.php';
include 'head.php';
//parsing the url
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $query="update cart set final='y' where user_id=".$_COOKIE["user_id"]." and final='n';";
    if($conn->query($query)!=True)
    echo(mysqli_error($conn));
    else
    echo("<br><br><b>Order Placed Sucessfully Please coninue shopping.......... </b>");
}
$total_cost=0;
$query="select pet_id from cart where user_id= ".$_COOKIE["user_id"]." and final='y';";
$res1=$conn->query($query);
if($res1->num_rows > 0)
{
    echo('<br><b style="font-size:30px">Your Orders:</b><br><br>');
    while($row1=$res1->fetch_assoc())
    {

        $res=$conn->query('select * from pet,animals where pet.a_id=animals.aid and pet.p_id='.$row1["pet_id"]);
        $row=$res->fetch_assoc();
        echo('<table id= '.$row["P_ID"].'>
        <tr>
            <td id="img_container">
                <img src="pet_images/'.$row["PIC"].'" class="demopic">
            </td>
            <td >
                <table style="all:none;background-color:#EBE3E1;">
                    <tr>
                        <td>'.$row["BREED"].'</td>
                    </tr> 
                    <tr>
                        <td>Color:'.$row["color"].'</td>
                    </tr> 
                    <tr>
                        <td>Price:'.$row["PRICE"].'</td>
                    </tr>
                </table>
            </td>
            
        </tr>
        </table><br><br><hr>');
        $total_cost+=$row["PRICE"];
    }
    echo("<br>Amount Payable :".$total_cost);
}
else

echo("Nothing in your order list.....");

?>