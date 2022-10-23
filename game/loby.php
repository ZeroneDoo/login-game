<?php 
include "../koneksi.php";

if(!isset($_SESSION['username'])){
    header("Location : ../index.php");
}

$username = $_SESSION['username'];

$query = mysqli_query($koneksi, "SELECT * FROM users where username = '$username'");

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <!-- link css -->
    <link rel="stylesheet" href="../assets/src/css/loby.css">

    <title>Document</title>
</head>
<body id="body" class="box-border" style="font-family: 'Quicksand', sans-serif; background-image: url('../assets/img/bg-fornite-1.jpg'); background-position: center; background-repeat: repeat-y; height: 100vh; background-size: cover;">

    <div id="wrapper">
        <div id="logo" class="flex w-fit m-auto mt-14">
            <img src="../assets/img/eg-shield-logo-white-f8185c103d8d.svg" class="h-24 mt-8 m-auto">
            <img src="../assets/img/logo.webp" class="h-36 mt-2 m-auto">
        </div>

        <div id="card" class="w-1/2 h-fit bg-white rounded-lg m-auto p-9">
            <table cellpadding ="10">
                <tr class="text-2xl font-medium">
                    <td >Player</td>
                    <td>:</td>
                    <td><?= $_SESSION['username']?><span class="text-purple-500 cursor-pointer">#<?= $_SESSION['id']?></span></td>
                </tr>
                <tr class="text-2xl font-medium">
                    <td>Choose Color</td>
                    <td>:</td>
                    <td><input type="color" id="color" class="bg-white border-none"></td>
                </tr>
                <tr class="text-2xl font-medium text-purple-500">
                    <td>Best Score</td>
                    <td>:</td>
                    <td><?=$data['score']?></td>
                </tr>
            </table>

            
            <div id="btn" class="flex justify-between mt-6">
            <button onclick="logout()" class="p-3 px-5 rounded-md text-white bg-gray-500 hover:bg-purple-600 transition-all duration-200 hover:shadow-md hover:shadow-purple-400">Log Out</button>

            <button id="btn_start" class="p-3 px-8 rounded-md text-white bg-gray-500 hover:bg-purple-600 transition-all duration-200 hover:shadow-md hover:shadow-purple-400" onclick="startGame('<?= $_SESSION['username']?>', '<?=$data['score']?>')">Start</button>
            </div>
        </div>
    </div>

    <div id="arena" class="bg-white shadow-md p-3 box-border w-fit m-auto rounded-lg  bg-opacity-80 mt-5">

        <p id="akun">Player : <?=$_SESSION['username']?>#<?=$_SESSION['id']?></p> 
        
        <div id="pilih_menu" class="flex justify-between pt-6">
            <button id="btn_again" class="bg-gray-400 w-2/6 rounded-md p-3 font-bold text-white hover:bg-purple-600 hover:shadow-md transition-all duration-200 hover:shadow-purple-400" onclick="tryAgain('<?= $_SESSION['username']?>', <?=$data['score']?>)">Try Again</button>
            
            <!-- menampilakan score  -->
            <!-- <div id="score">
                <p id="score_now"></p>
                <p id="best_score">Best score : </p>
            </div> -->

            <button id="btn_reset" class="bg-gray-400 w-2/6 rounded-md p-3 font-bold text-white hover:bg-purple-600 hover:shadow-md transition-all duration-200 hover:shadow-purple-400" onclick="exit()">Exit</button>
        </div>

    </div>

    <footer id="footer" class="p-6 mt-64 bg-black">

        <img src="../assets/img/logo.webp" class="h-16 ">
        
        <p class="text-white text-sm px-10 mt-1 font-normal">© 2022, Epic Games, Inc. Epic, Epic Games, the Epic Games logo, Fortnite, the Fortnite logo, Unreal, Unreal Engine 4 and UE4 are trademarks or registered trademarks of Epic Games, Inc. in the United States of America and elsewhere. All rights reserved.</p>
        
        <!-- <hr class="my-6"> -->
        
        <div id="bottom" class="flex justify-between mt-12">
            <p class="text-white text-normal px-10 text-center">Development by <span class="text-purple-400">Zerone</span></p>
            
            <div class="flex">
                
                <img src="../assets/img/ue-logo-white-e34b6ba9383f.svg" class="mr-5 h-10">
                <img src="../assets/img/eg-shield-logo-white-f8185c103d8d.svg" class="mr-3 h-10">

            </div>
        </div>
    </footer>

</body>

<!-- Game js -->
<script src="../assets/src/js/game.js"></script>
<!-- Jquery -->
<script src="../assets/src/js/jquery.js"></script>
<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>