<?php
session_start();
if (isset($_SESSION["id"])) {
    header("location:../index.php");
    $_SESSION["loggedUser"] = true;
} else {
    $_SESSION["loggedUser"] = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="log.css">
    <title>LogIn</title>
</head>

<body>
    <style>
        .log-in {
            width: 500px;
            margin: auto;
            padding: 5px;
        }

        .log-in h1 {
            font-family: cursive;
            color: gray;
            /* gainsboro */
            margin-bottom: 10px;
            pointer-events: none;
            user-select: none;
        }

        .log-in .coll-login {
            width: 100%;
            position: relative;
        }

        .log-in .coll-login form {}

        .log-in .coll-login form .inputs {}

        .log-in .coll-login form .inputs .input {
            width: 100%;
            margin: 0 0 10px 0px;
        }

        .log-in .coll-login form .inputs .input .coll-inpico {
            position: relative;
        }

        .log-in .coll-login form .inputs .input .coll-inpico input {
            width: 100%;
            height: 30px;
            padding: 0px 25px;
        }

        .log-in .coll-login form .inputs .input .coll-inpico i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            padding-left: 7px;
        }

        .log-in .coll-login form .inputs .input .coll-inpico .icon {
            position: absolute;
            right: 35px;
            top: 50%;
            transform: translateY(-50%);
        }

        .log-in .coll-login form .inputs .input .coll-inpico {
            cursor: pointer;
        }

        .log-in .coll-login form .inputs .input .coll-inpico .CheckEmail {
            position: absolute;
            cursor: default;
            right: 10px;
        }

        .log-in .coll-login form .inputs .input .coll-inpico .icon #shopass {}

        .log-in .coll-login form .inputs .input .coll-inpico .icon #hidepass {
            display: none;
        }

        .log-in .coll-login form .inputs .input .coll-inpico input::-webkit-input-placeholder {
            transition: 0.5s ease-in-out;
        }

        .log-in .coll-login form .inputs .input .coll-inpico input:focus::-webkit-input-placeholder {
            opacity: 0;
        }

        .log-in .coll-login form .inputs .input-remember {
            width: 100%;
        }

        .log-in .coll-login form .inputs .input-remember span {
            user-select: none;
        }

        .log-in .coll-login form .inputs .input-remember input {
            cursor: pointer;
        }

        .log-in .coll-login form .collForget-reges {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .log-in .coll-login form .collForget-reges a {
            user-select: none;
        }

        .log-in .coll-login form .inputs .input-login {
            width: 100%;
        }

        .log-in .coll-login form .inputs .input-login button {
            width: 200px;
            height: 30px;
            margin-top: 10px;
            cursor: pointer;
            border: none;
            color: black;
            font-family: cursive;
            font-size: 20px;
            cursor: pointer;
            opacity: 0.5;
            pointer-events: none;
        }

        /* loadPage */
        .loadPage {
            width: 100%;
            height: 100vh;
            position: absolute;
            z-index: 1;
            background-color: beige;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loadPage .coll {
            display: flex;
            align-items: center;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .loadPage span {}

        .loadPage .span1 {

            border-color: transparent black;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: rotate(360deg);
        }

        .loadPage .span1::after {
            content: "";
            position: absolute;
            width: 200px;
            height: 200px;
            border: 1px solid;
            border-radius: 50%;
            border-width: 20px;
            border-color: black transparent;
            animation: rott 1s infinite linear;
        }

        .loadPage .span1::before {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border: 1px solid;
            border-radius: 50%;
            border-width: 20px;
            border-color: transparent black;
            animation: rottt 1s infinite linear;

        }

        @keyframes rott {
            100% {
                transform: rotate(-360deg);
            }
        }

        @keyframes rottt {
            100% {
                rotate: 360deg;
            }
        }

        .loadPage .wel {
            position: absolute;
            top: 30px;
        }
    </style>
    <!-- Log In Succ Go To Site -->
    <!-- <div class="loadPage" id="loadPage">
        <div class="wel">
            <h1>Welcome Back Mohamad</h1>
        </div>
        <div class="coll">
            <span class="span1"></span>
        </div>
    </div>  -->
    <!-- Log In Form -->
    <div class="log-in" id="log-in">
        <h1>Sign In</h1>
        <div class="coll-login">
            <!-- form -->
            <form action="" method="post">
                <div class="inputs">
                    <div class="input">
                        <div class="coll-inpico">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="" id="inputemail" placeholder="Type Your E-mail"
                                oninput="checkForm()">
                            <i id="CheckEmail" class="fas fa-checkH CheckEmail"></i>
                        </div>
                    </div>
                    <div class="input">
                        <div class="coll-inpico">
                            <i class="fas fa-key"></i>
                            <input type="password" name="" id="inputpass" placeholder="Type Your E-mail"
                                oninput="checkForm()">
                            <div class="icon">
                                <i id="shopass" class="fas fa-eye"></i>
                                <i id="hidepass" class="fas fa-eye-slash"></i>
                            </div>
                        </div>
                    </div>

                    <div class="input-remember">
                        <div class="coll-inpico">
                            <input type="checkbox" name="" id="inputcheck">
                            <span>Remember Me</span>
                        </div>
                    </div>
                    <script>
                        // rember me
                        
                        
                    </script>
                    <div class="input-login">
                        <div class="coll-inpico">
                            <button id="login">
                                <span>Log In</span>
                            </button>
                        </div>
                    </div>
                    <script>
                        // close tap button
                        document.addEventListener("keydown", (e) => {
                            if (e.key === "Tap" || e.keyCode === 9) {
                                e.preventDefault()
                            }
                        })
                        // check log form
                        var inputemail = document.getElementById("inputemail");
                        var inputPass = document.getElementById("inputpass");
                        var LoginButt = document.getElementById("login");
                        var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

                        function checkForm() {
                            var CheckEmail = document.getElementById("CheckEmail")
                            inputemail.addEventListener("keyup", () => {
                                if (inputemail.value === "") {
                                    inputPass.value = "";
                                    CheckEmail.classList.replace("fa-heart", "fa-x")
                                    CheckEmail.classList.replace("fa-checkH", "fa-x")
                                    CheckEmail.classList.replace("fa-y", "fa-x")
                                } else if (!inputemail.value.match(pattern)) {
                                    CheckEmail.classList.replace("fa-checkH", "fa-y")
                                    CheckEmail.classList.replace("fa-x", "fa-y")
                                    CheckEmail.classList.replace("fa-heart", "fa-y")
                                }
                                if (inputemail.value !== "") {
                                    CheckEmail.classList.replace("fa-y", "fa-heart")
                                    if (inputemail.value.match(pattern)) {
                                        CheckEmail.classList.replace("fa-heart", "fa-check")
                                    } else {
                                        inputPass.value = "";
                                        CheckEmail.classList.replace("fa-check", "fa-heart")
                                    }
                                }
                            })
                            if (inputemail.value !== "" &&
                                inputemail.value.match(pattern) &&
                                inputPass.value !== "" &&
                                inputPass.value.length > 8
                            ) {
                                LoginButt.style.opacity = "1";
                                LoginButt.style.pointerEvents = "all";

                            } else {
                                LoginButt.style.opacity = "0.5";
                                LoginButt.style.pointerEvents = "none";
                            }
                        }
                        // send information from ajax

                        LoginButt.addEventListener("click", (e) => {
                            var reme = document.getElementById("inputcheck").checked;
                        if(reme){
                            console.log("12")
                        }else{
                            console.log("2")
                        }
                            e.preventDefault();
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "loguser.php", true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.onload = function() {
                                var respone = JSON.parse(xhr.responseText)
                                if (respone.success) {
                                    console.log("Founded")
                                    sessionStorage.setItem('username', respone.username)
                                    setTimeout(() => {
                                        var CreatLoad = document.createElement("div");
                                        CreatLoad.classList.add("loadPage");
                                        document.body.appendChild(CreatLoad);
                                        var wlediv = document.createElement("div");
                                        wlediv.classList.add("wel");
                                        var h2Name = document.createElement("h1");
                                        h2Name.innerHTML = `Welcome Back ${sessionStorage.getItem('username')}`;
                                        wlediv.appendChild(h2Name);
                                        CreatLoad.appendChild(wlediv);
                                        /* LOAD */
                                        var collload = document.createElement("div");
                                        collload.classList.add("coll");
                                        CreatLoad.appendChild(collload);

                                        var span = document.createElement("span");
                                        span.classList.add("span1");
                                        collload.appendChild(span)
                                    }, 100);
                                    setInterval(() => {
                                        sessionStorage.removeItem('username')
                                        window.location.href = "../index.php";
                                    }, 8000);



                                } else {
                                    console.log("user Not Founded")
                                }

                            }
                            var parms = "email=" + encodeURIComponent(inputemail.value) +
                                "&pass=" + encodeURIComponent(inputpass.value);
                            xhr.send(parms)
                        })
                        console.log(sessionStorage.getItem('username'))
                    </script>
                    <script>
                        var ShowPass = document.getElementById("shopass")
                        var HidePass = document.getElementById("hidepass");
                        var inputPass = document.getElementById("inputpass")
                        ShowPass.addEventListener("click", () => {
                            if (inputpass.type === "password") {
                                inputpass.type = "text";
                                ShowPass.style.display = "none";
                                HidePass.style.display = "block";
                            } else {
                                HidePass.style.display = "none";
                                ShowPass.style.display = "block";
                                inputpass.type = "password";
                            }
                        })
                        HidePass.addEventListener("click", () => {
                            if (inputpass.type === "text") {
                                inputpass.type = "password";
                                HidePass.style.display = "none";
                                ShowPass.style.display = "block";
                            } else {
                                HidePass.style.display = "block";
                                ShowPass.style.display = "none";
                            }

                        })
                    </script>
                    <script>
                        // check log in 
                        function checklogout() {
                            var checkLogUserN = <?php echo json_encode($_SESSION["loggedUser"]); ?>;
                            if (checkLogUserN === false) {
                                sessionStorage.removeItem('username');
                            } else {}
                        }
                        checklogout();
                    </script>
                </div>
                <div class="collForget-reges">
                    <a href="regester.html">Dont Have Account..?</a>
                    <a href="forgetpass.html">Forget Password</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        setInterval(() => {
            if (localStorage.getItem("theme") === "dark") {
                document.body.classList.add("darkmode")
            } else {
                document.body.classList.remove("darkmode")

            }
        }, 100)
    </script>
</body>

</html>