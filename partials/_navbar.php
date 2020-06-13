<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="http://localhost/php-online-forum-project/index.php">iDev coding forum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/php-online-forum-project/pages/about.php">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

            <p class="text-white font-weight-bolder" style="margin-top: 14px;">  <?= isset($_SESSION['loggedUserDetail']['loggedIn']) ? 'Welcome, ' . $_SESSION['loggedUserDetail']['firstname']   : ''; ?>
            </p>
        </ul>
        <div class="row">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-md font-weight-bold my-2 my-sm-0" type="submit" style="background-color: #eee;color:black;">Search</button>
            </form>


            <?php if (!isset($_SESSION['loggedUserDetail'])) : ?>
                <button data-toggle="modal" data-target="#login" class="font-weight-bold btn btn-md btn-outline-success mx-2" style="background-color: #eee;color:black;">Login</button>

                <button data-toggle="modal" data-target="#signup" class="font-weight-bold btn btn-md btn-outline-success mr-2" style="background-color: #eee;color:black;">Signup</button>Z
            <?php else : ?>

                <a href="http://localhost/php-online-forum-project/partials/_logout.php" class="font-weight-bold btn btn-md btn-outline-success mx-2" style="background-color: #eee;color:black;">Logout</a>

            <?php endif; ?>

        </div>
    </div>
</nav>