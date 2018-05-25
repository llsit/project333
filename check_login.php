<?php
    
    include_once("config.php");
    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $gender = $_POST['gender'];
        $tel = $_POST['tel'];

        $strSQL = "SELECT * FROM member WHERE Username = '".$username."' ";
        $result = mysqli_query($conn,$strSQL);
        $row = $result->num_rows;
        if ($row > 1) {
            echo "<script>alert('Username Already Exist')</script>";  
            echo "<script>window.location = 'signup.php'</script>";
        }else{
            $sql = "INSERT INTO member (username,password,firstname,lastname,gender,tel) 
                values ('$username','$pass','$first','$last','$gender','$tel')";
            $result = mysqli_query($conn,$sql);
            echo "<script>alert('Registration Successful')</script>";
            echo "<script>window.location = 'login.php'</script>";
        }
    }else{
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $strSQL = "SELECT * FROM member WHERE Username = '".$username."' and Password = '".$pass."'";
    
        $result = mysqli_query($conn,$strSQL);
        $row = mysqli_fetch_array($result);
        if(!$row){
            echo "<script>alert('Username and Password Incorrect!')</script>"; 
            echo "<script>window.location = 'login.php'</script>";
        }else{
            $_SESSION["idu"] = $row["idu"];
            $_SESSION['username'] = $row['username'];
            $_SESSION["first"] = $row["firstname"];
            $_SESSION["last"] = $row["lastname"];
            $_SESSION['login'] = true;
            header("location:index.php");
        }
    }
?>