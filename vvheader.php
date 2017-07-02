<?php

if($_SERVER['REQUEST_URI']=="/" OR $_SERVER['REQUEST_URI']=="/index.php" OR $_SERVER['REQUEST_URI']=="/logout.php" ){
?>
<nav class="navbar navbar-dark scrolling-navbar logo-scroll">

    <div class="container">

        <div class="logo-modify">
            <!--Navbar Brand-->
            <a class="navbar-brand" href="#" target="_blank"><h3><img src="img/normal/logo.png">VILLAGE EXPERTS</h3></a>
            <!--Links-->
            <div class="btn-primary col-md-2" href="#" target="_blank" style="background: transparent;padding: 10px;float: right;">About</div>
            <div class="btn-primary col-md-2" href="#" target="_blank" style="background: transparent;padding: 10px;float: right;">Contact US</div>
        </div>

    </div>
</nav>

<?php

}
else
{
?>

<nav class="navbar navbar-dark">
    <div class="container">
        <div class="row logoSection">

            <a class="col-md-4 navbar-brand" href="/index.php" target="_blank">
                <h3><img src="img/normal/logo.png">VILLAGE EXPERTS</h3>
            </a>

            <div class="col-md-3 navbar-brand">
                <a href="myProfile.php" data-toggle="tooltip" data-placement="bottom" title="My Profile">My Profile <?php echo $_SESSION['logged_user_fname']; ?> </a>
                <p class=" modify-badge-2">My Home Page </p>
            </div>

            <a class="col-md-1" href="/" data-toggle="tooltip" data-placement="bottom" title="Back"><img src="images/Left.png" class="topBtn" style="cursor:pointer;"/></a>

            <a class="col-md-2" href="newProvider.php">Connect with an Expert</a>

            <a class="col-md-1" href="logout.php" data-toggle="tooltip" data-placement="bottom" title="Log out!"><img src="images/logout.png" class="topBtn" style="cursor:pointer;"/></a>

        </div>
    </div>
</nav>
<?php
    }
?>