@include('layoutLTE.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" role="button">
          <i class="fas fa-user-astronaut mr-2"></i>
          {{ Auth::user()->name }}
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

@include('layoutLTE.menu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kriteria</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kriteria</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Daftar Kriteria</h3>
                  <div class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-right">
                    <button class="btn btn-primary" id="addKriteria" type="button">Tambah Kriteria</button>    
                  </div>
                </div>
                <!-- /.card-header -->
                  {{-- success message --}}
                  <div id="success_message">
                    
                  </div>
                
                <div class="card-body" id="show_all_kriteria">
                  <h1 class="text-center text-secondary my-5">Loading...</h1>
                    
                </div>
                {{-- modal add--}}
                <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" class="witdh: 200%;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="add_kriteria" method="POST" enctype="multipart/form-data">
                          @csrf
                         
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama kriteria:</label>
                              <input type="text" class="form-control"  name="nama_kriteria">
                            <span class="text-danger error-text nama_kriteria_error"></span>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Keterangan:</label>
                              <input type="text" class="form-control"  name="keterangan">
                            <span class="text-danger error-text keterangan_error"></span>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Bobot:</label>
                              <input type="text" class="form-control"  name="bobot">
                            <span class="text-danger error-text bobot_error"></span>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tipe Kriteria:</label>
                              <select class="form-control" name="type">
                                  <option disabled="true" selected="true" value>--pilih--</option>
                                  <option value="benefit">benefit</option>
                                  <option value="cost">cost</option>
                              </select>
                            <span class="text-danger error-text type_error"></span>
                          </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="add_kriteria_btn" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                {{-- / add modal --}}
                {{-- edit modal --}}
                <div class="modal fade" id="showModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" class="witdh: 200%;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="update_kriteria" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" id="id" name="id">
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama kriteria:</label>
                              <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria">
                            <span class="text-danger error-text nama_kriteria_error"></span>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Keterangan:</label>
                              <input type="text" class="form-control" id="keterangan" name="keterangan">
                            <span class="text-danger error-text keterangan_error"></span>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Bobot:</label>
                              <input type="text" class="form-control" id="bobot" name="bobot">
                            <span class="text-danger error-text bobot_error"></span>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tipe Kriteria:</label>
                              <select class="form-control" name="type" id="type">
                                  <option value="benefit">benefit</option>
                                  <option value="cost">cost</option>
                              </select>
                            <span class="text-danger error-text type_error"></span>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="update_kriteria_btn" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                {{-- / edit modal --}}
                {{-- delete modal --}}
                <div class="modal fade" id="showModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" class="witdh: 200%;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kriteria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="delete" enctype="multipart/form-data" id="deleteKtr">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" id="valKtr">
                              <h4>Apakah kamu yakin, ingin menghapus data <br> <center>Kriteria??</center></h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" id="delete_alternatif_btn" class="btn btn-danger">Hapus</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                {{--/ delete modal --}}
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
  </div>
  <!-- /.content-wrapper -->

  @include('layoutLTE.footer')
<script>
    
    $(document).ready(function () {
      

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      function fetchKriteria()
      {
        $.ajax({
          type: "get",
          url: "{{ route("kriteria_table") }}",
            success: function (response) {
              $("#show_all_kriteria").html(response);
              $("table").DataTable({
                "responsive": true,
                "lengthChange": false, 
                "autoWidth": false,
                "bDestroy": true,

              });
            }
        });
      }

      fetchKriteria();

   

      //tampil modal kriteria
      $("#addKriteria").click(function (e) { 
        e.preventDefault();

        $("#showModal").modal("show");
   
      });

      //add kriteria
      $("#add_kriteria").submit(function (e) { 
        e.preventDefault();
        $("#add_kriteria_btn").prop('disabled', true);
        $("#add_kriteria_btn").text('menyimpan...');

        const dataKriteria = new FormData(this);
          $.ajax({
            type: "post",
            url: "{{ route('kriteria_add') }}",
            data: dataKriteria,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
              success: function (response) {
               // console.log(response)
               if(response.status == 400 ){
                    $.each(response.errors, function (previx, val) { 
                        $('span.' +previx + '_error').text(val[0]);
                    });
                  $("#add_kriteria_btn").prop('disabled', false);
                  $("#add_kriteria_btn").text('Submit');
               }else{
                  $("#add_kriteria")[0].reset();
                  $("#success_message").addClass("alert alert-success");
                  $("#success_message").text(response.message);
                  $("#showModal").modal("hide");
                  $("#add_kriteria_btn").prop('disabled', false);
                  $("#add_kriteria_btn").text("Submit");

                  fetchKriteria();
               }
              }
          });
      });

      //edit modal kriteria

      $(document).on('click','.editKtr', function (e) { 
        e.preventDefault();
        
        var id = $(this).attr('id');
        //console.log(id);

        $("#showModalEdit").modal("show");

        $.ajax({
          type: "get",
          url: "/kriteria-edit/" + id,
          dataType: "JSON",
          success: function (response) {
              $("#id").val(id);
              $("#nama_kriteria").val(response.nama_kriteria);
              $("#keterangan").val(response.keterangan);
              $("#bobot").val(response.bobot);
              $("#type").val(response.type).change();
              
              //console.log(response.type);
          }

        });
      
      });

      //update kriteria

          $("#update_kriteria").submit(function (e) { 
            e.preventDefault();

            $("#update_kriteria_btn").prop('disabled', true);
            $("#update_kriteria_btn").text("merubah....");
            const id = $("#id").val();

            const editKriteria = new FormData(this);
            $.ajax({
              type: "post",
              url: "/kriteria/" + id,
              data: editKriteria,
              dataType: "JSON",
              cache: false,
              contentType: false,
              processData: false,
              success: function (response) {

                if(response.status == 400){
                    $.each(response.errors, function (previx, val) { 
                        $('span.' +previx + '_error').text(val[0]);
                    });
                    $("#update_kriteria_btn").prop('disabled', false);
                    $("#update_kriteria_btn").text('Update');
                }else{
                    $('#update_kriteria')[0].reset();
                    $("#success_message").addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $("#showModalEdit").modal('hide');
                    $("#update_kriteria_btn").prop('disabled', false);
                    $("#update_kriteria_btn").text('Update');
                    
                    fetchKriteria();
                }
                
              }
            });
            //console.log(editKriteria);
          });

          //modal hapus
          $(document).on('click','.deleteKtr', function (e) { 
            e.preventDefault();

            var id = $(this).attr("id");
            //console.log(id);
            $("#valKtr").val(id);

            $("#showModalDelete").modal("show");

          });
          //delete kriteria
          $("#deleteKtr").submit(function (e) { 
            e.preventDefault();
            
            $("#delete_kriteria_btn").prop('disabled', true);
            $("#delete_kriteria_btn").text("menghapus....");
            var id = $("#valKtr").val();
            
            $.ajax({
              type: "delete",
              url: "/kriteria/" + id,
              success: function (response) {
                $("#success_message").addClass("alert alert-success");
                $("#success_message").text(response.message);
                $("#showModalDelete").modal("hide");
                $("#delete_kriteria_btn").prop('disabled', false);
                $("#delete_kriteria_btn").text("Hapus");

                fetchKriteria();
              }
            });
            
          });


    });

   
    
</script>