     <div class="form-group row">
         <label class="col-md-3 form-control-label font-weight-bold" for="nombre">Nombre</label>
         <div class="col-md-9">
             <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el Nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">

         </div>
     </div>

     <div class="form-group row">
         <label class="col-md-3 form-control-label font-weight-bold" for="direccion">Dirección</label>
         <div class="col-md-9">
             <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ingrese la dirección" pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
         </div>
     </div>

     <div class="form-group row">
         <label class="col-md-3 form-control-label font-weight-bold" for="documento">Documento</label>

         <div class="col-md-9">

             <select class="form-control selectpicker" name="tipo_documento" id="tipo_documento">

                 <option value="0" disabled>Seleccione</option>
                 <option value="RUT">RUT</option>


             </select>

         </div>

     </div>


     <div class="form-group row">
         <label class="col-md-3 form-control-label font-weight-bold" for="num_documento">Número documento</label>
         <div class="col-md-9">
             <input type="text" id="num_documento" name="num_documento" class="form-control" placeholder="Ingrese el número documento" pattern="[0-9]{0,15}">
         </div>
     </div>

     <div class="form-group row">
         <label class="col-md-3 form-control-label font-weight-bold" for="telefono">Telefono</label>
         <div class="col-md-9">

             <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Ingrese el telefono" pattern="[0-9]{0,15}">

         </div>
     </div>

     <div class="form-group row">
         <label class="col-md-3 form-control-label font-weight-bold" for="telefono">Correo</label>
         <div class="col-md-9">

             <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el correo">

         </div>
     </div>

     <div class="modal-footer">
         <button type="button" class="btn btn-danger bg-gradient-red" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
         <button type="submit" class="btn btn-success bg-gradient-success"><i class="fas fa-save"></i> Guardar</button>

     </div>