<?php
ob_start();
if(isset($_POST['submit'])){
    
   // echo json_encode($_POST,JSON_PRETTY_PRINT);
 //   die();
//$servername = "phpmyadmin.cil7wtskg5jd.us-east-1.rds.amazonaws.com:3306";
$servername = "phpmyadmin.cil7wtskg5jd.us-east-1.rds.amazonaws.com";
$username = "phpMyAdmin";
$password = "phpmyadmin";
$dbname = "deliveryorder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "database connection failed";
    header("location:index.php?success=false");

die("Connection failed: " . $conn->connect_error);
}

/*$ref = $_SERVER['HTTP_REFERER'];
if (strpos($ref, 'http://ecs-c-loadb-8bsjvz7ml7i3-1498978733.us-east-1.elb.amazonaws.com/index.php') !== FALSE) {
   redirect to wherever ecs-c-loadb-8bsjvz7ml7i3-1498978733.us-east-1.elb.amazonaws.com/index.php people should go
}*/
    
//echo "Connected Successfully";

/*$sql = "INSERT INTO order (full_name, address1, city)
VALUES (?,?,?,?,?,?,?)";
    
$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param("sss", $_POST['stu_name'], $_POST['address1'], $_POST['city'],$_POST['state'],$_POST['zip'],$_POST['country'],$_POST['phonenum']);

$stmt->execute();

if ($conn->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();*/
    

    $name = $_POST['stu_name'];
    $address = $_POST['address1'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];
    $phonenum = $_POST['phonenum'];
    $participate = isset($_POST['participate'])?'true':'false';
    $item = isset($_POST['item'])?'true':'false';
    $itemlist = $_POST['itemlist'];


    $uid=uniqid(rand()).uniqid();
    

    $sql = "INSERT INTO registration (cust_id, date, name,address,city,state,zip,country,phonenum,participate,item,itemlist)
    VALUES ('$uid', CURDATE(),'$name', '$address', '$city','$state', '$zip', '$country', '$phonenum','$participate','$item','$itemlist')";

     //   echo $sql;

    if ($conn->query($sql) === TRUE) {
    echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
    } else {
    echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
           // die($conn->error);

    }
    
    header("Location:index.html?signup=success");   
    
    $conn->close();
}
else
{
    header("location:index.php?success=false");
}
echo ob_get_clean();

 header("location:index.php?success=true");
//echo "finished script";
?>
