@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Editar Autorizado</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card-body">
                <div class="tab-content p-0">
                    <form action="{{ route('autorizado.editar', $autorizado->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Name: </label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $autorizado->nombre)}}">
                            @error('name')                              
                              <small><strong style="color: red">{{ $message }}</strong></small>
                            @enderror
                        </div>  
                        <br>                                                 
                        <div class="mb-3">
                            <label class="form-label">Upload Photo</label>
                            <small>{{old('foto', $autorizado->foto)}}</small>
                            <input type="file" class="form-control" id="foto" name="foto">
                            @error('foto')   

                              <small><strong style="color: red">{{ $message }}</strong></small>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label  class="form-label">Upload INE</label>
                            <small>{{old('ine', $autorizado->ine)}}</small>
                            <input type="file" class="form-control" id="ine" name="ine">
                            @error('ine')                              
                              <small><strong style="color: red">{{ $message }}</strong></small>
                            @enderror
                        </div>                             
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection