<!DOCTYPE html>
<html lang="en">

<?php require_once 'head.php'; ?>

<body>
    <?php require_once 'header.php'; ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="container text-center text-md-left" data-aos="fade-up">
            <h1>Welcome to <span>Lumia</span></h1>
            <h2>We are team of talented designers making websites with Bootstrap</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= What We Do Section ======= -->
        <section id="what-we-do" class="what-we-do">
            <div class="container">

                <div class="section-title">
                    <h2>What We Do</h2>
                    <p>Magnam dolores commodi suscipit consequatur ex aliquid</p>
                </div>
                <div class="row">
                    <?php
                    require_once 'connection.php';
                    $stmt = $conn->prepare("SELECT * FROM booking_header");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach ($result as $t1) {
                    ?>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-file"></i></div>
                                <h4><a href="booking.php#?booking_id=<?= $t1['booking_id']; ?>"><?= $t1['booking_header']; ?></a></h4>
                                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </section><!-- End What We Do Section -->


    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php require_once 'script.php'; ?>

</body>

</html>