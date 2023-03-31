<!doctype html>

<html class="no-js" lang="">
<?php require_once 'head.php'; ?>

<body>
    <?php require_once 'aside.php'; ?>
    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </header>

        <div class="content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <?php
                        $row = [];
                        if (isset($_GET['booking_id'])) {
                            require_once 'connection.php';
                            $stmt = $conn->prepare("SELECT* FROM booking WHERE booking_id=?");
                            $stmt->execute([$_GET['booking_id']]);
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            if ($stmt->rowCount() < 1) {
                                header('Location: index.php');
                                exit();
                            }
                        } //isset
                        ?>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Name</label>
                                    <input type="text" name="name" value="<?= $row['name']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ranking" class="control-label mb-1">Title</label>
                                    <input type="text" name="ranking" value="<?= $row['title']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="timeslot" class="control-label mb-1">Timeslot</label>
                                    <input type="text" name="timeslot" value="<?= $row['timeslot']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="date" class="control-label mb-1">Email</label>
                                    <input type="text" name="date" value="<?= $row['date']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input type="text" name="email" value="<?= $row['email']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tel" class="control-label mb-1">Tel</label>
                                    <input type="text" name="tel" value="<?= $row['tel']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="instructor" class="control-label mb-1">Instructor</label>
                                    <input type="text" name="instructor" value="<?= $row['instructor']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="manutitle" class="control-label mb-1">manutitle</label>
                                    <input type="text" name="manutitle" value="<?= $row['manutitle']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="option_add" class="control-label mb-1">Option</label>
                                    <select name="option_add" class="form-control" required>
                                        <option value="1">"<?= $row['option_add']; ?>"</option>
                                        <option value="Zoom meeting/ID-81859956261">Zoom meeting/ID-81859956261</option>
                                        <option value="Face-to-face meeting/Room-222">Face-to-face meeting/Room-222</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="designation" class="control-label mb-1">designation</label>
                                    <input type="text" name="designation" value="<?= $row['designation']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="booking_id" value="<?= $row['booking_id']; ?>">
                        <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    <?php require_once 'script.php'; ?>
</body>

</html>