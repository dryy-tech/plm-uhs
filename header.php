<!DOCTYPE html>

<header id="main-header">
    <!-- ── MAIN NAVBAR ── -->
    <nav class="navbar navbar-expand-lg" id="mainNav">
        <div class="container">

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

            <!-- Hamburger -->
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Nav Links -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-1">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php#main-content">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#services-section">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#feature-section">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#why-us-section">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contact-section">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="patient_login.php" class="btn-login">
                            <i class="fa-solid fa-right-to-bracket me-1"></i> Login
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <!-- ── GOLD ACCENT LINE ── -->
    <div id="gold-line"></div>

</header>