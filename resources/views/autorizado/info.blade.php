<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section style="background-color: #fafafa;">
        <div class="container py-5">
          <div class="row">
            <div class="col">
              <nav aria-label="breadcrumb" class="rounded-5 p-3 mb-4">
                <ol class="breadcrumb mb-0" style="background-color: #fafafa">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Parent View</li>
                </ol>
              </nav>
            </div>
          </div>
           {{-- AUTORIZADO CARD --}}
            <div class="row">
                <div class="col-lg-4">
                <div class="card mb-4 shadow-sm" style="border-radius: .5rem; background-color: #e8f5e9  ; border: none;">
                    <div class="card-body text-center">
                    <h4 class="text-muted mb-3">Authorized</h4>               
                    <img src="{{url('public/fotos/1738085581.jpg')}}" alt="avatar"
                        class="rounded img-fluid" style="width: 150px;">
                        <h5 class="my-3 mb-4">{{$autorizado->nombre}}</h5>
                        <img src="{{url('public/ines/1738085581.png')}}" alt="avatar"
                        class="rounded img-fluid" style="width: 150px;">
                    </div>
                </div>
                </div>
                <div class="col-lg-8">
                <div class="card mb-4 shadow-sm" style="border-radius: .5rem; background-color: #e8f5e9  ; border: none;">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$autorizado->nombre}}</p>
                        </div>
                    </div>   
                    <hr>             
                    <div class="row">
                        <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                        <p class="text-muted mb-0"> +52(341) 123 4567</p>
                        </div>
                    </div>                
                    </div>
                </div>
                </div>
            </div>      
          {{-- STUDENTS CARD --}}
          @foreach ($students as $student)  
            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4 shadow-sm" style="border-radius: .5rem; background-color: #e3f2fd ; border: none;">
                  <div class="card-body text-center">
                    <h4 class="text-muted mb-3">Student</h4>               
                    <img src="{{url('public/fotos/1738085581.jpg')}}" alt="avatar"
                      class="rounded img-fluid" style="width: 150px;">
                    <h5 class="my-3">{{$student->name}}</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card mb-4 shadow-sm" style="border-radius: .5rem; background-color: #e3f2fd ; border: none;">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$student->name}} {{$student->last_name}} {{$student->last_name2}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Grade</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$student->grade}}</p> 
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Level</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$student->level}}</p>
                        {{-- @if ({{$student->level}} == "0")
                        @else
                             <p class="text-muted mb-0">Primaria</p>
                        @endif --}}
                      </div>
                    </div>                 
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          {{-- PARENT CARD --}}
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4 shadow-sm" style="border-radius: .5rem; background-color: #efebe9; border: none;">
                <div class="card-body text-center">
                  <h4 class="text-muted mb-3">Parent</h4>               
                  <img src="{{url('public/'.$parent->foto)}}" alt="avatar"
                    class="rounded img-fluid" style="width: 150px;">
                  <h5 class="my-3 mb-4">{{$name}}</h5>
                  <img src="{{url('public/'.$parent->ine)}}" alt="avatar"
                    class="rounded img-fluid" style="width: 150px;">
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4 shadow-sm" style="border-radius: .5rem; background-color: #efebe9; border: none;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$name}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Students</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">2</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$parent->address}}</p>
                    </div>
                  </div>                 
                </div>
              </div>
            </div>
          </div>
         

        </div>
      </section>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>