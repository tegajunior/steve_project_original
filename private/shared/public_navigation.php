
<nav class="position-sticky sticky-top">
    <div class="blue-background container-fluid p-0 text-white">
        <marquee style="font-weight: 600" direction="rtl">Welcome to United Arab...</marquee>
    </div>
    <div class="navbar navbar-expand-md bg-white px-3 py-0">
        <!-- Brand -->
        <a href="#goto-home">
            <img class="navbar-brand" src="<?php echo url_for('/images/logo.svg'); ?>" alt="site-logo">
        </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <i class="fas fa-bars toggle-icon"></i>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link my-nav-link" href="<?php echo url_for('/index.php/#goto-home'); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my-nav-link" href="<?php echo url_for('/index.php/#about'); ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my-nav-link" href="<?php echo url_for('/index.php/#contact'); ?>">Contact</a>
                </li>
            </ul>
            <ul class="login navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-right" href="<?php echo url_for('/customer/new.php'); ?>">
                        <i class="fas fa-user" size="5x"></i> Sign Up
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-right" href="<?php echo url_for('/customer/login.php'); ?>">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>