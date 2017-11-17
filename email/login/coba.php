<?php
        include "./sasroundcubelogin.php";    
    	
         Create login object and enable debugging
        $rcl = new RoundcubeLogin("/", strue);
    
        try {
            // If we are already logged in, simply redirect
            if ($rcl->isLoggedIn())
                $rcl->redirect();
    
            // If not, try to login and simply redirect on success
            $rcl->login("andyepso@gmail.com", "sugiantosoeoenbentar");
    
            if ($rcl->isLoggedIn())
                $rcl->redirect();
    
            // If the login fails, display an error message
            die("ERROR: Login failed due to a wrong user/pass combination.");
        }
        catch (RoundcubeLoginException $ex) {
            echo "ERROR: Technical problem, ".$ex->getMessage();
            $rcl->dumpDebugStack(); exit;
        }
    
    ?>  