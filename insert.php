<?php
$name = $_POST['name']
$course = $_POST['course']
$gender = $_POST['gender']
$phone = $_POST['phone']
$address = $_POST['address']
$email = $_POST['email']
$password = $_POST['password']

if(!empty($name)||!empty($course)||!empty($gender)||!empty($address)||!empty($email)||!empty($password))
{ 
$host= "localhost";
$dbUsername= "root";
$dbPassword="";
$dbname= "mp"

//create a connection
$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);

if(mysqli_connect_error()){
die('Connect Error('.mysqlierrno().')'.mysqli_connect());
}else{
$SELECT= "SELECT email From data Where email= ? Limit= 1";
$INSERT= "INSERT Into data(name,course,gender,phone,address,email,password)values(?,?,?,?,?,?,?)"

//prepare statement

$stmt=$conn->prepare($SELECT);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
rnum=$stmt->num_rows;

if($rnum=0){
$stmt->close();
$stmt=conn->prepare($INSERT);
$stmt->bind_param("ssssssi",$name,$course,$gender,$phone,$address,$email,$password);
$stmt->execute();
echo "New recored inserted succesfully";
}else{
echo "Someone already registered with this email";
}
$stmt->close();
$conn->close();
}
}else{
echo "All Fields are required";
die();
}
?>