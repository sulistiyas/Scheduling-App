@include('includes.header')
@include('includes.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Driver Schedule</h1>
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
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <button type="button" class="float-sm-right btn btn-primary" data-toggle="modal" data-target="#modal_users">
                                <i class="fas fa-plus">&nbsp;Add Data</i>
                            </button>
                            <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                                @for ($i = 0; $i < 7; $i++)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tabs_{{ $i }}" data-toggle="tab">{{ date("D-d-m-Y", strtotime("+ $i days")); }}</a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-five-tabContent">
                                @for ($k = 0; $k < 7; $k++)
                                    <div class="tab-pane fade show" id="tabs_{{ $k }}" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                        <div class="row">
                                            <div class="col-12">
                                              <div class="card">
                                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                                  <table id="tbl_schedule_driver{{ $k }}" class="table table-bordered table-striped">
                                                    <thead>
                                                      <tr>
                                                          <th>#</th>
                                                          <th>Client{{ $k }}</th>
                                                          <th>Must Arrive</th>
                                                          <th>Requester</th>
                                                          <th>PickUp Time</th>
                                                          <th><i class="fas fa-cog"></i></th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('includes.footer')
<script>
    $(function () {
        // Datatables
        $("#tbl_schedule_driver0").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_driver0_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_driver1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_driver1_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_driver2").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_driver2_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_driver3").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_driver3_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_driver4").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_driver4_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_driver5").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_driver5_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_driver6").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_driver6_wrapper .col-md-6:eq(0)');
    });
</script>