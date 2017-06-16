<nav class="navbar navbar-dark" style="background:#ccccff;">
    <div class="container">
        <div class="logo-modify">
            
            <a class="navbar-brand" href="#" target="_blank">
                <img src="img/normal/logo.png">
                <p class="brand-text">VILLAGE EXPERTS</p>
            </a>
            <label class="modify-badge-2" style="margin-left:-46px;font-size:23px;padding:0px;color:#495775">My Home Page </label>

            <div class="login-profile">
                <a href="/" data-toggle="tooltip" data-placement="bottom" title="Back"><img src="images/Left.png" class="topBtn" style="cursor:pointer;"/></a>

                <a href="myProfile.php" data-toggle="tooltip" data-placement="bottom" title="My Profile">My Profile <?php echo $_SESSION['logged_user_fname']; ?> </a>

                <a class="btn btn-lg btn-danger  waves-light text-xs-right modify-btn-1 modal__trigger waves-effect waves-light" href="newProvider.php"><span class="ICON-holder"><img class="img-fluid img-rounded" src="images/icon-2.png"></span>Search for and Connect with an Expert</a>

                <a href="logout.php" data-toggle="tooltip" data-placement="bottom" title="Log out!"><img src="images/logout.png" class="topBtn" style="cursor:pointer;"/></a>
            </div>

         </div>   
    </div>
</nav>


