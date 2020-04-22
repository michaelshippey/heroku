<html>
    <head>
        <link rel ="stylesheet" type="text/css" href="style.css"/>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Assistant&display=swap');
        </style>
    </head>
    <body class = "sitebody">
        <div class="header">
            <div id = "wrapper">
                <div class = logo>
                    <a href = "register.php"> <img src = "logo.png"/> </a>
                </div>
                <div id="navBar">
                    <a href ="register.php"> Home </a>
                    <a href ="profile.php"> Profile </a>
                    <a href ="register.php"> Sign Up</a>
                    <a href ="login.php"> Sign In </a>
                </div>
            </div>
        </div>
        
        <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script>
    $(function(){
    $('navBar').each(function() {
        if ($(this).prop('href') == window.location.href) {
        $(this).addClass('current');
        }
    });
    });
</script>
  