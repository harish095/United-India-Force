<?php
    require_once 'include/php/connect.php';
    require_once 'UserClass.php';

    $className = "";
    if($pageName == "index.php") {
        global $className;
        $className = "index";
    } else if ($pageName == "desking.php") {
        global $className;
        $className = "desk";
    }

    if(!isset($_SESSION['curUser'])) {
        echo('
            <header class="' . $className . '">
                <div class="navbar">
                    <div class="navbar-only z-depth-1">
                        <div class="menu-button">
                            <i class="mdi-navigation-menu"></i>
                        </div>
                        <a href = "index.php">
                            <img src = "img/logos/uilogo.png" alt = "UI Logo" class="logo"/>
                            <p>UI</p>
                        </a>
                        <a class="modal-trigger right btn login-btn hide-on-small-and-down" href="#login">Login</a>
                        <div class="hide-on-med-and-up right">
                            <i class="mdi-navigation-more-vert dropdown-button" data-activates="navbar-dropdown"></i>
                            <ul id="navbar-dropdown" class="dropdown-content">
                                <li><a class="modal-trigger" href="#login">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="login" class="modal">
                        <div class="modal-content">
                            <i class="mdi-navigation-close"></i>
                            <div class="login-block">
                                <h2>Login</h2>
                                <form class="login-form" action="loginCheck.php" method="post">
                                    <div class="input-field">
                                        <i class="mdi-communication-email prefix"></i>
                                        <input type="text" name="email" id="loginEmail" class="validate"/>
                                        <label for="loginEmail">Email ID</label>
                                    </div>
                                    <div class="input-field">
                                        <i class="mdi-communication-vpn-key prefix"></i>
                                        <input type="password" name="password" id="loginPassword" class="validate"/>
                                        <label for="loginPassword">Password</label>
                                    </div>
                                    <div class="loadingButton">
                                        <input type="submit" class="btn-large" value="Login"/>
                                        <div class="preloader-wrapper small active">
                                            <div class="spinner-layer spinner-green-only">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="gap-patch">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="feedback"></p>
                                    </div>
                                </form>
                                <p>Don\'t have an account? <span>Sign Up</span> now!</p>
                            </div>
                            <div class="progress">
                              <div class="indeterminate"></div>
                            </div>
                            <div class="signup-block">
                            </div>
                        </div>
                    </div>
                </div>
        ');
    } else {
        $curUserId = $_SESSION['curUser'];
        $curUser = new User;
        $curUser->getUser($curUserId);
        echo('
            <header class="' . $className . '">
                <div class="navbar">
                    <div class="navbar-only z-depth-1">
                        <div class="menu-button">
                            <i class="mdi-navigation-menu"></i>
                        </div>
                        <a href = "index.php">
                            <img src = "img/logos/uilogo.png" alt = "UI Logo" class="logo"/>
                            <p>UI</p>
                        </a>
                        <div class="account right">
                            <i class="mdi-action-account-circle dropdown-button" data-activates="account-dropdown"></i>
                            <ul id="account-dropdown" class="dropdown-content">
                                <li class="name">' . $curUser->getName() . '</li>
                                <li class="divider"></li>
        ');
        if($pageName!="desking.php") {
            echo('
                                <li><a href="#" id="menuDashboard"><i class="mdi-action-dashboard"></i> Dashboard</a></li>

            ');
        }
        echo('
                                <li><a href="logout.php"><i class="mdi-action-exit-to-app"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        ');
    }

    if($GLOBALS['pageName'] === "index.php") {
        echo('
                <div class="menu">
                    <ul>
                        <li>
                            <a href="index.php" class="selected"><i class="mdi-action-home"></i> <span>Home</span></a>
                        </li>
                        <li>
                            <a href = "aboutus.php"><i class="mdi-action-assignment-ind"></i> <span>About Us</span></a>
                        </li>
                        <li>
                            <a href = "events.php"><i class="mdi-action-event"></i> <span>Events</span></a>
                        </li>
                        <li>
                            <a href = "gallery.php"><i class="mdi-image-photo-album"></i> <span>Gallery</span></a>
                        </li>
                        <li>
                            <a href = "clubs.php"><i class="mdi-action-group-work"></i> <span>Clubs</span></a>
                        </li>
                        <li>
                            <a href = "#contactUs" class="modal-trigger contactUsTrigger"><i class="mdi-communication-textsms"></i> <span>Contact Us</span></a>
                        </li>
                    </ul>
                </div>
            </header>
            <main class="z-depth-1-half ' . $className . '">
        ');
    } else if($GLOBALS['pageName'] === "desking.php") {
        echo('
                <div class="menu">
                    <ul>
                        <li>
                            <a href="index.php" class="selected"><i class="mdi-action-home"></i> <span>Home</span></a>
                        </li>
                        <li>
                            <a href = "aboutus.php"><i class="mdi-action-assignment-ind"></i> <span>About Us</span></a>
                        </li>
                        <li>
                            <a href = "events.php"><i class="mdi-action-event"></i> <span>Events</span></a>
                        </li>
                        <li>
                            <a href = "gallery.php"><i class="mdi-image-photo-album"></i> <span>Gallery</span></a>
                        </li>
                        <li>
                            <a href = "clubs.php"><i class="mdi-action-group-work"></i> <span>Clubs</span></a>
                        </li>
                        <li>
                            <a href = "#contactUs" class="modal-trigger contactUsTrigger"><i class="mdi-communication-textsms"></i> <span>Contact Us</span></a>
                        </li>
                    </ul>
                </div>
            </header>
            <main class="z-depth-1-half ' . $className . '">
        ');
    }