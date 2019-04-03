<div class="container">
    <center><h1 class="first-title">Contáctanos</h1></center>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h4>Visita nuestra tienda física.</h4><br>
            <p><i class="fas fa-map-marker-alt icons"></i> Manuel Doblado No. 1676, Col. Cantera.</p>
            <p><i class="fas fa-globe icons"></i> Acámbaro, Guanajuato.</p><br>
            <h4>Ponte en contacto con nosotros.</h4><br>
            <p><i class="fab fa-whatsapp icons"></i> 417 156 12 34 / 417 123 45 67</p>
            <p><i class="fas fa-phone icons"></i> (044) 417 172 63 56</p>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <form method="post" action="contacto/saveComentario">
                <div class="formulario">
                    <div class="md-form">
                        <input type="text" name="nombre" id="name" maxlength="50" class="form-control inputs">
                        <label for="name">Escribe tu nombre</label>
                        <span id="errorName" class="error"></span>
                    </div>
                    <div class="md-form">
                        <input type="text" id="mail" name="mail" maxlength="50" class="form-control inputs">
                        <label for="mail">Escribe tu correo electrónico</label>
                        <span id="errorMail" class="error"></span>
                    </div>
                    <div class="md-form">
                        <textarea id="message" name="mensaje" maxlength="350" class="form-control md-textarea inputs" rows="3"></textarea>
                        <label for="message">Escribe tu mensaje</label>
                        <span id="errorComent" class="error"></span>
                    </div>
                    <center><button type="submit" class="btn send" onclick="return validarComentarios();">Enviar</button></center>
                </div>
            </form>
        </div>
    </div><br>
    <div class="row">
        <center><h4 style="padding: 10px;">¿Cómo llegar?</h4></center><br>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m25!1m12!1m3!1d8915.59091919093!2d-100.72214050051018!3d20.027635022262547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m10!3e2!4m3!3m2!1d20.0327439!2d-100.7206161!4m4!1s0x842cd60dd88ee377%3A0x409e9369be2e5349!3m2!1d20.0222124!2d-100.719177!5e0!3m2!1ses!2smx!4v1553465126970" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<script>
    function validarComentarios(){
        var nombre = document.getElementById('name').value;
        var mail = document.getElementById('mail').value;
        var coment = document.getElementById('message').value;
        var expre = /\w+@\w+\.+[a-z]/;
        if(nombre == ''){
            document.getElementById('errorName').innerHTML = "El campo nombre es obligatorio";
            return false;
        }else if(mail == ''){
            document.getElementById('errorMail').innerHTML = "El campo correo electrónico es obligatorio";
            return false;
        }else if(coment == ''){
            document.getElementById('errorComent').innerHTML = "El campo mensaje es obligatorio";
            return false;
        }else if(!expre.test(mail)){
            document.getElementById('errorMail').innerHTML = "El correo electrónico no es valido, intenta de nuevo.";
            return false;
        }else{
            alert("Nos pondremos en contacto contigo, gracias");
            return true;
        }
    }
</script>
