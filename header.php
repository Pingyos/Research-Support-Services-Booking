    <!-- ======= Header ======= -->
    <?php
    // Check if login information is available in session variable
    if (isset($_SESSION['login_info'])) {
        $json = $_SESSION['login_info'];

        // Display login information
        // echo "Name:" . $json['firstname_EN'] . "<br>";
        // echo "Surname:" . $json['lastname_EN'] . "<br>";
        // echo "organisation:" . $json['organization_name_EN'] . "<br>";
        // echo "cmuitaccount:" . $json['cmuitaccount'] . "<br>";
    } else {
        echo "You are not logged in.";
    }
    ?>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a href="index.php">RSSB-NURSECMU</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="Check.php">BookingCheck</a></li>
                    <li><a class="nav-link scrollto"><?php echo $json['firstname_EN']; ?></a></li>
                    <li><a class="btn-get-started scrollto" href="logout.php">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>



            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <?php require_once 'script.php'; ?>