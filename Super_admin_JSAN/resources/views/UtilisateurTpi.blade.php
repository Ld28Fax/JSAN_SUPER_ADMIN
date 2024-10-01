<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Utilisateur</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="extern/plugins/fontawesome-free/css/all.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="extern/plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="extern/dist/css/adminlte.min.css">
</head>

@extends('dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gallery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                <h4 class="card-title">Utilisateurs</h4>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn active" style="background: green; opacity:0.5" href="javascript:void(0)" data-filter="all">Tous les Utilisateurs</a>
                    @foreach($coursAppels as $coursAppel)
                      {{-- <a class="btn" style="background: green; opacity:0.5" href="javascript:void(0)" data-filter="{{ $coursAppel->id }}">
                        {{ $coursAppel->nom }}
                      </a> --}}
                      <a href="{{ route('UtilisateurTpi', ['id'=> $coursAppel->id]) }}">{{ $coursAppel->nom }}</a>

                    @endforeach
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
                    @foreach($coursAppels as $coursAppel)
                    {{-- {{ dd($coursAppel->tpis) }} --}}
                      @foreach($coursAppel->tpis as $tpi)
                        <div class="filtr-item col-sm-2" data-category="{{ $coursAppel->id }}" data-sort="{{ $tpi->nom }}">
                          <a href="https://via.placeholder.com/1200/FFFFFF.png?text={{ $tpi->nom }}" data-toggle="lightbox" data-title="sample {{ $tpi->nom }}">
                            <img src="https://via.placeholder.com/300/FFFFFF?text={{ $tpi->nom }}" class="img-fluid mb-2" alt="{{ $tpi->nom }}"/>
                          </a>
                        </div>
                        @endforeach
                    @endforeach
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-12">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="{{ route('dashboard') }}">CO-JSAN</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="extern/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="extern/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ekko Lightbox -->
<script src="extern/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="extern/dist/js/adminlte.min.js"></script>
<!-- Filterizr-->
<script src="extern/plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="extern/dist/js/demo.js"></script> --}}
<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
@endsection
</body>
</html>
