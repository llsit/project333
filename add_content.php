<?php 
    include_once('head.php');
    include_once('config.php');
    $top = $_POST['topic'];
    $content = $_POST['content'];
    // echo "$content";
    // echo "$top";
    $sql2 = "INSERT INTO topic (topicname, idu, datetimes)
        VALUES ('$top', '".$_SESSION['idu']."', NOW())";
        //echo "$sql2";
        $row2 = mysqli_query($conn,$sql2);

    $sql3 = "SELECT * FROM topic WHERE topicname = '$top' and idu = '".$_SESSION['idu']."'";
    //echo "$sql3";
    $row3 = mysqli_query($conn,$sql3);
    $result = mysqli_fetch_assoc($row3);
    $id = $result['id_top'];

    $sql1 = "INSERT INTO topcontent (id_top, content, idu)
        VALUES ('$id', '$content' , ".$_SESSION['idu'].")";
    //echo "$sql1";
    $row = mysqli_query($conn,$sql1); 
    
    echo "
    <script type='text/javascript'>
        var countN = 5;
        setInterval(function() {
                document.getElementById('countdown').innerHTML = 'เรากำลังพาไปยังก่อนหน้านี้ใน '+countN+' วินาที.. ';
                if (countN == 0)
                {
                    document.location.replace('display.php?id='+".$id."+'');
                }
                countN--;
        }, 1000);
    </script>
    ";

    echo "</head>
        <body>
        ";
    echo "<center>";
    echo "<br><br><h1><b>โพสต์เรียบร้อยแล้ว.</b></h1>";
    echo "<br><h3 id='countdown'>เรากำลังพาไปยังโพสต์ของท่านใน 5 วินาที.. </h3><a href='display.php?id=".$id."'>(ถ้าหากไม่ไปคลิ๊ก.)</a>";
    echo "</center>";
?>