<?php
$host="localhost";
$user="root";
$pass="";
$conn=new mysqli($host,$user,$pass);
if($conn->connect_error)
{
    die ("Unsucessful");
}
echo "Connection made";
$query="create trigger avalability2
	after update on cart
	for each row 	
	begin
	if new.final='y' then
	update pet set avalability='n'
	where p_id=new.pet_id;
	
	update animals set 
	quantity =quantity-1 where
	aid=(select aid from pet where p_id=new.pet_id);
  end if;
end;
";

if($conn->query($query)==TRUE)
{
    echo ("Trigger 1 Executed Sucessfully");
}
else
{
    echo("Error in the Trigger1");
}
