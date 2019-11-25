      
   
    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="nombre">Nombre</label>
                <div class="col-md-9">
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el Nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
                    
                </div>
    </div>

    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="email">Correo</label>
                <div class="col-md-9">
                  
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el correo">
                       
                </div>
    </div>

     <div class="form-group row">
                <label class="col-md-3 form-control-label" for="password">Password</label>
                <div class="col-md-9">
                  
                    <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese el password" required>
                       
                </div>
    </div>

    <div class="form-group row">
            <label class="col-md-3 form-control-label" for="id">Rol</label>
            
            <div class="col-md-9">
            
                <select class="form-control" name="id" id="id">
                                                
                <option value="0" disabled>Seleccione</option>
                
                @foreach($roles as $rol)
                  
                   <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                        
                @endforeach

                </select>
            
            </div>
                                       
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
        
    </div>