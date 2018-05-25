<?php

include_once('head.php');
include_once('config.php');
if (isset($_GET['out'])) {
    $_SESSION['login'] = FALSE;
    session_destroy();
    header('location:login.php');
}
?>

<html>
<style type="text/css">
    body {
        background-color: #FFFFFF;
    }
    .ui.menu .item img.logo {
        margin-right: 1.5em;
    }
    .main.container {
        margin-top: 7em;
    }
    .custom-input-file {
    overflow: hidden;
    position: relative;
    width: 120px;
    height: 120px;
    background: #eee url('https://semantic-ui.com/images/avatar2/large/patrick.png');    
    background-size: 120px;
    border-radius: 120px;
    }
    input[type="file"]{
        z-index: 999;
        line-height: 0;
        font-size: 0;
        position: absolute;
        opacity: 0;
        filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
        margin: 0;
        padding:0;
        left:0;
    }
    .uploadPhoto {
        position: absolute;
        top: 25%;
        left: 25%;
        display: none;
        width: 50%;
        height: 50%;
        color: #fff;    
        text-align: center;
        line-height: 60px;
        text-transform: uppercase;    
        background-color: rgba(0,0,0,.3);
        border-radius: 50px;
        cursor: pointer;
    }
    .custom-input-file:hover .uploadPhoto { display: block; }
</style>
<body>

    <div class="ui olive fixed inverted menu">
        <div class="ui container">
            <a href="index.php" class="header item">
                <img class="logo" src="https://cdn2.iconfinder.com/data/icons/tools-4/1000/watering_can-512.png">
                เศรษฐกิจพอเพียง
            </a>
            <?php
            if (isset($_SESSION['login'])) {
                $idu = $_SESSION['idu'];
                echo "<div class='ui simple dropdown item right'>".$_SESSION['first']."<i class='dropdown icon'></i>
                <div class='menu'>
                    <a href='add.php?' class='item'><i class='plus icon' ></i>Add</a>
                    <a href='edit_profile.php?id=$idu' class='item'><i class='user icon'></i>Edite Profile</a>
                    <a href='index.php?out=logout' class='item'><i class='sign out icon'></i>sign out</a>
                </div>
            </div>";    
        }else{
            echo "
            <div class='ui simple dropdown item right'>menu<i class='dropdown icon'></i>
                <div class='menu'>
                    <a href='login.php' class='item'><i class='sign in icon'></i>Sign in</a>
                    <a href='signup.php' class='item'><i class='add user icon'></i>Sign up</a>
                </div>
            </div>
            ";
        }
        ?>
        </div>
    </div>
    <?php
        $sql = "SELECT * FROM member WHERE idu = '".$_SESSION['idu']."'";
        $row = mysqli_query($conn,$sql);
        $result = mysqli_fetch_assoc($row);
        $first = $result['firstname'];
        $last = $result['lastname'];
        //$email = $result['email'];
        $username = $result['username'];
        $tel = $result['tel'];

    ?>
    <div class="ui main text container">
    <h1 class="ui header">Edit Your Profile</h1>
        <br>
        <form class="ui form" method="post" action="edit.php">
            <?php
                echo "<input type='hidden' id='userId' name='userId' value='".$idu."'>";
            ?>
            <table class="ui celled olive table">
                <tbody>
                    <tr>
                        <td>username</td>
                        <td>
                            <div class="ui mini input fluid">
                                <input type="text" name="username" value="<?php echo "$username";?>">
                            </div>
                        </td>
                    </tr>
                    <!--<tr>
                        <td>E-mail</td>
                        <td>
                            <div class="ui mini input fluid">
                                <input type="text" name="email" value="<?php echo "$email";?>">
                            </div>
                        </td>
                    </tr>-->
                    <tr>
                        <td>First Name</td>
                        <td>
                            <div class="ui mini input fluid">
                                <input type="text" name="first" value="<?php echo "$first";?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>
                            <div class="ui mini input fluid">
                                <input type="text" name="last" value="<?php echo "$last";?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Telephone Number</td>
                        <td>
                            <div class="ui mini input fluid">
                                <input type="text" name="tel" value="<?php echo "$tel";?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <select class="ui dropdown" required name="gender">
                                <option value="">Gender</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>  
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" name="submit" class="ui right floated medium primary icon button" value="Save">
        </form>
    </div>
</body>

               
