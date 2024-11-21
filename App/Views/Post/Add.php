


<div id="main__content">
    <?php 
    // Check this
    // echo ('<pre>');
    // var_dump($this);
    // echo ('</pre>');
    ?>
   
    <div class="post">

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
        </div>

    </div>

    <div class="newPost">
        <div class="newPost__header">

        </div>
        <form action="" method="post">
            <div class="menu">

            </div>

            <div class="content">
                <textarea id="content" name="content" rows="10" cols="80">
                    <h2>Tìm giấy tờ: Nguyễn Văn A</h2>
                    <p>Trong lúc đi chơi ở công viên Cầu Giấy mình có đánh rơi ví.</p>
                    <ul>
                        <li>Căn cước công dân</li>
                        <li>Giấy phép lái xe</li>
                        <li>Thẻ nhân viên</li>
                    </ul>
                    <p>Ai nhặt được xin liên hệ mình qua số điện thoại bên dưới ạ.</p>
                </textarea>
                <script>
                    CKEDITOR.replace('editor', {
                        height: 300, // Chiều cao editor
                        toolbar: [
                            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                            { name: 'paragraph', items: ['BulletedList', 'NumberedList', 'Blockquote'] },
                            { name: 'links', items: ['Link', 'Unlink'] },
                            { name: 'insert', items: ['Image', 'Table'] },
                            { name: 'styles', items: ['Format'] },
                            { name: 'document', items: ['Source'] } // Hiển thị nút "Source" để xem mã HTML
                        ]
                    });
                </script>
            </div>   
        </form>
    </div>

</div>