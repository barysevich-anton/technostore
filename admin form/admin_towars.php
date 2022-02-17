<html>
    <head>
        <meta charset="utf-8">
        <link href="admin.css" rel="stylesheet">
        
        <link href="../css/css/modal_page.css" rel="stylesheet">
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

    if (isset($_POST["good"])) {
      
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($link, "UPDATE `goods` SET `good` = '{$_POST['good']}', `category_id` = '{$_POST['category_id']}' , `brand_id` = '{$_POST['brand_id']}', `rating` = '{$_POST['rating']}', `price` = '{$_POST['price']}', `photo` = '{$_POST['photo']}' WHERE `Id`={$_GET['red_id']}");
      } else {
          
          $sql = mysqli_query($link, "INSERT INTO `goods` (`good`, `category_id`, `brand_id`, `rating`, `price`, `photo`) VALUES ('{$_POST['good']}', '{$_POST['category_id']}', '{$_POST['brand_id']}', '{$_POST['rating']}', '{$_POST['price']}', '{$_POST['photo']}')");
      }

     
      if ($sql) {
        echo '<p>Успешно!</p>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    if (isset($_GET['del_id'])) { 

      $sql = mysqli_query($link, "DELETE FROM `goods` WHERE `Id` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Товар удален.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT `Id`, `good`, `category_id`, `brand_id`, `rating`, `price`, `photo` FROM `goods` WHERE `Id`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>
  <div class="flex_admin_form">
   
  <table class="padd_table table-hover table-bordered col-md-8" >
  <tr>
      <td>Id</td>
      <td>Наименование</td>
      <td>Id категории</td>
      <td>Id Брэнда</td>
      <td>Цена:</td>
      <td>Рейтинг</td>
      <td>Фото</td>
      <td>Удаление</td>
      <td>Редактирование</td>
    </tr>
    <?php
      $sql = mysqli_query($link, 'SELECT * FROM goods
      LEFT JOIN brands ON brands.id = goods.brand_id
      LEFT JOIN categories ON categories.id = goods.category_id ');
      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['id']}</td>" .
             "<td>{$result['good']}</td>" .
             "<td>{$result['category']}</td>" .
             "<td>{$result['brand']}</td>" .
             "<td>{$result['price']} zl.</td>" .
             "<td>{$result['rating']}</td>" .
             "<td><img class='admin_small_foto' src='../img/goods/{$result['photo']}'</td>" .
             "<td><a href='?del_id={$result['Id']}'>Удалить</a></td>" .
             "<td><a href='?red_id={$result['Id']}'>Изменить</a></td>" .
             '</tr>';
      }
    ?>
  </table>

  <div>

                            

                              <div class="modal_page" data-modal='1'>
                              <svg class="modal__cross js-modal-close" xmlns="http://www.w3.org/2000/svg"               viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
                              
                              <table class="padd_table table-hover table-bordered col-md-8" >
                              <tr class="title_td">
                                <td>Id</td>
                                <td>Категория</td>
                              </tr>
                                <?php
                                  $sql = mysqli_query($link, 'SELECT `Id`, `category` FROM `categories`');
                                  while ($result = mysqli_fetch_array($sql)) {
                                    echo '<tr>' .
                                        "<td>{$result['Id']}</td>" .
                                        "<td>{$result['category']}</td>" .
                                        '</tr>';
                                  }
                                ?>
                              </table>
                              </div>

                            <div class="overlay_bg js_overlay_modal"></div>


                              <div class="modal_page" data-modal='2'>
                              <svg class="modal__cross js-modal-close" xmlns="http://www.w3.org/2000/svg"               viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
                              
                              <table class="padd_table table-hover table-bordered col-md-8" >
                              <tr class="title_td">
                                <td>Id</td>
                                <td>Брэнд</td>
                              </tr>
                                <?php
                                  $sql = mysqli_query($link, 'SELECT `Id`, `brand` FROM `brands`');
                                  while ($result = mysqli_fetch_array($sql)) {
                                    echo '<tr>' .
                                        "<td>{$result['Id']}</td>" .
                                        "<td>{$result['brand']}</td>" .
                                        '</tr>';
                                  }
                                ?>
                              </table>
                              </div>

                            <div class="overlay_bg js_overlay_modal"></div>


  <form action="" method="post">
    <table  class="input_admin_form">
      <tr>
        <td>Наименование:</td>
        <td><input class="" type="text" name="good" value="<?= isset($_GET['red_id']) ? $product['good'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Id <a href="#" class="js-open-modal" data-modal='1'>Категории</a>:</td>
        <td>
          <input class="" type="text" name="category_id" value="<?= isset($_GET['red_id']) ? $product['category_id'] : ''; ?>">
        </td>
      </tr>
      
      <tr>
        <td>Id <a href="#" class="js-open-modal" data-modal='2'>Брэнды</a>:</td>
        <td>
        <input class="" type="text" name="brand_id" value="<?= isset($_GET['red_id']) ? $product['brand_id'] : ''; ?>">
        </td>
      </tr>
      <tr>
        <td>Цена:</td>
        <td><input type="text" name="price"value="<?= isset($_GET['red_id']) ? $product['price'] : ''; ?>"> zl.</td>
      </tr>
      <tr>
        <td>Рейтинг:</td>
        <td>
        <select name="rating" class="admin_select">
          <option value="<?= isset($_GET['red_id']) ? $product['rating'] : '1'; ?>">1</option>
          <option value="<?= isset($_GET['red_id']) ? $product['rating'] : '2'; ?>">2</option>
          <option value="<?= isset($_GET['red_id']) ? $product['rating'] : '3'; ?>">3</option>
          <option value="<?= isset($_GET['red_id']) ? $product['rating'] : '4'; ?>">4</option>
          <option value="<?= isset($_GET['red_id']) ? $product['rating'] : '5'; ?>">5</option>
          <option value="<?= isset($_GET['red_id']) ? $product['rating'] : '6'; ?>">6</option>
          <option value="<?= isset($_GET['red_id']) ? $product['rating'] : '7'; ?>">7</option>
          <option value="<?= isset($_GET['red_id']) ? $product['rating'] : '8'; ?>">8</option>
          <option value="<?= isset($_GET['red_id']) ? $product['rating'] : '9'; ?>">9</option>
          <option value="<?= isset($_GET['red_id']) ? $product['rating'] : '10'; ?>">10</option>

        </select>
      </tr>
      <tr>
        <td>Фото:</td>
        <td><input type="text" name="photo"value="<?= isset($_GET['red_id']) ? $product['photo'] : ''; ?>"></input></td>
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
  
    <script src="../js/modal_page.js"></script>
          </body>
        
        </html>