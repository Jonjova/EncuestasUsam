<!--Recursos Diseño y alertas -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estilo.css')?>">
<body>
	<div class="split-screen">
        <div class="left">
            <section class="copy">
                <h1>Formamos Ganadores</h1>
                <p>Universidad Salvadoreña Alberto Masferrer</p>
            </section>
        </div>
        <div class="right">
            <form id="logForm" method="post">
                <div style="text-align:center;">

                </div>
                <section class="copy">
                    <h2>Inicio de Sesión</h2>
                </section>
                <?php echo validation_errors(); ?>
                <div class="input-container email">
                    <input type="text"  name="user" placeholder="Usuario" />
                </div>
                <div class="input-container">
                    <input type="password" name="password" placeholder="Password" />
                    <!--<i class="fas fa-eye-slash"></i>-->
                </div>
                <button type="submit" id="btnIngresar" class="signup-btn"><span id="logText"></span></button>
                <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                    <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                    <span id="message"></span>
                </div>
                <section class="copy legal">
                    <p>
                        <span class="small">
                            Universidad Salvadoreña Alberto Masferrer <br />
                            <a href="#">&copy; <?php echo date('Y'); ?> </a>&amp;<a href="#">
                            Derechos Reservados
                        </a>
                    </span>
                </p>
            </section>
        </form>
    </div>
</div>
</body>


