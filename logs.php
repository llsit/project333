<?php

require("config.php");
$result = mysqli_query($conn, "SELECT * FROM comments, member WHERE comments.idu = member.idu ORDER BY comments.id_com ASC");
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content'>";
echo "<h4><a href='delete.php?id=" . $row['id_com'] . "'> X</a></h4>";
echo "<h1>" . $row['firstname'] . "   " .$row['lastname']. "</h1>";
echo "<h2>" . $row['date_publish'] . "</h2></br></br>";
echo "<h3>" . $row['comments'] . "</h3>";
echo "</div>";
}
mysqli_close($conn);

?>