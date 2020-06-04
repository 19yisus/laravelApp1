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
                        <li class="breadcrumb-item"><a href="#">Actualizar datos</a></li>
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
                <!-- Left col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="card-title">Actualizar</h5>
                        </div>
                        <div class="card-body">
                          <form action=" {{ route('Nucleo.update',$nucleos)}}" method="post" name="formulario">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="Cod">Codigo<span class="text-red">*</span></label>
                                            <input type="text" name="Cod" value="{{ $nucleos->id }}" id="" class="form-control" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Name">Nombre<span class="text-red">*</span></label>
                                            <input type="text" name="NameNucleo" value="{{ $nucleos->NameNucleo}}" id="" class="form-control" placeholder="Nombre"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="CodPostal">Codigo Postal<span class="text-red">*</span></label>
                                            <input type="text" name="CodPostal" value="{{ $nucleos->codePostal}}" id="" class="form-control" placeholder="Codigo postal"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                      <label for="Address">Direccion<snap class="text-red">*</snap></label>
                                        <textarea name="Address" id="" cols="30" rows="1" class="form-control" placeholder="Direccion">{{ $nucleos->address}}</textarea>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="hidden" id="SelValue" value="{{ $nucleos->typeNucleo }}">

                                        
                                        
                                      <label for="TipNucleo">Tipo de nucleo<span class="text-red">*</span></label>
                                      <select name="TipNucleo" id="Select" class="custom-select">
                                        <option value="">Seleccione un valor</option>
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
<script>
    ordenaSelect();
</script>
<!-- /.control-sidebar -->
@endsection
