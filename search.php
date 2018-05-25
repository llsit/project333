<!DOCTYPE html>
<html>
<head>
<?php
    include_once("head.php");
    include_once('config.php');
    error_reporting(0);
?>
<script type="text/javascript">

</script>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<style type="text/css">
        .topicFont {
            font-size: 30px
        }
        .searchFont {
            color: #FF0000;
            font-style: italic;
        }
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
<title>Search Result</title>
</head>

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
	                    </div>";
	        }
	    ?>        
    </div>
</div>

    
<div class="ui main container">
    <div class="jumbotron " style="background-image: url(https://porpiangnaja.files.wordpress.com/2013/01/cropped-e0b888e0b8881.jpg);height: 200px ;position: center ">
        <h1 class="text-center" style="background-color: white; " >เศรษฐกิจพอเพียง</h1>
        <p class="text-center" style="background-color: white ;">ชุมชนแห่งการแบ่งปันประสบการณ์ดีๆเกี่ยวกับเศรษฐกิจพอเพียง</p>
    </div>
    </br>
    </br>

	<?php //BodyContent
	    if (isset($_GET['out'])) {
	        echo "<script type='text/javascript'>
			        var countN = 5;
			        setInterval(function() {
			            document.getElementById('countdown').innerHTML = 'เรากำลังพาไปหน้าแรกใน '+countN+' วินาที.. ';
			            if (countN == 0)
			            {

			            }
			            countN--;
			        }, 1000);
			    </script>";

			echo "<center>";
			echo "<br><br><h1><b>ออกจากระบบสำเร็จ.</b></h1>";
			echo "<br><h3 id='countdown'>เรากำลังพาไปหน้าแรกใน 5 วินาที.. </h3><a href='.'>(ถ้าหากไม่ไปคลิ๊ก.)</a>";
			echo "</center>";
	    }

	    if ((isset($_GET['search_q'])) && ($_GET['search_q'] != "")) {
			$q = $_GET['search_q'];

			echo "<script type='text/javascript'>
			        document.getElementById('search_q').value = '".$q."';
			    </script>";

            ?>

            <!--//Search Result-->
            <div class="row">   
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table name="reTable" class="ui olive striped raised segment table">
                      <thead >
                        <tr >
                          <th id="reTableName" name="reTableName" colspan="2">Search Result</th>       
                        </tr>
                      </thead >
                      <tbody>
                        <?php
                            $qTolower = strtolower($q);
                            $nq = strlen($qTolower);

                            //Result of Search in TopicName
                            $sql = "SELECT * FROM topic, topcontent, member WHERE topic.id_top = topcontent.id_top AND topic.idu = member.idu AND topic.topicname LIKE '%$q%' ORDER BY topic.datetimes DESC";
                            $row = mysqli_query($conn,$sql);
                            $nrow_topic = $row->num_rows;
                            while ($result = mysqli_fetch_assoc($row)) {
                                $topicStr = $result['topicname'];
                                $topicTolower = strtolower($topicStr);
                                $nTopic = strlen($topicTolower);
                                echo "
                                    <tr>
                                    <td><a class='topicFont' href='display.php?id=".$result['id_top']."'>
                                        <strong>";
                                        $pos = strpos($topicTolower, $qTolower);
                                        $i = 0;
                                        for (; $i < $pos; $i++)
                                            echo $topicStr[$i];
                                        echo "<span class='searchFont'>".$q."</span>";
                                        for ($i += $nq; $i < $nTopic; $i++)
                                            echo $topicStr[$i];
                                echo    "</strong>
                                    </a>
                                    <br/><i class='fa fa-map-marker'>   </i> BY ".$result['username']."</td>
                                    <td>".$result['datetimes']."</td>
                                    </tr>
                                    ";
                            }
                            
                            //Result of Search in Content
                            $sql = "SELECT * FROM topic, topcontent, member WHERE topic.id_top = topcontent.id_top AND topic.idu = member.idu AND topcontent.content LIKE '%$q%' ORDER BY topic.datetimes DESC";
                            $row = mysqli_query($conn,$sql);
                            $nrow_con = $row->num_rows;
                            if (($nrow_con <= 0) && ($nrow_topic <=0)) { echo "<script> document.getElementById('reTableName').innerText = 'ไม่พบข้อมูล.' </script"; }
                            while ($result = mysqli_fetch_assoc($row)) {
                                $conStr = $result['content'];
                                $conTolower = strtolower($conStr);
                                $nCon = strlen($conTolower);
                                echo "
                                        <tr>
                                        <td><a class='topicFont' href='display.php?id=".$result['id_top']."'><strong>".$result['topicname']."</strong></a> </br>
                                        &nbsp&nbsp&nbsp&nbsp";
                                            $pos = strpos($conTolower, $qTolower);
                                            if ($nCon < 120+$nq){
                                                $i = 0;
                                                for (; $i < $pos; $i++)
                                                    echo $conStr[$i];
                                                echo "<span class='searchFont'>".$q."</span>";
                                                for ($i += $nq; $i < $nCon; $i++)
                                                    echo $conStr[$i];
                                            } else {
                                                echo "<span class='topicFont'><b> . . . . . . . . . </b></span></br>";
                                                    $i = $pos-60;
                                                    for (; $i < $pos; $i++)
                                                        echo $conStr[$i];
                                                    echo "<span class='searchFont'>".$q."</span>";
                                                    for ($i += $nq, $end = $i + 60; $i < $end; $i++)
                                                        echo $conStr[$i];
                                                echo "</br><span class='topicFont'><b>      . . . . . . . . . </b></span>";
                                            }
                                echo   "</br><i class='fa fa-map-marker'>   </i> BY ".$result['username']."</td>
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

            <?php
        	    } else {
        	    	echo "<script type='text/javascript'>
        			        var countN = 5;
        			        setInterval(function() {
        			            document.getElementById('countdown').innerHTML = 'เรากำลังพาไปหน้าแรกใน '+countN+' วินาที.. ';
        			            if (countN == 0)
        			            {
        			                document.location.replace('.');
        			            }
        			            countN--;
        			        }, 1000);
        			    </script>";

        			echo "<center>";
        			echo "<br><br><h1><b>พบปัญหาบางประการ.</b></h1>";
        			echo "<br><h3 id='countdown'>เรากำลังพาไปหน้าแรกใน 5 วินาที.. </h3><a href='.'>(ถ้าหากไม่ไปคลิ๊ก.)</a>";
        			echo "</center>";
        	    }
        	?>
</div>
</body>
</html>