<div class="container">
    <br>
    <center><h2>Preguntas frecuentes.</h2></center>
    <div class="row">
    <?php foreach($preguntasPublicadas as $question){ ?> 
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="card-question">
                <div class="question">
                    <p class="question-1"><?=$question->nombrePregunta;?></p>
                    <p><?=$question->respuesta;?></p>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>