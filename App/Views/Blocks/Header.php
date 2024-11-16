<header>
    <div class="logo">
        <a href="/trang-chu">
            <img src="../../../Public/Assets/Images/logo.png" alt="Logo">
        </a>
    </div>
    <div class="search-bar">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" placeholder="Tìm kiếm...">
        <!-- <button type="button">Tìm Kiếm</button> -->
    </div>
    <div class="notifications">
        <button type="button">🔔</button>
    </div>
    <div class="login">
    <?php
        if(!isset($_SESSION['user'])){ ?>
            <button type="button"><a href="/dang-nhap"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></button>
        <?php } else { $user = $_SESSION['user'] ?>
            <button type="button"><a href="/dang-xuat"><i class="fa fa-level-down" aria-hidden="true"></i>Logout</a></button>

            <span><?php echo $user['user_name']  ?></span>
        <?php } ?>        
    </div>   

</header>