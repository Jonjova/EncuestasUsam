
<!--Contenido de desarrollo-->
<div class="container" id="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2" id="col-wizard">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="blue" id="wizardProfile">
                    <form id="CrearPermiso" class="needs-validation">

                        <div class="wizard-header">
                            <h3>
                                <b>CREAR</b> NUEVO PERMISO<br>
                                <small>Ingrese la informaci&oacute;n que se solicita del permiso.</small>
                            </h3>
                        </div>

                        <div class="wizard-navigation">
                            <ul>
                                <li><a href="#datosProyecto" data-toggle="tab">Informaci&oacute;n</a></li>

                            </ul>
                        </div>

                        <!-- DATOS WIZARD -->
                        <div class="tab-content" id="tab-content">

                            <!-- DATOS DEL PROYECTO -->
                            <div class="tab-pane" id="datosProyecto">
                                <div class="row" style="display: block;">
                                    <h4 class="info-text"> Datos del permiso </h4>
                                    <div class="col-sm-4 col-sm-offset-1" id="logo_USAM">
                                        <div class="picture-container">
                                            <img src="<?php echo base_url();?>assets/img/logo_USAM.png" class="picture-src" id="wizardPicturePreview" title="" />
                                        </div>
                                    </div>

                                    <br>

                                    <div class="col-sm-6" id="col_persona">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Roles</label>
                                                    <select  name="ROL_ID" id="ROL_ID" class="custom-select"  required></select>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                            <label>Modulos</label>
                                               <select  name="MODULO_ID" id="MODULO_ID" class="custom-select"  required></select>
                                           </div>
                                       </div>

                                   </div>

                                   <div class="col-sm-10 col-sm-offset-1">
                                       <div class="col-sm-6">
                                        <div class="form-group">
                                           <label for="Leer">Leer:</label>
                                           <label class="radio-inline">
                                               <input type="radio" name="LEER" value="1" checked="checked">si
                                           </label>
                                           <label class="radio-inline">
                                               <input type="radio" name="LEER" value="0" checked="checked">no
                                           </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Insertar">Insertar:</label>
                                           <label class="radio-inline">
                                               <input type="radio" name="INSERTAR" value="1" checked="checked">si
                                           </label>
                                           <label class="radio-inline">
                                               <input type="radio" name="INSERTAR" value="0" checked="checked">no
                                           </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                             <label for="Actualizar">Actualizar:</label>
                                           <label class="radio-inline">
                                               <input type="radio" name="ACTUALIZAR" value="1" checked="checked">si
                                           </label>
                                           <label class="radio-inline">
                                               <input type="radio" name="ACTUALIZAR" value="0" checked="checked">no
                                           </label>
                                        </div>
                                    </div>  
                                     <div class="col-sm-6">
                                        <div class="form-group">
                                             <label for="Eliminar">Eliminar:</label>
                                           <label class="radio-inline">
                                               <input type="radio" name="ELIMINAR" value="1" checked="checked">Si 
                                           </label>
                                           <label class="radio-inline">
                                               <input type="radio" name="ELIMINAR" value="0" checked="checked">no
                                           </label>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- FIN DATOS WIZARD -->

                    <div class="wizard-footer height-wizard">
                        <div class="pull-right">
                            <input type="button"  class="btn btn-next btn-fill btn-form btn-wd btn-sm" name="next" value="Next" />
                            <input type="submit"  class="btn btn-finish btn-fill btn-form btn-wd btn-sm" name="finish" value="Finish"/>
                        </div>

                        <div class="pull-left">
                            <input type="button" class="btn btn-previous btn-fill btn-default btn-wd btn-sm" name="previous" value="Previous" />
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </form>
            </div>
        </div>
        <!-- wizard container -->

    </div>

</div>

<!-- end row -->
</div>
<!--aqui termina tu contenido de desarrollo-->

