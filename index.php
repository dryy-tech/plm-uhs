<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UHS - Homepage</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php require_once "../../includes/header.php"; ?>

    <main id="main-content">
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <div id="text-container">
                        <h1 id="title">Your Health, Our Priority</h1>
                        <p id="description">
                            Comprehensive medical and dental care for the university health services. From general checkups to specialized treatments—book your appointment online in just a few clicks.
                        </p>
                    </div>

                    <div id="button-container">
                        <a href="#" id="appointment-btn">Book an Appointment</a>
                        <a href="#" id="contact-btn">Contact Us</a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div id="image-container">
                        <img src="../../images/clinic-image.jpg" alt="UHS image" id="main-image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section id="services-section">
        <div class="container my-5">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <div id="services-header">
                        <h2 id="services-title">Our Services</h2>
                        <p id="services-description">Complete medical and dental care for the university health services—from routine checkups to specialized treatments.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4" id="services-list">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-stethoscope"></i></div>
                        <h3 class="service-title">General Medical Consultation</h3>
                        <p class="service-description">Comprehensive health consultations for illness diagnosis, treatment, and medical advice.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-heart-pulse"></i></div>
                        <h3 class="service-title">Physical Examination</h3>
                        <p class="service-description">Routine health checkups, vital signs monitoring, and overall wellness assessments.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-book-medical"></i></div>
                        <h3 class="service-title">Medical Certificates</h3>
                        <p class="service-description">Issuance of medical clearance, fitness certificates, and health documentation for students.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-face-smile"></i></div>
                        <h3 class="service-title">General Dentistry</h3>
                        <p class="service-description">Comprehensive dental care including cleanings, fillings, and preventive treatments.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-shield"></i></div>
                        <h3 class="service-title">Orthodontics</h3>
                        <p class="service-description">Teeth straightening with braces and other orthodontic solutions for students.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa-solid fa-heart"></i></div>
                        <h3 class="service-title">Emergency Care</h3>
                        <p class="service-description">Same-day appointments available for dental emergencies and urgent care.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="feature-section">
        <div class="container my-5">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <div id="feature-header">
                        <div id="feature-note">Advanced Health Management Information System</div>
                        <h2 id="feature-title">More Than Just Appointments</h2>
                        <p id="feature-description">Our comprehensive clinic management system stores patient records, manages historical data, supports clinical decision-making, and reduces nurse workload—transforming from a simple appointment system into a full Management Information System (MIS).</p>
                    </div>
                </div>
            </div>
            <div class="row g-4" id="feature-list">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="feature-item">
                        <div class="feature-icon"><i class="fa-solid fa-address-book"></i></div>
                        <h3 class="feature-title">Patient Master List</h3>
                        <p class="feature-description">One-click access to complete student database with academic and medical information</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="feature-item">
                        <div class="feature-icon"><i class="fa-solid fa-database"></i></div>
                        <h3 class="feature-title">Unified Medical Records</h3>
                        <p class="feature-description">Centralized storage of medical and dental history, diagnoses, and treatments</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="feature-item">
                        <div class="feature-icon"><i class="fa-solid fa-file"></i></div>
                        <h3 class="feature-title">Digital Files</h3>
                        <p class="feature-description">Secure storage of X-rays, lab results, prescriptions, and medical certificates</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="feature-item">
                        <div class="feature-icon"><i class="fa-regular fa-chart-bar"></i></div>
                        <h3 class="feature-title">Diagnosis Tracking</h3>
                        <p class="feature-description">Complete history of medical encounters with treatment notes and prescriptions</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="feature-item">
                        <div class="feature-icon"><i class="fa-solid fa-shield"></i></div>
                        <h3 class="feature-title">Role-Based Access</h3>
                        <p class="feature-description">Secure access control for doctors, nurses, admins, and patients</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="feature-item">
                        <div class="feature-icon"><i class="fa-regular fa-clock"></i></div>
                        <h3 class="feature-title">Efficient Workflow</h3>
                        <p class="feature-description">Reduced paperwork and faster patient lookup for healthcare providers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="benefits-section">
        <div class="container my-5">
            <div class="row g">
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <h3 class="benefits-column-title">For Healthcare Providers</h3>
                    <ul class="benefits-list">
                        <li class="benefit-item"><i class="fa-solid fa-check"></i>Instant access to complete patient medical profiles</li>
                        <li class="benefit-item"><i class="fa-solid fa-check"></i>View patients medical data</li>
                        <li class="benefit-item"><i class="fa-solid fa-check"></i>Track recurring issues and previous prescriptions</li>
                        <li class="benefit-item"><i class="fa-solid fa-check"></i>Improved communication and coordination among healthcare teams</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <h3 class="benefits-column-title">For Patients</h3>
                    <ul class="benefits-list">
                        <li class="benefit-item"><i class="fa-solid fa-check"></i>Book medical and dental appointments online</li>
                        <li class="benefit-item"><i class="fa-solid fa-check"></i>Quick and secure access to medical records and history</li>
                        <li class="benefit-item"><i class="fa-solid fa-check"></i>Receive appointment reminders and notifications</li>
                        <li class="benefit-item"><i class="fa-solid fa-check"></i>Improve overall healthcare experience</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="why-us-section">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <div id="why-us-text">
                        <h2 id="why-us-title">Why Choose Our University Health Services?</h2>
                        <p id="why-us-description">We're committed to providing exceptional medical and dental care specifically designed for the university community. Your health and academic success are our top priorities.</p>
                    </div>
                    <div id="badges" class="row g-4">
                        <div class="col-sm-12 col-md-6">
                            <div class="why-badge">
                                <div class="badge-icon">
                                    <i class="fa-solid fa-medal"></i>
                                </div>
                                <div class="badge-text">
                                    <h3>Expert Medical Team</h3>
                                    <p>Board-certified doctors and dentists with years of experience</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="why-badge">
                                <div class="badge-icon">
                                    <i class="fa-regular fa-clock"></i>
                                </div>
                                <div class="badge-text">
                                    <h3>Flexible Hours</h3>
                                    <p>Convenient scheduling for busy student schedules</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="why-badge">
                                <div class="badge-icon">
                                    <i class="fa-solid fa-shield"></i>
                                </div>
                                <div class="badge-text">
                                    <h3>Digital Records</h3>
                                    <p>Secure electronic health records accessible anytime</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="why-badge">
                                <div class="badge-icon">
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                                <div class="badge-text">
                                    <h3>Student-Centered Care</h3>
                                    <p>Comprehensive healthcare tailored for university students</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div id="image-container">
                        <img src="../../images/teeth-image.jpg" alt="UHS image" id="main-image-why-us" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="contact-section">
        <div class="container my-5">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <div id="contact-header">  
                        <h2 id="contact-title">Get In Touch</h2>
                        <p id="contact-description">Have questions about your health? We're here to help the university community.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4" id="contact-info">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="contact-text">
                            <h3>Visit Us</h3>
                            <p>University Health Services, PLM Campus, Gusaling Villegas 1st Floor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
                        <div class="contact-text">
                            <h3>Call Us</h3>
                            <p>(123) 456-7890</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fa-regular fa-envelope"></i></div>
                        <div class="contact-text">
                            <h3>Email Us</h3>
                            <p><a href="mailto:universityhealthservices@plm.edu.ph">universityhealthservices@plm.edu.ph</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fa-regular fa-clock"></i></div>
                        <div class="contact-text">
                            <h3>Clinic Hours</h3>
                            <p>Mon-Fri: 8:00 AM - 5:00 PM <br>Sat: 9:00 AM - 12:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php require_once "../../includes/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7d9cda96f6.js" crossorigin="anonymous"></script>
</body>
</html>