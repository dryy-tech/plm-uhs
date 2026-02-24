<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UHS - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/patient_login.css">
    <script src="https://kit.fontawesome.com/7d9cda96f6.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Back to Home -->
    <a href="index.php" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> Back to Home
    </a>

    <div class="login-wrapper">
        <div class="login-card">

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
            <h1 class="login-title">Welcome Back</h1>
            <p class="login-subtitle">Sign in to manage your appointments</p>


            <!-- Form -->
            <form method="POST" action="">

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="fa-regular fa-envelope"></i> Email Address
                    </label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                        required
                        autocomplete="email"
                    >
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">
                        <i class="fa-solid fa-lock"></i> Password
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                        autocomplete="current-password"
                    >
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="remember"
                            name="remember"
                            <?= isset($_POST['remember']) ? 'checked' : '' ?>
                        >
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                    <a href="forgot_password.php" class="forgot-link">Forgot password?</a>
                </div>

          
                <button type="submit" class="btn-signin">Sign In</button>

            </form>

 
            <p class="signup-text">
                Don't have an account? <a href="register.php">Sign up</a>
            </p>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>