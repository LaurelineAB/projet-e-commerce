<?php

session_start();

require "models/User.php";
require "models/Category.php";
require "models/Media.php";
require "models/Product.php";
require "models/Order.php";

require_once "managers/AbstractManager.php";
require_once "managers/UserManager.php";
require_once "managers/CategoryManager.php";
require_once "managers/MediaManager.php";
require_once "managers/ProductManager.php";
require_once "managers/OrderManager.php";

require_once "controllers/AbstractController.php";
require_once "controllers/UserController.php";
require_once "controllers/CategoryController.php";
require_once "controllers/MediaController.php";
require_once "controllers/ProductController.php";
require_once "controllers/OrderController.php";

require "services/router.php";
$router = new Router();
$router->checkRoute();

?>