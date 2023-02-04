<nav style="z-index: 1;" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span id="logo" style="background-color:#002c3e;color:#03045e;font-size:1.35em;padding:15px;border:1px solid #d2ecff;border-radius:10px" class="badge badge-secondary"><a href="../main/"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['name']?></a></span>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link <?= ($active_page == "home")? "activeLink" : "" ?>" href="../main/"><i class="fa fa-home fa-fw"></i> Home</a>
                <a class="nav-link <?= ($active_page == "addBook")? "activeLink" : "" ?>" href="addBook.php"><i class="fa fa-plus fa-fw"></i> Add Book</a>
                <a class="nav-link <?= ($active_page == "signout")? "activeLink" : "" ?>" href="../signout.php"><i class="fa fa-right-from-bracket fa-fw"></i> Sign Out</a>
            </div>
        </div>
    </div>
</nav>