<?php
include 'sql_conn.php';
//to upload profile pic
/*$currDir=getcwd();
$target_dir = "./uploads/";
echo($currDir.$target_dir);
$target_file =$currDir.'\\' . basename($_FILES["pic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["pic"]["tmp_name"]);
if($check !== false) {
    echo "File is an image - " . $target_file . ".";
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}
*/

$query='select USER_ID from costumers where email="'.$_POST["email"].'";';
    $res=$conn->query($query);
    if($res->num_rows > 0)
    {
        $cookie_name = "existing_email";
        $cookie_value = "Email already registerd..";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        header("Location: ./form.php");
    }
    else
    {
        $dob=$_POST["year"]."-".$_POST["month"]."-".$_POST["date"];
$query='insert into costumers(EMAIL,PASS,NAME,CITY,ADRESS,DOB,GENDER) values("'.$_POST["email"].'","'.$_POST["pass"].'","'.$_POST["name"].'","'.$_POST["city"].'","'.$_POST["adress"].'","'.$dob.'",\''.$_POST["gender"].'\');';
if($conn->query($query)!=TRUE)
{
    echo(mysqli_error($conn));

}
else
{
    $query='select USER_ID from costumers where email="'.$_POST["email"].'";';
    $res=$conn->query($query);
    if($res->num_rows > 0)
    {
    $row=$res->fetch_assoc();
    $cookie_name = "user_id";
    $cookie_value = $row["USER_ID"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }
    if(isset($_COOKIE["redirect"]))
    {
        header("Location:".$_COOKIE["redirect"]);
    }
    else
    header("Location: ./index1.php");
}

    }

$conn->close();
?>