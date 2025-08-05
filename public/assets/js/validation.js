document.addEventListener('DOMContentLoaded', function() {
    const newPassword = document.getElementById('new_password');
    const confirmPassword = document.getElementById('new_password_confirmation');
    const passwordError = document.getElementById('password_match_error');
    const submitBtn = document.getElementById('submit_btn');
    const strengthBar = document.getElementById('password_strength');
    const strengthText = document.getElementById('password_strength_text');

    // Validar coincidencia de contraseñas en tiempo real
    function validatePasswordMatch() {
        if (confirmPassword.value && newPassword.value !== confirmPassword.value) {
            passwordError.style.display = 'block';
            confirmPassword.classList.add('is-invalid');
            submitBtn.disabled = true;
            return false;
        } else {
            passwordError.style.display = 'none';
            confirmPassword.classList.remove('is-invalid');
            submitBtn.disabled = false;
            return true;
        }
    }

    // Validar fortaleza de contraseña
    function checkPasswordStrength(password) {
        let strength = 0;
        let feedback = '';

        if (password.length >= 8) strength += 20;
        if (/[a-z]/.test(password)) strength += 20;
        if (/[A-Z]/.test(password)) strength += 20;
        if (/[0-9]/.test(password)) strength += 20;
        if (/[^A-Za-z0-9]/.test(password)) strength += 20;

        strengthBar.style.width = strength + '%';
        
        if (strength < 40) {
            strengthBar.className = 'progress-bar bg-danger';
            feedback = 'Muy débil';
        } else if (strength < 60) {
            strengthBar.className = 'progress-bar bg-warning';
            feedback = 'Débil';
        } else if (strength < 80) {
            strengthBar.className = 'progress-bar bg-info';
            feedback = 'Moderada';
        } else {
            strengthBar.className = 'progress-bar bg-success';
            feedback = 'Fuerte';
        }

        strengthText.textContent = feedback;
    }

    // Event listeners
    newPassword.addEventListener('input', function() {
        checkPasswordStrength(this.value);
        validatePasswordMatch();
    });

    confirmPassword.addEventListener('input', validatePasswordMatch);

    // Prevenir envío si las contraseñas no coinciden
    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
        if (!validatePasswordMatch()) {
            e.preventDefault();
            alert('Por favor, asegúrate de que las contraseñas coincidan.');
        }
    });
});

// Función para mostrar/ocultar contraseñas
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(fieldId + '_icon');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.className = 'mdi mdi-eye-off';
    } else {
        field.type = 'password';
        icon.className = 'mdi mdi-eye';
    }
}