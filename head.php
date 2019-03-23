<?php

$logout="login";
$cart="";
$logout_link="./form.php";
$view_orders="";
$order_link="";
if(isset($_COOKIE["user_id"]))
{
    $logout="logout";
    $cart="Visit cart";
    $logout_link="./logout.php";
    $view_orders="My Orders";
    $order_link="./my_orders.php";
}
?>



<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>PROFILE PAGE</title>
        <link href="./mystyle.css" rel="stylesheet" type="text/css">
        <style type="text/css">
        
		li{
			text-transform: uppercase;
			font-family: cursive;
		}
		#head{
			border:2px solid gray;
			background-color:#EBE3E1; 
			font-family: georgia;
			font-size: 45px;
			color: #F26871;
		}
		
		body{
            background-repeat: no-repeat;
    background-size: 100% 100%;
			}
		ul{
			text-transform: uppercase;
			/*font-family: cursive;*/
		}
        </style>

    </head>
    <body background="./back.jpg">
    <h1 id="head"><img src="https://previews.123rf.com/images/brgfx/brgfx1712/brgfx171200066/91246386-plantilla-de-signo-de-tienda-de-mascotas-con-muchas-mascotas-ilustraci%C3%B3n.jpg" id="head-image" align="middle">Pet Lovers Corp. Pvt. Ltd.</h1>
   
            <div><ul>
                    <li><a href="./index1.php">Home</a></li>
                    <li><a href="./filter.php">Apply Filters</a></li>
                    <li><a href="./contact_us.php">Contact Us/Reviews</a></li>
                    <li><a href="<?php echo($logout_link);?>"><?php echo($logout);?></a></li>
                    <li><a href="./add_cart.php"><?php echo($cart);?></a></li>
                    <li><a href="<?php echo($order_link);?>"><?php echo($view_orders);?></a></li>
                  </ul>
            </div>
            