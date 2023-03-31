<!DOCTYPE html>
<html lang="en">

<?php
// Start session
session_start();
if (!isset($_SESSION['login_info'])) {
    // Redirect user to login page
    header('Location: login.php');
    exit;
}

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


require_once 'head.php';
?>

<body>
    <?php require_once 'header.php'; ?>

    <!-- ======= Hero Section ======= -->
    <section class="d-flex flex-column justify-content-center align-items-center">

    </section><!-- End Hero -->

    <main id="main"></main>

    <!-- ======= What We Do Section ======= -->
    <section id="what-we-do" class="what-we-do">
        <div class="container">

            <div class="section-title">
                <h2>Research Support Services Booking</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6  align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="booking.php">Editor English Hours</a></h4>
                        <p>(Mr.Michael Cote)</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="booking1.php">Research Consult</a></h4>
                        <p>(Dr.Patompong Khaw-on)</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="booking1.php">Statistic Consult</a></h4>
                        <p>(Dr.Patompong Khaw-on)</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End What We Do Section -->


    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php require_once 'script.php'; ?>

</body>

</html>