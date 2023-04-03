<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION['login_info'])) {
    header('Location: login.php');
    exit;
}
if (isset($_SESSION['login_info'])) {
    $json = $_SESSION['login_info'];
} else {
    echo "You are not logged in.";
}

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
                    $stmt = $conn->prepare("SELECT * FROM bookingall WHERE email = ?");
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
                                    echo "-</a>";
                                } else if ($designation == 0 && ($option_add != "Zoom-meeting")) {
                                    echo "Room-222</a>";
                                } else if ($designation == 0 && ($option_add == "Zoom-meeting")) {
                                    echo "ID-81859956261</a>";
                                } ?>
                            </td>
                            <td><a data-toggle="modal" data-target="#myModal" class="btn btn-outline-success">View</a></td>

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
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>

    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php require_once 'script.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    let table = new DataTable('#myTable');
</script>
<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myModal').trigger('focus')
    })
</script>

</html>