<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar using HTML, CSS and Javascript</title>
    <link rel="stylesheet" href="header.css">
</head>
<header>
        <div class="header-left">
            <div class="logo">
                <img src="/image/téléchargement.png" alt="">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="" class="active">Home</a>
                    </li>
                    <li>
                        <a href="">Our Courses</a>
                    </li>
                    <li>
                        <a href="">Contact us</a>
                    </li>
                    <li>
                        <a href="">About</a>
                    </li>
                    <li>
                        <a href="">universite@gmail.com</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-right">
            <div class="login-signup right">
                <button class="btn" >Login or </button><a href="/signUp.php">Signup</a>
            </div>
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </header>
<body>
    <div class="popup">
        <div class="content">
            <div class="title">
                <a  href="loginStudent.php">login as a student </a>
                <a href="LoginTeacher.php">login as a teacher </a>
            </div>
            <button class="close">Close</button>
        </div>
    </div>
</div>
    <script src="js/popup.js"></script>
    <script src="/js/header.js"></script>
</body>
</html>