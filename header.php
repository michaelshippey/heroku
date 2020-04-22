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
                <nav id="navBar">
                    <a href ="register.php"> Home </a>
                    <a href ="profile.php"> Profile </a>
                    <a href ="register.php"> Sign Up</a>
                    <a href ="login.php"> Sign In </a>
                </nav>
            </div>
        </div>

        <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script>
    var url = window.location.href.split("/"); //replace string with location.href
    var navLinks = document.getElementsByTagName("nav")[0].getElementsByTagName("a");
    //naturally you could use something other than the <nav> element
    var i=0;
    var currentPage = url[url.length - 1];
    for(i;i<navLinks.length;i++){
        var lb = navLinks[i].href.split("/");
        if(lb[lb.length-1] == currentPage) {
            navLinks[i].className = "current";
  }
  }
</script>
  