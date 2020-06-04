@extends('layouts.AdminTemplate') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <a href=" {{ route('Nucleo')}}" class="m-0 btn btn-secondary"> <i class="fas fa-arrow-circle-left"></i> Volver</a>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Registro</a></li>
                        <li class="breadcrumb-item active">Nucleos</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                {{-- <div id="#app">
                    <test id="#app"></test>
                    <example-component></example-component>
                </div> --}}
                
                <!-- Left col -->
                <div class="col-md-12">
                    
                    @if( Session::has('message') )
                    <div class="alert alert-success m-2">{{ Session::get('message') }}</div>
                    @endif

                    @if( $errors->any())
                    <div class="alert alert-danger m-2">
                        <ul>
                            @foreach($errors->all() as $er)
                            <li> {{ $er}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="card-title">Registro</h5>
                        </div>
                        <div class="card-body">
                          <form action=" {{ route('Nucleo.store')}}" method="post" name="formulario">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="Cod">Codigo<span class="text-red">*</span></label>
                                            <input type="text" name="Cod" value="{{ $id }}" id="" class="form-control" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="NameNucleo">Nombre<span class="text-red">*</span></label>
                                            <input type="text" name="NameNucleo" id="" value="{{ old('NameNucleo')}}" class="form-control" style="text-transform:uppercase" required placeholder="Nombre"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="CodPostal">Codigo Postal<span class="text-red">*</span></label>
                                            <input type="text" name="CodPostal" id="" value="{{ old('CodPostal') }}" class="form-control" maxlength="4" minlength="4" required placeholder="Codigo postal"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                      <label for="Address">Direccion<snap class="text-red">*</snap></label>
                                    <textarea name="Address" required maxlength="300" minlength="4" id="" cols="30" rows="1" class="form-control" placeholder="Direccion">{{ old('Address') }}</textarea>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label for="typeNucleo">Tipo de nucleo<span class="text-red">*</span></label>
                                      <select name="typeNucleo" id="SelNu" class="custom-select">
                                        <option value="00">Seleccione un valor</option>
                                        <option value="NU">Nucleo central</option>
                                        <option value="EX">Extension</option>
                                        <option value="PG">Programa</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer text-center">
                                  <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Guardar</button>
                                  <button type="reset" class="btn btn-warning"><i class="fas fa-trash mr-1"> Limpiar</i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<script src="{{ asset('js/Maestras/Nucleo.js') }}"></script>
<!-- /.control-sidebar -->
@endsection
