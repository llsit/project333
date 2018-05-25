
<?php
echo "<html>
<head>
<title>Comment</title>";

if ((isset($_POST['id_con'])) && (isset($_POST['idu'])))
{
    echo "
    <script type='text/javascript'>
        var countN = 5;
        setInterval(function() {
                document.getElementById('countdown').innerHTML = 'เรากำลังพาไปยังก่อนหน้านี้ใน '+countN+' วินาที.. ';
                if (countN == 0)
                {
                    document.location.replace('display.php?id='+".$_POST['id_con']."+'');
                }
                countN--;
        }, 1000);
    </script>
    ";

    echo "</head>
        <body>
        ";

    $id_con = $_POST['id_con'];
    $idu = $_POST['idu'];
    $comments = $_POST['comments'];


    require("config.php");

    $query = "INSERT INTO `comments` (`id_con`, `idu`, `comments`, `date_publish`) VALUES ($id_con, $idu, '$comments', DEFAULT)";
    mysqli_query($conn, $query);

    echo "<center>";
    echo "<br><br><h1><b>แสดงความคิดเห็นเรียบร้อยแล้ว.</b></h1>";
    echo "<br><h3 id='countdown'>เรากำลังพาไปยังก่อนหน้านี้ใน 5 วินาที.. </h3><a href='display.php?id=".$_POST['id_con']."'>(ถ้าหากไม่ไปคลิ๊ก.)</a>";
    echo "</center>";
}
else
{
    echo "
    <script type='text/javascript'>
        var countN = 5;
        setInterval(function() {
                document.getElementById('countdown').innerHTML = 'เรากำลังพาไปหน้าแรกใน '+countN+' วินาที.. ';
                if (countN == 0)
                {
                    document.location.replace('.');
                }
                countN--;
        }, 1000);
    </script>
    ";

    echo "</head>
        <body>
        ";

    echo "<center>";
    echo "<br><br><h1><b>ผิดพลาด!! แสดงความคิดเห็นไม่สำเร็จ.</b></h1>";
    echo "<br><h3 id='countdown'>เรากำลังพาไปหน้าแรกใน 5 วินาที.. </h3><a href='.'>(ถ้าหากไม่ไปคลิ๊ก.)</a>";
    echo "</center>";
}

echo "</body>";
?>