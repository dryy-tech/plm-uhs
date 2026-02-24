<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UHS - Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/register.css">
    <script src="https://kit.fontawesome.com/7d9cda96f6.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Back to Home -->
    <a href="index.php" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> Back to Home
    </a>

    <div class="register-wrapper">
        <div class="register-card">

              <!-- Logo + Name (PLM style: seal + full name stacked) -->
            <a class="navbar-brand d-flex align-items-center gap-3" href="index.php">
                <div id="uhs-seal">
                    <img src="../../images/uhs-logo.png" alt="UHS Seal"
                         onerror="this.style.display='none'; document.getElementById('seal-fallback').style.display='flex';">
                    <!-- Fallback if no image -->
                    <div id="seal-fallback" style="display:flex; align-items:center; justify-content:center; width:100%; height:100%; font-weight:800; font-size:1rem; color:#be9c41;">UHS</div>
                </div>
                <div id="brand-text">
                    <div id="brand-main">University Health Services</div>
                    <div id="brand-sub">Pamantasan ng Lungsod ng Maynila</div>
                </div>
            </a>

            <!-- Title -->
            <h1 class="register-title">Create Account</h1>
            <p class="register-subtitle">Sign up to book your dental and medical appointments</p>

            <form method="POST" action="" id="registerForm" novalidate>

                <!-- ── Personal Information ── -->
                <div class="section-divider"><span>Personal Information</span></div>

                <!-- First Name & Last Name -->
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label">
                            <i class="fa-regular fa-user"></i> First Name <span class="req">*</span>
                        </label>
                        <input type="text" class="form-control" name="first_name" placeholder="John" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Last Name <span class="req">*</span></label>
                        <input type="text" class="form-control" name="last_name" placeholder="Doe" required>
                    </div>
                </div>

                <!-- Middle Name -->
                <div class="mb-3">
                    <label class="form-label">Middle Name <span style="color:#9ca3af; font-weight:400;">(optional)</span></label>
                    <input type="text" class="form-control" name="middle_name" placeholder="Santos">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-regular fa-envelope"></i> Email Address <span class="req">*</span>
                    </label>
                    <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
                </div>

                <!-- Phone Number -->
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-phone"></i> Phone Number <span class="req">*</span>
                    </label>
                    <input type="tel" class="form-control" name="phone_number" placeholder="+63 123 456 7890" required>
                </div>

                <!-- Date of Birth & Gender -->
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label">
                            <i class="fa-regular fa-calendar"></i> Date of Birth <span class="req">*</span>
                        </label>
                        <input type="date" class="form-control" name="date_of_birth" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">
                            <i class="fa-solid fa-venus-mars"></i> Gender <span class="req">*</span>
                        </label>
                        <select class="form-select" name="gender" required>
                            <option value="" disabled selected>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                            <option value="Prefer not to say">Prefer not to say</option>
                        </select>
                    </div>
                </div>

                <!-- ── Student Information ── -->
                <div class="section-divider"><span>Student Information</span></div>

                <!-- Student ID -->
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-id-card"></i> Student ID <span class="req">*</span>
                    </label>
                    <input type="text" class="form-control" name="student_id" placeholder="e.g. 2024-12XXX" required>
                </div>

                <!-- Program -->
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-graduation-cap"></i> Program / Course <span class="req">*</span>
                    </label>
                    <select class="form-select" name="program" required>
                        <option value="" disabled selected>Select your program</option>
                        <optgroup label="College of Engineering">
                            <option value="BSCE">BS Civil Engineering</option>
                            <option value="BSEE">BS Electrical Engineering</option>
                            <option value="BSME">BS Mechanical Engineering</option>
                            <option value="BSECE">BS Electronics Engineering</option>
                        </optgroup>
                        <optgroup label="College of Information Technology">
                            <option value="BSIT">BS Information Technology</option>
                            <option value="BSCS">BS Computer Science</option>
                            <option value="BSIS">BS Information Systems</option>
                        </optgroup>
                        <optgroup label="College of Medicine">
                            <option value="MD">Doctor of Medicine</option>
                            <option value="BSN">BS Nursing</option>
                            <option value="BSP">BS Pharmacy</option>
                        </optgroup>
                        <optgroup label="College of Education">
                            <option value="BEED">BS Elementary Education</option>
                            <option value="BSED">BS Secondary Education</option>
                        </optgroup>
                        <optgroup label="College of Business">
                            <option value="BSBA">BS Business Administration</option>
                            <option value="BSA">BS Accountancy</option>
                        </optgroup>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Year Level & Section -->
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label">
                            <i class="fa-solid fa-layer-group"></i> Year Level <span class="req">*</span>
                        </label>
                        <select class="form-select" name="year_level" required>
                            <option value="" disabled selected>Select year</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                            <option value="5th Year">5th Year</option>
                            <option value="Graduate">Graduate</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">
                            <i class="fa-solid fa-users"></i> Section <span class="req">*</span>
                        </label>
                        <input type="text" class="form-control" name="section" placeholder="e.g. 1, 2, 3" required>
                    </div>
                </div>

                <!-- ── Account Security ── -->
                <div class="section-divider"><span>Account Security</span></div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fa-solid fa-lock"></i> Password <span class="req">*</span>
                    </label>
                    <div class="password-wrapper">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Create a strong password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('password', this)">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    <!-- Strength indicator -->
                    <div class="strength-bar-wrap" id="strengthBars">
                        <div class="bar" id="bar1"></div>
                        <div class="bar" id="bar2"></div>
                        <div class="bar" id="bar3"></div>
                        <div class="bar" id="bar4"></div>
                    </div>
                    <div class="strength-label" id="strengthLabel">Enter a password</div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label class="form-label">Confirm Password <span class="req">*</span></label>
                    <div class="password-wrapper">
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Re-enter your password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('confirm_password', this)">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    <div class="strength-label" id="matchLabel"></div>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-create">Create Account</button>

            </form>

            <!-- Sign In -->
            <p class="signin-text">
                Already have an account? <a href="patient_login.php">Sign in</a>
            </p>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../javascript/register.js"></script>
</body>
</html>