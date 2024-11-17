


<div id="main__content">
    <?php 
    // Check this
    // var_dump($this);

    $totalPost = count($posts);

    ?>
    <div class="total_post">
        <h4>Tổng số tin : <?php echo $totalPost ?></h4>
    </div>
    <?php
    if(empty($posts)){
        echo 'LOADING !!!'; exit();
    }
    foreach ($posts as $key => $post) { 
    
    //Get user_name by id
    $user_post_id = $post['user_id'];
    $user_post = $this->model_user->getUserById($user_post_id);
    $user_post_name = $user_post['user_name'];
    
    //Time has passed 
    $posttingTime = $post['created_at'];
    $timeHasPassed = $this->timeElapsed($posttingTime);

    //Get menu name
    $menu = $post['menu_id'];
    $menu = $this->model_home->getMenuById($menu);
    $menu = $menu['name_vn'];
    
    $postContent = $post['content'];
    $postImage = $post['image'];
    $location = $post['location'];
    $phoneNumber = $post['phone_number'];

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
            <p>Khu vực : <?php echo $location ?></p>
            <p>Thông tin liên hệ : <?php echo $phoneNumber ?></p>
        </div>

        <div class="post__footer">
            <div class="post__action">
                <p><i class="fa fa-commenting-o" aria-hidden="true"></i> Bình luận</p>
                <p><i class="fa fa-eye" aria-hidden="true"></i> Lượt xem 900k</p>
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
</div>