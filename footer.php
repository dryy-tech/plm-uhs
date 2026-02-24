
<footer id="main-footer">
    <div class="container">

        <div class="row gy-4">

            <!-- Brand — same style as header -->
            <div id="footer-logo-section" class="col-12 col-lg-6">
                <div class="d-flex align-items-center gap-3 mb-3">

                    <!-- Circular seal matching header -->
                    <div id="footer-seal">
                        <img src="../../images/uhs-logo.png" alt="UHS Seal"
                             onerror="this.style.display='none'; document.getElementById('seal-text').style.display='flex';">
                        <span id="seal-text" style="display:none;">UHS</span>
                    </div>

                    <!-- Stacked brand text matching header -->
                    <div id="footer-brand-text">
                        <div id="footer-name">University Health Services</div>
                        <div id="footer-sub">Pamantasan ng Lungsod ng Maynila</div>
                    </div>

                </div>

                <p class="text-secondary small">
                    Providing comprehensive medical and dental care for the university community with excellence and compassion, ensuring that every student, faculty member, and staff receives accessible, reliable, and patient-centered healthcare services.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-6 col-lg-3">
                <h5 class="fw-semibold mb-3">Quick Links</h5>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="#main-content"     class="footer-link">Home</a></li>
                    <li><a href="#services-section" class="footer-link">Services</a></li>
                    <li><a href="#why-us-section"   class="footer-link">About</a></li>
                    <li><a href="#contact-section"  class="footer-link">Contact</a></li>
                    <li><a href="login.php"         class="footer-link">Patient Portal</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-6 col-lg-3">
                <h5 class="fw-semibold mb-3">Services</h5>
                <ul class="list-unstyled d-flex flex-column gap-2 text-secondary small">
                    <li>Medical Consultation</li>
                    <li>Physical Examination</li>
                    <li>Dental Services</li>
                    <li>Emergency Care</li>
                </ul>
            </div>

        </div>


        <p class="text-center text-secondary small mb-0">
            &copy; <?= date('Y') ?> Pamantasan ng Lungsod ng Maynila, University Health Services. All rights reserved.
        </p>

    </div>
</footer>