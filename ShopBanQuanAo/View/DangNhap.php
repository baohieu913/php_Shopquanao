<!-- MODAL LOGIN-->
<div class="js-modal-login modal open">


    <div class="modal__body">
        <!-- Login form -->
        <form method="POST" action="index.php?act=dangnhap" class=" auth-form">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng nhập</h3>
                    <span class="auth-form__switch-btn">DuckHung-Shop</span>
                </div>

                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <input name="tendangnhap" type="text" class="auth-form__input" placeholder="Tên đăng nhập" >
                    </div>

                    <div class="auth-form__group">
                        <input name="matkhau" type="password" class="auth-form__input" placeholder="Mật khẩu của bạn" >
                    </div>
                </div>

                <div class="auth-form__aside">
                    <div class="auth-form__help">
                        <a href="index.php?act=quenmk" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                        <span class="auth-form__help-separate"></span>
                        <a href="" class="auth-form__help-link ">Cần trợ giúp?</a>
                    </div>
                </div>
                <?php 
                    if(isset($thongbao)){
                        echo $thongbao;
                    }
                    
                ?>
                <div class="auth-form__controls">
                    <button class="js-close btn auth-form__controls-back btn--normal"><a href="index.php">TRỞ LẠI</a></button>
                    <button name="dangnhap" type="submit" class="btn btn--primary">ĐĂNG NHẬP</button>
                </div>
            </div>

            <div class="auth-form__socials">
            </div>
        </form>
        
    </div>
</div>
