<nav style="z-index: 1;" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span id="logo" style="background-color:#002c3e;color:#03045e;font-size:1.35em;padding:15px;border:1px solid #d2ecff;border-radius:10px" class="badge badge-secondary"><a href="index.php"><i class="fa fa-book fa-fw"></i> Library</a></span>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link <?= ($active_page == "index")? "activeLink" : "" ?>" href="index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                <!-- <a class="nav-link <?= ($active_page == "books")? "activeLink" : "" ?>" href="books.php"><i class="fa fa-list fa-fw"></i> Books List</a> -->
                <a class="nav-link <?= ($active_page == "signin")? "activeLink" : "" ?>" href="signin.php"><i class="fa fa-right-to-bracket fa-fw"></i> Sign In</a>
                <a class="nav-link <?= ($active_page == "signup")? "activeLink" : "" ?>" href="signup.php"><i class="fa fa-user-plus fa-fw"></i> Sign Up</a>
            </div>
        </div>
    </div>
</nav>