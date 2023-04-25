<?php

// MODELS
require "./models/Admin.php";
require "./models/Player.php";
require "./models/Post.php";
require "./models/Staff.php";
require "./models/Team.php";
require "./models/Category.php";


// MANAGERS

require "./managers/AbstractManager.php";
require "./managers/AdminManager.php";
require "./managers/ArticleManager.php";
require "./managers/CategoryManager.php";
require "./managers/PlayerManager.php";
require "./managers/StaffManager.php";
require "./managers/TeamManager.php";

// CONTROLLERS
require "./controllers/AbstractController.php";
require "./controllers/AdminController.php";
require "./controllers/PageController.php";
require "./controllers/StaffController.php";
require "./controllers/ArticleController.php";
require "./controllers/TeamController.php";
require "./controllers/CategoryController.php";


require "./services/Router.php";