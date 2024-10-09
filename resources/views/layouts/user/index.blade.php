@include('includes.header')
@include('includes.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User`s Data</h3>
                        <button type="button" class="float-sm-right btn btn-primary" data-toggle="modal" data-target="#modal_users">
                            <i class="fas fa-plus">&nbsp;Add Data</i>
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="tbl_users" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Job Status</th>
                                    <th><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_data as $item_user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item_user->name }}</td>
                                        <td>{{ $item_user->user_phone }}</td>
                                        <td>{{ $item_user->user_job_status }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-flat" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <button type="button" class="dropdown-item" title="Show Data" data-toggle="modal" data-target="#modal_user_show" id="getUser" data-url="{{ route('show_users',['id'=>$item_user->id])}}">
                                                        View
                                                    </button>
                                                    <button type="button" class="dropdown-item" title="Update Data" data-toggle="modal" data-target="#modal_user_update" id="updateUser" data-url="{{ route('edit_users',['id'=>$item_user->id])}}">
                                                        Update
                                                    </button>
                                                <div class="dropdown-divider"></div>
                                                  {{-- <a class="dropdown-item" href=""></a> --}}
                                                    <form onsubmit="return confirm('Data Will Be deleted Permanently, Sure ?');" action="{{ route('destroy_users',[$item_user->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
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
{{-- Modals --}}
{{-- Create Modal --}}
<form action="{{ route('store_users') }}" method="POST" enctype="multipart/form-data" id="users" name="users">
    @csrf
    <div class="modal fade" id="modal_users">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Users Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="txt_name">Name</label>
                            <input type="text" name="txt_name" id="txt_name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="txt_phone">Phone Number</label>
                            <input type="number" name="txt_phone" id="txt_phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="txt_job">Job Status</label>
                            <select name="txt_job" id="txt_job" class="form-control select2bs4" required>
                                <option value="" disabled selected>- Select Role -</option>
                                <option value="Driver">Driver</option>
                                <option value="Messenger">Messenger</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="txt_email">Email</label>
                            <input type="email" name="txt_email" id="txt_email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="txt_pass">Password</label>
                            <input type="password" name="txt_pass" id="txt_pass" class="form-control" required>
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
{{-- View Modal --}}
    <div class="modal fade" id="modal_user_show">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="overlay" id="modal-loader">
            <i class="fas fa-2x fa-sync fa-spin"></i>
          </div>
          <div class="modal-header">
              <h4 class="modal-title">Users Detail</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
             <div id="dynamic-content"></div>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
{{-- Update Modal --}}
    <div class="modal fade" id="modal_user_update">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="overlay" id="modal-loader-2">
            <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
                <h4 class="modal-title">Users Update Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div id="dynamic-content-2"></div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
        </div>
        </div>
    </div>
@include('includes.footer')
<script>
    $(function () {
        // Datatables
        $("#tbl_users").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_users_wrapper .col-md-6:eq(0)');
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })
    });
</script>
{{-- Get User --}}
<script>
  $(document).ready(function(){
      $(document).on('click', '#getUser', function(e){
          e.preventDefault();
          var url = $(this).data('url');
          $('#dynamic-content').html(''); // leave it blank before ajax call
          $('#modal-loader').show();      // load ajax loader
          $.ajax({
              url: url,
              type: 'GET',
              dataType: 'html'
          })
          .done(function(data){
              console.log(data);  
              $('#dynamic-content').html('');    
              $('#dynamic-content').html(data); // load response 
              $('#modal-loader').hide();        // hide ajax loader   
          })
          .fail(function(){
              $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
              $('#modal-loader').hide();
          });
      });
  });
</script>
{{-- Update User --}}
<script>
    $(document).ready(function(){
        $(document).on('click', '#updateUser', function(e){
            e.preventDefault();
            var url = $(this).data('url');
            $('#dynamic-content-2').html(''); // leave it blank before ajax call
            $('#modal-loader-2').show();      // load ajax loader
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html'
            })
            .done(function(data){
                console.log(data);  
                $('#dynamic-content-2').html('');    
                $('#dynamic-content-2').html(data); // load response 
                $('#modal-loader-2').hide();        // hide ajax loader   
            })
            .fail(function(){
                $('#dynamic-content-2').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                $('#modal-loader-2').hide();
            });
        });
    });
  </script>