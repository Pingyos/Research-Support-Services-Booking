<!DOCTYPE html>
<html lang="en">

<?php require_once 'head.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<link href="assets/css/style.css" rel="stylesheet">

<body>
    <?php require_once 'header.php'; ?>
    <!-- ======= Hero Section ======= -->
    <section class="d-flex flex-column justify-content-center align-items-center">
    </section>
    <!-- End Hero -->

    <?php
    require_once 'booking_db.php';
    $duration = 60;
    $cleanup = 0;
    $start1 = "09:00";
    $end1 = "12:00";
    $start2 = "13:00";
    $end2 = "16:00";

    function timeslots($duration, $cleanup, $start1, $end1, $start2, $end2)
    {
        $start1 = new DateTime("$start1");
        $end1 = new DateTime("$end1");
        $start2 = new DateTime("$start2");
        $end2 = new DateTime("$end2");
        $interval = new DateInterval("PT" . $duration . "M");
        $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
        $slots = array();
        for ($intStart = $start1; $intStart < $end1; $intStart->add($interval)->add($cleanupInterval)) {
            $endPeriod = clone $intStart;
            $endPeriod->add($interval);
            if ($endPeriod > $end1) {
                break;
            }
            $slots[] = $intStart->format("H:iA") . "_" . $endPeriod->format("H:iA");
        }
        for ($intStart = $start2; $intStart < $end2; $intStart->add($interval)->add($cleanupInterval)) {
            $endPeriod = clone $intStart;
            $endPeriod->add($interval);
            if ($endPeriod > $end2) {
                break;
            }
            $slots[] = $intStart->format("H:iA") . "_" . $endPeriod->format("H:iA");
        }
        return $slots;
    }


    ?>

    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>Booking for Date</h2>
                <h4><?php echo date('Y-m-d', strtotime($date)); ?></h4>
            </div>
            <div class="row">
                <div class="col-md-12 col-12 mt-2">
                    <?php echo isset($msg) ? $msg : ""; ?>
                </div>
                <?php $timeslots = timeslots($duration, $cleanup, $start1, $end1, $start2, $end2);
                foreach ($timeslots as $ts) {
                ?>

                    <div class="col-md-2 col-12 mt-2">
                        <div class="form-group"></div>
                        <?php if (in_array($ts, $bookings)) { ?>
                            <button class="col-md- col-12 mt-2 btn btn-xs btn-primary keypad3"><?php echo $ts; ?></button><br>
                        <?php } else { ?>
                            <button class="col-md- col-12 mt-2 btn btn-primary keypad1 book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class=" modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <table for="">Date</table>
                                <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                            </div>
                            <div class="form-group">
                                <table for="">Service Type</table>
                                <select name="title" class="form-control" required>
                                    <option 1="">Editor English Hours</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <table for="">Meeting Option</table>
                                <select name="option_add" class="form-control" required>
                                    <option 0=""></option>
                                    <option 1="">Zoom meeting</option>
                                    <option 2="">Face-to-face meeting</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <table for="">Name</table>
                                <input required type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <table for="">Email</table>
                                <input required type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <table for="">Tel</table>
                                <input required type="text" name="tel" class="form-control">
                            </div>
                            <div class="form-group">
                                <table for="">Comments</table>
                                <input required type="text" name="comments" class="form-control">
                            </div>

                            <input required type="text" name="designation" value="1" class="form-control" hidden>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary keypad3" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary keypad1">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php require_once 'script.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(".book").click(function() {
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal('show');
        });
    </script>

</body>

</html>