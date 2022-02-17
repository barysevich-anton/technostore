<html>
    <head>
        <meta charset="utf-8">
        <link href="admin.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <title>Admin panel</title>
    </head>
    <body> 
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db_name = 'skleptechno';
    $link = mysqli_connect($host, $user, $pass, $db_name);


    if (!$link) {
      echo 'Nie mogę połączyć się z bazą danych. Kod błędu: ' . mysqli_connect_errno() . ', błąd: ' . mysqli_connect_error();
      exit;
    }

    if (isset($_POST["Name"])) {
      
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($link, "UPDATE `orders` SET `client_id` = '{$_POST['client_id']}', `address` = '{$_POST['address']}' , `message` = '{$_POST['message']}', `dt_added` = '{$_POST['dt_added']}' WHERE `ID`={$_GET['red_id']}");
      } else {
          
          $sql = mysqli_query($link, "INSERT INTO `orders` (`client_id`, `address`, `message`, `dt_added`) VALUES ('{$_POST['client_id']}', '{$_POST['address']}', '{$_POST['message']}', '{$_POST['dt_added']}')");
      }

     
      if ($sql) {
        echo '<p>Udało!</p>';
      } else {
        echo '<p>Wystąpił błąd: ' . mysqli_error($link) . '</p>';
      }
    }

    if (isset($_GET['del_id'])) { 

      $sql = mysqli_query($link, "DELETE FROM `orders` WHERE `ID` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Przedmiot usunięty.</p>";
      } else {
        echo '<p>Wystąpił błąd: ' . mysqli_error($link) . '</p>';
      }
    }

    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT `ID`, `client_id`, `address`, `message`, `dt_added` FROM `orders` WHERE `ID`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>
  <div class="flex_admin_form">
   
  <table class="padd_table table-hover table-bordered col-md-8" >
    <tr>
      <td>Id</td>
      <td>Client Id</td>
      <td>Address</td>
      <td>Message</td>
      <td>Add time</td>
      <td>Deleting</td>
    </tr>
    <?php
      $sql = mysqli_query($link, 'SELECT `ID`, `client_id`, `address`, `message`, `dt_added` FROM `orders`');
      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['ID']}</td>" .
             "<td>{$result['client_id']}</td>" .
             "<td>{$result['address']}</td>" .
             "<td>{$result['message']}</td>" .
             "<td>{$result['dt_added']}</td>" .
             "<td><a href='?del_id={$result['ID']}'>Delete</a></td>" .
             '</tr>';
      }
    ?>
  </table>

  <div>

  <a id="none" href="../../index.php"><div class="back">Do głównej</div></a>
  <a id="none" href="admin.html"><div class="back">Powrót</div></a>
  </div>
    </div>
  
          </body>
        
        </html>