@include('includes.header')
@include('includes.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Driver Schedule</li> --}}
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Driver Schedule</h2><br>
            <form action="{{ route('index_result_driver') }}" method="POST" enctype="multipart/form-data" id="search_driver" name="search_driver">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                {{-- <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum"> --}}
                                <select class="form-control form-control-lg select2bs4" data-placeholder="- Select Driver -" style="height: 100%;" name="selected_driver" id="selected_driver">
                                <option value="" selected disabled>- Select Driver -</option>
                                @foreach ($get_driver as $item_driver)
                                    <option value="{{ $item_driver->id_tbl_driver }}">{{ $item_driver->name }}</option>
                                @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form><br>
            @foreach ($driver_name as $item_name)
                
            @endforeach
            <h2 class="text-center display-6">Driver : {{ $item_name->name }}</h2><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            
                            <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs_0" data-toggle="tab">{{ date("D-d-m-Y", strtotime("+ 0 days")); }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs_1" data-toggle="tab">{{ date("D-d-m-Y", strtotime("+ 1 days")); }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs_2" data-toggle="tab">{{ date("D-d-m-Y", strtotime("+ 2 days")); }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs_3" data-toggle="tab">{{ date("D-d-m-Y", strtotime("+ 3 days")); }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs_4" data-toggle="tab">{{ date("D-d-m-Y", strtotime("+ 4 days")); }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs_5" data-toggle="tab">{{ date("D-d-m-Y", strtotime("+ 5 days")); }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs_6" data-toggle="tab">{{ date("D-d-m-Y", strtotime("+ 6 days")); }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-five-tabContent">
                                <div class="tab-pane fade show" id="tabs_0" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="card">
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                              <table id="tbl_schedule_driver0" class="table table-bordered table-striped">
                                                <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Requester</th>
                                                      <th>PickUp Time</th>
                                                      <th>Client</th>
                                                      <th>Must Arrive</th>
                                                      <th>Order Status</th>
                                                      <th><i class="fas fa-cog"></i></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($get_order_driver as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_driver  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_driver == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_driver == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_driver == 1)
                                                                  Order Completed
                                                              @endif
                                                            </td>
                                                            <td>
                                                                {{-- data-url="{{ route('show_modal_pr_admin',['id'=>$item_pr->pr_no])}}" --}}
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-flat" data-toggle="dropdown">
                                                                        <span class="sr-only">Toggle Dropdown</span>
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" role="menu">
                                                                        <button type="button" class="dropdown-item" title="Show Data" data-toggle="modal" data-target="#modal_pr_show" id="getPR" >
                                                                            Details
                                                                        </button>
                                                                    <div class="dropdown-divider"></div>
                                                                        @if (Auth::user()->name == "Adelia Wiratna")
                                                                            {{-- <a class="dropdown-item" href=""></a> --}}
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_driver') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_driver }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_driver') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_driver }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="reject_order"><code>Reject Order</code></button>
                                                                            </form>
                                                                        @else
                                                                        @endif
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
                                <div class="tab-pane fade show" id="tabs_1" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="card">
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                              <table id="tbl_schedule_driver1" class="table table-bordered table-striped">
                                                <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Requester</th>
                                                      <th>PickUp Time</th>
                                                      <th>Client</th>
                                                      <th>Must Arrive</th>
                                                      <th>Order Status</th>
                                                      <th><i class="fas fa-cog"></i></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($get_order_driver1 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_driver  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_driver == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_driver == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_driver == 1)
                                                                  Order Completed
                                                              @endif
                                                            </td>
                                                            <td>
                                                                {{-- data-url="{{ route('show_modal_pr_admin',['id'=>$item_pr->pr_no])}}" --}}
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-flat" data-toggle="dropdown">
                                                                        <span class="sr-only">Toggle Dropdown</span>
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" role="menu">
                                                                        <button type="button" class="dropdown-item" title="Show Data" data-toggle="modal" data-target="#modal_pr_show" id="getPR" >
                                                                            Details
                                                                        </button>
                                                                    <div class="dropdown-divider"></div>
                                                                        @if (Auth::user()->name == "Adelia Wiratna")
                                                                            {{-- <a class="dropdown-item" href=""></a> --}}
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_driver') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_driver }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_driver') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_driver }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="reject_order"><code>Reject Order</code></button>
                                                                            </form>
                                                                        @else
                                                                        @endif
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
                                <div class="tab-pane fade show" id="tabs_2" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="card">
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                              <table id="tbl_schedule_driver2" class="table table-bordered table-striped">
                                                <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Requester</th>
                                                      <th>PickUp Time</th>
                                                      <th>Client</th>
                                                      <th>Must Arrive</th>
                                                      <th>Order Status</th>
                                                      <th><i class="fas fa-cog"></i></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($get_order_driver2 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_driver  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_driver == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_driver == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_driver == 1)
                                                                  Order Completed
                                                              @endif
                                                            </td>
                                                            <td>
                                                                
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
                                <div class="tab-pane fade show" id="tabs_3" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="card">
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                              <table id="tbl_schedule_driver3" class="table table-bordered table-striped">
                                                <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Requester</th>
                                                      <th>PickUp Time</th>
                                                      <th>Client</th>
                                                      <th>Must Arrive</th>
                                                      <th>Order Status</th>
                                                      <th><i class="fas fa-cog"></i></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($get_order_driver3 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_driver  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_driver == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_driver == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_driver == 1)
                                                                  Order Completed
                                                              @endif
                                                            </td>
                                                            <td>
                                                                {{-- data-url="{{ route('show_modal_pr_admin',['id'=>$item_pr->pr_no])}}" --}}
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-flat" data-toggle="dropdown">
                                                                        <span class="sr-only">Toggle Dropdown</span>
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" role="menu">
                                                                        <button type="button" class="dropdown-item" title="Show Data" data-toggle="modal" data-target="#modal_pr_show" id="getPR" >
                                                                            Details
                                                                        </button>
                                                                    <div class="dropdown-divider"></div>
                                                                        @if (Auth::user()->name == "Adelia Wiratna")
                                                                            {{-- <a class="dropdown-item" href=""></a> --}}
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_driver') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_driver }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_driver') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_driver }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="reject_order"><code>Reject Order</code></button>
                                                                            </form>
                                                                        @else
                                                                        @endif
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
                                <div class="tab-pane fade show" id="tabs_4" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="card">
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                              <table id="tbl_schedule_driver4" class="table table-bordered table-striped">
                                                <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Requester</th>
                                                      <th>PickUp Time</th>
                                                      <th>Client</th>
                                                      <th>Must Arrive</th>
                                                      <th>Order Status</th>
                                                      <th><i class="fas fa-cog"></i></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($get_order_driver4 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_driver  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_driver == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_driver == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_driver == 1)
                                                                  Order Completed
                                                              @endif
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
                                <div class="tab-pane fade show" id="tabs_5" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="card">
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                              <table id="tbl_schedule_driver5" class="table table-bordered table-striped">
                                                <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Requester</th>
                                                      <th>PickUp Time</th>
                                                      <th>Client</th>
                                                      <th>Must Arrive</th>
                                                      <th>Order Status</th>
                                                      <th><i class="fas fa-cog"></i></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($get_order_driver5 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_driver  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_driver == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_driver == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_driver == 1)
                                                                  Order Completed
                                                              @endif
                                                            </td>
                                                            <td>
                                                                {{-- data-url="{{ route('show_modal_pr_admin',['id'=>$item_pr->pr_no])}}" --}}
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-flat" data-toggle="dropdown">
                                                                        <span class="sr-only">Toggle Dropdown</span>
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" role="menu">
                                                                        <button type="button" class="dropdown-item" title="Show Data" data-toggle="modal" data-target="#modal_pr_show" id="getPR" >
                                                                            Details
                                                                        </button>
                                                                    <div class="dropdown-divider"></div>
                                                                        @if (Auth::user()->name == "Adelia Wiratna")
                                                                            {{-- <a class="dropdown-item" href=""></a> --}}
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_driver') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_driver }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_driver') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_driver }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="reject_order"><code>Reject Order</code></button>
                                                                            </form>
                                                                        @else
                                                                        @endif
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
                                <div class="tab-pane fade show" id="tabs_6" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="card">
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                              <table id="tbl_schedule_driver6" class="table table-bordered table-striped">
                                                <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Requester</th>
                                                      <th>PickUp Time</th>
                                                      <th>Client</th>
                                                      <th>Must Arrive</th>
                                                      <th>Order Status</th>
                                                      <th><i class="fas fa-cog"></i></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($get_order_driver6 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_driver  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_driver == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_driver == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_driver == 1)
                                                                  Order Completed
                                                              @endif
                                                            </td>
                                                            <td>
                                                                {{-- data-url="{{ route('show_modal_pr_admin',['id'=>$item_pr->pr_no])}}" --}}
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-flat" data-toggle="dropdown">
                                                                        <span class="sr-only">Toggle Dropdown</span>
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" role="menu">
                                                                        <button type="button" class="dropdown-item" title="Show Data" data-toggle="modal" data-target="#modal_pr_show" id="getPR" >
                                                                            Details
                                                                        </button>
                                                                    <div class="dropdown-divider"></div>
                                                                        @if (Auth::user()->name == "Adelia Wiratna")
                                                                            {{-- <a class="dropdown-item" href=""></a> --}}
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_driver') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_driver }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_driver') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_driver }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="reject_order"><code>Reject Order</code></button>
                                                                            </form>
                                                                        @else
                                                                        @endif
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