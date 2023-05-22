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
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<body>
    <?php require_once 'header.php'; ?>

    <section class="d-flex flex-column justify-content-center align-items-center">
    </section>
    <!-- End Hero -->
    <div class="container">
        <div class="section-title">
            <h2>Research Support Services Booking</h2>
            <p>BookingCheck</p>

        </div>
        <div class="row">
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service Type</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Meeting Option</th>
                        <th>Details</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'connection.php';
                    $email = $_SESSION['login_info']['cmuitaccount'];
                    $stmt = $conn->prepare("SELECT * FROM bookingall WHERE email = ? ORDER BY dateCreate DESC");
                    $stmt->execute([$email]);
                    $result = $stmt->fetchAll();
                    $countrow = 1;
                    foreach ($result as $t1) {
                    ?>
                        <tr>
                            <td><?= $countrow ?></td>
                            <td><?= $t1['title']; ?></td>
                            <td><?= $t1['manutitle']; ?></td>
                            <td><?= $t1['timeslot']; ?>/<?= $t1['date']; ?></td>
                            <td><?= $t1['option_add']; ?>

                                <?php
                                $designation = $t1['designation'];
                                $option_add = $t1['option_add'];
                                $booking_id = $t1['booking_id'];

                                if ($designation == 1 && ($option_add != "Zoom-meeting")) {
                                    echo "-";
                                } else if ($designation == 1 && ($option_add == "Zoom-meeting")) {
                                    echo "-";
                                } else if ($designation == 0 && ($option_add != "Zoom-meeting")) {
                                    echo "Room-2223";
                                } else if ($designation == 0 && ($option_add == "Zoom-meeting")) {
                                    echo "ID-81859956261";
                                } ?>
                            </td>
                            <td>
                                <button <a href="?booking_id=<?= $t1['booking_id']; ?>" type="button" class="btn btn-outline-success book" data-timeslot="<?= $t1['timeslot'] ?>">View</button>
                            </td>
                            <td>
                                <?php
                                $designation = $t1['designation'];
                                $booking_id = $t1['booking_id'];
                                if ($designation == 1) {
                                    echo "<button type='button' class='btn btn-outline-danger'>waiting for confirmation</button></a>";
                                } else if ($designation == 0) {
                                    echo "<button type='button' class='btn btn-outline-primary'>booking confirmation</button></a>";
                                } ?>
                            </td>
                        </tr>
                    <?php $countrow++;
                    }
                    ?>
                </tbody>
            </table>
            <div id="myModal" class="modal fade" role="dialog">
                <div class=" modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data Check</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <div class="mb-2">
                                            <table for="">Date</table>
                                            <input type="text" readonly name="timeslot" id="timeslot" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-2">
                                            <table for="">Service Type</table>
                                            <input required type="text" name="tel" value="<?= $t1['title']; ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <table for="">ResearchTitle</table>
                                        <input type="text" name="manutitle" value="<?= $t1['manutitle']; ?>" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-2">
                                            <table for="">Meeting Option</table>
                                            <input required type="text" name="tel" value="<?= $t1['option_add']; ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-2">
                                            <table for="">Name</table>
                                            <input readonly type="text" name="name" value="<?= $t1['name']; ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-2">
                                            <label for="">Email</label>
                                            <input readonly type="email" name="email" class="form-control" value="<?= $t1['email']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <div class="mb-2">
                                            <table for="">Tel</table>
                                            <input required type="text" name="tel" value="<?= $t1['tel']; ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php require_once 'script.php'; ?>
</body>
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

</html>