<?php
session_start();
session_destroy();
header('Location: /blog-frontend/index.php');
exit();