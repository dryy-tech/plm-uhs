<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UHS - Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/forgot_password.css">
    <script src="https://kit.fontawesome.com/7d9cda96f6.js" crossorigin="anonymous"></script>
    <style>
       
    </style>
</head>
<body>

    <a href="patient_login.php" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> Back to Login
    </a>

    <div class="page-wrapper">
        <div class="card-box">

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


            <div class="steps-wrap">
                <div class="step-item">
                    <div class="step-dot active" id="dot1"><i class="fa-regular fa-envelope" style="font-size:0.75rem;"></i></div>
                    <div class="step-label active" id="label1">Email</div>
                </div>
                <div class="step-line" id="line1"></div>
                <div class="step-item">
                    <div class="step-dot" id="dot2">2</div>
                    <div class="step-label" id="label2">Verify</div>
                </div>
                <div class="step-line" id="line2"></div>
                <div class="step-item">
                    <div class="step-dot" id="dot3">3</div>
                    <div class="step-label" id="label3">Reset</div>
                </div>
                <div class="step-line" id="line3"></div>
                <div class="step-item">
                    <div class="step-dot" id="dot4">4</div>
                    <div class="step-label" id="label4">Done</div>
                </div>
            </div>

            <div class="step-panel active" id="step1">
                <div class="step-icon-wrap blue">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <h1 class="page-title">Forgot Password?</h1>
                <p class="page-subtitle">No worries! Enter your registered email address and we'll send you a verification code to reset your password.</p>

                <div class="info-box">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Make sure to use the email address linked to your UHS account.</span>
                </div>

                <form id="step1Form" novalidate>
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fa-regular fa-envelope"></i> Email Address
                        </label>
                        <input
                            type="email"
                            class="form-control"
                            id="emailInput"
                            placeholder="you@example.com"
                            required
                            autocomplete="email"
                        >
                        <div class="strength-label" id="emailError" style="color:#ef4444; margin-top:4px;"></div>
                    </div>

                    <button type="submit" class="btn-primary-full">
                        <i class="fa-regular fa-paper-plane me-2"></i> Send Verification Code
                    </button>
                </form>

                <p class="back-login">
                    Remember your password? <a href="patient_login.php">Sign in</a>
                </p>
            </div>


            <div class="step-panel" id="step2">
                <div class="step-icon-wrap blue">
                    <i class="fa-regular fa-envelope-open"></i>
                </div>
                <h1 class="page-title">Check Your Email</h1>
                <p class="page-subtitle">
                    We sent a 6-digit verification code to<br>
                    <strong id="emailDisplay">your@email.com</strong>
                </p>

                <div class="mb-4">
                    <label class="form-label d-block text-center mb-3">Enter Verification Code</label>
                    <div class="otp-group">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                    </div>
                    <div class="strength-label text-center" id="otpError" style="color:#ef4444;"></div>
                </div>

                <button class="btn-primary-full" id="verifyBtn" onclick="goToStep(3)">
                    <i class="fa-solid fa-shield-halved me-2"></i> Verify Code
                </button>

                <div class="resend-wrap mt-3">
                    Didn't receive it?
                    <button id="resendBtn" disabled onclick="startResendTimer()">
                        Resend code
                    </button>
                    <span id="timerWrap"> in <span class="timer" id="timerCount">01:00</span></span>
                </div>

                <p class="back-login mt-3">
                    Wrong email? <a href="#" onclick="goToStep(1); return false;">Go back</a>
                </p>
            </div>

         
            <div class="step-panel" id="step3">
                <div class="step-icon-wrap blue">
                    <i class="fa-solid fa-key"></i>
                </div>
                <h1 class="page-title">Reset Password</h1>
                <p class="page-subtitle">Create a new strong password for your account. Make sure it's at least 8 characters.</p>

                <form id="step3Form" novalidate>

                    <!-- New Password -->
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fa-solid fa-lock"></i> New Password
                        </label>
                        <div class="password-wrapper">
                            <input
                                type="password"
                                class="form-control"
                                id="newPassword"
                                placeholder="Create a strong password"
                                required
                            >
                            <button type="button" class="toggle-password" onclick="togglePwd('newPassword', this)">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                        <div class="strength-bar-wrap" id="strengthBars">
                            <div class="bar" id="sbar1"></div>
                            <div class="bar" id="sbar2"></div>
                            <div class="bar" id="sbar3"></div>
                            <div class="bar" id="sbar4"></div>
                        </div>
                        <div class="strength-label" id="strengthLabel">Enter a password</div>
                    </div>

        
                    <div class="mb-4">
                        <label class="form-label">Confirm New Password</label>
                        <div class="password-wrapper">
                            <input
                                type="password"
                                class="form-control"
                                id="confirmNewPassword"
                                placeholder="Re-enter your password"
                                required
                            >
                            <button type="button" class="toggle-password" onclick="togglePwd('confirmNewPassword', this)">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                        <div class="match-label" id="matchLabel"></div>
                    </div>

  
                    <div class="info-box mb-4" style="flex-direction: column; gap: 6px;">
                        <div style="font-weight:600; margin-bottom:4px; color:#1e40af;">
                            <i class="fa-solid fa-circle-info me-1"></i> Password Requirements
                        </div>
                        <div id="req1" class="req-item" style="font-size:0.82rem; color:#6b7280;"><i class="fa-regular fa-circle me-1"></i> At least 8 characters</div>
                        <div id="req2" class="req-item" style="font-size:0.82rem; color:#6b7280;"><i class="fa-regular fa-circle me-1"></i> One uppercase letter (A-Z)</div>
                        <div id="req3" class="req-item" style="font-size:0.82rem; color:#6b7280;"><i class="fa-regular fa-circle me-1"></i> One number (0-9)</div>
                        <div id="req4" class="req-item" style="font-size:0.82rem; color:#6b7280;"><i class="fa-regular fa-circle me-1"></i> One special character (!@#$%)</div>
                    </div>

                    <button type="submit" class="btn-primary-full">
                        <i class="fa-solid fa-rotate me-2"></i> Reset Password
                    </button>
                </form>
            </div>


            <div class="step-panel" id="step4">
                <div class="step-icon-wrap green">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <h1 class="page-title">Password Reset!</h1>
                <p class="page-subtitle">Your password has been successfully reset. You can now sign in with your new password.</p>

                <div class="success-box">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span>For your security, all other active sessions have been logged out.</span>
                </div>

                <a href="patient_login.php" class="btn-primary-full d-block text-center text-decoration-none" style="line-height:1;">
                    <i class="fa-solid fa-right-to-bracket me-2"></i> Back to Sign In
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../javascript/forgot_password.js"></script>

</body>
</html>