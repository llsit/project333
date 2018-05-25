<!DOCTYPE html>

<html>
    <head>
        <title>Login Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js">
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
        <div class="ui olive fixed inverted menu">
        <div class="ui container">
            <a href="index.php" class="header item">
            <img class="logo" src="https://cdn2.iconfinder.com/data/icons/tools-4/1000/watering_can-512.png">
                เศรษฐกิจพอเพียง
            </a>
        </div>
    </div>
        <div class="ui middle aligned center aligned grid">
            <div class="column">
                <h2 class="ui teal image header">
                    <div class="content">
                        Login to your account
                    </div>
                </h2>
                <form class="ui large form" method="post" action="check_login.php">
                    <div class="ui stacked segment">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="pass" placeholder="Password" required>
                            </div>
                        </div>
                        <div><input type="submit" name="login" class="ui fluid large teal submit button" value="Login"></div>
                    </form>
                    </div>
                <div class="ui message">
                    New to us? <a href="signup.php">Sign Up</a>
                </div>
            </div>
        </div>
    </body>
</html>
