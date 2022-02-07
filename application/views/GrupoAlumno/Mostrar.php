            <h2>Grupos Registrados</h2>

            <br>

            <form action="">
                <table id="Grupos" class="table table-hover table-striped dt-responsive nowrap"
                    style="width: 100%; margin: auto;">
                    <thead style="background-color: #094f8b; color: #fff; font-size: 17px;">
                        <tr>
                            <th>#</th>
                            <th>Nombre Grupo</th>
                            <th>Asignatura</th>
                            <th>Ciclo</th>
                            <th>Alumnos</th>
                        </tr>
                    </thead>
                </table>
            </form>

            <div class="modal fade" id="modalGrupos" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #094f8b; color: #fff;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Informaci&oacute;n del grupo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times-circle text-white"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <br>
                            <div class="row" style="word-break: break-all;">
                                <div class="col-sm-12">
                                    <div id="INTEGRANTES"
                                        style="width: fit-content; margin: auto; margin-top: 30px; margin-bottom: 50px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color: #094f8b;">
                            <div class="btn-sm"></div>
                        </div>
                    </div>
                </div>
            </div>