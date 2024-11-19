<?php 
include '../../includes/header.php';
requireAuth(); // Verifica que el usuario esté autenticado
?>

<div class="form-container">
    <h2>Crear Nuevo Post</h2>
    
    <form id="createPostForm">
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" required>
        </div>
        
        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea class="form-control" id="content" rows="6" required></textarea>
        </div>

        <div id="errorMessage" class="error-message" style="display: none;"></div>
        
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</div>

<script>
document.getElementById('createPostForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;
    const errorMessage = document.getElementById('errorMessage');
    
    try {
        await PostService.createPost(title, content);
        window.location.href = '/../../index.php';
    } catch (error) {
        errorMessage.textContent = error.message;
        errorMessage.style.display = 'block';
    }
});
</script>

<?php include '../../includes/footer.php'; ?>