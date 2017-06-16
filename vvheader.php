<nav class="navbar navbar-dark" style="background:#ccccff;">
    <div class="container">
        <div class="row logoSection">

            <a class="col-md-3 navbar-brand" href="#" target="_blank">
                <img src="img/normal/logo.png">
                <p class="brand-text">VILLAGE EXPERTS</p>
            </a>

            <a class="col-md-2 navbar-brand" href="#" target="_blank">
                <a href="myProfile.php" data-toggle="tooltip" data-placement="bottom" title="My Profile">My Profile <?php echo $_SESSION['logged_user_fname']; ?> </a>
                <p class=" modify-badge-2">My Home Page </p>
            </a>


            <a href="/" data-toggle="tooltip" data-placement="bottom" title="Back"><img src="images/Left.png" class="topBtn" style="cursor:pointer;"/></a>

            <a class="col-md-3 btn btn-danger waves-light text-xs-right modify-btn-1 modal__trigger waves-effect waves-light" href="newProvider.php"><span class="ICON-holder"><img class="img-fluid img-rounded" src="images/icon-2.png"></span>Search for and Connect with an Expert</a>

            <a  href="logout.php" data-toggle="tooltip" data-placement="bottom" title="Log out!"><img src="images/logout.png" class="topBtn" style="cursor:pointer;"/></a>

         </div>   
    </div>
</nav>


