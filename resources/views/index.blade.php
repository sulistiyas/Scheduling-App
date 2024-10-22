@include('includes.header')
@include('includes.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  @php
                      $query_users = Illuminate\Support\Facades\DB::table('users')->where('deleted_at','=',NULL)->get();
                      $users_count =  $query_users->count();
                  @endphp
                  {{ $users_count }}
                </h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  @php
                      $query_order = Illuminate\Support\Facades\DB::table('order_driver')->where('deleted_at','=',NULL)->get();
                      $order_count =  $query_order->count();
                  @endphp
                  {{ $order_count }}
                </h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <h3>
                  @php
                      $query_driver = Illuminate\Support\Facades\DB::table('tbl_driver')->where('deleted_at','=',NULL)->get();
                      $driver_count =  $query_driver->count();
                  @endphp
                  {{ $driver_count }}
                </h3>

                <p>Drivers</p>
              </div>
              <div class="icon">
                <i class="fas fa-car-side"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <h3>
                  @php
                      $query_messenger = Illuminate\Support\Facades\DB::table('tbl_messenger')->where('deleted_at','=',NULL)->get();
                      $messenger_count =  $query_messenger->count();
                  @endphp
                  {{ $messenger_count }}
                </h3>

                <p>Messengers</p>
              </div>
              <div class="icon">
                <i class="fas fa-motorcycle"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@include('includes.footer')
