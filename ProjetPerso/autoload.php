<?php

require "./services/Router.php";

require "./controllers/AbstractController.php";

require "./controllers/AdminController.php";
require "./controllers/PageController.php";
require "./controllers/StaffController.php";
require "./controllers/ArticleController.php";
require "./controllers/MediaController.php";
require "./controllers/TeamController.php";

require "./managers/AbstractManager.php";

require "./managers/AdminManager.php";
require "./managers/CategoryManager.php";
require "./managers/PlayerManager.php";
require "./managers/StaffManager.php";
require "./managers/MediaManager.php";
require "./managers/TeamManager.php";

require "./models/Admin.php";
require "./models/Player.php";
require "./models/Media.php";
require "./models/Staff.php";
require "./models/Team.php";