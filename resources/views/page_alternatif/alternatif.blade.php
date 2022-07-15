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
            <h1 class="m-0">Alternatif</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Alternatif</li>
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
                  <h3 class="card-title">Daftar Alternatif</h3>
                  <div class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-right">
                    <button class="btn btn-primary addAlter" type="button">Tambah Alternatif</button>    
                  </div>
                </div>
                <!-- /.card-header -->
                  {{-- success message --}}
                  <div id="success_message">
                    
                  </div>
                  
                <div class="card-body" id="show_all_alternatif">
                  <h1 class="text-center text-secondary my-5">Loading...</h1>
                  
                </div>
                
                {{-- modal add--}}
                <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Alternatif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="#" id="add_alternatif" method="POST" enctype="multipart/form-data">
                          @csrf
                        
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama alternatif:</label>
                                  <input type="text" class="form-control" name="nama_alternatif">
                                <span class="text-danger error-text nama_alternatif_error"></span>
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kabupaten:</label>
                                  <input type="text" class="form-control"  name="kabupaten">
                                <span class="text-danger error-text kabupaten_error"></span>
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Provinsi:</label>
                                  <input type="text" class="form-control"  name="provinsi">
                                <span class="text-danger error-text provinsi_error"></span>
                              </div>  
                            </div>  
                            <div class="vl mr-2 ml-2"></div>
                            <div class="col-sm" id="show_all_form">
                              {{-- mengambil dari response html dari controller --}}
                            </div>

                            <div class="vl mr-2 ml-2"></div>
                            <div class="col-sm">
                                <label for="">Tabel kepadatan penduduk</label>
                                  <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                    <th>Penilaian</th>
                                    <th>Nilai</th>    
                                    </tr>
                                    </thead>
                                    <tbody>
                          
                                    <tr>
                                      <td>Rendah (< 150 Jiwa/Km<small>2</small>)</td>
                                      <td>2</td>
                                    </tr>
                                    <tr>
                                      <td>Sedang (< 150 - 200 Jiwa/Km)</td>
                                      <td>3</td>
                                    </tr>
                                    <tr>
                                      <td>Tinggi (201 - 400 Jiwa/Km)</td>
                                      <td>4</td>
                                    </tr>
                                    <tr>
                                      <td>Sangat Padat (< 400 Jiwa/Km)</td>
                                      <td>5</td>
                                    </tr>
                                    
                          
                                    </tbody>
                                </table>
                                <label for="">Tabel kepadatan penduduk</label>
                                <table class="table table-bordered">
                                  <thead>
                                  <tr>
                                  <th>Penilaian</th>
                                  <th>Nilai</th>    
                                  </tr>
                                  </thead>
                                  <tbody>
                        
                                  
                                  <tr>
                                    <td>Rendah (< 150 Jiwa/Km<small>2</small>)</td>
                                    <td>2</td>
                                  </tr>
                                  <tr>
                                    <td>Sedang (< 150 - 200 Jiwa/Km)</td>
                                    <td>3</td>
                                  </tr>
                                  <tr>
                                    <td>Tinggi (201 - 400 Jiwa/Km)</td>
                                    <td>4</td>
                                  </tr>
                                  <tr>
                                    <td>Sangat Padat (< 400 Jiwa/Km)</td>
                                    <td>5</td>
                                  </tr>
                                  
                        
                                  </tbody>
                              </table>
                              <label for="">Tabel kepadatan penduduk</label>
                                <table class="table table-bordered">
                                  <thead>
                                  <tr>
                                  <th>Penilaian</th>
                                  <th>Nilai</th>    
                                  </tr>
                                  </thead>
                                  <tbody>
                        
                                  
                                  <tr>
                                    <td>Rendah (< 150 Jiwa/Km<small>2</small>)</td>
                                    <td>2</td>
                                  </tr>
                                  <tr>
                                    <td>Sedang (< 150 - 200 Jiwa/Km)</td>
                                    <td>3</td>
                                  </tr>
                                  <tr>
                                    <td>Tinggi (201 - 400 Jiwa/Km)</td>
                                    <td>4</td>
                                  </tr>
                                  <tr>
                                    <td>Sangat Padat (< 400 Jiwa/Km)</td>
                                    <td>5</td>
                                  </tr>
                                  
                        
                                  </tbody>
                              </table>
                              <label for="">Tabel kepadatan penduduk</label>
                                <table class="table table-bordered">
                                  <thead>
                                  <tr>
                                  <th>Penilaian</th>
                                  <th>Nilai</th>    
                                  </tr>
                                  </thead>
                                  <tbody>
                        
                                  
                                  <tr>
                                    <td>Rendah (< 150 Jiwa/Km<small>2</small>)</td>
                                    <td>2</td>
                                  </tr>
                                  <tr>
                                    <td>Sedang (< 150 - 200 Jiwa/Km)</td>
                                    <td>3</td>
                                  </tr>
                                  <tr>
                                    <td>Tinggi (201 - 400 Jiwa/Km)</td>
                                    <td>4</td>
                                  </tr>
                                  <tr>
                                    <td>Sangat Padat (< 400 Jiwa/Km)</td>
                                    <td>5</td>
                                  </tr>
                                  
                        
                                  </tbody>
                              </table>
                            </div>
                            
                          </div>   
                            
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="add_alternatif_btn" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                {{-- / add modal --}}

                 {{-- modal edit--}}
                 <div class="modal fade" id="showModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Alternatif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="update_alternatif" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="id" id="id">
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama alternatif:</label>
                                  <input type="text" class="form-control" id="edit_nama_alternatif" name="nama_alternatif">
                                <span class="text-danger error-text nama_alternatif_error"></span>
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kabupaten:</label>
                                  <input type="text" class="form-control" id="edit_kabupaten"  name="kabupaten">
                                <span class="text-danger error-text kabupaten_error"></span>
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Provinsi:</label>
                                  <input type="text" class="form-control" id="edit_provinsi" name="provinsi">
                                <span class="text-danger error-text provinsi_error"></span>
                              </div>  
                            </div>  
                            <div class="vl mr-2 ml-2"></div>
                            <div class="col-sm" id="show_edit_form">
                              {{-- mengambil dari response html dari controller --}}
                            </div>
                            <div class="vl mr-2 ml-2"></div>
                            <div class="col-sm">
                                <label for="">Tabel kepadatan penduduk</label>
                                  <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                    <th>Penilaian</th>
                                    <th>Nilai</th>    
                                    </tr>
                                    </thead>
                                    <tbody>
                          
                                    <tr>
                                      <td>Rendah (< 150 Jiwa/Km<small>2</small>)</td>
                                      <td>2</td>
                                    </tr>
                                    <tr>
                                      <td>Sedang (< 150 - 200 Jiwa/Km)</td>
                                      <td>3</td>
                                    </tr>
                                    <tr>
                                      <td>Tinggi (201 - 400 Jiwa/Km)</td>
                                      <td>4</td>
                                    </tr>
                                    <tr>
                                      <td>Sangat Padat (< 400 Jiwa/Km)</td>
                                      <td>5</td>
                                    </tr>
                                    
                          
                                    </tbody>
                                </table>
                                <label for="">Tabel kepadatan penduduk</label>
                                <table class="table table-bordered">
                                  <thead>
                                  <tr>
                                  <th>Penilaian</th>
                                  <th>Nilai</th>    
                                  </tr>
                                  </thead>
                                  <tbody>
                        
                                  
                                  <tr>
                                    <td>Rendah (< 150 Jiwa/Km<small>2</small>)</td>
                                    <td>2</td>
                                  </tr>
                                  <tr>
                                    <td>Sedang (< 150 - 200 Jiwa/Km)</td>
                                    <td>3</td>
                                  </tr>
                                  <tr>
                                    <td>Tinggi (201 - 400 Jiwa/Km)</td>
                                    <td>4</td>
                                  </tr>
                                  <tr>
                                    <td>Sangat Padat (< 400 Jiwa/Km)</td>
                                    <td>5</td>
                                  </tr>
                                  
                        
                                  </tbody>
                              </table>
                              <label for="">Tabel kepadatan penduduk</label>
                                <table class="table table-bordered">
                                  <thead>
                                  <tr>
                                  <th>Penilaian</th>
                                  <th>Nilai</th>    
                                  </tr>
                                  </thead>
                                  <tbody>
                        
                                  
                                  <tr>
                                    <td>Rendah (< 150 Jiwa/Km<small>2</small>)</td>
                                    <td>2</td>
                                  </tr>
                                  <tr>
                                    <td>Sedang (< 150 - 200 Jiwa/Km)</td>
                                    <td>3</td>
                                  </tr>
                                  <tr>
                                    <td>Tinggi (201 - 400 Jiwa/Km)</td>
                                    <td>4</td>
                                  </tr>
                                  <tr>
                                    <td>Sangat Padat (< 400 Jiwa/Km)</td>
                                    <td>5</td>
                                  </tr>
                                  
                        
                                  </tbody>
                              </table>
                              <label for="">Tabel kepadatan penduduk</label>
                                <table class="table table-bordered">
                                  <thead>
                                  <tr>
                                  <th>Penilaian</th>
                                  <th>Nilai</th>    
                                  </tr>
                                  </thead>
                                  <tbody>
                        
                                  
                                  <tr>
                                    <td>Rendah (< 150 Jiwa/Km<small>2</small>)</td>
                                    <td>2</td>
                                  </tr>
                                  <tr>
                                    <td>Sedang (< 150 - 200 Jiwa/Km)</td>
                                    <td>3</td>
                                  </tr>
                                  <tr>
                                    <td>Tinggi (201 - 400 Jiwa/Km)</td>
                                    <td>4</td>
                                  </tr>
                                  <tr>
                                    <td>Sangat Padat (< 400 Jiwa/Km)</td>
                                    <td>5</td>
                                  </tr>
                                  
                        
                                  </tbody>
                              </table>
                            </div>
                            
                          </div>  
                          
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="update_alternatif_btn" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                {{-- / edit modal --}}
                {{-- modal view  --}}
                <div class="modal fade" id="showModalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alternatif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                    
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama alternatif:</label>
                                  <input type="text" readonly class="form-control" id="view_nama_alternatif" name="nama_alternatif">
                                <span class="text-danger error-text nama_alternatif_error"></span>
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kabupaten:</label>
                                  <input type="text" readonly class="form-control" id="view_kabupaten"  name="kabupaten">
                                <span class="text-danger error-text kabupaten_error"></span>
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Provinsi:</label>
                                  <input type="text" readonly class="form-control" id="view_provinsi" name="provinsi">
                                <span class="text-danger error-text provinsi_error"></span>
                              </div>  
                            </div>  
                            <div class="vl-view mr-2 ml-2"></div>
                            <div class="col-sm" id="show_view_form">
                              {{-- mengambil dari response html dari controller --}}
                            </div>
                            
                          </div>  
                          
                      </div>
                        <div class="modal-footer">
                          
                        </div>
                 
                    </div>
                  </div>
                </div>
               {{-- / modal view  --}}
              
                {{-- delete modal --}}
                <div class="modal fade" id="showModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" class="witdh: 200%;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Alternatif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" enctype="multipart/form-data" id="deleteAlter">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" id="deleteAlter">
                              <h4>Apakah kamu yakin, ingin menghapus data <br> <center>Alternatif??</center></h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" id="delete_kriteria_btn" class="btn btn-danger">Hapus</button>
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

    fetchTable();
 
    //
    function fetchTable() {
        $.ajax({
          url: '{{ route('alter_table') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_alternatif").html(response);
            $("#dataTable_alternatif").DataTable({
              "responsive": true,
              "lengthChange": false, 
              "autoWidth": false,
              "bDestroy": true,
            });
          }
        });
    }
    

    function showForm()
    {
      $.ajax({
        type: "get",
        url: '{{ route('showForm') }}',
        success: function (response) {

          $("#show_all_form").html(response);

        }
      });
    }

  

    //tambah modal
    $(document).on('click','.addAlter', function(e){
      e.preventDefault();
      showForm();
      $("#showModal").modal("show");
     
    });
    //tambah alternatif
    $("#add_alternatif").submit(function(e) {
          e.preventDefault();
          $("#add_alternatif_btn").prop('disabled', true);
          $("#add_alternatif_btn").text('menyimpan...');
          const fd = new FormData(this);
          $.ajax({
            url: '{{ route('alter_add') }}',
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success: function(response) {
              
              if(response.status == 400){
                // $("#success_message").addClass('alert alert-danger');
                // $('#success_message').text(response.message);
                  $.each(response.errors, function (previx, val) { 
                      $('span.' +previx + '_error').text(val[0]);
                  });
                $("#add_alternatif_btn").prop('disabled', false);
                $("#add_alternatif_btn").text('Submit');
              }else{
                
                $('#add_alternatif')[0].reset();
                $("#success_message").addClass('alert alert-success');
                $('#success_message').text(response.message);
                $("#showModal").modal('hide');
                $("#add_alternatif_btn").prop('disabled', false);
                $("#add_alternatif_btn").text('Submit');
                fetchTable();
              }
            }
          });
      });
      

 
      //edit
      $(document).on('click', '.editAlter', function(e) {
        e.preventDefault();
        
        var id = $(this).attr('id');
        //atau bisa pakai yang dibawah dengan id diganti value
        //var id = $(this).val();
       // console.log(id);
        $("#showModalEdit").modal('show');
          $.ajax({
            type: "get",
            url: "/alternatif-edit/" + id,
          //  data: "data",
            dataType: "json",
            success: function (response) {
           
              //console.log(response);
              $("#id").val(id);
              $("#edit_nama_alternatif").val(response.nama_alternatif);
              $("#edit_kabupaten").val(response.kabupaten);
              $("#edit_provinsi").val(response.provinsi);

              //form edit kriteria
              $.ajax({
                type: "get",
                url: "/form-kriteria-edit/" + id,
                success: function (response) {
                  $("#show_edit_form").html(response);
                }
              });
            
            }
        });

      });

      //update
      $("#update_alternatif").submit(function(e) {
        e.preventDefault();
        $("#update_alternatif_btn").prop('disabled', true);
        $("#update_alternatif_btn").text('updating...');
        var id = $("#id").val();
    
        //memanggil data bisa pakai ini
        // const editData = {
        //   'nama_alternatif' : $("#edit_nama_alternatif").val();
        //   'kabupaten': $("#edit_kabupaten").val();
        //   'provinsi': $("#edit_provinsi").val();
        //   'jumlah_penduduk': $("#edit_jumlah_penduduk").val();
        //   'kepadatan_penduduk': $("#edit_kepadatan_penduduk").val();
        //   'pendapatan_penduduk': $("#edit_pendapatan_penduduk").val();
        //   'jarak': $("#edit_jarak").val();
        //   'jalan_aspal': $("#edit_jalan_aspal").val();
        // };
        const editData = new FormData(this);

        $.ajax({
          type: "post",
          url: "/alternatif/" + id,
          data: editData,
          //jika pakai FormData harus pakai 3 dibawah ini
          cache: false,
          contentType: false,
          processData: false,
          //
          beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
          dataType: "json",
          success: function (response) {
           // console.log(response.status)
           if(response.status == 400){
             
                $.each(response.errors, function (previx, val) { 
                    $('span.' +previx + '_error').text(val[0]);
                });
                $("#update_alternatif_btn").prop('disabled', false);
                $("#update_alternatif_btn").text('Update');

            }else{
            
              $('#update_alternatif')[0].reset();
              $("#success_message").addClass('alert alert-success');
              $('#success_message').text(response.message);
              $("#showModalEdit").modal('hide');
              $("#update_alternatif_btn").prop('disabled', false);
              $("#update_alternatif_btn").text('Update');
              fetchTable();
            }
          }
        });


      });

      //view alternatif
      $(document).on('click','.showAlter', function(e){
        e.preventDefault();
        let id = $(this).attr("id");

        $("#showModalView").modal("show");
   
          $.ajax({
            type: "get",
            url: "/alternatif-edit/" + id,
          //  data: "data",
            dataType: "json",
            success: function (response) {
              //console.log(response);
              $("#view_nama_alternatif").val(response.nama_alternatif);
              $("#view_kabupaten").val(response.kabupaten);
              $("#view_provinsi").val(response.provinsi);

              //form edit kriteria
              $.ajax({
                type: "get",
                url: "/form-kriteria-edit/" + id,
                success: function (response) {
                  $("#show_view_form").html(response);
                }
              });
            
            }
        });
      });
       
      

      //delete modal
      $(document).on("click", ".deleteAlter", function(e){
        e.preventDefault();

        var id = $(this).attr("id");
        $("#deleteAlter").val(id);
        //console.log(id);
        $("#showModalDelete").modal("show");

      });

      //delete
      $("#deleteAlter").submit(function(e){
        e.preventDefault();
        $("#delete_alternatif_btn").prop('disabled', true);
        $("#delete_alternatif_btn").text("menghapus....");
        var id = $("#deleteAlter").val();
        
        $.ajax({
          type: "delete",
          url: "/alternatif/" + id,
          success: function (response) {
           // console.log(response);
            
            $("#success_message").addClass("alert alert-success");
            $("#success_message").text(response.message);
            $("#showModalDelete").modal("hide");
            $("#delete_alternatif_btn").prop('disabled', false);
            $("#delete_alternatif_btn").text("Hapus");

            fetchTable();
          }
        });
      
      })


  });

  </script>