<?php
session_start();
if (isset($_SESSION["id"])) {
    $_SESSION["loggedin"] = true;
} else {
    $_SESSION["loggedin"] = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrameShope</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>

<body>
    <style>

    </style>
    <!-- header -->
    <div class="coll-nav">

        <header class="logname">
            <!-- logo -->
            <div class="logo">
                <img src="image/logo.svg" alt="LogoSite" title="FrameShope">
            </div>
            <!-- Nmae Site -->

            <div class="name-site">
                <p>
                    <span>Frame</span>
                    <span>Shope</span>
                </p>
            </div>
            <!-- log reg darklight -->
            <div class="loredl">
                <ul class="ulloredl">

                    <li class="cartli">
                        <span id="shoppingcart">
                            <i class="fas fa-shopping-cart" title="LogIn ToSee Ur Cart"></i>
                            <div class="count-cart">
                                <p>0</p>
                            </div>
                        </span>
                        <script>
                            document.getElementById("shoppingcart").addEventListener("click", () => {
                                const LoggedIn = <?php echo json_encode($_SESSION["loggedin"]); ?>;
                                if (LoggedIn) {
                                    window.location.href = "urcart.php";
                                } else {
                                    var ErrorMsg = document.createElement("div");
                                    ErrorMsg.classList.add("errormsg");
                                    document.body.appendChild(ErrorMsg)
                                    var pMsg = document.createElement("p");
                                    pMsg.classList.add("pmsg");
                                    pMsg.innerHTML = "You Should Log in </br> To See Your Cart ...";
                                    ErrorMsg.appendChild(pMsg);
                                    var CloseX = document.createElement("span");
                                    CloseX.classList.add("closx");
                                    CloseX.innerHTML = "x";
                                    ErrorMsg.appendChild(CloseX);
                                    document.getElementById("shoppingcart").style.pointerEvents = "none";
                                    document.addEventListener("click", (e) => {
                                        if (e.target === document.querySelector(".closx")) {
                                            ErrorMsg.remove();
                                            pMsg.remove();
                                            CloseX.remove();
                                            document.getElementById("shoppingcart").style.pointerEvents = "all";
                                        }
                                        setTimeout(() => {
                                            ErrorMsg.remove();
                                            pMsg.remove();
                                            CloseX.remove();
                                            document.getElementById("shoppingcart").style.pointerEvents = "all";

                                        }, 3100);
                                    })
                                }
                            })
                        </script>
                    </li>
                    <li class="userli">
                        <span id="shomend"><i class="fas fa-user" title="LogIn ToSee Profile"></i></span>
                        <div id="userdarlig" class="userdarlig">
                            <ul>
                                <?php
                                if (!isset($_SESSION["id"])) {
                                ?>
                                    <li><a href="loginuser/login.php">LogIn</a></li>
                                <?php
                                } else {
                                ?>
                                    <li><a href="">Profile</a></li>

                                <?php
                                }
                                ?>
                                <li>
                                    <div id="darklight" class="darklight">
                                        <div class="toggledarklight">
                                            <span class="SuMo">
                                                <i class="fas fa-sun"></i>
                                                <i class="fas fa-moon"></i>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                if (isset($_SESSION['id'])) {
                                ?>
                                    <li>
                                        <div class="logout">
                                            <div class="colllogout">
                                                <button id="logoutbtn">LogOut</button>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                                <script>
                                    if (document.getElementById("logoutbtn") !== null) {

                                        document.getElementById("logoutbtn").addEventListener("click", (e) => {
                                            e.preventDefault();
                                            var xhr = new XMLHttpRequest();
                                            xhr.open("POST", "inc/logout.php", true);
                                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                            xhr.onload = function() {
                                                if (xhr.responseText === "doneLogout") {
                                                    window.location.href = "index.php";
                                                }
                                            }
                                            xhr.send();
                                        })
                                    }
                                </script>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </header>
        <header class="mainheader">
            <!-- toggle menu -->
            <div id="toogle" class="toogle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- end menu -->
            <script>
                // toggle menu
                var ToggleMenu = document.getElementById("toogle");
                ToggleMenu.addEventListener("click", () => {
                    ToggleMenu.classList.toggle("activemenu");
                })
                // dark mode
                if (localStorage.getItem("theme") === "dark") {
                    document.body.classList.toggle('darkmode');

                }
                var darklight = document.getElementById("darklight");
                darklight.addEventListener("click", () => {
                    document.body.classList.toggle('darkmode');
                    if (document.body.classList.contains("darkmode")) {
                        localStorage.setItem("theme", "dark")
                    } else {
                        localStorage.setItem("theme", "light")

                    }
                })
                // show menu dark log
                var ShoClick = document.getElementById("shomend");
                var MenucClick = document.getElementById("userdarlig");
                ShoClick.addEventListener("click", () => {
                    MenucClick.classList.toggle("opemenudu")
                })
            </script>
            <!-- start menu -->
            <div class="ulmenu">
                <ul class="ulmenuul">
                    <li><a href="">Home</a></li>
                    <li><a href="">Men</a></li>
                    <li><a href="">Women</a></li>
                    <li><a href="">Kids</a></li>
                    <li><a href="">Kitchen</a></li>
                    <li class="alllinks"><a href=""><span>All Section</span><span class="alllinkic">></span></a></li>
                </ul>
            </div>
            <!-- end menu -->


        </header>
    </div>

    <!-- end header -->

    <!-- START BODY -->
    <div class="landing-page">
        <div class="main-img">
            <div class="coll-main-img active">
                <img src="image/animals/img1.jpg" alt="">
                <div class="info">
                    <h2>Shopping Online</h2>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et voluptate
                        unde veniam eius sint numquam earum magnam? Quidem, iste cum! Quidem numquam sapiente dolores magni unde ad, labore aperiam fuga!
                    </p>
                    <!--  -->
                    <a href="" title="Log In">Start Shopping</a>
                </div>
            </div>
            <div class="coll-main-img ">
                <img src="image/animals/img2.jpg" alt="">
            </div>
            <div class="coll-main-img ">
                <img src="image/animals/img3.jpg" alt="">
            </div>
            <div class="coll-main-img ">
                <img src="image/animals/img4.jpg" alt="">
            </div>
        </div>
        <div class="tumbnail-img">
            <div class="coll-thumb">
                <li data-index="0" class="active">Shopping Online</li>
                <li data-index="1">Delevery Free</li>
                <li data-index="2">Shopping Online</li>
                <li data-index="3">Shopping Online</li>
            </div>
        </div>
    </div>
    <!-- END BODY -->
     <script>

        var SetInte;
        var Colls = document.querySelectorAll(".landing-page .main-img .coll-main-img");
        var CollsImg = document.querySelector(".landing-page .main-img .coll-main-img img");
        var CollsThumb = document.querySelectorAll(".tumbnail-img .coll-thumb li");
        var currindex = 0;

        function showLand(currindex){
            CollsThumb.forEach(dot => dot.classList.remove("active"))
            CollsThumb[currindex].classList.add("active")
            // img
            Colls.forEach(img => img.classList.remove("active"))
            Colls[currindex].classList.add("active")
        }
        function showdiv(){
            showLand((currindex + 1) % Colls.length)
        }
        CollsThumb.forEach((dot , index) =>{
            dot.addEventListener("click" , ()=> {
                currindex = parseInt(dot.getAttribute('data-index'));
                clearInterval(SetInte)
                setTimeout(() => {
                    setInterval(showdiv , 4000);
                }, 5000);
                showLand(currindex);
            })
        })
        
         SetInte = setInterval(() => {
            currindex = (currindex + 1) % Colls.length;
            showLand(currindex)
        }, 4000);
        
     </script>
     <!-- Start sections -->
      <div class="land-sections">
        <!-- side menu -->
        <div class="side-menu">
            <h1>Section</h1>
        </div>
        <!-- side menu -->
         <div class="side-info">
            
         </div>
      </div>
    <!-- footer -->
    <div class="footer">
        <div class="collfotter">

            <div class="implinks section">
                <h2>Imp Links</h2>
                <ul>
                    <li><a href="">Men</a></li>
                    <li><a href="">Women</a></li>
                    <li><a href="">Shoses</a></li>
                    <li><a href="">Toy</a></li>
                    <li><a href="">Accessorite</a></li>
                    <li><a href="">All Links</a></li>
                </ul>
            </div>
            <!--  -->
            <div class="support section">
                <h2>Support</h2>
                <ul>
                    <li><a href="">Commone Q</a></li>
                    <li><a href="">Shipping policy</a></li>
                    <li><a href="">privacy policy</a></li>
                    <li><a href="">Terms</a></li>
                    <li><a href="">contact</a></li>
                </ul>
            </div>
            <!--  -->
            <div class="gettouch section">
                <h2>How to get In Touch</h2>
                <ul class="getintounch">
                    <!--  <i class="fa-solid fa-location-dot"></i> -->
                    <li><i class="fas fa-envelope"></i> E-mail : yamenn9@gmail.com</li>
                    <li><i class="fa-solid fa-phone"></i>Number : +963937416618</li>
                    <li> <i class="fa-solid fa-location-dot"></i>Adress : Damascuse Altal</li>
                </ul>
            </div>
            <!--  -->
            <div class="socialmed section">
                <h2>Follow Us</h2>
                <ul class="socialmedea">
                    <li><i class="fa-brands fa-facebook"></i></li>
                    <li><i class="fa-brands fa-instagram"></i></li>
                    <li><a href="./social.html">See All </a></li>
                    <!--  <li><i class="fa-brands fa-threads"></i></li>
                    <li><i class="fa-brands fa-whatsapp"></i><li> -->
                    <!-- <li><i class="fa-brands fa-snapchat"></i></li> -->
                    <!-- <li><i class="fa-brands fa-tiktok"></i></li>
                    <li><i class="fa-brands fa-telegram"></i></li> -->
                </ul>
            </div>

        </div>
        <div class="copyright">
            <p>&copy;Right For FrameShope</p>
            <!-- <span id="clock">00:00:00</span> -->
        </div>
    </div>
    </footer>
</body>

</html>