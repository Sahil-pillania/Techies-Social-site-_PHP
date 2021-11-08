<?php
     session_start();
     echo "Logging you out please wait...";
     session_destroy();
     header("Location: /techies/index.php?logout=logged_out");


?>