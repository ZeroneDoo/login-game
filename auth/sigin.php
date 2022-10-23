<?php 
include "../koneksi.php";

$id = rand(10000, 100000);
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$date = date("Y-m-d");

$data = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
$check = mysqli_num_rows($data);

if($check > 0){
    
    echo "alredy"; 
    
}else{

    $query = mysqli_query($koneksi, "INSERT INTO users VALUES ('$id', '$fullname', '$username', '$pass', '$date', '0' ,'up')");
    
    if($query){
        echo "success";
    }
}

?>