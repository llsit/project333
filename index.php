<?php 
    include_once("head.php");
    include_once('config.php');
    if (isset($_GET['out'])) {
        $_SESSION['login'] = FALSE;
        session_destroy();
        header('location:login.php');
    }
?>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<style type="text/css">
        .ui.menu .item {
          font-weight: bold;
        }
        .ui.menu .item img.logo {
            margin-right: 1.5em;
        }
        .main.container {
            margin-top: 5em;
            width: 80%;
        }
</style>
<body>

  <div class="ui olive fixed inverted menu" style='height:60px;'>
    <div class="ui container" style='width:80%;'>
              <a href="index.php" class="ui item" style="height:60px; width:25%;">
              <img class="logo" src="https://cdn2.iconfinder.com/data/icons/tools-4/1000/watering_can-512.png">
                เศรษฐกิจพอเพียง
              </a>
            <div id="search_form" class="ui form item" style='height:100%; width:55%;'>
            <form name="search_form" class="ui middle aligned center aligned grid" style='height:120%; width:100%; margin-left: 0em;' method="get" action="search.php" onsubmit="if (document.getElementById('search_q').value == '') {alert('กรุณาใส่คำที่ต้องการค้นหา'); return false;}">
              <div class="ui right icon input" style='height:100%; width:100%;'>
                  <input id="search_q" name="search_q" class="ui input" placeholder="ค้นหา..." required style='margin-right: 0em;'>
                  <i class="ui primary search icon link" type="submit" onclick="if (document.getElementById('search_q').value == '') {alert('กรุณาใส่คำที่ต้องการค้นหา'); return false;} search_form.submit();" style="height:100%; width:50px; margin-right: 1.0em;"></i>
              </div>
            </form>
            </div>
            <?php
                if (isset($_SESSION['login'])) {
                    $idu = $_SESSION['idu'];
                    echo "<div class='ui middle aligned center aligned grid simple dropdown item' style='height:100%; width:20%; margin-right: 0em; margin-left: 0em; margin-top: 0em; margin-buttom: 0em;'>".$_SESSION['first']."<i class='dropdown icon'></i>
                        <div class='ui menu'>
                            <a href='add.php?' class='item'><i class='plus icon' ></i>Add</a>
                            <a href='edit_profile.php' class='item'><i class='user icon'></i>Edite Profile</a>
                            <a href='index.php?out=logout' class='item'><i class='sign out icon'></i>sign out</a>
                        </div>
                        </div>"; 
                }else{
                    echo "<div class='ui middle aligned center aligned grid simple dropdown item' style='height:100%; width:20%; margin-right: 0em; margin-left: 0em; margin-top: 0em; margin-buttom: 0em;'>menu<i class='dropdown icon'></i>
                        <div class='ui menu'>
                            <a href='login.php' class='item'><i class='sign in icon'></i>Sign in</a>
                            <a href='signup.php' class='item'><i class='add user icon'></i>Sign up</a>
                        </div>
                      </div>
                    ";
                }
            ?>        
    </div>
  </div>

    <div class="ui main container">
      <div class="jumbotron " style="background-image: url(https://porpiangnaja.files.wordpress.com/2013/01/cropped-e0b888e0b8881.jpg);height: 300px ;position: center ">
        <h1 class="text-center" style="background-color: white; " >เศรษฐกิจพอเพียง</h1>
        <p class="text-center" style="background-color: white ;">ชุมชนแห่งการแบ่งปันประสบการณ์ดีๆเกี่ยวกับเศรษฐกิจพอเพียง</p>
      </div>
        <?php if (isset($_SESSION['login'])) {   ?>
        
        <div class="row">   
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="ui olive striped raised segment table">
              <thead >
                <tr >
                  <th colspan="2">Your Post</th>       
                </tr>
              </thead >
              <tbody>
                <?php
                  $sql3 = "SELECT * FROM topic WHERE idu = '".$_SESSION['idu']."' ORDER BY datetimes DESC";
                  $row3 = mysqli_query($conn,$sql3);
                  
                  while ($result = mysqli_fetch_assoc($row3)) {
                    echo "
                      <tr>
                        <td><a href='display.php?id=".$result['id_top']."'><strong>".$result['topicname']."</strong></a> <br/><i class='fa fa-map-marker'>   </i> BY ".$_SESSION['username']."</td>
                        <td>".$result['datetimes']."</td>
                      </tr>
                    ";
                  }
                ?>   
              <!--Denbver-->
              </tbody>
            </table>
          </div>
        </div>
        <?php }
        ?>
        <br>
        <div class="row">   
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="ui olive striped raised segment table">
              <thead >
                <tr >
                  <th colspan="2">Recent Topics</th>       
                </tr>
              </thead >
              <tbody>
                <?php
                  $sql4 = "SELECT * FROM topic,member WHERE topic.idu = member.idu ORDER BY datetimes DESC";
                  $row4 = mysqli_query($conn,$sql4);

                  while ($result4 = mysqli_fetch_assoc($row4)) {
                    echo "
                      <tr>
                        <td><a href='display.php?id=".$result4['id_top']."'><strong>".$result4['topicname']."</strong></a> <br/><i class='fa fa-map-marker'>   </i> BY ".$result4['username']."</td>
                        <td>".$result4['datetimes']."</td>
                      </tr>
                    ";
                  }
                
                ?>       
              <!--Denbver-->
              </tbody>
            </table>
          </div>
        </div>
        <br>
    </div>
  </div>
</body>

<html>
<footer>
  <center>
    <audio controls id="myVideo">

      <source src="father.mp3" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio> 
  </center>
  <script>
  var vid = document.getElementById("myVideo");
  function enableAutoplay() { 
    vid.autoplay = true;
    vid.load();
  }
  enableAutoplay();

  </script> 
</footer>
</html>