<?php include '../../includes/header.php'; ?>

<div class="form-container">
    <h2>Iniciar Sesión</h2>
    
    <form id="loginForm">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" required>
        </div>

        <div id="errorMessage" class="error-message" style="display: none;"></div>
        
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('errorMessage');
    
    try {
        const data = await Auth.login(email, password);
        window.location.href = '/blog-frontend/index.php';
    } catch (error) {
        errorMessage.textContent = error.message;
        errorMessage.style.display = 'block';
    }
});
</script>

<?php include '../../includes/footer.php'; ?>