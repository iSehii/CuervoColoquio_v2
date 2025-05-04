<div class="encabezado">
        <div class="barra">
        <div id="menu" class="menu" style="cursor: pointer; z-index: 999" onclick="Menu()">
            <span class="material-symbols-outlined">
            menu
            </span>
        </div>
        <div class="inicio" style="cursor: pointer" id="inicio" onclick="inicio()">
            <img class="logoDesktop" src="../../files/behuse-logos/behuse-logotipo.png">
            <img class="logo" src="../../files/behuse-logos/behuse-logo.png">
        </div>
            <div class="auth-links">
                <div class="login" style="visibility: hidden">
                    <a href="../../pgs/auth/login/">Iniciar sesión</a>
                </div>

                <div id="menuUser" style="cursor: pointer;" onclick="UserMenu();">
                
                <div class="circle"  ><?php echo '<img src="../../files/Users/images/'.$Usuario->getFoto().'" width="48px" height="48px" style="border-radius: 48px">'?></div>
                </div>
            </div>
        </div>
    </div>