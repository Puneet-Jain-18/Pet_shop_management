<?php
include 'head.php';
include 'sql_conn.php';

$query='select * from pet,animals where pet.a_id=animals.aid ';
//setting up filters
if(isset($_COOKIE["animal"]))
{
    $query=$query.'and animals.type in("'.$_COOKIE["animal"].'")';
}

if(isset($_COOKIE["max_price"]))
{
    $query=$query.'and pet.price <='.$_COOKIE["max_price"].'';
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(intval($_POST["offset"])<0)
    $_POST["offset"]=0;
$query=$query.' limit '.$_POST["offset"].',10';
}
else
{
$query=$query." limit 10";
$_POST["offset"]=0;
}

//sql querying the database
$res=$conn->query($query);
if($res)
{
    if($res->num_rows > 0)
    {
        while($row=$res->fetch_assoc())
    {
    echo('<a href="./pet_profile.php?id='.$row["P_ID"].'" style="all:none;">
     <table id='.$row["P_ID"].' class="pet_list">
    <tr>
        <td id="img_container">
            <img src="pet_images/'.$row["PIC"].'" class="demopic">
        </td>
        <td >
            <table style="all:none;background-color:#EBE3E1; width:90%;">
                <tr>
                    <td>'.$row["BREED"].'</td>
                </tr> 
                <tr>
                    <td>Color:'.$row["color"].'</td>
                </tr> 
                <tr>
                    <td>Price:<b style="color:red;">'.$row["PRICE"].'</b></td>
                    <td><button type="button">Buy</button</td>
                </tr>
                <tr></tr>
            </table>
        </td>
        
    </tr>
    </table></a>');
    }
    }
    
else
{
    unset($_COOKIE["animal"]);
setcookie("animal","", time() - 3600,'/');

unset($_COOKIE["max_price"]);
setcookie("max_price","", time() - 3600,'/');
    echo("<br><br><td>End of Results</td>");

    }
}

else
{
    unset($_COOKIE["animal"]);
setcookie("animal","", time() - 3600,'/');

unset($_COOKIE["max_price"]);
setcookie("max_price","", time() - 3600,'/');

    echo("<br><br><td>End of Results</td>");
}
    ?>
    </div>
    <p>
    <form action="" method="POST" style="width:100%;">
        <input type="number" id="offset" name="offset" value=<?php echo (intval($_POST["offset"])-10)?> >
        <button type="submit">Prev</button>
    </form>
        <form action="" method="POST" style="width:100%;">
        <input type="number" id="offset" name="offset" value=<?php echo (intval($_POST["offset"])+10)?> >
    <button type="submit">Next</button>
    </form>
    </p>
</body>

