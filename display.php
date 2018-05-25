<?php

    include_once('head.php');
    include_once('config.php');
    if (isset($_GET['out'])) {
        $_SESSION['login'] = FALSE;
        session_destroy();
        header('location:login.php');
    }
    $id = $_GET['id'];
?>
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
    <script>

    function commentSubmit(){
        if(form1.comments.value == ''){ //exit if one of the field is blank
            alert('Enter your message!');
            return;
        }
        else{
            form1.send_bt.type = "submit";
        }
        /*var name = form1.name.value;
        var comments = form1.comments.value;
        var xmlhttp = new XMLHttpRequest(); //http request instance
        
        xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
            if(xmlhttp.readyState==4&&xmlhttp.status==200){
                document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
            }
        }
        xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments, true); //open and send http request
        xmlhttp.send();*/
    }
    
        $(document).ready(function(e) {
            $.ajaxSetup({cache:false});
            setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
        });
        
    </script>
<html>
    <style type="text/css">
        body {
            background-color: #FFFFFF;
        }
        .ui.menu .item img.logo {
            margin-right: 1.5em;
        }
        .main.container {
            margin-top: 4em;
            width: 80%;
        }
    </style>
<body>
    <div name='body' class="ui olive fixed inverted menu">
        <div class="ui container" style="width:80%;">
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

    <div class="ui main  container">
        <h1 class="ui header"></h1>
        <div class="ui olive raised segment">
            <?php
                $sql = "SELECT * FROM topcontent,topic,member WHERE member.idu = topcontent.idu and topcontent.id_top = topic.id_top and topcontent.id_top = $id";
                //echo "$sql";
                $row = mysqli_query($conn,$sql);
                $result = mysqli_fetch_assoc($row);
                echo "<h1><b>".$result['topicname']."</b></h1><br>";

                echo $result['content'];
                // while ($result = mysqli_fetch_assoc($row)) {
                //     echo "
                //         ".$result['content']."
                //     ";
                //   }
            ?>
        </div>
    </div>

    <div class="ui main  container">
        <div class="col-lg-20 col-md-20 col-sm-20 col-xs-20">
            <table class="ui olive striped raised segment table">
                <thead >
                    <tr >
                        <th colspan="2"><h1 ><b>Comment</b></h1>
                    <div class='ui form segment'>
                        <form name="form1" method="POST" action="insert_cm.php">
                        <div class="ui message" style="width:300px;">
                            <div class="ui left icon">
                                <i class="user icon"></i>
                                <?php
                                    echo "<input type='hidden' name='id_con' value='$id'>";
                                    if (isset($_SESSION['login'])) {
                                        $idu = $_SESSION['idu'];
                                        echo "<input type='hidden' name='idu' value='$idu'>";
                                        $userquery = "SELECT * FROM member WHERE idu = $idu";
                                        $userresult = mysqli_query($conn, $userquery);
                                        $row = mysqli_fetch_assoc($userresult);
                                        echo $row['firstname']."   ".$row['lastname'];
                                        echo "
                                                </div>
                                            </div>";
                                        echo "<input type='hidden' name='idu' value='$idu'>
                                            <div class='field'>
                                                <textarea name='comments' placeholder='ใส่ความคิดเห็นของคุณที่นี่...' style='height:100px;'></textarea>
                                            </div>
                                            <input name='send_bt' type='button' onClick='commentSubmit()' class='ui green submit button' value='ส่ง'>
                                            ";
                                    }else{
                                        echo "ไม่ได้ลงชื่อเข้าใช้";
                                        echo "
                                                </div>
                                            </div>
                                            <div class='ui message'>
                                                <div style='height:100px;'><br><br>กรุณาเข้าสู้ระบบก่อนแสดงความคิดเห็น...</div>
                                            </div>";
                                            echo "
                                            <script>
                                            function show_msg(){
                                            alert('กรุณาเข้าสู้ระบบ!!');
                                            }
                                            </script>";
                                            echo "
                                            <a onClick='show_msg();' class='ui black button'>ส่ง</a>
                                            ";
                                    }  
                                ?>
                        </form>
                    </div>
                        </th>
                     </tr>
                </thead >
                <tbody>
                <?php
                    $result = mysqli_query($conn, "SELECT * FROM comments, member WHERE comments.idu = member.idu AND comments.id_con = $id ORDER BY comments.id_com ASC");
                    while ($result4 = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                    <td>";
                    echo "<h3>" . $result4['firstname'] . "   " .$result4['lastname']. "</h3>";
                    echo "<div class='ui form segment'><h4>" . $result4['comments'] . "</h4></div>";
                    echo "<a>" . $result4['date_publish'] . "<a>";
                    echo "</td>
                    </tr>
                    ";
                    }
                    mysqli_close($conn);
                ?>       
                <!--Denbver-->
                </tbody>
            </table>
        </div>
       </div>
    </div>
    
    <br>
    <br>
</body>

</html>

