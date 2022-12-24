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
                <h3 class="box-title">Data Karyawan</h3>
                <a href="{{ route('karyawan.add') }}" style="float:right;" type="button" class="btn btn-rounded btn-success mb-5">Tambah KaryawanS</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Karyawan</th>
                              <th>Email</th>
                              <th>Alamat Karyawan</th>
                              <th>Jenis Kelamin</th>
                              <th>Umur</th>
                              <th>aksi </th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allDataKyn as $key => $Kyn)
                          <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $Kyn->nama }}</td>
                              <td>{{ $Kyn->email }}</td>
                              <td>{{ $Kyn->alamat }}</td>
                              <td>{{ $Kyn->gender }}</td>
                              <td>{{ $Kyn->umur }}</td>
                              <td>
                                <a href="" class="btn btn-info">Edit</a>
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