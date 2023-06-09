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
<link href="assets/css/style.css" rel="stylesheet">

<body>
    <?php require_once 'header.php'; ?>

    <!-- ======= Hero Section ======= -->
    <section class="d-flex flex-column justify-content-center align-items-center">
    </section>
    <!-- End Hero -->

    <main id="main">
        <div class="section-title">
            <h2>Editor English Hours</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $dateComponents = getdate();
                    if (isset($_GET['month']) && isset($_GET['year'])) {
                        $month = $_GET['month'];
                        $year = $_GET['year'];
                    } else {
                        $month = $dateComponents['mon'];
                        $year = $dateComponents['year'];
                    }
                    echo build_calendar($month, $year);
                    ?>
                    <style>
                        @media only screen and (max-width: 760px),
                        (min-device-width: 802px) and (max-device-width: 1020px) {

                            /* Force table to not be like tables anymore */
                            table,
                            thead,
                            tbody,
                            th,
                            td,
                            tr {
                                display: block;

                            }



                            .empty {
                                display: none;
                            }

                            /* Hide table headers (but not display: none;, for accessibility) */
                            th {
                                position: absolute;
                                top: -9999px;
                                left: -9999px;
                            }

                            tr {
                                border: 1px solid #ccc;
                            }

                            td {
                                border: none;
                                border-bottom: 1px solid #eee;
                                position: relative;
                                padding-left: 50%;
                            }

                            td:nth-of-type(1):before {
                                content: "Sunday";
                            }

                            td:nth-of-type(2):before {
                                content: "Monday";
                            }

                            td:nth-of-type(3):before {
                                content: "Tuesday";
                            }

                            td:nth-of-type(4):before {
                                content: "Wednesday";
                            }

                            td:nth-of-type(5):before {
                                content: "Thursday";
                            }

                            td:nth-of-type(6):before {
                                content: "Friday";
                            }

                            td:nth-of-type(7):before {
                                content: "Saturday";
                            }


                        }

                        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
                            body {
                                padding: 0;
                                margin: 0;
                            }
                        }

                        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
                            body {
                                width: 495px;
                            }
                        }

                        @media (min-width:641px) {
                            table {
                                table-layout: fixed;
                            }

                            td {
                                width: 33%;
                            }
                        }

                        .row {
                            margin-top: 20px;
                        }

                        .today {
                            background: yellow;
                        }
                    </style>
                </div>

                <?php
                function build_calendar($month, $year)
                {
                    $mysqli = new mysqli('localhost', 'root', '', 'booking');



                    // Create array containing abbreviations of days of week.
                    $daysOfWeek = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

                    // What is the first day of the month in question?
                    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

                    // How many days does this month contain?
                    $numberDays = date('t', $firstDayOfMonth);

                    // Retrieve some information about the first day of the
                    // month in question.
                    $dateComponents = getdate($firstDayOfMonth);

                    // What is the name of the month in question?
                    $monthName = $dateComponents['month'];

                    // What is the index value (0-6) of the first day of the
                    // month in question.
                    $dayOfWeek = $dateComponents['wday'];
                    if ($dayOfWeek == 0) {
                        $dayOfWeek == 6;
                    } else {
                        $dayOfWeek = $dayOfWeek - 1;
                    }

                    // Create the table tag opener and day headers

                    $datetoday = date('Y-m-d');



                    $calendar = "<table class='table table-bordered'>";
                    $calendar .= "<center><h2>$monthName $year</h2>";
                    $calendar .= "<a class='col-md-3 col-3 mt-2 btn btn-xs btn-primary keypad1' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a> ";

                    $calendar .= " <a class='col-md-3 col-3 mt-2 btn btn-xs btn-primary keypad1' href='?month=" . date('m') . "&year=" . date('Y') . "'>Current Month</a> ";

                    $calendar .= "<a class='col-md-3 col-3 mt-2 btn btn-xs btn-primary keypad1' href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Next Month</a></center><br>";



                    $calendar .= "<tr>";

                    // Create the calendar headers

                    foreach ($daysOfWeek as $day) {
                        $calendar .= "<th  class='header'>$day</th>";
                    }

                    // Create the rest of the calendar

                    // Initiate the day counter, starting with the 1st.

                    $currentDay = 1;

                    $calendar .= "</tr><tr>";


                    if ($dayOfWeek > 0) {
                        for ($k = 0; $k < $dayOfWeek; $k++) {
                            $calendar .= "<td  class='empty'></td>";
                        }
                    }


                    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

                    while ($currentDay <= $numberDays) {

                        // Seventh column (Saturday) reached. Start a new row.

                        if ($dayOfWeek == 7) {

                            $dayOfWeek = 0;
                            $calendar .= "</tr><tr>";
                        }

                        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
                        $date = "$year-$month-$currentDayRel";

                        $dayname = strtolower(date('l', strtotime($date)));
                        $eventNum = 0;
                        $today = $date == date('Y-m-d') ? "today" : "";
                        if ($dayname == 'sunday' || $dayname == 'monday' || $dayname == 'tuesday'  || $dayname == 'friday' || $dayname == 'saturday') {
                            $calendar .= "<td><h4>$currentDay</h4> <button class='col-md-6 col-12 btn btn-xs btn-primary keypad3'>N/A</button>";
                        } elseif ($date < date('Y-m-d')) {
                            $calendar .= "<td><h4>$currentDay</h4> <button class='col-md-6 col-12 btn btn-xs btn-primary keypad2'>Pass</button>";
                        } else {
                            $totalbookings = checkSlots($mysqli, $date);
                            if ($totalbookings == 6) {
                                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='#' class='col-md-6 col-12 btn btn-xs btn-primary keypad2'>Full</a>";
                            } else {
                                $availableslots = 6 - $totalbookings;
                                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='bookingtime.php?date=" . $date . "' class='col-md-6 col-12 btn btn-xs btn-primary keypad1'>Booking</a><smail><h7> $availableslots slots</h7></smail>";
                            }
                        }




                        $calendar .= "</td>";


                        $currentDay++;
                        $dayOfWeek++;
                    }


                    if ($dayOfWeek != 7) {

                        $remainingDays = 7 - $dayOfWeek;
                        for ($l = 0; $l < $remainingDays; $l++) {
                            $calendar .= "<td class='empty'></td>";
                        }
                    }

                    $calendar .= "</tr>";

                    $calendar .= "</table>";

                    echo $calendar;
                }

                function checkSlots($mysqli, $date)
                {
                    $stmt = $mysqli->prepare("select * from booking where date = ?");
                    $stmt->bind_param('s', $date);
                    $totalbookings = 0;
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $totalbookings++;
                            }

                            $stmt->close();
                        }
                    }
                    return $totalbookings;
                }

                ?>
            </div>
        </div>
    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php require_once 'script.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>