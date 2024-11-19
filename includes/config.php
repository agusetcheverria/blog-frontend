<?php
session_start();

// URLs de las APIs
define('API_USERS', 'http://localhost:8000/api');
define('API_POSTS', 'http://localhost:8001/api');

// Función para verificar si el usuario está autenticado
function isAuthenticated() {
    return isset($_SESSION['token']);
}

// Función para redirigir si no está autenticado
function requireAuth() {
    if (!isAuthenticated()) {
        header('Location: /blog-frontend/pages/auth/login.php');
        exit();
    }
}