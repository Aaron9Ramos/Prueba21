<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body{
        background-color: rgb(227, 227, 227);
        padding-left: 80px;
        padding-right: 80px;
      }
      .contenedor{
        text-align: center;
        margin-top: 200px;
        padding: 10px;
        padding-top: 110px; 
        padding-bottom: 25px; 
        background-color: white;
        border-radius: 10px;
      }
      .foto_perfil{
        width: 40%; 
        border-radius: 50px;
        top: 80px;
        left: 157;
        position: fixed;
      }
      .qr{
        width: 80%;
      }
      .nombre{
        font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>
  <body>
    {{-- QR Papa --}}
                              
      <div class="contenedor">   
          <img src="{{$foto}}" class="foto_perfil">
          <h1 class="nombre">{{$name}}</h1>
          <br>
          <img src="{{$qr}}" class="qr">
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>
  </body>
</html>