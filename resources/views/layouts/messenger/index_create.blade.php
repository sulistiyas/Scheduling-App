@include('includes.header')
@include('includes.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Messenger Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Messenger`s Data</h3>
                            <button type="button" class="float-sm-right btn btn-primary" data-toggle="modal" data-target="#modal_messenger">
                                <i class="fas fa-plus">&nbsp;Add Data</i>
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="tbl_messenger" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($get_messenger as $item_messenger)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item_messenger->name }}</td>
                                            <td>{{ $item_messenger->user_phone }}</td>
                                            <td>{{ $item_messenger->email }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
{{-- Create Modal --}}
<form action="{{ route('store_create_messenger') }}" method="POST" enctype="multipart/form-data" id="users" name="users">
    @csrf
    <div class="modal fade" id="modal_messenger">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New messenger Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="txt_id_messenger">Name</label>
                            <select name="txt_id_messenger" id="txt_id_messenger" class="form-control select2bs4">
                                <option value="" disabled selected>- Select User -</option>
                                @foreach ($get_user as $item_user)
                                    <option value="{{ $item_user->id }}">{{ $item_user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
</form>
@include('includes.footer')
<script>
    $(function () {
        // Datatables
        $("#tbl_messenger").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_messenger_wrapper .col-md-6:eq(0)');
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })
    });
</script>