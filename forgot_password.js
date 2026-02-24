
        let currentStep = 1;
        let timerInterval = null;

      
        function goToStep(step) {
            // Hide current
            document.getElementById('step' + currentStep).classList.remove('active');

            // Update progress indicators
            for (let i = 1; i <= 4; i++) {
                const dot   = document.getElementById('dot' + i);
                const label = document.getElementById('label' + i);

                dot.className   = 'step-dot';
                label.className = 'step-label';

                if (i < step) {
                    dot.innerHTML  = '<i class="fa-solid fa-check" style="font-size:0.7rem;"></i>';
                    dot.classList.add('done');
                    label.classList.add('done');
                } else if (i === step) {
                    dot.innerHTML = getStepIcon(i);
                    dot.classList.add('active');
                    label.classList.add('active');
                } else {
                    dot.innerHTML = i;
                }

                // Lines between steps
                if (i <= 3) {
                    const line = document.getElementById('line' + i);
                    line.className = 'step-line';
                    if (i < step - 1) line.classList.add('done');
                    else if (i === step - 1) line.classList.add('active');
                }
            }

            currentStep = step;
            document.getElementById('step' + currentStep).classList.add('active');
        }

        function getStepIcon(step) {
            const icons = {
                1: '<i class="fa-regular fa-envelope" style="font-size:0.75rem;"></i>',
                2: '2',
                3: '3',
                4: '4'
            };
            return icons[step] || step;
        }

        // ── Step 1: Email Submit ─────────────────────────
        document.getElementById('step1Form').addEventListener('submit', function (e) {
            e.preventDefault();
            const email = document.getElementById('emailInput').value.trim();
            const errEl = document.getElementById('emailError');

            if (!email) {
                errEl.textContent = 'Please enter your email address.';
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                errEl.textContent = 'Please enter a valid email address.';
                return;
            }

            errEl.textContent = '';
            document.getElementById('emailDisplay').textContent = email;
            goToStep(2);
            startResendTimer();
        });

        // ── OTP Inputs ───────────────────────────────────
        const otpInputs = document.querySelectorAll('.otp-input');

        otpInputs.forEach((input, index) => {
            input.addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
                if (this.value.length === 1) {
                    this.classList.add('filled');
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                } else {
                    this.classList.remove('filled');
                }
            });

            input.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace' && !this.value && index > 0) {
                    otpInputs[index - 1].focus();
                    otpInputs[index - 1].classList.remove('filled');
                }
            });

            // Paste support
            input.addEventListener('paste', function (e) {
                e.preventDefault();
                const pasted = e.clipboardData.getData('text').replace(/[^0-9]/g, '');
                pasted.split('').forEach((char, i) => {
                    if (otpInputs[index + i]) {
                        otpInputs[index + i].value = char;
                        otpInputs[index + i].classList.add('filled');
                    }
                });
            });
        });

        // ── Resend Timer ─────────────────────────────────
        function startResendTimer() {
            clearInterval(timerInterval);
            let seconds = 60;
            const resendBtn  = document.getElementById('resendBtn');
            const timerWrap  = document.getElementById('timerWrap');
            const timerCount = document.getElementById('timerCount');

            resendBtn.disabled = true;
            timerWrap.style.display = '';

            timerInterval = setInterval(() => {
                seconds--;
                const m = String(Math.floor(seconds / 60)).padStart(2, '0');
                const s = String(seconds % 60).padStart(2, '0');
                timerCount.textContent = `${m}:${s}`;

                if (seconds <= 0) {
                    clearInterval(timerInterval);
                    resendBtn.disabled = false;
                    timerWrap.style.display = 'none';
                }
            }, 1000);
        }

        // ── Step 3: Password Strength ────────────────────
        const newPwd   = document.getElementById('newPassword');
        const confPwd  = document.getElementById('confirmNewPassword');
        const bars     = [
            document.getElementById('sbar1'),
            document.getElementById('sbar2'),
            document.getElementById('sbar3'),
            document.getElementById('sbar4'),
        ];
        const strengthLabel = document.getElementById('strengthLabel');

        const strengthColors = { 0:'#e5e7eb', 1:'#ef4444', 2:'#f97316', 3:'#eab308', 4:'#22c55e' };
        const strengthLabels = ['Enter a password', 'Weak', 'Fair', 'Good', 'Strong'];

        function getStrength(pwd) {
            let score = 0;
            if (pwd.length >= 8)          score++;
            if (/[A-Z]/.test(pwd))        score++;
            if (/[0-9]/.test(pwd))        score++;
            if (/[^A-Za-z0-9]/.test(pwd)) score++;
            return score;
        }

        function updateReq(id, passed) {
            const el = document.getElementById(id);
            if (passed) {
                el.innerHTML = el.innerHTML.replace('fa-regular fa-circle', 'fa-solid fa-circle-check');
                el.style.color = '#22c55e';
            } else {
                el.innerHTML = el.innerHTML.replace('fa-solid fa-circle-check', 'fa-regular fa-circle');
                el.style.color = '#6b7280';
            }
        }

        newPwd.addEventListener('input', function () {
            const val = this.value;
            const strength = val.length === 0 ? 0 : getStrength(val);

            bars.forEach((bar, i) => {
                bar.style.backgroundColor = i < strength ? strengthColors[strength] : '#e5e7eb';
            });

            strengthLabel.textContent  = strengthLabels[strength];
            strengthLabel.style.color  = strengthColors[strength];

            updateReq('req1', val.length >= 8);
            updateReq('req2', /[A-Z]/.test(val));
            updateReq('req3', /[0-9]/.test(val));
            updateReq('req4', /[^A-Za-z0-9]/.test(val));

            checkMatch();
        });

        function checkMatch() {
            const matchEl = document.getElementById('matchLabel');
            const p = newPwd.value;
            const c = confPwd.value;

            if (!c) { matchEl.textContent = ''; return; }

            if (p === c) {
                matchEl.textContent  = '✓ Passwords match';
                matchEl.style.color  = '#22c55e';
            } else {
                matchEl.textContent  = '✗ Passwords do not match';
                matchEl.style.color  = '#ef4444';
            }
        }

        confPwd.addEventListener('input', checkMatch);

        // ── Step 3 Submit ────────────────────────────────
        document.getElementById('step3Form').addEventListener('submit', function (e) {
            e.preventDefault();
            const p = newPwd.value;
            const c = confPwd.value;

            if (getStrength(p) < 2) {
                strengthLabel.textContent = 'Password is too weak.';
                strengthLabel.style.color = '#ef4444';
                return;
            }

            if (p !== c) {
                document.getElementById('matchLabel').textContent = '✗ Passwords do not match';
                document.getElementById('matchLabel').style.color = '#ef4444';
                return;
            }

            goToStep(4);
        });

        function togglePwd(fieldId, btn) {
            const field = document.getElementById(fieldId);
            const icon  = btn.querySelector('i');
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
