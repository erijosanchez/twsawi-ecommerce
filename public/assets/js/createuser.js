document.addEventListener('DOMContentLoaded', function() {
    // Elementos del DOM
    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('password_confirmation');
    const togglePassword = document.getElementById('togglePassword');
    const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');
    const roleSelect = document.getElementById('role');
    const roleInfo = document.getElementById('roleInfo');
    const roleDescription = document.getElementById('roleDescription');
    const passwordError = document.getElementById('passwordError');
    const submitBtn = document.getElementById('submitBtn');

    // Información de roles
    const roleDescriptions = {
        'super_admin': 'Acceso completo al sistema. Puede gestionar usuarios, configuraciones y todas las funcionalidades administrativas.',
        'admin': 'Puede gestionar productos, pedidos, inventario y generar reportes. No puede gestionar otros usuarios ni configuraciones del sistema.',
        'customer': 'Usuario final con acceso a funciones de compra, perfil personal y historial de pedidos.'
    };

    // Toggle visibilidad de contraseñas
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            togglePasswordVisibility(passwordInput, this);
        });
    }

    if (togglePasswordConfirm) {
        togglePasswordConfirm.addEventListener('click', function() {
            togglePasswordVisibility(passwordConfirmInput, this);
        });
    }

    // Verificador de fortaleza de contraseña
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            checkPasswordStrength(this.value);
            validatePasswordMatch();
        });
    }

    // Verificar coincidencia de contraseñas
    if (passwordConfirmInput) {
        passwordConfirmInput.addEventListener('input', validatePasswordMatch);
    }

    // Mostrar información del rol
    if (roleSelect) {
        roleSelect.addEventListener('change', function() {
            showRoleInfo(this.value);
        });
    }

    // Validación en tiempo real del formulario
    const form = document.getElementById('userForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault();
            }
        });
    }

    // Función para toggle de visibilidad de contraseña
    function togglePasswordVisibility(input, button) {
        const icon = button.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    // Verificador de fortaleza de contraseña
    function checkPasswordStrength(password) {
        let strength = 0;
        let strengthLabel = 'Muy débil';
        let strengthColor = 'bg-danger';

        if (password.length >= 8) strength += 1;
        if (/[a-z]/.test(password)) strength += 1;
        if (/[A-Z]/.test(password)) strength += 1;
        if (/\d/.test(password)) strength += 1;
        if (/[@$!%*?&]/.test(password)) strength += 1;

        switch (strength) {
            case 0:
            case 1:
                strengthLabel = 'Muy débil';
                strengthColor = 'bg-danger';
                break;
            case 2:
                strengthLabel = 'Débil';
                strengthColor = 'bg-warning';
                break;
            case 3:
                strengthLabel = 'Regular';
                strengthColor = 'bg-info';
                break;
            case 4:
                strengthLabel = 'Buena';
                strengthColor = 'bg-primary';
                break;
            case 5:
                strengthLabel = 'Excelente';
                strengthColor = 'bg-success';
                break;
        }

        const percentage = (strength / 5) * 100;
        
        if (strengthBar) {
            strengthBar.style.width = percentage + '%';
            strengthBar.className = `progress-bar ${strengthColor}`;
        }
        
        if (strengthText) {
            strengthText.textContent = strengthLabel;
        }
    }

    // Validar coincidencia de contraseñas
    function validatePasswordMatch() {
        const password = passwordInput.value;
        const passwordConfirm = passwordConfirmInput.value;
        
        if (passwordConfirm && password !== passwordConfirm) {
            passwordConfirmInput.classList.add('is-invalid');
            if (passwordError) {
                passwordError.style.display = 'block';
            }
            return false;
        } else {
            passwordConfirmInput.classList.remove('is-invalid');
            if (passwordError) {
                passwordError.style.display = 'none';
            }
            return true;
        }
    }

    // Mostrar información del rol
    function showRoleInfo(role) {
        if (role && roleDescriptions[role]) {
            roleDescription.textContent = roleDescriptions[role];
            roleInfo.style.display = 'block';
        } else {
            roleInfo.style.display = 'none';
        }
    }

    // Validación completa del formulario
    function validateForm() {
        let isValid = true;
        const requiredFields = ['name', 'email', 'password', 'password_confirmation', 'role'];
        
        // Limpiar errores previos
        document.querySelectorAll('.is-invalid').forEach(field => {
            field.classList.remove('is-invalid');
        });

        // Validar campos requeridos
        requiredFields.forEach(fieldName => {
            const field = document.getElementById(fieldName);
            if (field && !field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            }
        });

        // Validar email
        const emailField = document.getElementById('email');
        if (emailField && emailField.value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailField.value)) {
                emailField.classList.add('is-invalid');
                isValid = false;
            }
        }

        // Validar contraseña
        const password = passwordInput.value;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/;
        if (password.length < 8 || !passwordRegex.test(password)) {
            passwordInput.classList.add('is-invalid');
            isValid = false;
        }

        // Validar coincidencia de contraseñas
        if (!validatePasswordMatch()) {
            isValid = false;
        }

        // Cambiar estado del botón de envío
        if (submitBtn) {
            submitBtn.disabled = !isValid;
        }

        return isValid;
    }

    // Formatear número de teléfono (opcional)
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            // Aquí puedes agregar formato automático para el teléfono
            let value = this.value.replace(/\D/g, ''); // Solo números
            if (value.startsWith('51')) {
                value = '+' + value;
            } else if (value.length > 0 && !value.startsWith('+')) {
                value = '+51' + value;
            }
            // Limitar longitud
            if (value.length > 13) {
                value = value.substring(0, 13);
            }
            this.value = value;
        });
    }

    // Validación en tiempo real mientras escribe
    const inputs = document.querySelectorAll('input[required], select[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });

        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid') && this.value.trim() !== '') {
                this.classList.remove('is-invalid');
            }
        });
    });
});