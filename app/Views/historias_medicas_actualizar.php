<?php
    $id = $datos[0]['id'];
    $nombre = $datos[0]['nombre'];
    $fecha_nacimiento = $datos[0]['fecha_nacimiento'];
    $sexo = $datos[0]['sexo'];
    $estatura = $datos[0]['estatura'];
    $peso = $datos[0]['peso'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualziar Historias Medicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
        <div class="container">
                <h1>Historias medicas</h1>
                <div class="row">
                    <div class="col-sm-12">
                        <form action="<?php echo base_url().'/actualizar' ?>" method="POST">
                        <input type="text" id="id" value="<?php echo $id ?>" name="id" hidden="">
                            <div class="col-4 mb-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre ?>">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="FechaNacimiento">Fecha nacimiento</label>
                                <input type="date" id="FechaNacimiento" name="FechaNacimiento" value="<?php echo $fecha_nacimiento ?>" class="form-control">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="sexo">Sexo</label>
                                <select class="form-control" id="sexo" name="sexo" aria-label="Default select example">
                                <option selected>Seleccione un sexo</option>
                                <option name="sexo" value="Masculino">Masculino</option>
                                <option name="sexo" value="Femenino">Femenino</option>
                            </select>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="estatura">estatura</label>
                                <input type="text" id="estatura" value="<?php echo $estatura ?>" name="estatura" class="form-control">
                            </div>
                            <div class="col-4 mb-3">
                            <label for="peso">peso</label>
                            <input type="text" id="peso" name="peso" value="<?php echo $peso ?>" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="<?php echo base_url()?>" class="btn btn-secondary">Regresar</a>
                        </form>
                    </div>
                </div>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>