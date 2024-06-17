<!-- MODAL REGISTER -->
<div class=" modal open">
        

        <div class="modal__body">
            
            <!-- Register form -->
            <form method="POST" action="index.php?act=dangky" class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng ký</h3>
                        <span class="auth-form__switch-btn">DuckHung-Shop</span>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input name="email" type="email" class="auth-form__input" placeholder="Email của bạn" >
                        </div>

                        <div class="auth-form__group">
                            <input name="tendangky" type="text" class="auth-form__input" placeholder="Tên tài khoản" >
                        </div>

                        <div class="auth-form__group">
                            <input name="matkhau" type="password" class="auth-form__input" placeholder="Mật khẩu của bạn" >
                        </div>

                        <div class="auth-form__group">
                            <input name="matkhaunl" type="password" class="auth-form__input" placeholder="Nhập lại mật khẩu" >
                        </div>
                    </div>

                    <div class="auth-form__aside">
                        <p class="auth-form__policy-text">
                            Bằng việc đăng kí, bản đã đồng ý với DuckHung-Shop về 
                            <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
                            <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                        </p>
                    </div>
                    <?php 
                        if(isset($thongbao)){
                            echo $thongbao;
                        }
                    
                    ?>
                    <div class="auth-form__controls">
                        <button class=" btn auth-form__controls-back btn--normal"><a href="index.php">TRỞ LẠI</a></button>
                        <button name="dangky" type="submit" class="btn btn--primary">ĐĂNG KÝ</button>
                    </div>
                </div>

                <div class="auth-form__socials">

                </div>
            </form>
        
        </div>
    </div>
    