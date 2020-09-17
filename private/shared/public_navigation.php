
<nav class="navbar navbar-expand-md bg-dark px-3 py-0 position-sticky sticky-top">
    <!-- Brand -->
    <a class="navbar-brand" href="#goto-home">
        <img src="<?php echo url_for('/images/logo.png'); ?>" alt="site-logo">
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
</nav>