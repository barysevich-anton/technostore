<META HTTP-EQUIV="REFRESH" content="0.2; URL=/index.php">
<?php
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);

    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);



    
    $mysql = new mysqli('localhost', 'root', 'root', 'skleptechno');

    $result = $mysql->query("SELECT * FROM `admins` WHERE `login` = '$login' AND `pass` ='$pass'");
    
    $user = $result->fetch_assoc();
    if(count($user) == 0){
       
    echo "<script type='text/javascript'>alert('Nie ma takiego użytkownika!');</script>";  
    exit();
    }
    
    $mysql->close();

    header('Location: admin.html');
?>