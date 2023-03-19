<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Historias Medicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Historias medicas</h1>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Crear historia
        </a>
        <div class="collapse" id="collapseExample">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?php echo base_url().'/crear' ?>" method="POST">
                        <div class="col-4 mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="FechaNacimiento">Fecha nacimiento</label>
                            <input type="date" id="FechaNacimiento" name="FechaNacimiento" class="form-control">
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
                            <label for="estatura">Estatura</label>
                            <input type="text" id="estatura" name="estatura" class="form-control">
                        </div>
                        <div class="col-4 mb-3">
                        <label for="peso">Peso</label>
                        <input type="text" id="peso" name="peso" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <h2>Listado de personas</h2>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered text-center">
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha nacimiento</th>
                            <th>Sexo</th>
                            <th>Estatura</th>
                            <th>Peso</th>
                            <th>Acciones</th>
                        </tr>
                    <?php foreach($datos as $key): ?>
                        <tr>
                            <td><?php echo $key->nombre ?></td>
                            <td><?php echo $key->fecha_nacimiento ?></td>
                            <td><?php echo $key->sexo ?></td>
                            <td><?php echo $key->estatura ?></td>
                            <td><?php echo $key->peso ?></td>
                            <td class="text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="detalles(<?php echo $key->id?>)">
                            Detalles
                            </button>
                            <a href="<?php echo base_url().'/obtenerHistoria/'.$key->id?>" class="btn btn-warning">Editar</a> 
                            <a href="<?php echo base_url().'/eliminar/'.$key->id?>" class="btn btn-danger">Eliminar</a></td>
                            
                        </tr>
                    <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalbody">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>

        function fibonacci(n) {
        var serie = [1, 1]; // Iniciamos la serie con los dos primeros números
        for (var i = 2; i < n; i++) {
            serie.push(serie[i - 1] + serie[i - 2]); // Calculamos el siguiente número de la serie
        }
        return serie;
        }

        function detalles(id) {
            $.ajax({
                url: 'http://localhost/PruebaTecnica/public//obtenerHistoria2/' + id,
                method: 'GET',
                success: function(datos) {
                let data = JSON.parse(datos);

                const fechaActual = new Date();
                const fechaNacimiento = new Date(data.datos[0].fecha_nacimiento);
                const diferenciaMilisegundos = fechaActual - fechaNacimiento;
                const edad = Math.floor(diferenciaMilisegundos / 31557600000);

                const estatura = data.datos[0].estatura;
                var serieFibonacci = fibonacci(estatura);
                let i = 0;
                while (serieFibonacci[i] < estatura) {
                i++;
                }
                const numeroFibonacci = serieFibonacci[i - 1];

                let peso = data.datos[0].peso

                const year = fechaNacimiento.getFullYear();
                const dosDigitos = year % 100;
                const resultado = Math.sqrt(dosDigitos).toFixed(2);
                console.log(peso);


                if (edad < 18) {
                    if (data.datos[0].sexo === 'Masculino') {
                        const ModalBody = `
                            <div>
                                <label>${data.datos[0].nombre}</label>
                                <p>Hola ${data.datos[0].nombre} eres ${data.datos[0].sexo} joven muy saludable, te recomiendo salir a jugar al aire libre durante ${numeroFibonacci} horas diarias</p>
                            </div>
                            `;
                        // Actualizar el contenido del modal con la información obtenida
                            document.getElementById("modalbody").innerHTML = ModalBody;
                        
                    } else if(data.datos[0].sexo === 'Femenino'){
                        const ModalBody = `
                            <div>
                                <label>${data.datos[0].nombre}</label>
                                <p>Hola ${data.datos[0].nombre} eres ${data.datos[0].sexo} joven muy saludable, te recomiendo salir a jugar al aire libre durante ${numeroFibonacci} horas diarias</p>
                            </div>
                            `;
                        // Actualizar el contenido del modal con la información obtenida
                            document.getElementById("modalbody").innerHTML = ModalBody;
                    }
                    
                }else if(edad >= 18){
                    if (data.datos[0].sexo === 'Masculino') {
                        if (peso < 30) {
                            const ModalBody = `
                                <div>
                                    <label>${data.datos[0].nombre}</label>
                                    <p>Hola ${data.datos[0].nombre} eres ${data.datos[0].sexo} joven muy saludable, te recomiendo comer menos y salir a correr ${resultado} km diarios</p>
                                </div>
                                `;
                            // Actualizar el contenido del modal con la información obtenida
                                document.getElementById("modalbody").innerHTML = ModalBody;
                        }else if(peso >= 30){
                            const ModalBody = `
                                <div>
                                    <label>${data.datos[0].nombre}</label>
                                    <p>Hola ${data.datos[0].nombre} eres ${data.datos[0].sexo} joven muy saludable, te recomiendo comer mas y salir a correr ${resultado} km diarios</p>
                                </div>
                                `;
                            // Actualizar el contenido del modal con la información obtenida
                                document.getElementById("modalbody").innerHTML = ModalBody;
                        }
                        
                    } else if(data.datos[0].sexo === 'Femenino'){
                        if (peso < 30) {
                            const ModalBody = `
                                <div>
                                    <label>${data.datos[0].nombre}</label>
                                    <p>Hola ${data.datos[0].nombre} eres ${data.datos[0].sexo} joven muy saludable, te recomiendo comer menos y salir a correr ${resultado} km diarios</p>
                                </div>
                                `;
                            // Actualizar el contenido del modal con la información obtenida
                                document.getElementById("modalbody").innerHTML = ModalBody;
                        }else if(peso >= 30){
                            const ModalBody = `
                                <div>
                                    <label>${data.datos[0].nombre}</label>
                                    <p>Hola ${data.datos[0].nombre} eres ${data.datos[0].sexo} joven muy saludable, te recomiendo comer mas y salir a correr ${resultado} km diarios</p>
                                </div>
                                `;
                            // Actualizar el contenido del modal con la información obtenida
                                document.getElementById("modalbody").innerHTML = ModalBody;
                        }
                    }
                }
                },
                error: function() {
                console.log('Error al obtener los datos');
                }
            });
        }

        let mensaje = '<?php echo $mensaje ?>'
        console.log(mensaje)
        if(mensaje == '1'){
            swal(':D', 'Agregado con exito!', 'success');
        }else if(mensaje =='0'){
            swal(':c', 'Fallo al agregar!', 'error');
        }else if(mensaje =='2'){
            swal(':D', 'Exito al actualizar!', 'success');
        }
        else if(mensaje =='3'){
            swal(':c', 'Fallo al actualizar!', 'error');
        }else if(mensaje =='4'){
            swal(':D', 'Exito al eliminar!', 'success');
        }
        else if(mensaje =='5'){
            swal(':c', 'Fallo al eliminar!', 'error');
        }
    </script>
  </body>
</html>