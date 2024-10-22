<?php
include "doctor/config.php";
?>

<!Doctype html>
<html lang="en">

<head>
    <title>Doctor Appointment Management System || Home Page</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    <link href="css/templatemo-medic-care.css" rel="stylesheet">
</head>

<body id="top">

    <main>
        <?php include_once('includes/header.php'); ?>
        <section class="section-padding" id="booking">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 mx-auto">
                        <div class="booking-form">
                            <h2 class="text-center mb-lg-3 mb-2">Search Appointment History by Appointment Number/Name/Mobile No</h2>
                            <form role="form" method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Appointment No./Name/Mobile No.">
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                        <button type="submit" class="form-control" name="search" id="submit-button">Check</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                        if (isset($_POST['search'])) {
                            $name = $_POST['searchdata'];
                        ?>
                            <h4 align='center'>Result against '<?= $name ?>' keyword </h4>
                            <div class="widget-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Appointment Number</th>
                                                <th>Patient Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Remark</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM `appointments` WHERE `id` LIKE '%$name%' OR `name` LIKE '%$name%' OR `phone` LIKE '%$name%'";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $row['id'] ?></td>
                                                        <td><?= $row['id'] ?></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td><?= $row['phone'] ?></td>
                                                        <td><?= $row['email'] ?></td>
                                                        <td><?= $row['status'] ?></td>
                                                        <td><?= $row['remark'] ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<h4 align='center'>Result against '$name' keyword </h4>";
                                                echo "<td>No record found against this search</td>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php }; ?>
                    </div>
        </section>

    </main>
    <?php include_once('includes/footer.php'); ?>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/scrollspy.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>