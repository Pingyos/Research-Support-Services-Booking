<!DOCTYPE html>
<html lang="en">
<?php
// session_start();
// if (!isset($_SESSION['login_info'])) {
//     header('Location: login.php');
//     exit;
// }
// if (isset($_SESSION['login_info'])) {
//     $json = $_SESSION['login_info'];
// } else {
//     echo "You are not logged in.";
// }

require_once 'head.php';
?>
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

    <?php require_once 'header.php'; ?>
    <!-- ======= Hero Section ======= -->
    <section class="d-flex flex-column justify-content-center align-items-center">
    </section>
    <!-- End Hero -->

    <?php
    require_once 'connnect.php';
    if (isset($_GET['date'])) {
        $date = $_GET['date'];
        $stmt = $mysqli->prepare("select * from booking1 where date = ?");
        $stmt->bind_param('s', $date);
        $bookings = array();
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $bookings[] = $row['timeslot'];
                }

                $stmt->close();
            }
        }
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $title = $_POST['title'];
        $option_add = $_POST['option_add'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $timeslot = $_POST['timeslot'];
        $service = $_POST['service'];
        $status = $_POST['status'];
        $instructor = $_POST['instructor'];
        $manutitle = $_POST['manutitle'];
        $stmt = $mysqli->prepare("select * from booking where date = ? AND timeslot=?");
        $stmt->bind_param('ss', $date, $timeslot);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $msg = '<script>
                    swal({
                      title: "booking failed",
                      text: "booking failed",
                      type: "success",
                      timer: 2000,
                      showConfirmButton: false
                    }, function(){
                      window.location.href = "booking.php";
                    });
                  </script>';
            } else {
                // First database (booking)
                require_once 'connnect.php';
                $mysqli->set_charset('utf8');
                $stmt = $mysqli->prepare("INSERT INTO booking1 (name,title,option_add,timeslot,email,tel,date,service,status,instructor,manutitle) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param('sssssssssss', $name, $title, $option_add, $timeslot, $email, $tel, $date, $service, $status, $instructor, $manutitle);
                $stmt->execute();

                // Second database (bookingAll)
                $mysqli2 = new mysqli('localhost', 'root', '', 'booking');
                $mysqli2->set_charset('utf8');
                if ($mysqli2->connect_errno) {
                    echo "Failed to connect to second database: " . $mysqli2->connect_error;
                    exit();
                }

                $stmt2 = $mysqli2->prepare("INSERT INTO bookingall (name,title,option_add,timeslot,email,tel,date,service,status,instructor,manutitle) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                if (!$stmt2) {
                    echo "Prepare failed: (" . $mysqli2->errno . ") " . $mysqli2->error;
                    exit();
                }

                $stmt2->bind_param('sssssssssss', $name, $title, $option_add, $timeslot, $email, $tel, $date, $service, $status, $instructor, $manutitle);
                if (!$stmt2->execute()) {
                    echo "Execute failed: (" . $stmt2->errno . ") " . $stmt2->error;
                    exit();
                }

                $msg = '<script>
                    swal({
                      title: "booking success",
                      text: "booking success",
                      type: "success",
                      timer: 2000,
                      showConfirmButton: false
                    }, function(){
                      window.location.href = "Check.php";
                    });
                  </script>';
                $bookings[] = $timeslot;
                $stmt->close();
                $mysqli->close();
                // LN8KPFOSBCYWrDpZThezFPSo76uK0atqX8slQFbLJ2z
                $sToken = ["his5Q7XxUDocSW5Mg3y2EonaC1HPqF6F5WBzlktOWGB"];
                $sMessage = "Update Booking\r\n";
                $sMessage .=  $instructor . "\n";
                $sMessage .= "\n";
                $sMessage .= "Date: " . $date . "\n";
                $sMessage .= "Time: " . $timeslot . "\n";
                $sMessage .= "\n";
                $sMessage .= "Service Type: " . $title . "\n";
                $sMessage .= "Manuscript Title: " . $manutitle . "\n";
                $sMessage .= "\n";
                $sMessage .= "Meeting Option: \n";
                $sMessage .= $option_add . "\n";
                $sMessage .= "\n";
                $sMessage .= "Booked by: " . $name . "\n";
                $sMessage .= "E-mail: " . $email . "\n";
                $sMessage .= "Tel: " . $tel . "\n";
                $sMessage .= "\n";
                $sMessage .= "https://cmu.to/eWQ0l";

                function notify_message($sMessage, $Token)
                {
                    $chOne = curl_init();
                    curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                    curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt($chOne, CURLOPT_POST, 1);
                    curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
                    $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $Token . '',);
                    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
                    $result = curl_exec($chOne);
                    if (curl_error($chOne)) {
                        echo 'error:' . curl_error($chOne);
                    }
                    curl_close($chOne);
                }
                foreach ($sToken as $Token) {
                    notify_message($sMessage, $Token);
                }
            }
        }
    }
    $duration = 60;
    $cleanup = 0;
    $start = "13:00";
    $end = "16:00";


    function timeslots($duration, $cleanup, $start, $end)
    {
        $start = new DateTime("$start");
        $end = new DateTime("$end");
        $interval = new DateInterval("PT" . $duration . "M");
        $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
        $slots = array();
        for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
            $endPeriod = clone $intStart;
            $endPeriod->add($interval);
            if ($endPeriod > $end) {
                break;
            }
            $slots[] = $intStart->format("H:iA") . "_" . $endPeriod->format("H:iA");
        }
        return $slots;
    }

    ?>

    <div class="container">
        <div class="section-title">
            <h2>Booking for Date</h2>
            <h4><?php echo date('Y-m-d', strtotime($date)); ?></h4>
        </div>
        <div class="row">
            <div class="col-md-12 col-12 mt-2">
                <?php echo isset($msg) ? $msg : ""; ?>
            </div>
            <?php $timeslots = timeslots($duration, $cleanup, $start, $end,);
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
                                <div class="mb-2">
                                    <table for="">Date</table>
                                    <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-2">
                                    <table for="">Service Type</table>
                                    <select name="title" class="form-control" required>
                                        <option 0=""></option>
                                        <option 1="">Research Consult</option>
                                        <option 2="">Statistic Consult</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <table for="">Manuscript Title</table>
                                <input required type="text" name="manutitle" class="form-control">
                            </div>
                            <input required type="text" name="instructor" value="Dr-Patompong-Khaw-on" class="form-control" hidden>
                            <div class="form-group">
                                <div class="mb-2">
                                    <table for="">Meeting Option</table>
                                    <select name="option_add" class="form-control" required>
                                        <option value=""></option>
                                        <option value="Zoom-meeting">Zoom meeting</option>
                                        <option value="Face-to-face meeting">Face to face meeting</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-2">
                                    <table for="">Name</table>
                                    <input readonly type="text" name="name" value="<?php echo $json['firstname_EN'] . ' ' . $json['lastname_EN']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-2">
                                    <label for="">Email</label>
                                    <input readonly type="email" name="email" class="form-control" value="<?php echo $json['cmuitaccount']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="mb-2">
                                    <table for="">Tel</table>
                                    <input required type="text" name="tel" class="form-control">
                                </div>
                            </div>
                            <input required type="text" name="service" value="-" class="form-control" hidden>
                            <input required type="text" name="status" value="-" class="form-control" hidden>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary keypad3" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary keypad1">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- <?php echo '<pre>';
                            print_r($_POST);
                            echo '</pre>';
                            ?> -->
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