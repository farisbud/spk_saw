    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Provinsi</th>
        <th>Jumlah penduduk</th>
        <th>Luas wilayah</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
    @foreach ($alternatif as $item)
        
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama_alternatif }}</td>
        <td>{{ $item->provinsi }}</td>
        <td>{{ $item->jumlah_penduduk }} jiwa</td>
        <td>{{ $item->luas_wilayah }}</td>
        <td class="project-actions text-right">
            <a class="btn btn-primary btn-sm" href="#">
            <i class="fas fa-folder">
            </i>
            View
            </a>
            <a class="btn btn-info btn-sm" href="#">
                <i class="fas fa-pencil-alt">
                </i>
                Edit
            </a>
            <a class="btn btn-danger btn-sm" href="#">
                <i class="fas fa-trash">
                </i>
                Delete
            </a>
        </td>
        </tr>
    @endforeach
        </tbody>

    </table>
    <div class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
      <button data-toggle="modal" data-target="#showModal" class="btn btn-primary" type="button">Tambah Alternatif</button>    
    </div>