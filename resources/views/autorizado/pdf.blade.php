<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      table {
          border-collapse: collapse;
          border-spacing: 10;
          border: 1px solid black;
          border-radius: 15px;
          -moz-border-radius: 20px;
          padding: 10px;
          background-color: #e4f0f5;
      }      
      th {
        border: solid black 1px;
        padding: 10px;
        background-color: #2c5e77;
        color: white;
      }
      td {  
        border: solid black 1px;
        padding: 30px;
      }
      img{
        border-radius: 10px;
        margin-right: 30px;
        margin-left: 30px;
      }
      </style>
  </head>
  <body>
      <div class="container">                          
        <div class="row justify-content-md-center">

            {{-- tabla Autorizados--}}           
            <h1 style="text-align: center">Autorizado</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Foto</th>
                        <th>INE</th>
                    </tr>
                </thead>
                <tbody>                
                    @foreach ($autorizados as $autorizado)
                        <tr>                      
                            <td>{{$autorizado->nombre}}</td>                 
                            <td><img src="{{public_path($autorizado->foto)}}" style="width: 30%; min-width: 120px"></td>
                            <td><img src="{{public_path($autorizado->ine)}}" style="width: 30%; min-width: 120px"></td>  
                        </tr>                        
                    @endforeach    
                </tbody>
            </table>    
            
            {{-- tabla Estudiantes--}}
            <h1 style="text-align: center">Estudiantes</h1>
            <table>
                <thead>
                    <tr>
                  <th>Nombre</th>
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
                  <th>Grado</th>
                  <th>Nivel</th>                  
                </tr>
              </thead>
              <tbody>
                  @foreach ($estudiantes as $estudiante)
                <tr>                      
                  <td>{{$estudiante->name}}</td>                 
                  <td>{{$estudiante->last_name}}</td>                 
                  <td>{{$estudiante->last_name2}}</td>                 
                  <td>{{$estudiante->grade}}</td>                 
                  <td>{{$estudiante->level}}</td>    
                </tr>
                  @endforeach
            </tbody>
            </table> 
            

            {{-- Mostrar info Papa --}}
            <h1 style="text-align: center">Papa</h1>
            <table>
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Foto</th>
                  <th>INE</th>
                </tr>
              </thead>
              <tbody>
                <tr>                      
                  <td>{{$name}}</td>                 
                  <td><img src="{{$foto}}" style="width: 30%; min-width: 120px"></td>
                  <td><img src="{{$ine}}" style="width: 30%; min-width: 120px"></td>  
                </tr>
              </tbody>
            </table>         
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>
  </body>
</html>