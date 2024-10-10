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
<style>
  .filtr-item {
    text-align: center; /*Centre le contenu à l'intérieur de chaque boîte */
    background-color: #f5f5f5; /* Couleur de fond pour chaque boîte */
    border: 1px solid #ddd; /* Ajoute une bordure légère pour bien délimiter */
}

.filtr-item a {
    text-decoration: none; /* Supprime le soulignement des liens */
    color: #333; /* Couleur du texte à l'intérieur des boîtes */
    font-size: 18px; /* Augmente la taille du texte */
    font-weight: bold; /* Rend le texte plus visible */
}

.filtr-item:hover {
    background-color: #e0e0e0; /* Change légèrement la couleur au survol pour un effet interactif */
}



</style>
@extends('dashboard')
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-success" style="margin-top: 5%">
              <div class="card-header">
                <h4 class="card-title">Utilisateurs</h4>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn active" style="background: white; opacity:0.5" href="javascript:void(0)" data-filter="all">Tous les Utilisateurs</a>
                    @foreach($coursAppels as $coursAppel)
                      <a class="btn" style="background: white; opacity:0.5" href="javascript:void(0)" data-filter="{{ $coursAppel->id }}">
                        {{ $coursAppel->nom }}
                      </a>
                    @endforeach
                  </div>
                </div>
                <div>

                  <div class="filter-container p-0 row" style="margin-left: 0.2%">
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr>
                                <th>Cour d'Appel</th>
                                <th>TPI</th>
                                <th>Image</th>
                                <th>Utilisateurs</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coursAppels as $coursAppel)
                                @foreach($coursAppel->tpi as $tpi)
                                    <tr data-category="{{ $coursAppel->id }}" data-sort="{{ $tpi->nom }}">
                                        <td>{{ $coursAppel->nom }}</td> <!-- Affiche le nom de la Cour d'Appel -->
                                        <td>{{ $tpi->nom }}</td> <!-- Affiche le nom du TPI -->
                                        <td>
                                            <a href="https://via.placeholder.com/1200/FFFFFF.png?text={{ $tpi->nom }}" data-toggle="lightbox" data-title="{{ $tpi->nom }}">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text={{ $tpi->nom }}" class="img-fluid mb-2" alt="{{ $tpi->nom }}" style="width: 100px;"/>
                                              </a>
                                        </td>
                                        <td>
                                          <ul>
                                              @foreach($tpi->users as $user) <!-- Boucle sur les utilisateurs associés au TPI -->
                                                  <li>{{ $user->name }} - {{ $user->email }}</li> <!-- Affiche le nom et l'email de l'utilisateur -->
                                              @endforeach
                                          </ul>
                                      </td>
                                  </tr>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
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


  document.addEventListener('DOMContentLoaded', function () {
        // Gestion du clic sur les boutons
        const buttons = document.querySelectorAll('.btn-group .btn');
        const rows = document.querySelectorAll('table tbody tr');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                const filter = this.getAttribute('data-filter');

                // Enlever l'état "active" des autres boutons
                buttons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                // Afficher toutes les lignes si le filtre est "all"
                if (filter === 'all') {
                    rows.forEach(row => row.style.display = '');
                } else {
                    // Afficher uniquement les lignes correspondant à la Cour d'Appel sélectionnée
                    rows.forEach(row => {
                        if (row.getAttribute('data-category') === filter) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
</body>
</html>
