<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">

        <h1>Formulario Empleado</h1>
      <div class="container">
      <form class ="d-flex" method="Post" id="frmEmpleado">
      @csrf
        <div class="col">
        <div class="mb-3">
            <label for="lbl_id" class="form-label"><b>ID</b></label>
            <input type="text" name="txt_id" id="txt_id" class="form-control" value="0" readonly>
          </div>
          <div class="mb-3">
            <label for="lbl_codigo" class="form-label"><b>Codigo</b></label>
            <input type="text" name="txt_codigo" id="txt_codigo" class="form-control" placeholder="Codigo E001" Required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
            <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Nombres: Nombre1 Nombre2" Required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="lbl_apellidos" class="form-label"><b>apellidos</b></label>
            <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="apellidos: Apellido1 Apellido2" Required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="lbl_direccion" class="form-label"><b>direccion</b></label>
            <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="direccion: #Casa #Lote" Required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="lbl_Telefono" class="form-label"><b>telefono</b></label>
            <input type="number" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="Telefono: 566565" Required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="lbl_puestos" class="form-label"><b>Puestos</b></label>
            <select class="form-select" name="drop_puesto" id="drop_puesto">
              <option value=0>--- Puesto ---</option>
                @foreach($puestos as $puesto )
                    <option value= "{{$puesto->id_puesto}}">{{$puesto->puesto}}</option>
                 @endforeach 
            </select>
          </div> 
          <div class="mb-3">
            <label for="lbl_fn" class="form-label"><b>fecha nacimiento</b></label>
            <input type="date" name="txt_fn" id="txt_fn" class="form-control" placeholder="aaaa-mm-dd" Required>
          </div>
          <div class="mb-3">
              <input type="submit" name="btn_agregar" onclick="cambiarAction('./create')" id="btn_agregar" class="btn btn-primary" value ="agregar">
          </div>
          <div class="mb-3">
              <input type="submit" name="btn_modificar" onclick="cambiarAction('./update')" id="btn_modificar" class="btn btn-success" value ="modificar">
          </div>
          <div class="mb-3">
              <input type="submit" name="btn_eliminar" onclick="cambiarAction('./delete')" id="btn_eliminar" class="btn btn-danger" onclick="javascript:if(!confirm('¿Desea Eliminar?'))return false" value ="eliminar">
          </div>
          <input type="submit" name="btn_nuevo" id="btn_nuevo" class="btn btn-warning" onclick="limpiar()" value="Nuevo">
          </div>
</form>
<table class="table table-striped table-inverse table-responsive" id="tbl_empleados">
  <thead class ="thead-inverse">
    <tr>
      <th>Codigo</th>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Puesto</th>
      <th>Nacimiento</th>
    </tr>
    </thead>
    <tbody  id="tbl_empleados">
            @foreach($empleados as $empleado )
            <tr data-id="{{$empleado->id_empleado}}" data-idp="{{$empleado->id_puesto}}">
            <td>{{$empleado->codigo}}</td> 
            <td>{{$empleado->nombres}}</td> 
            <td>{{$empleado->apellidos}}</td> 
            <td>{{$empleado->direccion}}</td> 
            <td>{{$empleado->telefono}}</td>    
            <td>{{$empleado->puesto->puesto}}</td>  
            <td>{{$empleado->fecha_nacimiento}}</td>  
        </tr>
            @endforeach 
      
            </tbody>
            </table>
</div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

 
 <script>

    function cambiarAction(action){
        let formulario = document.getElementById("frmEmpleado");

        formulario.action=action;
    }

    function limpiar(){
        $("#txt_id").val(0);
        $("#drop_puesto").val(0);
        $("#txt_codigo").val('');
        $("#txt_nombres").val('');
        $("#txt_apellidos").val('');
        $("#txt_direccion").val('');
        $("#txt_telefono").val('');
        $("#txt_fn").val('');
    }

    $("#tbl_empleados").on('click','tr td',function (e) { 
        var target,id,idp,codigo,nombres,apellidos,direccion,telefono,nacimiento;
        target = $(event.target);
        id = target.parent().data('id');
        idp = target.parent().data('idp');
        codigo = target.parent("tr").find("td").eq(0).html();
        nombres = target.parent("tr").find("td").eq(1).html();
        apellidos = target.parent("tr").find("td").eq(2).html();
        direccion = target.parent("tr").find("td").eq(3).html();
        telefono = target.parent("tr").find("td").eq(4).html();
        nacimiento = target.parent("tr").find("td").eq(6).html();

        $("#txt_id").val(id);
        $("#drop_puesto").val(idp);
        $("#txt_codigo").val(codigo);
        $("#txt_nombres").val(nombres);
        $("#txt_apellidos").val(apellidos);
        $("#txt_direccion").val(direccion);
        $("#txt_telefono").val(telefono);
        $("#txt_fn").val(nacimiento);
    });
   </script>

    </body>
</html>
