<?php 
include "../koneksi.php";

$username = $_POST['username'];

$pass = $_POST['pass'];

$query = $koneksi->query("SELECT * FROM users WHERE username = '$username' or pass = '$pass' and status = 'up'");

$data_user = mysqli_fetch_assoc($query);

$check = mysqli_num_rows($query);

if($check > 0 && $check < 2){

    if($data_user['username'] == $username && $data_user['pass'] == $pass){

        echo "success";
        $_SESSION['username']= $username;
        $_SESSION['id'] = $data_user['id'];

    }else if($data_user['username'] != $username && $data_user['pass'] != $pass){

        echo "wrong username and pass";

    }else if($data_user['username'] != $username && $data_user['pass'] == $pass){
        
        echo "wrong username";
        
    }else if($data_user['username'] == $username && $data_user['pass'] != $pass){

        echo "wrong pass";

    }

}else{
    
    echo "wrong username and pass";

}
?>