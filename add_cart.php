<?php
include 'sql_conn.php';
include 'head.php';
//parsing the url
$url=$_SERVER["REQUEST_URI"];
$parts = parse_url($url);
if($parts['query']!=NULL)
{
parse_str($parts['query'], $url_query);
if(!isset($_COOKIE["user_id"]))
 {
    $cookie_name = "redirect";
    $cookie_value = $url;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    
    header("Location:./form.php");
 }
else
{
$query='insert into cart(user_id,pet_id) values('.$_COOKIE["user_id"].','.$url_query["id"].');';
$res=$conn->query($query);
}
}
$total_cost=0;
$query="select pet_id from cart where user_id= ".$_COOKIE["user_id"].";";
$res1=$conn->query($query);
if($res1->num_rows > 0)
{
    unset($_COOKIE["redirect"]);
    setcookie("redirect","", time() - 3600,'/');
    while($row1=$res1->fetch_assoc())
    {   
        $res=$conn->query('select * from pet,animals where pet.a_id=animals.aid and pet.p_id='.$row1["pet_id"]);
        $row=$res->fetch_assoc();
        $opacity="";
        if($row["AVALABILITY"]=='n')
            $opacity='diabled style="opacity:0.5;"';
        echo('<table id= '.$row["P_ID"].'>
        <tr '.$opacity.' >
            <td id="img_container">
                <img src="pet_images/'.$row["PIC"].'" class="demopic">
            </td>
            <td >
                <table style="background-color:#EBE3E1;">
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
        if(!($row["AVALABILITY"]=='n'))
        $total_cost+=$row["PRICE"];
    }
    echo('<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Cost :'.$total_cost);
}
else

echo("<td>cart Empty</td>");

?>
<form action="./my_orders.php" method="POST">
   <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;
<button type="submit" 
<?php
if($total_cost==0)
echo($opacity);
?>
>Pay now</button>
</form>