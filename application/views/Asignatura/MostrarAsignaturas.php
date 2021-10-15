        <h2>Asignaturas Registradas</h2>

        <br>
		
        <form action="">
            <table id="Asignaturas" class="table table-hover table-striped dt-responsive nowrap" style="width: 100%; margin: auto;">
                <thead style="background-color: #094f8b; color: #fff; font-size: 17px;">
                    <tr>
                        <th>#</th>
                        <th>C&oacute;digo Asignatura</th>
                        <th>Nombre Asignatura</th>
                        <?php if($this->session->userdata('ID_TIPO_USUARIO') == 1): ?>
                            <th>Coordinador</th>
                            <th>Coordinaci&oacute;n</th>
                        <?php endif; ?>
                    </tr>
                </thead>
            </table>
        </form>