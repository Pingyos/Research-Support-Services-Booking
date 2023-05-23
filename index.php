<!DOCTYPE html>
<html lang="en">

<?php
// session_start();

// // Check if session login_info is set
// if (!isset($_SESSION['login_info'])) {
//     header('Location: login.php');
//     exit;
// } else {
//     $json = $_SESSION['login_info'];
// }

// // Check for inactivity
// if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) { // 300 seconds = 5 minutes
//     session_unset(); // Unset all session variables
//     session_destroy(); // Destroy the session
//     header('Location: login.php'); // Redirect to login.php
//     exit;
// }

// Update last activity time
$_SESSION['last_activity'] = time();

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