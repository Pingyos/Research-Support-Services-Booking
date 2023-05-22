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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'connection.php';
                                        $stmt = $conn->prepare("SELECT * FROM bookingall WHERE instructor = 'Mr-Michael-Cote'");
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
                                                <td>
                                                    <button <a href="?booking_id=<?= $t1['booking_id']; ?>" type="button" class="btn btn-outline-success book" data-timeslot="<?= $t1['timeslot'] ?>">View</button>
                                                </td>
                                            </tr>
                                        <?php $countrow++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="col-12 col-lg-12">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Data Check</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" role="form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="timeslot">Date</label>
                                        <input type="text" readonly name="timeslot" id="timeslot" class="form-control" value="<?= $t1['timeslot']; ?>">
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
                                        <label for="manutitle">Research Title</label>
                                        <input type="text" name="manutitle" value="<?= $t1['manutitle']; ?>" class="form-control" readonly>
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
                                    <div class="has-warning form-group">
                                        <label for="status" class="form-control-label">Status</label>
                                        <select required name="status" id="status" class="is-valid form-control-success form-control">
                                            <option value="<?= $t1['status']; ?>"><?= $t1['status']; ?></option>
                                            <option value="1">Option #1</option>
                                            <option value="2">Option #2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="has-warning form-group">
                                        <label for="service" class="form-control-label">Room/ID-zoom</label>
                                        <input required type="text" name="service" value="<?= $t1['service']; ?>" class="is-valid form-control-success form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary keypad1">Submit</button>
                                        <button type="button" class="btn btn-secondary keypad3" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php require_once 'CF_table.php'; ?>
                </div>
            </div>
        </div>
    </div>
    </div>

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