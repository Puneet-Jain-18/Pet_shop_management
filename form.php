<?php 
include 'head.php';
$incorrect_email="";
$existing_email="";
if(isset($_COOKIE["incorrect"]))
{
    $incorrect_email=$_COOKIE["incorrect"];
    unset($_COOKIE["incorrect"]);
    setcookie("incorrect","", time() - 3600,'/');

}
if(isset($_COOKIE["existing_email"]))
{
    $existing_email=$_COOKIE["existing_email"];
    unset($_COOKIE["existing_email"]);
    setcookie("existing_email","", time() - 3600,'/');

}
?>
  
    <form id="login" action="login.php" method="POST">
        
        <u>Login existing account</u><br><br>
        <input type="email" placeholder="Enter Email" name="email" required id="email" >
        <input type="password" placeholder="password" name='pass' required id="pass">
        <button type="submit" value="Login">Login</button>
        <?php echo("<p id='warn' style='color:#40dce7fd'> ".$incorrect_email."</p>");?>

       <p id="warn"></p>
    </form>
    <form method="POST" id="new" action="signup.php" enctype="multipart/form-data">
      <p id="welcome"><u>Create new Account</u></p>
        <p id="welcome">Welcome to Pet lovers Family..</p>
        <input type="text" placeholder="Firstname" name='name' id="name" value="" required>&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
        <input type="number" placeholder="Date" name='date' value=""required min=1 max=31 id="date-input">&nbsp;&nbsp;&nbsp;
        <input type="number" placeholder="Month" name='month' value=""required min=1 max=12 id="date-input">&nbsp;&nbsp;&nbsp;
        <input type="number" placeholder="Year" name='year' value="" required min=1920 max=2020 id="date-input"><br><br>
        <input type="email" placeholder="new email" name="email" required id="email">&nbsp;&nbsp;&nbsp;<span id="warn"></span>
        <input type="password" placeholder="password" name="pass" required id="pass">
        <?php echo("<p id='warn'>".$existing_email.'</p>')?>
        <br>
        <input type="text" placeholder="city" name="city" required id="city"><br><br>

        <textarea placeholder="Enter Address" name="adress" required id="adress"></textarea><br><br>
        <div id="checkbox-text" > <input type="radio" value="M" name="gender" checked id="checkbox"><span>Male</span><br>
        <input type="radio" value="F" name="gender" id="checkbox">female<br><br>
        Add profile pic here:&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="file" name="pic" id="pic"></div><br>
        <button type="submit" value="create">New account</button>
    </form><br>
</body>