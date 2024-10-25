<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Liste des Demandeurs</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="extern/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="extern/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="extern/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="extern/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="extern/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="extern/dist/css/welcome.css">
</head>
<body>
    @extends('dashboard')
    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
               
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped ">
                  <thead style='background:green; opacity:0.5'>
                  <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($demandeurs as $demandeur )
                            @if ($demandeur->etat == 0)
                            <tr id="row-{{ $loop->index }}">
                              <td>{{$demandeur->id}}</td>
                              <td>{{$demandeur->Nom}}</td>
                            <td>
                              <div>
                                <span class="p-2 status-text">Non traiter</span>
                                <span class="badge status-badge bg-danger"><i class="fas fa-times"></i></span>
                              </div>
                            </td>
                          @else
                          <tr id="row-{{ $loop->index }}">
                            <td>{{$demandeur->id}}</td>
                            <td>{{$demandeur->Nom}}</td>
                            <td id="status-{{ $loop->index }}">
                              <div>
                                <span class="p-2 status-text">Traiter</span>
                                <span class="badge status-badge bg-success"><i class="fas fa-check"></i></span>
                              </div>
                            </td>
                            @endif
                        </tr>
                        @empty
                            <tr class="w-full">
                                <td class="flex-1 w-full justify-center items-center" colspan="4">
                                    <p class="flex justify-center content-center p-4">
                                    <img src="{{ asset('undraw empty.svg')}}" alt="" class="h-15 w-15">
                                    <div>Aucun élément</div>
                                    </p>
                                </td>
                            </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- jQuery -->
<script src="extern/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="extern/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="extern/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="extern/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="extern/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="extern/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="extern/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="extern/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="extern/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


</script> 
@endsection
</body>
</html>
    