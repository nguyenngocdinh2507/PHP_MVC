
<div class="header--under"></div>
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
    <div class="newPost-btn" id="newPost">
        <a href="<?php if(isset($_SESSION['user'])) echo '/dang-tin' ?>" id="add-post" ><i class="fa-solid fa-plus"></i> Đăng tin</a>
    </div>
    <div class="login">
    <?php
        if(!isset($_SESSION['user'])){ ?>
            <button type="button"><a href="/dang-nhap"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></button>
        <?php } else { $user = $_SESSION['user'] ?>
            <div class="user-avatar">
                <img src="https://i.pravatar.cc/40" alt="Avatar" class="avatar">
                <ul class="dropdown-menu">
                    <li><a href="#" ><?php echo $user['user_name'] ?></a></li>
                    <li><a href="#">Xem bài viết của bạn</a></li>
                    <li><a href="/dang-xuat"><i class="fa fa-level-down" aria-hidden="true"></i>Logout</a></li>
                </ul>    
            </div>
        <?php } ?>    
    </div>   
    

</header>
<div id="toast">
    
</div>
<script>

const btn_add_post = document.querySelector('#add-post');
console.log(btn_add_post.attributes.href.value);
if(btn_add_post.attributes.href.value == ''){
    btn_add_post.attributes.href.value = '#';
}
// Khai báo function toast : có tham số đầu vào là object
var toast = ({title = "",
            message = "",
            type = "success",
            duration = 3000}) =>{
    const main = document.querySelector('#toast')
    console.log(main);
    if(main){
        const toast = document.createElement('div'); //Create element div
        //Sau khoảng tg duration + 1000 thì toast tự xóa
        const idRemove = setTimeout(() => {
            main.removeChild(toast);
        }, duration + 1000);

        // Remove toast when clicked
        toast.onclick = function(e){
            // console.log(e.target)
            if(e.target.closest('.toast__close')){
                // console.log("hehe")
                 main.removeChild(toast);
                clearTimeout(idRemove);
            }
        }

        // Icons
        const icons = {
            success : "fa-solid fa-check"
            ,info : "fa-solid fa-info"
            ,error : "fa-solid fa-triangle-exclamation"
        }

        // Icon của mỗi type
        const icon = icons[type]
        
        //Gán class cho toast
        toast.classList.add('toast', `toast--${type}`)

        //Khai báo delay        
        const delay = (duration/1000).toFixed(2)
        //Add thuộc tính cho toast
        toast.style.animation = `slideInleft ease .5s, fadeOut linear 1s ${delay}s forwards`
        
        //Render toast
        toast.innerHTML = `
                <div class="toast__icon toast__icon--${type}">
                    <i class="${icon}"></i>   
                </div>
                <div class="toast__body">
                    <h3 class="toast__title">
                        ${title}
                    </h3>
                    <p class="toast_msg">
                        ${message}
                    </p>
                </div>
                <div class="toast__close">
                    <i class="fa-solid fa-xmark"></i>
                </div>
        `;

        //Add vào hàm chính
        main.appendChild(toast)
    }
}
btn_add_post.onclick = () =>{
    toast({
        title : "Error"
        ,message : "Đăng nhập đã chứ"
        ,type : "error"
        ,duration : 3000
    })
}
</script>