  // Toggle password visibility
        function togglePassword(fieldId, btn) {
            const field = document.getElementById(fieldId);
            const icon = btn.querySelector('i');
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Password strength meter
        const passwordInput = document.getElementById('password');
        const bars = [
            document.getElementById('bar1'),
            document.getElementById('bar2'),
            document.getElementById('bar3'),
            document.getElementById('bar4'),
        ];
        const strengthLabel = document.getElementById('strengthLabel');

        const colors = {
            0: '#e5e7eb',
            1: '#ef4444',
            2: '#f97316',
            3: '#eab308',
            4: '#22c55e',
        };

        const labels = ['Enter a password', 'Weak', 'Fair', 'Good', 'Strong'];

        function getStrength(password) {
            let score = 0;
            if (password.length >= 8)  score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;
            return score;
        }

        passwordInput.addEventListener('input', function () {
            const val = this.value;
            const strength = val.length === 0 ? 0 : getStrength(val);

            bars.forEach((bar, i) => {
                bar.style.backgroundColor = i < strength ? colors[strength] : '#e5e7eb';
            });

            strengthLabel.textContent = labels[strength];
            strengthLabel.style.color = strength === 0 ? '#9ca3af' : colors[strength];

            checkMatch();
        });

        // Password match checker
        const confirmInput = document.getElementById('confirm_password');
        const matchLabel = document.getElementById('matchLabel');

        function checkMatch() {
            const pwd = passwordInput.value;
            const conf = confirmInput.value;
            if (conf.length === 0) {
                matchLabel.textContent = '';
                return;
            }
            if (pwd === conf) {
                matchLabel.textContent = 'Passwords match';
                matchLabel.style.color = '#22c55e';
            } else {
                matchLabel.textContent = 'asswords do not match';
                matchLabel.style.color = '#ef4444';
            }
        }

        confirmInput.addEventListener('input', checkMatch);