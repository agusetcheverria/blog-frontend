<?php include 'includes/header.php'; ?>

<div class="jumbotron">
    <h1 class="display-4">Blog :)</h1>
    <p class="lead">Ver posts o postear.</p>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php if (!isAuthenticated()): ?>
        <a class="btn btn-primary btn-lg" href="pages/auth/login.php" role="button">Iniciar Sesión</a>
    <?php endif; ?>
</div>

<div id="posts-container"></div>

<script>
document.addEventListener('DOMContentLoaded', async () => {
    try {
        const posts = await PostService.getPosts();
        const container = document.getElementById('posts-container');
        
        posts.data.forEach(post => {
            container.innerHTML += `
                <div class="card post-card">
                    <div class="card-body">
                        <h5 class="card-title">${post.title}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Por: ${post.author_id}</h6>
                        <p class="card-text">${post.content}</p>
                        <div class="text-muted">${new Date(post.created_at).toLocaleDateString()}</div>
                    </div>
                </div>
            `;
        });
    } catch (error) {
        console.error('Error:', error);
    }
});
</script>

<?php include 'includes/footer.php'; ?>