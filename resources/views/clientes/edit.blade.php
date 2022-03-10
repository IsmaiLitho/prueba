<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Document</title>
</head>
<body>
	<div class="container">
        <h1 align="center">Registrar nuevo cliente</h1><br>
        <form action="{{ url('Clientes/update') }}" method="post">
        	{{csrf_field()}}
            <div class="row">
                <div class="form-group col-xs-12 col-sm-4">
                    <input type="text" name="idcli" class="form-control" value="{{$clientes->idcli}}" hidden>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control " placeholder="Numero de serie del producto" value="{{$clientes->nombre}}" required>
                    </div>
                </div>
                <div class="form-group col-xs-12 col-sm-4">
                    <div class="mb-3">
                        <label class="form-label">Fecha de nacimiento</label>
                        <input type="date" name="fecha_nac" class="form-control" value="{{$clientes->fecha_nac}}" required>
                    </div>
                </div>
                
                <div class="form-group col-xs-12 col-sm-4">
                    <label class="form-label">Genero</label><br>
                    <div class="form-group col-xs-12 col-sm-3">
                        <label class="form-check-label">Masculino</label>
                        <input type="radio" name="genero" class="form-check-input" value="M" {{ ($clientes->genero == "M") ? 'checked' : '' }}>                            
                    </div>
                    <div class="form-group col-xs-12 col-sm-3">
                        <label class="form-check-label">Femenino</label>
                        <input type="radio" name="genero" class="form-check-input" value="F" {{ ($clientes->genero == "F") ? 'checked' : '' }}>
                    </div>             
                </div>
                <div class="col-6 mx-auto">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
