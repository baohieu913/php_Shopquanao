<div class="app__container">
            <div class="grid">
                <div class="grid__row app__content">
                    <div class="grid__column-2">
                        <nav class="category">
                            <h3 class="category__heading">DANH MỤC</h3>
                            <ul class="category-list">
                                <?php 
                                    foreach ($danhMuc as $loaiSP) {
                                        extract($loaiSP);
                                        $linkDM = "index.php?act=SPtheoDM&maLoai=".$maLoai;
                                        if($trangthaiLoai == 1){
                                            echo '  <li class="category-item">
                                                            <a href="'.$linkDM.'" class="category-item__link">'.$tenLoai.'</a>
                                                    </li>';
                                        }
                                    }
                                ?>                             
                            </ul>
                        </nav>
                    </div>
    
                    <div class="grid__column-10">
                        <!-- <div class="home-filter">
                            <span class="home-filter__label">Sắp xếp theo</span>
                            <button class="home-filter__btn btn">Phổ biến</button>
                            <button class="home-filter__btn btn btn--primary">Mới nhất</button>
                            <a href="index.php?act=timkiemSP&sapxep=banChay"><button class="home-filter__btn btn btn--primary">Bán chạy</button></a>
                        </div> -->

                        <div class="home-product">
                            <div class="grid__row">
                                <!-- Product item -->
                                <?php 
                                if(count($sanphamtimkiem) == 0){
                                    echo '<img src="./assets/img/no_product_found.jpg" alt="" class="header__cart-no-cart-img">';
                                } else {
                                    foreach ($sanphamtimkiem as $dsSP) {
                                        extract($dsSP);
                                        if($soLuong > 0 && $trangthaiSP == 1){
                                            $loai=loadOne_danhmuc($maLoai);
                                            extract($loai);
                                            // Số lượng bán
                                            $soLuongban=loadSLB_sanpham($maSP);
                                            if(is_array($soLuongban)){
                                                extract($soLuongban);
                                            } else {
                                                $soluongBan = 0;
                                            }
                                            
                                            //
                                            $anhSPham = "'".$img_path.$anhSP."'";
                                            $giaSPham = $giaSP;
                                            $giaTienSP = number_format($giaSPham).'đ';
                                            $chitietSP = "index.php?act=chitietSP&maSP=".$maSP;
                                            echo '  <div class="grid__column-2-4">
                                                        <a href="'.$chitietSP.'" class="home-product-item">
                                                            <div class="home-product-item__img" style="background-image: url('.$anhSPham.');"></div>
                                                            <h4 class="home-product-item__name">'.$tenSP.'</h4>
                                                            <div class="home-product-item__price">
                                                                <span class="home-product-item__price-current">'.$giaTienSP.'</span>
                                                            </div>
                                                            <div class="home-product-item__action">
                                                                <span class="home-product-item__like home-product-item__like--liked"> <!--Open: home-product-item__like--liked-->
                                                                    <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                                                    <i class="home-product-item__like-icon-fill fa-solid fa-heart"></i>
                                                                </span>
                                                                <div class="home-product-item__rating">
                                                                    <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                                                    <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                                                    <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                                                    <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                </div>
                                                                <span class="home-product-item__sold">'.$soluongBan.' đã bán</span>
                                                            </div>
                                                            <div class="home-product-item__origin">
                                                                <span class="home-product-item__brand">'.$thuongHieu.'</span>
                                                                <span class="home-product-item__origin-name">'.$xuatXu.'</span>
                                                            </div>
                                                            <div class="home-product-item__favourite">
                                                                <i class="fa-solid fa-check"></i>
                                                                <span>Yêu thích</span>
                                                            </div>
                                                            
                                                        </a>
                                                    </div>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <ul class="pagination home-product__pagination">
                            <?php
                                for ($i = 1; $i <= $total_page_timkiem; $i++) {
                                    if($i == $pagetk){
                                        echo '  <li class="pagination-item pagination-item--active">
                                                    <a href="index.php?act=timkiemSP&pagetk='.$i.' &key='.$key.'" class="pagination-item__link">'.$i.'</a>
                                                </li>';
                                    }
                                    else {
                                        echo '  <li class="pagination-item">
                                                    <a href="index.php?act=timkiemSP&pagetk='.$i.' &key='.$key.'" class="pagination-item__link">'.$i.'</a>
                                                </li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>