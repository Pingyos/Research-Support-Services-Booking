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
                        <th>Date</th>
                        <th>Time</th>
                        <th>Meeting Option</th>
                        <th>Meeting Status</th>
                        <th>Status</th>
                        <th>Details</th>

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
                            <td><?= $t1['date']; ?></td>
                            <td><?= $t1['timeslot']; ?></td>
                            <td><?= $t1['option_add']; ?></td>
                            <td><?= $t1['service']; ?></td>
                            <td><?= $t1['status']; ?></td>
                            <td>
                                <button href="?booking_id=<?= $t1['booking_id']; ?>" type="button" class="btn btn-outline-success book" data-timeslot="<?= $t1['timeslot'] ?>">View</button>
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
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <input type="hidden" name="booking_id" value="<?= $t1['booking_id']; ?>">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="manutitle">Research Title</label>
                                                <input type="text" name="manutitle" value="<?= $t1['manutitle']; ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="text" name="date" class="form-control" value="<?= $t1['date']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="timeslot">Time </label>
                                                <input type="text" name="timeslot" class="form-control" value="<?= $t1['timeslot']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="title">Service Type</label>
                                                <input type="text" name="title" value="<?= $t1['title']; ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="option_add">Meeting Option</label>
                                                <input type="text" name="option_add" value="<?= $t1['option_add']; ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="<?= $t1['name']; ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="<?= $t1['email']; ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="tel">Tel</label>
                                                <input type="text" name="tel" value="<?= $t1['tel']; ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="instructor">Instructor</label>
                                                <input type="text" name="instructor" value="<?= $t1['instructor']; ?>" class="form-control" readonly>
                                            </div>
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