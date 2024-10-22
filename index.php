<?php
include "doctor/config.php";

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);;
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = $_POST['time'];
    $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);
    $doctor = mysqli_real_escape_string($conn, $_POST['doctorlist']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO `appointments` 
    (`name`,`email`,
    `appoint_Date`,`appoint_time`,
    `specialization`,`doctor`,
    `message`,`phone`) VALUES 
    ('$name','$email','$date','$time','$specialization','$doctor','$message','$phone')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!doctype html>
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
        <section class="hero" id="hero">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/slider/portrait-successful-mid-adult-doctor-with-crossed-arms.jpg" class="img-fluid" alt="">
                                </div>

                                <div class="carousel-item">
                                    <img src="images/slider/young-asian-female-dentist-white-coat-posing-clinic-equipment.jpg" class="img-fluid" alt="">
                                </div>

                                <div class="carousel-item">
                                    <img src="images/slider/doctor-s-hand-holding-stethoscope-closeup.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <h2>About Us</h2>
                        <p>Our mission declares our purpose of existence as a company and our objectives.

                            To give every customer much more than what he/she asks for in terms of quality, selection, value for money and customer service, by understanding local tastes and preferences and innovating constantly to eventually provide an unmatched experience in jewellery shopping.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-12 mx-auto">
                    <div class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                        <p class="featured-text"><span class="featured-number">12</span> Years<br> of Experiences</p>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <section class="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-6 ps-0">
                        <img src="images/gallery/medium-shot-man-getting-vaccine.jpg" class="img-fluid galleryImage" alt="get a vaccine" title="get a vaccine for yourself">
                    </div>
                    <div class="col-lg-6 col-6 pe-0">
                        <img src="images/gallery/female-doctor-with-presenting-hand-gesture.jpg" class="img-fluid galleryImage" alt="wear a mask" title="wear a mask to protect yourself">
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding" id="booking">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="booking-form">
                            <h2 class="text-center mb-lg-3 mb-2">Book an appointment</h2>
                            <form role="form" method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required='true'>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required='true'>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <input type="telephone" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" maxlength="11">
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <input type="date" name="date" id="date" value="" class="form-control">
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <input type="time" name="time" id="time" value="" class="form-control">
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <select name="specialization" id="specialization" class="form-control" required>
                                            <option value="">Select specialization</option>
                                            <?php
                                            $sql1 = "SELECT * FROM `special`";
                                            $result1 = mysqli_query($conn, $sql1);
                                            if (mysqli_num_rows($result1) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                                    echo "<option value='" . $row1['id'] . "'>" . $row1['specialization'] . "</option>";
                                                }
                                            }
                                            ?>
                                            <!--- Fetching States--->
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <select name="doctorlist" id="doctorlist" class="form-control">
                                            <option value="">Select Doctor</option>
                                            <?php
                                            $sql2 = "SELECT * FROM `doc`";
                                            $result2 = mysqli_query($conn, $sql2);
                                            if (mysqli_num_rows($result1) > 0) {
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    echo "<option value='" . $row2['id'] . "'>" . $row2['name'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Additional Message"></textarea>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                        <button type="submit" class="form-control" name="submit" id="submit-button">Book Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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