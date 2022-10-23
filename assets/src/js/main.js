    // login
    function login() {
        var username = document.getElementById("username");
        var pass = document.getElementById("pass");
        var wrong_name = document.getElementById("wrong_name");
        var wrong_pass = document.getElementById("wrong_pass");

        if (username.value == "" && pass.value == "") {

            wrong_name.style.display = "block";
            wrong_pass.style.display = "block";

        } else if (username.value == "") {

            wrong_name.style.display = "block";

        } else if (pass.value == "") {

            wrong_pass.style.display = "block";

        } else {

            $.ajax({
                method: "POST",
                data: "username=" + username.value + "&pass=" + pass.value,
                url: "auth/login.php",
                success: function (ress) {

                    console.log(ress);

                    if (ress == "success") {

                        Swal.fire({
                            title: "Log In Success",
                            text: "Welcome Back, " + username.value,
                            icon: "success",
                            timer: 5000,
                            showConfirmButton: false
                        })

                        setTimeout(function () {
                            location.href = "game/loby.php"
                        }, 5000);


                    } else if (ress == "wrong username and pass") {

                        pass.value = "";
                        wrong_name.style.display = "block";
                        wrong_pass.style.display = "block";

                        wrong_name.textContent = "* Username anda salah !";
                        wrong_pass.textContent = "* Password anda salah !";

                    } else if (ress == "wrong username") {

                        wrong_name.textContent = "* Username anda salah !";
                        wrong_name.style.display = "block";

                        wrong_pass.style.display = "none";

                    } else if (ress == "wrong pass") {

                        pass.value = "";
                        wrong_pass.textContent = "* Password anda salah !";
                        wrong_pass.style.display = "block";

                        wrong_name.style.display = "none";

                    }
                }
            })
        }

        // checking username
        username.addEventListener("keyup", function () {

            if (username.value) {
                wrong_name.style.display = "none";
            }
        })

        pass.addEventListener("keyup", function () {

            if (pass.value) {
                wrong_pass.style.display = "none";
            }
        })

    }

    // move to sigin page
    var login_page = document.getElementById("login_card");
    var sigin_page = document.getElementById("sigin_card");

    function daftar() {
        login_page.style.display = "none";
        sigin_page.style.display = "block";
    }

    // move to login page
    function log() {
        login_page.style.display = "block";
        sigin_page.style.display = "none";
    }

    // sigin 
    function sigin() {

        var sigin_fullname = document.getElementById("sigin_fullname");
        var sigin_username = document.getElementById("sigin_username");
        var sigin_pass = document.getElementById("sigin_pass");

        var value_fullname = document.getElementById("value_fullname");
        var value_name = document.getElementById("value_name");
        var value_pass = document.getElementById("value_pass");


        if (sigin_username.value == "" && sigin_fullname.value == "" && sigin_pass.value == "") {

            value_fullname.style.display = "block";
            value_name.style.display = "block";
            value_pass.style.display = "block";

        } else if (sigin_fullname.value == "") {

            value_fullname.style.display = "block";

        } else if (sigin_username.value == "") {

            value_name.style.display = "block";

        } else if (sigin_pass.value == "") {

            value_pass.style.display = "block";

        } else {

            $.ajax({
                method: "POST",
                data: "fullname=" + sigin_fullname.value + "&username=" + sigin_username.value + "&pass=" + sigin_pass.value,
                url: "auth/sigin.php",
                success: function (ress) {
                    console.log(ress);

                    if (ress == "success") {
                        Swal.fire({
                            title: "Sig In Success",
                            text: "Selamat, akun anda berhasil dibuat",
                            icon: "success",
                            timer: 5000,
                            showConfirmButton: false
                        })

                        setTimeout(function () {
                            location.reload();
                        }, 5000);

                    } else if (ress == "alredy") {

                        value_name.style.display = "block";

                        value_name.textContent = "* Username sudah terdaftar !";

                    }
                }
            })
        }

        // add event listener
        sigin_fullname.addEventListener("keyup", function () {
            value_fullname.style.display = "none";
        })

        sigin_username.addEventListener("keyup", function () {
            value_name.style.display = "none";
        })

        sigin_fullname.addEventListener("keyup", function () {
            value_fullname.style.display = "none";
        })

        sigin_pass.addEventListener("keyup", function () {
            value_pass.style.display = "none";
        })

    }