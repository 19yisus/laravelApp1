@extends('layouts.AdminTemplate')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="{{ route('Nucleo.create') }}" class="m-0 btn btn-secondary"><i class="fas fa-arrow-circle-right"></i> Registro</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Catalogo</a></li>
              <li class="breadcrumb-item active">Nucleos</li>
            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            @if ($errors->any())
              <div class="alert bg-danger">
                @foreach($errors->all() as $err)
                {{ $err }}
                @endforeach
              </div>                
            @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Catalogo</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Nombre</th>
                      <th>Codigo Postal</th>
                      <th>Direccion</th>
                      <th>Estado</th>
                      <th style="width: 40px">Tipo</th>
                      <th style="width: 50px">Extiende</th>
                      <th>Optiones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($nucleos[0]))
                      @foreach($nucleos as $nu)
                      <tr>
                        <td>
                          {{ $nu->id}}
                        </td>
                        <td>
                          {{ $nu->NameNucleo }}
                        </td>
                        <td>
                          {{ $nu->codePostal}}
                        </td>
                        <td>
                          {{ $nu->address }}
                        </td>
                        <td>
                          @if($nu->status == 1)
                          <span class="badge bg-success">Activo</span>
                          @else
                          <span class="badge bg-danger">Inactivo</span>
                          @endif
                        </td>
                        @php
                            switch($nu->typeNucleo){
                              case 'NU':
                                $title = 'Nucleo principal';
                              break;

                              case 'EX':
                                $title = 'Extension';
                              break;

                              case 'PG':
                                $title = 'Programa';
                              break;
                            }
                        @endphp
                        <td title="Tipo de nucleo: {{ $title }}">
                          {{ $nu->typeNucleo }}
                        </td>
                        <td>
                          {{ $nu->codSede}}
                        </td>
                        <td>
                          @php
                              if($nu->status == 1)
                                $titleA = 'Modificar';
                              else{
                                $titleA = 'No puede ser modificado';
                              }
                          @endphp                   
                          <a href="{{ route('Nucleo.edit',$nu) }}" class="btn  btn-info d-inline-flex float-left m-0" title="{{ $titleA }}">
                            <i class="fas fa-edit"></i>
                          </a>
                            
                          <form action=" {{ route('Nucleo.destroy',$nu) }}" method="post" name="formulario">
                            @method('DELETE')
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $nu->id}}">
                            <button type="submit" title="Desactivar" class="btn  btn-warning d-inline-flex float-left mx-1"><i class="fas fa-power-off"></i></button>
                          </form>
                          <button type="button" title="Listar detalles" class="btn  btn-dark d-inline-flex float-left m-0"><i class="fas fa-list"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    @else
                    <h3 class="w-100">Sin registros</h3>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
           {{-- <code>{{ $permisos->permisos }}</code> --}}
          </div>
        
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
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