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
    var url = location.href.split("/"); // get the url of current page
    var navLinks = document.getElementsByTagName("nav")[0].getElementsByTagName("a"); //get the links to everypage
    var i=0;
    var currentPage = url[url.length - 1]; //get url of current page
    for(i;i<navLinks.length;i++){ 
        var lb = navLinks[i].href.split("/"); // check page
        if(lb[lb.length-1] == currentPage) { // if on current page
            navLinks[i].className = "current"; // set the navlink class name to current for the current page
  }
  }
</script>
  