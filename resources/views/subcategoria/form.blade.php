<div class="form-group row">
            <label class="col-md-3 form-control-label" for="titulo">Categoría</label>
            
            <div class="col-md-9">
            
                <select class="form-control" name="id" id="id" required>
                                                
                <option value="0" disabled>Seleccione</option>
                
                @foreach($categorias as $cat)
                  
                   <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                        
                @endforeach

                </select>
            
            </div>
                                       
    </div>


     <div class="form-group row">
                <label class="col-md-3 form-control-label" for="nombre">Nombre</label>
                <div class="col-md-9">
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese la nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,100}$">
                </div>
    </div>


    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="nombre">Descripcion</label>
                <div class="col-md-9">
                    <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Ingrese la nombre" required pattern="^[0-9a-zA-Z_,.áéíóúñ\s]{0,200}$">
                </div>
    </div>

    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="imagen">Imagen</label>
                <div class="col-md-9">
                  
                    <input type="file" id="imagen" name="imagen" class="form-control">
                       
                </div>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>