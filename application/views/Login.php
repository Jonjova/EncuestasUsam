            <!--Recursos Diseño y alertas -->
            <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">

            <div class="lds-ring loader" id="loader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="split-screen">
                <div class="left">
                    <section class="copy">
                        <h1>Formamos Ganadores</h1>
                        <p>Universidad Salvadoreña Alberto Masferrer</p>
                    </section>
                </div>
                <div class="right">
                    <form method="POST" action="<?php echo base_url()?>Accesos/Validar" id="logForm">
                        <div style="text-align:center;">

                        </div>
                        <section class="copy">
                            <h2>Inicio de Sesión</h2>
                        </section>
                        <br>
                        <div class="input-container email">
                            <input type="text" name="user" placeholder="Usuario" />
                        </div>
                        <div class="input-container">
                            <input ID="txtPassword" type="password" name="password" placeholder="Password" />
                            <div class="input-group-append">
                                <button id="show_password" class="contra-btn" type="button" onclick="mostrarPassword()">
                                    <span class="fa fa-eye-slash icon"></span> </button>
                            </div>
                        </div>

                        <br>

                        <button type="submit" id="btnIngresar" class="signup-btn">Ingresar</button>
                        <br>
                        <div class="form-group" id="alert"></div>
                        <section class="copy legal">
                            <p>
                                <span class="small">
                                    Universidad Salvadoreña Alberto Masferrer <br />
                                    <a href="#">&copy; <?php echo date('Y'); ?> </a>
                                    &amp;
                                    <a href="#">
                                        Derechos Reservados
                                    </a>
                                </span>
                            </p>
                        </section>
                    </form>
                </div>
            </div>