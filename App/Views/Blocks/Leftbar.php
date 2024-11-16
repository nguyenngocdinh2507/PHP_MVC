<aside>
    <div class="leftbar">

        <div class="leftbar__header">
            <select id="cities" name="cities" >
                <option value="" hidden >Tất cả địa điểm</option>
                <?php 
                    foreach($provinces as $key => $value){
                        print_r('<option value="'.$key.'">'.$value['name'].'</option>');
                    }
                ?>
            </select>
        </div>

        <div class="leftbar__menu">
            <ul>
                <?php foreach($menus as $key => $value){?>
                <li class="menu-items menu-selected">
                    <?php
                    if($value['url_icon'])
                    echo '<i class="fa '.$value['url_icon'].'" aria-hidden="true"></i>';
                    echo $value['name_vn'];
                    ?>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</aside>