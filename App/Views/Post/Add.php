


<div id="main__content">
    <?php 
    // Check this
    // echo ('<pre>');
    // var_dump($this);
    // echo ('</pre>');


    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }else{
        header('Location:/trang-chu');
    }
    
    ?>
   <div class="provinces-php">
   </div>
    <div class="post">

        <div class="post__header">
            <div class="post__info">
                <div class="post__avt">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="post__user">
                    <p class="name">
                        <?php echo $user['user_name']; ?>
                    </p>
                    <span class="timeup">
                        1 phút trước
                    </span>
                </div>
            </div>
            <div class="post__menu">
                <span>Giấy tờ</span>
            </div>
        </div>

        <div class="post__content">
            <!-- <p>Tìm giấy tờ : Em trai tên là Nguyễn Tấn Đạt</p>
            <p>
            Góc nhờ vào. Tìm CCCD Em gái em là Nguyễn Thị Thơm,
            khoảng thời gian từ 14h30 đến 15h ngày hôm nay 14/11, 
            em em có đi từ làng Đoài theo đường bên ngoài làng sát KCN, 
            đi qua gốc cây đề làng Đông rồi xong vào cụ Lý xong phải vào trụ sở UBND xã 
            Tam Giang có đánh rơi CCCD mang tên Nguyễn Thị Thơm 15/10/2002. 
            Ai nhỏ được cho em xin lại, em xin cảm ơn và hậu tạ ạ. Liên lạc với em theo sdt 0915084000 ạ.
            Mọi người chia sẻ giúp em với ạ, xin vui lòng
            </p> -->
        </div>
        <div class="post__image">
            <!-- <img src="/Public/Assets/Images/cccd.png" alt="" sizes="" srcset=""> -->
        </div>
        <div class="post__contact">
            <p>Khu vực : Gia Lai - Pleiku - Yên thế Đường trường sơn khúc chợ yên thế ạ.</p>
            <p>Thông tin liên hệ : 00935877623</p>
        </div>

        <div class="post__footer">
            <div class="post__action">
                <p><i class="fa fa-commenting" aria-hidden="true"></i> Bình luận</p>
                <p><i class="fa fa-eye" aria-hidden="true"></i> Lượt xem</p>
            </div>
            <div class="share">
                Chia sẻ
                <i class="fa fa-share" aria-hidden="true"></i>
            </div>
        </div>
    </div>

    <div class="coating">

        <div class="newPost">
            <div class="newPost__header">
                <div class="exit-btn">
                    <a href="#" class="exit" ><i class="fa-solid fa-circle-xmark"></i></a>
                    <p>Đăng tin</p>
                </div>
            </div>
            <form action="/them-tin" method="post" enctype="multipart/form-data">
                <div class="newPost__menu">
                    <span>Loại tin</span>
                    <select name="menu" id="menu" required>
                        <option value=""  hidden>Loại đồ</option>
                        <?php foreach($menus as $key => $value){ ?>
                        <option value="<?php echo $value['menu_id'] ?>"><?php echo $value['name_vn'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                    
                <div class="newPost__content">
                    <textarea id="newPost__content" name="newPost__content" rows="10" cols="80">
                        <h2>Tìm giấy tờ: Nguyễn Văn A</h2>
                        <p>Trong lúc đi chơi ở công viên Cầu Giấy mình có đánh rơi ví.</p>
                        <ul>
                            <li>Căn cước công dân</li>
                            <li>Giấy phép lái xe</li>
                            <li>Thẻ nhân viên</li>
                        </ul>
                        <p>Ai nhặt được xin liên hệ mình qua số điện thoại bên dưới ạ.</p>
                    </textarea>
                </div>
                <div class="newPost__btnAddImage">
                    <input type="file" name="btnAddImage" class="" id="btnAddImage" value = "+ Thêm ảnh" accept="image/*">
                </div> 
                <div class="newPost__location">
                    <input type="text" name="location_value" value="" style="display: none;" >
                    <span>Khu vực mất đồ</span>
                    <select name="province" id="province" aria-placeholder="Vui lòng chọn khu vực" required>
                        <option value=""  >Tất cả địa điểm</option>
                        <?php foreach($provinces as $key => $value){ ?>
                        <option value="<?php echo $value['province_id'] ?>"><?php echo $value['name'] ?></option>
                        <?php } ?>
                    </select>

                    <!-- Select Huyện -->
                    <label for="district">Huyện:</label>
                    <select id="district" name="district" disabled>
                        <option value="">Chọn Huyện</option>
                    </select>

                    <!-- Select Phường -->
                    <label for="ward">Phường:</label>
                    <select id="ward" name="ward" disabled>
                        <option value="">Chọn Phường</option>
                    </select>
                    <textarea name="street" id="street" rows="4" placeholder="Số nhà hoặc tên phố"></textarea>
                </div>
                <div class="newPost__tel">
                    <span>Số điện thoại</span>
                    <input type="text" id="phone" name="phone" placeholder="0123456789" required>
                </div>
                <!-- <div class="newPost__reward">
                    <span>Treo thưởng (Có thể bỏ qua)</span>
                    <input type="text" name="" id="" placeholder="VND" >
                </div> -->
                <div class="newPost__footer">
                    <!-- <button class="cancel-btn" >Thoát</button> -->
                    <button class="btn" >Đăng tin</button>
                </div>

        </form>
    </div>

</div>

<!-- Box confirm -->
<div class="overlay" id="customConfirm">
    <div class="confirm-box">
        <h2>Xác nhận</h2>
        <p>Nếu bạn thoát mọi dữ liệu sẽ biến mất</p>
        <div class="confirm-buttons">
            <button id="confirmYes">Đồng ý</button>
            <button id="confirmNo" class="cancel-btn">Hủy</button>
        </div>
    </div>
</div>
</div>

<script setup >
//Khởi tạo editor 5
ClassicEditor
    .create(document.querySelector('#newPost__content'), {
        toolbar: [
            'heading', '|', 'bold', 'italic', 'underline', 'link', 
            'bulletedList', 'numberedList', '|', 'blockQuote', 'undo', 'redo'
        ],
        placeholder: "Nhập nội dung bài viết tại đây...",
    })
    .then(editor => {
        editorInstance = editor;

        // Lắng nghe sự kiện thay đổi nội dung
        editor.model.document.on('change:data', () => {
            const content = editor.getData();
            // console.log('Nội dung thay đổi:', content);
            p_content = document.querySelector('.post__content');
            p_content.innerHTML = content;
        });
    })
    .catch(error => {
        console.error(error);
    });
    // const $ = document.querySelector.bind(document);
    // const $$ = document.querySelectorAll.bind(document);
    
    //Exit Nút thoát
    const btn_exit = document.querySelector('.exit');
    const customConfirm = document.getElementById("customConfirm");
    const confirmYes = document.getElementById("confirmYes");
    const confirmNo = document.getElementById("confirmNo")
    btn_exit.onclick = ((event) => {
        customConfirm.classList.add("active");
        event.preventDefault();
    })
    confirmYes.addEventListener("click", () => {
        // history.back();
        window.location.href = '/trang-chu';
        customConfirm.classList.remove("active");
    });

    confirmNo.addEventListener("click", () => {
        customConfirm.classList.remove("active");
    });
    
    
    //Auto load template
    //Menu
    var e_menu = document.getElementById("menu");
    e_menu.onchange = ((event) => {
        console.log(event);
        var value = e_menu.value;
        // console.log(value);
        var text = e_menu.options[e_menu.selectedIndex].text;
        // console.log(text);
        
        const p_menu = document.querySelector('.post__menu');
        p_menu.childNodes[1].innerHTML = text;
    })
    
    //Image
    // const btn_addImage = document.querySelector('#btnAddImage')
    
    // //Add image
    // btn_addImage.onclick = ((event) => {
    //     event.preventDefault();
    // })
    const e_image = document.querySelector('#btnAddImage');
    const p_image =document.querySelector('.post__image');
    if(p_image){
        const imgs = document.createElement('img');
        e_image.addEventListener('change', function () {
            console.log(p_image);
            const file = this.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function (e) {
                    imgs.src = e.target.result; // Hiển thị ảnh
                };
                
                p_image.appendChild(imgs)
                
                reader.readAsDataURL(file); // Đọc file dưới dạng URL
            } else {
                imgs.src = ""; // Xóa ảnh nếu không chọn file
            }
        });
    }

    //Location. Tỉnh huyện xã
    $(document).ready(function() {
        // Khi chọn tỉnh, lấy danh sách huyện
        $('#province').change(function() {
            const provinceId = $(this).val();
            $('#district').html('<option value="">Loading...</option>').prop('disabled', true);
            $('#ward').html('<option value="">Chọn Phường</option>').prop('disabled', true);

            if (provinceId) {
                $.ajax({
                    url: '/lay-huyen', // File PHP xử lý lấy huyện
                    method: 'GET',
                    data: { province_id: provinceId },
                    success: function(data) {
                        const districts = JSON.parse(data);
                        console.log(districts);
                        let options = '<option value="">Chọn Huyện</option>';
                        districts.forEach(function(district) {
                            options += `<option value="${district.district_id}">${district.name}</option>`;
                        });
                        $('#district').html(options).prop('disabled', false);
                    }
                });
            } else {
                $('#district').html('<option value="">Chọn Huyện</option>').prop('disabled', true);
            }
        });

        // Khi chọn huyện, lấy danh sách phường
        $('#district').change(function() {
            const districtId = $(this).val();
            // console.log(districtId);
            $('#ward').html('<option value="">Loading...</option>').prop('disabled', true);

            if (districtId) {
                $.ajax({
                    url: 'lay-phuong', // File PHP xử lý lấy phường
                    method: 'GET',
                    data: { district_id: districtId },
                    success: function(data) {
                        const wards = JSON.parse(data);
                        // console.log(wards);
                        let options = '<option value="">Chọn Phường</option>';
                        wards.forEach(function(ward) {
                            options += `<option value="${ward.wards_id}">${ward.name}</option>`;
                        });
                        $('#ward').html(options).prop('disabled', false);
                    }
                });
            } else {
                $('#ward').html('<option value="">Chọn Phường</option>').prop('disabled', true);
            }
        });
    });

    
    const p_location =document.querySelector('.post__contact').childNodes[1];
    const location_value = document.getElementsByName('location_value')[0];
    // console.log(location_value.value);
    var text_location = "";
    var province = "";
    var district = "";
    var ward = "";
    var street = "";
    

    const e_province = document.querySelector('#province');
    e_province.onchange = ((event) => {
        province = e_province.options[e_province.selectedIndex].textContent;
        text_location = ` Khu vực: ${province} ${district} ${ward} ${street}`;
        p_location.innerHTML = text_location;
        location_value.value =text_location
        // console.log(text_location);
    });
    
    const e_district = document.querySelector('#district');
    e_district.onchange = ((event) => {
        district = " - " + e_district.options[e_district.selectedIndex].textContent;
        text_location = ` Khu vực: ${province} ${district} ${ward} ${street}`;
        p_location.innerHTML = text_location;
        location_value.value =text_location
        // console.log(text_location);
    });
    
    const e_ward = document.querySelector('#ward');
    e_ward.onchange = ((event) => {
        ward = " - " + e_ward.options[e_ward.selectedIndex].textContent;
        text_location = ` Khu vực: ${province} ${district} ${ward} ${street}`;
        p_location.innerHTML = text_location;
        location_value.value =text_location
        // console.log(text_location);
    });

    const e_street = document.querySelector('#street');
    e_street.onkeyup = ((event) => {
        street = " - " + event.target.value
        text_location = ` Khu vực: ${province} ${district} ${ward} ${street}`;
        p_location.innerHTML = text_location;
        location_value.value =text_location
    });

    const p_phone =document.querySelector('.post__contact').childNodes[3];
    // console.log(p_phone);
    const e_phone =document.querySelector('#phone');
    e_phone.onkeyup = ((event) => {
        const phone = event.target.value;
        p_phone.innerHTML = `Số điện thoại : ${phone}`;
    })


</script>