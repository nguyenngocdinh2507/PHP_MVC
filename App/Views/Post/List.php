


<div id="main__content">
    <?php 
    // Check this
    // echo ('<pre>');
    // var_dump($this);
    // echo ('</pre>');

    if(empty($posts)){
        echo 'LOADING !!!'; 
    }
    $totalPost = count($posts);

    ?>
    <div class="total_post">
        <h4>Tổng số tin : <?php echo $totalPost ?></h4>
    </div>
    <?php
    foreach ($posts as $key => $post) { 
    
    //Get user_name
    $user_post_id = $post['user_id'];
    $user_post_name = $post['user_name'];
    
    //Time has passed 
    $timeHasPassed = $post['time_passed'];

    //Get menu name
    $menu = $post['menu_name'];
    
    //Post
    $postContent = $post['content'];
    $postImage = $post['image'];
    $location = $post['location'];
    $phoneNumber = $post['phone_number'];
    $views = $post['views'];

    //Tai khoan
    $user_id = '';
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $user_id = $user['user_id'];
    }

    ?>
    <div class="post">

        <div class="post__header">
            <div class="post__info">
                <div class="post__avt">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="post__user">
                    <p class="name">
                        <?php echo $user_post_name?>
                    </p>
                    <span class="timeup">
                        <?php echo $timeHasPassed ?>
                    </span>
                </div>
            </div>
            <div class="post__menu">
                <span><?php echo $menu ?></span>
            </div>
        </div>

        <div class="post__content">
            <p><?php echo $postContent ?>
            </p>
        </div>
        <div class="post__image">
            <img src="/Public/Assets/Images/<?php echo $postImage ?>" alt="" sizes="" srcset="">
        </div>
        <div class="post__contact">
            <p><?php echo $location ?></p>
            <p>Thông tin liên hệ : <?php echo $phoneNumber ?></p>
        </div>

        <div class="post__footer">
            <div class="post__action">
                <p><i class="fa fa-commenting-o" aria-hidden="true"></i> Bình luận</p>
                <p><i class="fa fa-eye" aria-hidden="true"></i> Lượt xem <?php echo $views ?></p>
                <!-- Nếu là bài biết của tk -->
                <?php if($user_id == $user_post_id){ ?>
                    <p><i class="fa fa-pencil" aria-hidden="true"></i></p>
                    <p><i class="fa fa-trash" aria-hidden="true"></i></p>
                <?php } ?>
            </div>
            <div class="share">
                Chia sẻ
                <i class="fa fa-share" aria-hidden="true"></i>
            </div>
        </div>

    </div>
    
    <?php } ?>
    <!-- <div class="post">

        <div class="post__header">
            <div class="post__info">
                <div class="post__avt">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="post__user">
                    <p class="name">
                        Dinh
                    </p>
                    <span class="timeup">
                        5 Giờ trước
                    </span>
                </div>
            </div>
            <div class="post__menu">
                <span>Giấy tờ</span>
            </div>
        </div>

        <div class="post__content">
            <p>Tìm giấy tờ : Em trai tên là Nguyễn Tấn Đạt</p>
            <p>
            Góc nhờ vào. Tìm CCCD Em gái em là Nguyễn Thị Thơm,
            khoảng thời gian từ 14h30 đến 15h ngày hôm nay 14/11, 
            em em có đi từ làng Đoài theo đường bên ngoài làng sát KCN, 
            đi qua gốc cây đề làng Đông rồi xong vào cụ Lý xong phải vào trụ sở UBND xã 
            Tam Giang có đánh rơi CCCD mang tên Nguyễn Thị Thơm 15/10/2002. 
            Ai nhỏ được cho em xin lại, em xin cảm ơn và hậu tạ ạ. Liên lạc với em theo sdt 0915084000 ạ.
            Mọi người chia sẻ giúp em với ạ, xin vui lòng
            </p>
        </div>
        <div class="post__image">
            <img src="/Public/Assets/Images/cccd.png" alt="" sizes="" srcset="">
        </div>
        <div class="post__contact">
            <p>Khu vực : Gia Lai - Pleiku - Yên thế Đường trường sơn khúc chợ yên thế ạ.</p>
            <p>Thông tin liên hệ : 00935877623</p>
        </div>

        <div class="post__footer">
            <div class="post__action">
                <p><i class="fa fa-commenting-o" aria-hidden="true"></i> Bình luận</p>
                <p><i class="fa fa-eye" aria-hidden="true"></i> Lượt xem 900k</p>
            </div>
            <div class="share">
                Chia sẻ
                <i class="fa fa-share" aria-hidden="true"></i>
            </div>
        </div> -->

    </div>
</div>