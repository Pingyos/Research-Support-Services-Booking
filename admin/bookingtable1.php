<?php require_once 'head.php'; ?>

<body>
    <!-- Left Panel -->
    <?php require_once 'aside.php'; ?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php require_once 'header.php'; ?>
        <!-- Header-->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service Type</th>
                                            <th>Booked by</th>
                                            <th>Date</th>
                                            <th>View data </th>
                                            <th>Option </th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'connection.php';
                                        $stmt = $conn->prepare("SELECT * FROM bookingall WHERE instructor = 'Dr-Patompong-Khaw-on'");
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();
                                        $countrow = 1;
                                        foreach ($result as $t1) {
                                        ?>
                                            <tr>
                                                <td><?= $countrow ?></td>
                                                <td><?= $t1['title']; ?></td>
                                                <td><?= $t1['name']; ?></td>
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
                                                        echo "Room-222";
                                                    } else if ($designation == 0 && ($option_add == "Zoom-meeting")) {
                                                        echo "ID-8064558803";
                                                    } ?>

                                                </td>
                                                <td>
                                                    <button <a href="?booking_id=<?= $t1['booking_id']; ?>" type="button" class="btn btn-outline-success book" data-timeslot="<?= $t1['timeslot'] ?>">View</button>
                                                </td>
                                                <td> <?php
                                                        $designation = $t1['designation'];
                                                        $booking_id = $t1['booking_id'];
                                                        if ($designation == 1) {
                                                            echo "<a  href=deactivate1.php?booking_id=" . $booking_id . "><button type='button' class='btn btn-outline-danger'>Click here to Confirm</button></a>";
                                                        } else if ($designation == 0) {
                                                            echo "<a href=activate1.php?booking_id=" . $booking_id . "><button type='button' class='btn btn-outline-primary'>Confirm</button></a>";
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
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>



    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>
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