<?php
include 'sql_conn.php';

$query='select * from costumers where email="'.$_POST["email"].'";';
$res=$conn->query($query);
if($res->num_rows > 0)
{
    $row=$res->fetch_assoc();
    if($row["PASS"]==$_POST["pass"])
    {
       $cookie_name = "user_id";
        $cookie_value = $row["USER_ID"];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

        if(isset($_COOKIE["redirect"]))
        header("Location:".$_COOKIE["redirect"]);
        else
        {
            $_SERVER["REQUEST_METHOD"]="GET";
            header("Location: ./index1.php");
        }

    }

    else
    {
        $cookie_name = "incorrect";
       $cookie_value = "Incorrect Username Or Password";
       setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    header("Location: ./form.php");
    }
}
else
{
    
    $cookie_name = "incorrect";
    $cookie_value = "Incorrect Username Or Password";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
 header("Location: ./form.php");
}
$conn->close();
?>