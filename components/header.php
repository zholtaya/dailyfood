<div id="drawer" class="left-drawer none">
  <div class="drawer_wrapper">
    <div class="drawer_wrapper_top">
      <div id="close-drawer-btn" class="drawer_close_wrapper">
        <img src="./assets/icons/close.svg" alt="Close" />
      </div>
      <h1 class="drawer_title"><span class="part-of-the-day">Добрый день</span>,
        <?= $user["name"] ?>
      </h1>
      <nav class="drawer_menu">
        <a href="?" class="drawer_menu_item">
          <span>Главная</span>
          <img src="./assets/icons/home.svg" alt="Home" />
        </a>

        <?
        if ($user['role'] == '1') { ?>
          <a href="?page=profile" class="drawer_menu_item">
            <span>Личный кабинет</span>
            <img src="./assets/icons/user.svg" alt="Profile" />
          </a>
        <? }
        if ($user['role'] == '3') { ?>
          <a href="?page=admin-user" class="drawer_menu_item">
            <span>Админ панель</span>
            <img src="./assets/icons/user.svg" alt="Profile" />
          </a>
        <? }
        if ($user['role'] == '2') { ?>
          <a href="?page=moderator-orders" class="drawer_menu_item">
            <span>Модератор</span>
            <img src="./assets/icons/user.svg" alt="Profile" />
          </a>
        <? }
        ?>
        <a href="?#catalog" class="drawer_menu_item">
          <span>Каталог</span>
          <img src="./assets/icons/catalog.svg" alt="Catalog" />
        </a>
        <a href="?page=recipe-catalog" class="drawer_menu_item">
          <span>Рецепты</span>
          <img src="./assets/icons/recepes.svg" alt="Reciepes" />
        </a>
      </nav>
    </div>
    <a href="?page=sign-in&do=exit" class="drawer_logout">
      <span>Выход</span>
      <img src="./assets/icons/logout.svg" alt="Выйти" />
    </a>
  </div>
</div>
<header class="header">
  <div class="container">
    <div class="header_inner">
      <?
      if ($_SESSION['uid']) { ?>
        <div class="header_menu" id="open-drawer-btn">
          <span class="header_menu_item"></span>
          <span class="header_menu_item"></span>
        </div>
      <? }
      ?>

      <div class="header_logo">
        <a href="?">
          <img src="./assets/img/icons/logo.svg" alt="" />
        </a>
      </div>
      <?
      if ($_SESSION['uid']) { ?>
        <div class="header_cart">
          <div class="cart_count">2</div>
          <a href="?page=cart" class="cart_icon">
            <img src="./assets/img/icons/cart.svg" alt="" />
          </a>
        </div>
      <? }
      ?>

    </div>
  </div>
</header>