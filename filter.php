
<?php
include 'sql_conn.php';
include 'head.php';
?>


<form action="" method="POST">
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type ="radio" name="type" value="dog" style="width:5%;"><span class="rr"  >Dog</span><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type ="radio" name="type" value="rabbit" style="width:5%;"><span class="rr" >Rabbit</span><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type ="radio" name="type" value="cat" style="width:5%;"><span class="rr" >Cat</span><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="number"  name="price" id="price" placeholder="Max Price">
<button type="submit">Apply Filters</button>
</form>
<br><br><br><b>
<p> <video width=25% height="240" autoplay loop muted>
  <source src="./vid.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>
<video width=25% height="240" autoplay loop muted>
  <source src="./vid.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>
<video width=25% height="240" autoplay loop muted>
  <source src="./vid.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>

<video width=25% height="240" autoplay loop muted>
  <source src="./vid.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>
</p>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $cookie_name = "animal";
    $cookie_value = $_POST["type"];
    
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    
    $cookie_name = "max_price";
    $cookie_value = $_POST["price"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    header("Location: ./index1.php");
}
