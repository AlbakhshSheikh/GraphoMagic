<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $conn = new mysqli('localhost', 'root', '', 'graphomagic');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO Messages(email, name, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $email, $name, $subject, $message);

        if ($stmt->execute()) {
            echo '<div id="success-message" style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 20px;">Message sent successfully...</div>';
            echo '<script>
                    setTimeout(function() {
                        var successMessage = document.getElementById("success-message");
                        if (successMessage) {
                            successMessage.style.display = "none";
                        }
                    }, 2000); // 2 seconds
                  </script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content name="keywords">
    <meta content name="description">

    <!-- Favicon -->
    <link href="logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                <img src="logo.png" alt="Grapho Magic Logo" width="50" height="40" class="me-3">
                <h2 class="m-0 text-primary">GRAPHO MAGIC</h2>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                        <div class="dropdown-menu fade-down m-0">
                            <a href="nlp.html" class="dropdown-item">Neuro Linguistic Programming</a>
                            <a href="graphology.html" class="dropdown-item">Hand Writing Analysis and Graphotheraphy</a>
                        </div>
                    </div>
                    <a href="about.html" class="nav-item nav-link">About Us</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blogs & Review</a>
                        <div class="dropdown-menu fade-down m-0">
                            <a href="blogs.html" class="dropdown-item">Blogs</a>
                            <a href="review.html" class="dropdown-item">Review</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact
                        Us</a>
                </div>
                <a href="tel:+7975863955" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Call
                    Us<i></i></a>
                <a href="https://wa.me/7975863955" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">WhatsApp<i
                        class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Contact
                        Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <!-- <li class="breadcrumb-item"><a
                                        class="text-white"
                                        href="#">Pages</a></li> -->
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Contact
                    Us</h6>
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Get In Touch</h5>
                    <p class="mb-4">The contact form is currently inactive.
                        Get a functional and working contact form with Ajax
                        & PHP in a few minutes. Just copy and paste the
                        files, add a little code and you're done.
                        <!-- <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> -->
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Office</h5>
                            <p class="mb-0">#90, AECS Layout, 2nd Stage,
                                5th Main, RMV Extension, Next to Post
                                Office, Sanjaynagar, Bengaluru
                                560094.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Mobile</h5>
                            <p class="mb-0">7975863955 , 9481244167 </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Email</h5>
                            <p class="mb-0">graphomagic2020@gmail.com</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6 wow fadeInUp"
                            data-wow-delay="0.3s">

                            <iframe
                                class="position-relative rounded w-100 h-100"
                                src="https://www.google.com/maps/place/177,+AECS+Layout,+3rd+Main,+RMV+2nd+Stage,+1st+Phase,+Sanjaynagar,+Bangalore-560094/@13.0328273,77.5726035,17z/data=!3m1!4b1!4m6!3m5!1s0x3bae171ffe835275:0xf8e1eba6baaf29d8!8m2!3d13.0328221!4d77.5751784!16s%2Fg%2F11rbr_4k42?entry=ttu"
                                frameborder="0"
                                style="min-height: 300px; border:0;"
                                allowfullscreen aria-hidden="false"
                                tabindex="0"></iframe>
                        </div> -->
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form id="connect" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                    <label for="email">Your
                                        Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-1">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h3><img src="logo.png" alt height="160px"></h3>
                        <h4 class="text-white text-center mt-3 ml-3">Grapho
                            Magic</h4>
                        <p class="text-center">
                            Improve your personality, believe in yourself -
                            Stepping stone for expected outcome --
                            all through Handwritten courses at
                            different levels.
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Quick Link</h4>
                        <a class="btn btn-link" href="index.html">Home</a>
                        <a class="btn btn-link" href="about.html">About Us</a>
                        <a class="btn btn-link" href="blogs.html">Blogs</a>
                        <a class="btn btn-link" href="contact.php">Contact
                            Us</a>

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Services</h4>
                        <a class="btn btn-link" href="nlp.html">Neuro Linguistic Programming</a>
                        <a class="btn btn-link" href="graphology.html">Hand Writing Analysis and     Graphotheraphy</a>
                        <div class="col-lg-3 col-md-6">

                            <h4 class="text-white mb-3 mt-3">Review</h4>
                            <a class="btn btn-link" href="review.html">Review</a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <h4 class="text-white mb-3">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>#90, AECS
                            Layout, 2nd Stage, 5th Main, RMV Extension, Next to
                            Post Office, Sanjaynagar, Bengaluru 560094.</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 7975863955
                            ,
                            +91 9481244167</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>graphomagic2020@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social"
                                href="https://www.youtube.com/@graphomagic4315"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social"
                                href="https://www.linkedin.com/in/chandra-shekara-n-9552642a3?originalSubdomain=in"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <!-- <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Newsletter</h4>
                        <p>"Discovering What's New: Fresh Stories for Everyone!"</p>
                        <div class="position-relative mx-auto"
                            style="max-width: 400px;">
                            <input
                                class="form-control border-0 w-100 py-3 ps-4 pe-5"
                                type="text" placeholder="Your email">
                            <button type="button"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">GRAPHO
                                MAGIC</a>, All Right Reserved.

                            Designed By <a class="border-bottom">SS Infotech</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href>Home</a>
                                <a href>Cookies</a>
                                <a href>Help</a>
                                <a href>FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->

    <script src="js/main.js"></script>

</body>

</html>