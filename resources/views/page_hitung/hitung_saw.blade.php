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
            <h1 class="m-0">Nilai SAW</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Nilai SAW</li>
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
                  <h3 class="card-title">Perhitungan SAW</h3>
                  <br>
                  <label>Pastikan tidak ada nilai 0, ditabel matrix x agar perhitungan bisa berjalan</label> 
                </div>
                <!-- /.card-header -->
                  {{-- success message --}}
                  <div id="success_message">
                   
                  </div>
                
                <div class="card-body" id="print_page">
            
                 
                    <div class="text-center justify-content-center">
                      <h4>Table Matrix X</h4> 
                    </div>
                    
                      <div class="d-flex justify-content-center" id="show_table_matrix-X">
                      
                      </div>
            
                      

                    <div id="show_table_hitung">
                      
                    </div>

                   

                  </div>

                  <div class="d-flex justify-content-center mb-2 mr-2">
                    <button class="btn btn-primary hitungSaw mr-2" id="hitung_btn" type="submit">Hitung</button>
                  
                      <button class="btn btn-warning" onclick="printElem('#print_page')" id="print_btn" type="submit">Print</button>
                 
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
  </div>
  <!-- /.content-wrapper -->

  @include('layoutLTE.footer')
<script>
    


      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      function matrixX(){
        $.ajax({
          type: "get",
          url: "/matrix-X",
          cache: false,
            contentType: false,
            processData: false,
          success: function (response) {
            
            $("#show_table_matrix-X").html(response);

          }
        });
      }

      matrixX();

      function hitung(){
        $.ajax({
          type: "get",
          url: "/hitungSaw",
          cache: false,
            contentType: false,
            processData: false,
          success: function (response) {
            $('#show_table_hitung').html(response);

          }
        });
      }

      $("#print_btn").prop('disabled',true);

      $(document).on('click', '.hitungSaw', function(e){
        e.preventDefault();
        //jika tombol hitung di klik tampilkan respone perhitungan

        $("#hitung_btn").prop('disabled',true);
        $("#print_btn").prop('disabled',false);

        hitung();
       

      });

  

      




    function printElem(elem)
    {   
        Popup($('<div/>').append($(elem).clone()).html());
    }

    function Popup(data) 
    {
      var mywindow = window.open('', 'perhitungan', 'height=1000,width=1400');
        mywindow.document.write('<html><head><title>perhitungan</title>');
        mywindow.document.write('<meta charset="utf-8">');
        mywindow.document.write('<meta name="viewport" content="width=device-width, initial-scale=1">');
        mywindow.document.write('<meta name="csrf-token" content="{{ csrf_token() }}" />');
         mywindow.document.write('<link rel="stylesheet" href="{{ URL::asset('adminLTE/dist/css/adminlte.min.css') }}" type="text/css" />'); 
         mywindow.document.write('<link rel="stylesheet" href="{{ URL::asset('adminLTE/dist/css/print.css') }}" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
      //  mywindow.close();

        return true;
    }
   
    
</script>