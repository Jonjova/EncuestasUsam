<!--Aquí comienza el modal de nuevo Grupo de Alumno -->
<form id="createForm">
  <div class="modal fade" id="createModal" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Grupo de Alumno</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" onclick="obtA();limpiar2();">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
           <label  >Nombre de Grupo</label>
           <input type="text" placeholder="Ingrese nuevo grupo" id="NOMBRE_GRUPO" name="NOMBRE_GRUPO" class="form-control mb-2 mr-sm-2 " required>
         </div>
         <div class="form-row">
          <div class="form-group col-md-10">
           <label  >Alumnos</label>
         </div>
         <div class="form-group col-md-2">
          <button type="button" class="btn btn-outline-dark " onclick="obtA();obtGrupoAlumn();"><span class="fas fa-sync">
          </span>

        </button>
      </div>
    </div>
    <div class="form-group">
    <select name="ID_ALUMNO_GA[]" id="ID_ALUMNO_GA" title="Selecciona.." data-live-search="true" class="bootstrap-select strings show-tick " multiple data-width="100%"   required> 
    </select>
  </div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary pull-left btn-sm" onclick="obtA();limpiar2();" data-dismiss="modal">Cerrar</button>
  <button  type="submit" class="btn btn-success btn-sm" onclick="obtA()">Guardar</button> 
</div>
</div>
</div>
</div>
</form>

<!--Aquí termina el modal de Grupo de Alumno -->
