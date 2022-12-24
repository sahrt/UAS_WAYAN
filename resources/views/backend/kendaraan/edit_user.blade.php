@extends('admin.admin_master')
@section('admin')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		
		<!-- Main content -->
		<section class="content">
    <div class="card">
            <div class="card-body">

                <h5 class="card-title" style="font-size: 30px; ">Isi Formulir Ubah Kendaraan</h5>
                <br>
                <br>
              

              <!-- General Form Elements -->
              <form action="{{ route('hewan.update', $editData->id) }}}" method="post" >
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NoPlat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="noplat" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Merekkendaraan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="merekkendaraan" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NamaPemilik</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="namapemilik" required>
                  </div>
                </div>
                <div class="row mb-3">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">
                  </label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name ="submit">Tambah</button>
                  </div>
                </div>

              </form>
              <!-- End General Form Elements -->

            </div>
          </div>

        </div>

		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

@endsection

<script src="{{ asset('backend/js/pages/form-validation.js') }}"></script>