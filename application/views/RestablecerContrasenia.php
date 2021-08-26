<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">

    <body>
        <div class="split-screen">
            <div class="left">
                <section class="copy">
                    <h1>Formamos Ganadores</h1>
                    <p>Universidad Salvadoreña Alberto Masferrer</p>
                </section>
            </div>
            <div class="right">
                <form id="ResetPass" class="needs-validation">
                    <section class="copy">
                        <h2>Restablecer Contrase&ntilde;a</h2>
                    </section>

                    <br>

                    <div class="input-container email">
                        <label>Correo Usuario:</label>
                        <input type="email" id="CORREO_USUARIO" name="CORREO_INSTITUCIONAL" placeholder="Correo" required/>
                    </div>
                    <br>
                    <div class="input-container">
                        <label>Fecha de nacimiento usuario:</label>
                        <input type="date" id="FECHA_NACIMIENTO_USUARIO" name="FECHA_NACIMIENTO" required/>
                    </div>

                    <br>
                    <input type="submit" id="btnRecuperar" class="signup-btn" value="Restablecer"/>
                    <br>

                    <div class="form-group" id="alert"></div>
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