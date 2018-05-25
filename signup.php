<!DOCTYPE html>
<?php

    include_once('head.php');

?>
<html>
    <head>
        <style type="text/css">
            body > .grid {
                height: 100%;
            }
            .image {
                margin-top: -100px;
            }
            .column {
                max-width: 450px;
            }
        </style>
    </head>
    <body>
    <div class="ui grid">
        <div class="row">
        <div class="five wide column"></div>
            <div class="six wide column">
                <h2 class="ui center aligned header">
                <div class="content" style="margin: 30px auto;">
                    Welcome
                    <div class="sub header">Sign up here</div>
                </div>
                </h2>
                <div class="ui form segment">
                    <form method="post" action="check_login.php">
                        <div class="field">
                            <label>Username</label>
                            <input type="text" placeholder="Username" name="username" required="">
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input type="password" placeholder="Password" name="pass" required="">
                        </div>
                        <!--<div class="field">
                            <label>E-mail</label>
                            <input type="text" placeholder="E-mail" name="email" required="">
                        </div>-->
                        <div class="field">
                            <label>First name</label>
                            <input type="text" placeholder="First Name" name="first" required="">
                        </div>
                        <div class="field">
                            <label>Last name</label>
                            <input type="text" placeholder="Last Name" name="last" required="">
                        </div>
                        <div class="field" >
                            <label>Gender</label>
                            <select class="ui dropdown" name="gender" required>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                        </div>
                        <div class="field">
                            <label>Telephone number</label>
                            <input type="text" placeholder="Telephone number" name="tel" required="">
                        </div>
                        <div style="text-align: center;"><input type="submit" name="signup" class="ui green submit button" value="Signup"></div>
                    </form>
                    <div class="ui horizontal divider" style="margin: 40px 0;">
                        Or
                    </div>
                    <div style="text-align: center;">
                        <a  href="login.php" class="ui black large labeled icon button" >Login
                            <i class="signup icon"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="five wide column"></div>
        </div>
    </div>
    </body>
</html>
