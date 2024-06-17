<!-- MODAL REGISTER -->
<div class=" modal open">
        

        <div class="modal__body">
            
            <!-- Register form -->
            <form method="POST" action="index.php?act=quenmk" class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Quên mật khẩu</h3>
                        <span class="auth-form__switch-btn">DuckHung-Shop</span>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input name="email" type="email" class="auth-form__input" placeholder="Email của bạn" >
                        </div>                     
                    </div>
                
                    <?php 
                        if(isset($thongbao)){
                            echo $thongbao;
                        }
                    
                    ?>
                    <div class="auth-form__controls">
                        <button class=" btn auth-form__controls-back btn--normal"><a href="index.php?act=dangnhap">TRỞ LẠI</a></button>
                        <button name="guiemail" type="submit" class="btn btn--primary">GỬI</button>
                    </div>
                </div>
                <div class="auth-form__socials">
                </div>
            </form>
        
        </div>
    </div>
    