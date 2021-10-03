<div class="top-action-button">
            <?php if ((!isset($_COOKIE["login"]))) { ?>

                <!-- <button class="btn btn-primary login-button" href="javascript:;" data-toggle="modal" data-tarPOST="#loginModal" name="sign-up">Registruotis</button> -->
                <button class="btn btn-primary login-button " href="javascript:;" data-toggle="modal" data-target="#loginModal" name="sign-in">Prisijungti</button>
                <?php
                $display_default = "style='display: none;'";
                $display_constant = "";
                if (isset($_POST["sign_in"])) {
                    if (isset($_POST["login_username"]) && isset($_POST["login_password"]) && !empty($_POST["login_username"]) && !empty($_POST["login_password"])) {
                        $login_username = $_POST["login_username"];
                        $login_password = $_POST["login_password"];
                        $sql = "SELECT * FROM `user` WHERE `username`='$login_username' AND `password`= '$login_password'";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 1) {
                            $user_info = mysqli_fetch_array($result);
                            $cookie_array = array(
                                $user_info["ID"],
                                $user_info["username"],
                                $user_info["perks"]
                            );
                            $cookie_array = implode("|", $cookie_array);
                            setcookie("login", $cookie_array, time() + 3600, "/");
                            header("location:index.php");
                        } else {
                            $display = "";
                            $display_constant = 2;
                        }
                    } else {
                        $display = "";
                        $display_constant = 1;
                    }
                }

                if (isset($_POST["sign_up"])) {
                    
                    if (
                        isset($_POST["registration_username"]) && isset($_POST["registration_password"]) && isset($_POST["registration_repeat_password"]) && isset($_POST["registration_email"])
                        && !empty($_POST["registration_username"]) && !empty($_POST["registration_password"]) && !empty($_POST["registration_repeat_password"]) && !empty($_POST["registration_email"])
                    ) {
                        
                        $registration_username = $_POST["registration_username"];
                        $registration_password = $_POST["registration_password"];
                        $registration_repeat_password = $_POST["registration_repeat_password"];
                        $registration_email = $_POST["registration_email"];
                        $sql = "SELECT * FROM `user` WHERE `username`='$registration_username'";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 1) {
                            $display = "";
                            $display_constant = 3;
                        } else {
                            if ($registration_password == $registration_repeat_password) {
                                $sql="INSERT INTO `user`(`username`, `password`, `email`, `perks`) VALUES 
                                ('$registration_username' ,'$registration_password','$registration_email',0)";
                                if (mysqli_query($conn, $sql)) {
                                    $message="registration is successful";
                                    $message_status="done";
                                }
                                else{
                                    $display = "";
                                    $display_constant = 4;
                                }
                            } else {
                                $display = "";
                                $display_constant = 2;
                            }
                        }
                    } else {
                        $display = "";
                        $display_constant = 1;
                    }
                }
                ?>
            <?php } else { ?>
                <form action="index.php" method="post">
                    <button class="btn btn-primary login-button " name="log_out">Atsijungti</button>
                </form>
            <?php if (isset($_POST["log_out"])) {
                    setcookie("login", $cookie_array, time() - 3600, "/");
                    header("location:index.php");
                }
            } ?>

        </div>
        <?php if (isset($message)) { ?>
            <div class="alert alert-<?php echo $message_status; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php } ?>

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content login-modal">
                    <div class="modal-header login-modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="loginModalLabel">USER AUTHENTICATION</h4>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <div role="tabpanel" class="login-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home" role="tab" data-toggle="tab">Sign In </a></li>
                                    <li role="presentation"><a id="signup-taba" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Sign Up </a></li>
                                    <li role="presentation"><a id="forgetpass-taba" href="#forget_password" aria-controls="forget_password" role="tab" data-toggle="tab">Forget Password</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active text-center" id="home">
                                        &nbsp;&nbsp;
                                        <span id="login_fail" class="response_error" <?php if ($display_constant == 2) {
                                                                                            echo $display;
                                                                                        } else {
                                                                                            echo $display_default;
                                                                                        } ?>>Loggin failed, please try again.</span>
                                        <span id="login_fail" class="response_error" <?php if ($display_constant == 1) {
                                                                                            echo $display;
                                                                                        } else {
                                                                                            echo $display_default;
                                                                                        } ?>>Inputs is empty, please write username and password.</span>
                                        <div class="clearfix"></div>
                                        <form action="index.php" method="post">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                    <input type="text" class="form-control" id="login_username" placeholder="Username" name="login_username">
                                                </div>
                                                <span class="help-block has-error" id="email-error"></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                                    <input type="password" class="form-control" id="password" placeholder="Password" name="login_password">
                                                </div>
                                                <span class="help-block has-error" id="password-error"></span>
                                            </div>
                                            <button type="submit" name="sign_in" id="login_btn" class="btn btn-block bt-login" data-loading-text="Signing In....">Login</button>
                                            <div class="clearfix"></div>
                                            <div class="login-modal-footer">
                                                <div class="row">
                                                    <div class="col-xs-8 col-sm-8 col-md-8">
                                                        <i class="fa fa-lock"></i>
                                                        <a href="javascript:;" class="forgetpass-tab"> Forgot password? </a>

                                                    </div>

                                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <i class="fa fa-check"></i>
                                                        <a href="javascript:;" class="signup-tab"> Sign Up </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        &nbsp;&nbsp;
                                        <span id="registration_fail" class="response_error" <?php if ($display_constant == 1) {
                                                                                                echo $display;
                                                                                            } else {
                                                                                                echo $display_default;
                                                                                            } ?>>Inputs is empty.</span>
                                        <span id="registration_fail" class="response_error" <?php if ($display_constant == 2) {
                                                                                                echo $display;
                                                                                            } else {
                                                                                                echo $display_default;
                                                                                            }  ?>>Registration password not match.</span>
                                         <span id="registration_fail" class="response_error" <?php if ($display_constant == 3) {
                                                                                                echo $display;
                                                                                            } else {
                                                                                                echo $display_default;
                                                                                            } ?>>This username already exists.</span>
                                         <span id="registration_fail" class="response_error" <?php if ($display_constant == 4) {
                                                                                                echo $display;
                                                                                            } else {
                                                                                                echo $display_default;
                                                                                            } ?>>Registration failed, please try again.</span>                                                    
                                        <div class="clearfix"></div>
                                        <form action="index.php" method="post">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                    <input type="text" class="form-control" id="username" placeholder="Username" name="registration_username">
                                                </div>
                                                <span class="help-block has-error" data-error='0' id="username-error"></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                                    <input type="password" class="form-control" id="password" placeholder="password" name="registration_password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                                    <input type="password" class="form-control" id="password" placeholder="password" name="registration_repeat_password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-at"></i></div>
                                                    <input type="email" class="form-control" id="remail" placeholder="Email" name="registration_email">
                                                </div>
                                                <span class="help-block has-error" data-error='0' id="remail-error"></span>
                                            </div>
                                            <button type="submit" id="register_btn" class="btn btn-block bt-login" data-loading-text="Registering...." name="sign_up">Register</button>
                                            <div class="clearfix"></div>
                                            <div class="login-modal-footer">
                                                <div class="row">
                                                    <div class="col-xs-8 col-sm-8 col-md-8">
                                                        <i class="fa fa-lock"></i>
                                                        <a href="javascript:;" class="forgetpass-tab"> Forgot password? </a>

                                                    </div>

                                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <i class="fa fa-check"></i>
                                                        <a href="javascript:;" class="signin-tab"> Sign In </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane text-center" id="forget_password">
                                        &nbsp;&nbsp;
                                        <span id="reset_fail" class="response_error" style="display: none;"></span>
                                        <div class="clearfix"></div>
                                        <form>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                    <input type="text" class="form-control" id="femail" placeholder="Email">
                                                </div>
                                                <span class="help-block has-error" data-error='0' id="femail-error"></span>
                                            </div>

                                            <button type="button" id="reset_btn" class="btn btn-block bt-login" data-loading-text="Please wait....">Forget Password</button>
                                            <div class="clearfix"></div>
                                            <div class="login-modal-footer">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <i class="fa fa-lock"></i>
                                                        <a href="javascript:;" class="signin-tab"> Sign In </a>

                                                    </div>

                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <i class="fa fa-check"></i>
                                                        <a href="javascript:;" class="signup-tab"> Sign Up </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Pagrindinis</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            if (isset($_COOKIE["login"])) {
                $loginArray = explode("|", $_COOKIE["login"]);
                if ($loginArray[2] == 1) {
            ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="admin.php">Category setup<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="createMenu.php">Menu setup<span class="sr-only">(current)</span></a>
                    </li>
            <?php }
            } ?>
            <?php
            $sql = " SELECT  * FROM menu ";
            $result = $conn->query($sql);
            while ($menu = mysqli_fetch_array($result)) {
                $name = $menu["name"];
                $link = $menu["link"];
                $target = $menu["target"];
                $alt = ["alt"];
                echo " <li class='nav-item'>";
                echo "<a class='nav-link' href='$link' target='$target'>$name</a>";
                echo " </li>";
            }

            ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>