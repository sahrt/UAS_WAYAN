@extends('admin.admin_master')
@section('admin')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
        <div class="row"> 

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Data Barang</h3>
                <a href="{{ route('barang.add') }}" style="float:right;" type="button" class="btn btn-rounded btn-success mb-5">Tambah Barang</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Barang</th>
                              <th>Prusahaan</th>
                              <th>Jumlah</th>
                              <th>Jenis</th>
                              <th>Aksi</th>

                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allDataBrn as $key => $Brn)
                          <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $Brn->nama }}</td>
                              <td>{{ $Brn->perusahaan }}</td>
                              <td>{{ $Brn->jumlah }}</td>
                              <td>{{ $Brn->jenis }}</td>
                              <td>
                                <a href="{{ route('barang.edit', $Brn->id) }}" class="btn btn-info">Edit</a>
                                <a href="" id= "delete" class="btn btn-danger">Delete</a>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                     
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

           
            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->

@endsection

<!-- Vendor JS -->
<script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="{{asset('backend/js/pages/data-table.js')}}"></script>