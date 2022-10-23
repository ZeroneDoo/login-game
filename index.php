<?php
 include "koneksi.php"; 

if(isset($_SESSION['username'])){
    header("Location: game/loby.php");
}
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
    <link rel="stylesheet" href="assets/src/css/style.css">

    <title>Document</title>
</head>
<body class="pb-5 box-border">

    
    <!-- card -->
    <div id="login" class="flex justify-between">
        <div id="left" class="w-2/4 h-screen ">
            <div id="card" class=" w-fit h-fit p-5 m-auto mt-10 bg-white rounded-lg">

                <!-- login -->
                <div id="login_card" class="w-fit h-fit">

                    <p class="font-bold text-3xl text-center select-none">Log <span class="text-purple-500 font-bold">In</span></p>

                    <p class="mt-16">Username</p>
                    <input type="text" size="50%" autofocus placeholder="Username" id="username" class="mt-3 border border-gray-300 outline-purple-400 rounded-md p-2">

                    <p id="wrong_name" class="mt-2">* Username tidak boleh kosong</p>  

                    <p class="mt-6">Password</p>
                    <input type="password" size="50%" placeholder="Password" id="pass" class="mt-3 border border-gray-300 outline-purple-400 rounded-md p-2">

                    <p id="wrong_pass" class="mt-2">* Password tidak boleh kosong</p>

                    <p><button id="btn_log" class="bg-gray-400 w-full rounded-md p-3 font-bold text-white hover:bg-purple-600 hover:shadow-md transition-all duration-200 hover:shadow-purple-400 mt-9" onclick="login()">LOG IN</button></p>

                    <hr class="mt-8">

                    <p>Don't have account ? <span class="text-purple-500 font-bold cursor-pointer underline" id="sign_in" onclick="daftar()">Register </span></p>

                </div>

                <!-- signin -->
                <div id="sigin_card" class="w-fit h-fit">

                    <p class="font-bold text-3xl text-center">Register</p>

                    <p class="mt-10">Full Name</p>
                    <input type="text" size="50%" placeholder="Full Name" id="sigin_fullname" class="mt-3 border border-gray-300 outline-purple-400 rounded-md p-2">
                    
                    <p id="value_fullname" class="mt-2">* Nama lengkap tidak boleh kosong !</p>

                    <p class="mt-4">Username</p>
                    <input type="text" size="50%" placeholder="Username" id="sigin_username" class="mt-3 border border-gray-300 outline-purple-400 rounded-md p-2">

                    <p id="value_name" class="mt-2">* Username tidak boleh kosong !</p>
                    
                    <p class="mt-4">Password</p>
                    <input type="password" size="50%" placeholder="Password" id="sigin_pass" class="mt-3 border border-gray-300 outline-purple-400 rounded-md p-2">

                    <p id="value_pass" class="mt-2">* Password tidak boleh kosong !</p>

                    <p><button id="btn_sigin" class="bg-gray-400 w-full rounded-md p-3 font-bold text-white hover:bg-purple-600 hover:shadow-md transition-all duration-200 hover:shadow-purple-400 mt-7" onclick="sigin()">REGISTER</button></p>

                    <hr class="mt-8">

                    <p>Alredy have an account ? <span class="text-purple-500 font-bold cursor-pointer underline" id="login" onclick="log()">Log In</span></p>
                </div>

            </div>
        </div>

        <div id="right" class="w-fit h-80 m-auto mt-9 pt-96"><img src="assets/img/fn-nav-logo-3e6bd67b98b0.svg" alt="" class="h-36 mt-6"></div>
    </div>

    <footer class="flex justify-center font-bold">
        <p class="text-white text-base px-10 -z-10">Develop by <span class="text-purple-400 font-bold">Zerone</span></p>
    </footer>
</body>

<!-- Main js -->
<script src="assets/src/js/main.js"></script>
<!-- Jquery -->
<script src="assets/src/js/jquery.js"></script>
<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>