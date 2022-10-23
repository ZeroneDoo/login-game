<?php 
include "../koneksi.php";
$username = $_POST['username'];
$score = $_POST['score'];

$score_init = (int)$score;

$data = $koneksi->query("SELECT * FROM users WHERE username = '$username'");

$check = mysqli_fetch_assoc($data);

if(mysqli_num_rows($data) > 0){
    
    if($check['score'] < $score_init){
        $koneksi->query("UPDATE users SET score = '$score_init' where username = '$username'");
        echo "success";
    }else{
        echo "not update";
    }
    
}else{
    
    mysqli_query($koneksi, "UPDATE users SET score = '$score_init' where username = '$username'");
    echo "kosong";

}

?>