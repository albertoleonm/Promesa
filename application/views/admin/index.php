<script type="text/javascript" src="<?=base_url();?>/js/login.js"></script>
<main>
    <div id="container">
        <!-- Start	Product details -->
        <div class="product-details">
            <br>
            <center><h3>Inicia sesión</h3></center>
        <br>
        <form id="loginUsuario" action="<?=base_url();?>admin/login" method="post">
            <input type="text" name="user" id="user" class="form-control" maxlength="10" placeholder="Ingresa el usuario">
            <br>
            <input type="password" name="pass" id="pass" maxlength="150" class="form-control" placeholder="Ingresa la contraseña">
            <br>
            <center> <button type="submit" class="btn boton" onclick="return validar();">ENTRAR</button></center>
        </form>
        <hr>
        <a href="<?=base_url();?>">Volver al sitio web <i class="fas fa-arrow-right"></i></a>
        <br>
        </div>
        <div class="product-image">
            <img src="<?=base_url();?>/images/form.jpg" class="image-card" alt="Promesa">
        </div>
    </div>
    <center>
        <div class="see" id="messageUser">
                <div class="alert alert-danger" role="alert">
                    <p><i class="fas fa-user"></i> El campo USUARIO esta vacio</p>
                </div>
            </div>
            <div class="see" id="messagePass">
                <div class="alert alert-danger" role="alert">
                <p><i class="fas fa-unlock"></i> El campo CONTRASEÑA esta vacio</p>
            </div>
        </div>
    </center>
</main>

<script>
    function validar(){
        var name = document.getElementById('user').value;
        var pass = document.getElementById('pass').value;
        var x = document.getElementById('messageUser');
        var passU = document.getElementById('messagePass');
        if(name == ''){
            x.className = "showUser";
            setTimeout(function(){ x.className = x.className.replace("showUser", "see"); }, 4000);
            return false;
        }else if(pass == ''){
            passU.className = "showPass";
            setTimeout(function(){ passU.className = passU.className.replace("showPass", "see"); }, 4000);
            return false;
        }else{
            return true;
        }
    }
</script>
