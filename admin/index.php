<?php require_once 'head.php'; ?>

<body>
    <?php require_once 'aside.php'; ?>

    <div id="right-panel" class="right-panel">
        <?php require_once 'header.php'; ?>

        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <!-- Allbooking -->
                    <?php
                    require_once 'connection.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS Allbooking FROM bookingall");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="ti-server"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Allbooking</div><span class="count"><?php echo $result['Allbooking']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Allbooking -->
                    <!-- totaC -->
                    <?php
                    require_once 'connection.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS Editor FROM booking");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i>E</i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Editor English Hours</div><span class="count"><?php echo $result['Editor']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaC -->
                    <!-- totaA -->
                    <?php
                    require_once 'connection.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS Research FROM booking1");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i>R</i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Research Consult</div><span class="count"><?php echo $result['Research']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaA -->
                    <!-- totaR -->
                    <?php
                    require_once 'connection.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS Statistic FROM booking1");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i>S</i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Statistic Consult</div><span class="count"><?php echo $result['Statistic']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaR -->
                    <!-- totaR -->
                    <?php
                    require_once 'connection.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS Michael FROM booking");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i>M</i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Mr.Michael Cote</div><span class="count"><?php echo $result['Michael']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- totaR -->
                    <!-- Patompong -->
                    <?php
                    require_once 'connection.php';
                    $stmt = $conn->prepare("SELECT COUNT(*) AS Patompong FROM booking1");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i>P</i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <div class="stat-heading">Dr.Patompong Khaw-on</div><span class="count"><?php echo $result['Patompong']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Patompong -->
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once 'scripts.php'; ?>

</html>