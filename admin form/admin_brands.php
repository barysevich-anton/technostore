<html>
    <head>
        <meta charset="utf-8">
        <link href="admin.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <title>Админ панель</title>
    </head>
    <body> 
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db_name = 'skleptechno';
    $link = mysqli_connect($host, $user, $pass, $db_name);


    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }

    if (isset($_POST["brand"])) {
      
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($link, "UPDATE `brands` SET `brand` = '{$_POST['brand']}' WHERE `ID`={$_GET['red_id']}");
      } else {
          
          $sql = mysqli_query($link, "INSERT INTO `brands` (`brand`) VALUES ('{$_POST['brand']}')");
      }

     
      if ($sql) {
        echo '<p>Успешно!</p>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    if (isset($_GET['del_id'])) { 

      $sql = mysqli_query($link, "DELETE FROM `brands` WHERE `ID` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Товар удален.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT `ID`, `brand` FROM `brands` WHERE `ID`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>
  <div class="flex_admin_form col-md-12">
   
  <table class="padd_table table-hover table-bordered col-md-8">
    <tr>
      <td>Id</td>
      <td>Категория</td>
      <td>Удаление</td>
      <td>Редактирование</td>
    </tr>
    <?php
      $sql = mysqli_query($link, 'SELECT `ID`, `brand` FROM `brands`');
      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['ID']}</td>" .
             "<td>{$result['brand']}</td>" .
             "<td><a href='?del_id={$result['ID']}'>Удалить</a></td>" .
             "<td><a href='?red_id={$result['ID']}'>Изменить</a></td>" .
             '</tr>';
      }
    ?>
  </table>

  <div class="flex col-md-3">
  <form action="" method="post" class="col-md-3">
    <table>
      <tr>
        <td>Бренды:</td>
        <td><input type="text" name="brand" value="<?= isset($_GET['red_id']) ? $product['brand'] : ''; ?>"></td>
      </tr>
      
      <tr>
        <td colspan="2"><input type="submit" class="add_btn" value="OK"></td>
      </tr>
    </table>
  </form>
  <p><a href="?add=new">Добавить новый товар</a></p>

  <a id="none" href="../../index.php"><div class="back">На главную</div></a>
  <a id="none" href="admin.html"><div class="back">Назад</div></a>
  </div>
    </div>
  
          </body>
        
        </html>