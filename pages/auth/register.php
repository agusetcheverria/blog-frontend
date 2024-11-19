<?php include '../../includes/header.php'; ?>

<div class="form-container">
    <h2>Registro</h2>
    
    <form id="registerForm">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" required>
        </div>

        <div id="errorMessage" class="error-message" style="display: none;"></div>
        
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>

<script>
document.getElementById('registerForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('errorMessage');
    
    try {
        await Auth.register(name, email, password);
        window.location.href = '/blog-frontend/pages/auth/login.php';
    } catch (error) {
        errorMessage.textContent = error.message;
        errorMessage.style.display = 'block';
    }
});
</script>

<?php include '../../includes/footer.php'; ?>