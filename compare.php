
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Techno</title>
    <meta name="description" content="Тестовый интернет-магазин от webdevkin-a. Страница сравнения товаров" />
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">

    <link href="css/css/style.css" rel="stylesheet">
    <link href="css/css/sorting_menu.css" rel="stylesheet">
    <link href="css/css/modal_page.css" rel="stylesheet">
    <link href="css/css/main_slider.css" rel="stylesheet">
    <link href="css/css/sorting.css" rel="stylesheet">
    <link href="css/css/pagination.css" rel="stylesheet">
</head>
<body data-page="compare">

    <div class="top_navigation">
        <div class="top_nav_left">
          <div class="top_nav_element citysdropbtn" onclick="dropDownFunction()">
          MIASTA
          </div>
          <div id="myCitys" class="dropdown_content">
              <a href="#">Mińsk</a>
              <a href="#">Brześć</a>
              <a href="#">Grodno</a>
            </div>
          <div class="top_nav_element">Dostawa</div>
          <div class="top_nav_element">Zapłata</div>
          <div class="top_nav_element">Rata</div>
          <div class="top_nav_element">Sklepy</div>
          <a href="admin.html"><div class="top_nav_element">Admin</div></a>
        </div>
        <div class="top_nav_right">
          

          <?php
                      if($_COOKIE['user'] == ''):
                      ?>
          <a href="login and registration/login.html"><div class="top_nav_element">wejście</div></a>

          <?php else :?>
                      <p class="top_nav_element_withouthover">Hej, <?=$_COOKIE['user']?>, &nbsp; <a href="login and registration/exit.php"><div class="login top_nav_element">Wyloguj</div></a></p>
                      <?php endif;?>
        </div>
      </div>
      <div class="header conteiner">
          <div class="header_element logo">
              <img src="img/techno.svg">
          </div>
          <div class="header_element big_header_element">
              <input type="search" placeholder="Поиск по товарам">
              <img src="img/search.png">
          </div>
          <div class="header_element">
              <div class="dropdown">
                  <button class="dropbtn" onclick="myFunction()">
                      <div class="dropbtn_left">608-83-11</div>
                      <div class="dropbtn_right">codziennie</br>od 9.00 do 21.00</div>
                  </button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                  </div>
                </div>
          </div>
          <div class="header_element">
          <a href="cart.php">
              <div class="kosh">
                 <img src="img/carzina.svg">
                  Kosz<span id="total-cart-count" class="badge"></span>
              </div></a>
          </div>
        </div>
        <div class="top_menu conteiner">
          <div class="top_menu_element small_menu_element top_menu_active">Magazyn</div>|
          <div class="top_menu_element big_menu_element">Telewizory,audio,</br>wideo</div>|
          <div class="top_menu_element">Technika dla</br>Domy</div>|
          <div class="top_menu_element">Technika dla</br>kuchnie</div>|
          <div class="top_menu_element">Piękno i</br>zdrowie</div>|
          <div class="top_menu_element">Laptopy i</br>tabletki</div>|
          <div class="top_menu_element">Telefonia i</br>połączenie</div>|
          <div class="top_menu_element">Akcesoria</div>|
          <div class="top_menu_element">Automobilowy</div>
        </div>
    <div class="container">
       
        <ul class="nav nav-pills">
            <li><a href="/">Katalog z filtrami</a></li>
            <li class="active" id="compare-tab"><a href="compare.php">Porównanie produktów<span class="badge"></span></a></li>
            <li><a href="cart.php">Kosz<span id="total-cart-count" class="badge"></span></a></li>
            <li><a href="order.php">Sprawdzić</a></li>
        </ul>
        <br />
        <br />
        <div id="goods" class="col-md-12">
            <table id="compare-table" class="compare-table table table-bordered table-hover" data-compare="all">
                <thead>
                    <tr>
                        <!-- compare filters template -->
                        <!-- compare header template -->
                    </tr>
                </thead>
                <tbody>
                    <!-- compare content template -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
          <div class="plusy">
            <div class="plus_elem">
              <img src="img/plus_1.png">
              <div class="opis_plus_elem">
                <div class="opis_plus_elem_title blue">Dostawa</div>
                <div class="opis_plus_elem_text">na całej Białorusi</div>
              </div>
            </div>
            <div class="plus_elem">
              <img src="img/plus_2.png">
              <div class="opis_plus_elem">
                <div class="opis_plus_elem_title yellow">Dostawa</div>
                <div class="opis_plus_elem_text">ponad 17 sklepów</div>
              </div>
            </div>
            <div class="plus_elem">
              <img src="img/plus_3.png">
              <div class="opis_plus_elem">
                <div class="opis_plus_elem_title purple">Dostawa</div>
                <div class="opis_plus_elem_text">wszystkie sposoby</div>
              </div>
            </div>
            <div class="plus_elem">
              <img src="img/plus_4.png">
              <div class="opis_plus_elem">
                <div class="opis_plus_elem_title red">Dostawa</div>
                <div class="opis_plus_elem_text">Najlepsze oferty</div>
              </div>
            </div>
          </div>

          <div class="footer_info">
            <div class="footer_info_elem">
              <div class="footer_info_elem_title">Kupujący</div>
              <div class="footer_info_elem_text">Aktualności</div>
              <div class="footer_info_elem_text">Recenzje</div>
              <div class="footer_info_elem_text">Wymiana i zwrot towaru</div>
              <div class="footer_info_elem_text">Centra serwisowe</div>
              <div class="footer_info_elem_text">Jak złożyć zamówienie</div>
              <div class="footer_info_elem_text">Oferta publiczna</div>
            </div>
            <div class="footer_info_elem">
              <div class="footer_info_elem_title">Zapłata и Dostawa</div>
              <div class="footer_info_elem_text">Dostawa</div>
              <div class="footer_info_elem_text">Zapłata</div>
              <div class="footer_info_elem_text">Rata</div>
            </div>
            <div class="footer_info_elem">
              <div class="footer_info_elem_title">Spółka</div>
              <div class="footer_info_elem_text">O firmie</div>
              <div class="footer_info_elem_text">Łączność</div>
              <div class="footer_info_elem_text">Wakaty</div>
              <div class="footer_info_elem_text">Dział hurtowy</div>
              <div class="footer_info_elem_text">Sklepy</div>
            </div>
            <div class="footer_info_elem">
              <div class="footer_info_elem_title">+375 33 608-83-11</br>+375 29 608-83-11</div>
              <div class="footer_info_elem_adress">Jesteśmy w kontakcie codziennie
od 9.00 do 21.00.</div>
              <div class="footer_info_elem_mail">info@techno.by</div>
            </div>

            <div class="footer_info_elem big_elem">
              <div class="footer_info_elem_formtitle">Chcesz jako pierwszy dowiadywać się o promocjach?</br>
              Zapisz się do Newslettera!</div>
              <div class="footer_info_elem_form">
                <form>
                <input type="email" placeholder="Twój Email">
                  <button>Zapisz się do</button>
                </form>
              </div>
              <div class="footer_info_elem_social">
                  <div class="footer_soc_title">Jesteśmy w sieciach społecznościowych:</div>
                  <div class="footer_soc_icons">
                    <img src="img/soc_1.svg">
                    <img src="img/soc_2.svg">
                    <img src="img/soc_3.svg">
                    <img src="img/soc_4.svg">
                    <img src="img/soc_5.svg">
                  </div>
              </div>
            </div>
          </div>


        </div>
        <div class="footer_last_box">
          <div class="footer_last_box_element">
          TECHNO.by - sklep internetowy sprzętu AGD i RTV.
      </br>
            © PE „Hurtownia i centrum logistyczne” S-Video”, 2020
      </br>
      Nasza ocena: 4.8 (Głosy: 14919)
          </div>
          <div class="footer_last_box_element">
          Jur. adres: 225409, Baranowicze, ul. Radziecki, 55 lat. 
      </br>
      UNP 290610287. W rejestrze handlowym od 16.11.2012.
          </div>
          <div class="footer_last_box_element">
          <div class="footer_last_box_element_title">Akceptujemy płatności</div>
          <div class="footer_last_box_element_cards">
            <img src="img/card_1.png">
            <img src="img/card_2.png">
            <img src="img/card_3.png">
            <img src="img/card_4.png">
            <img src="img/card_5.png">
            <img src="img/card_6.png">
            <img src="img/card_7.png">
            <img src="img/card_8.png">
          </div>
          </div>
        </div>

    <!-- Шаблон для фильтров -->
    <script id="compare-filters-template" type="text/template">
        <th>
        Pokaż właściwości:
            <% _.each(buttons, function(button) { %>
            <div class="radio">
                <label>
                    <input type="radio" class="js-compare-filter" name="filters" value="<%= button.value %>" <%= button.checked ? ' checked' : '' %>>
                    <%= button.title %>
                </label>
            </div>
            <% }); %>
        </th>
    </script>

    <!-- Шаблон для шапки таблицы -->
    <script id="compare-header-template" type="text/template">
        <% _.each(goods, function(good) { %>
        <th>
            <div class="compare-table__good"><%= good.good %></div>
            <img class="compare-table__photo" src="/img/goods/<%= good.photo %>" />
            <div class="compare-table__price"><%= good.price %> zl.</div>
            <div class="compare-table__remove js-compare-remove" data-id="<%= good.good_id %>">Usuń z porównania</div>
        </th>
        <% }); %>
    </script>

    <!-- Шаблон для содержимого таблицы - списка свойств -->
    <script id="compare-props-template" type="text/template">
        <% _.each(props, function(prop) { %>
        <tr <%= prop.equal ? 'class="-equal"' : '' %>>
            <td><%= prop.prop %></td>

            <% _.each(goods, function(goodId) { %>
            <td><%= (_.findWhere(prop.values, {goodId: goodId}) || {value: '&mdash;'}).value %></td>
            <% }); %>
        </tr>
        <% }); %>
    </script>

    <script src="js/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="js/vendor/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/vendor/underscore.min.js" type="text/javascript"></script>
    <script src="js/modules/cart.js" type="text/javascript"></script>
    <script src="js/modules/compare.js" type="text/javascript"></script>
    <script src="js/modules/main.js" type="text/javascript"></script>
</body>
</html>