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
            <h2 class="text-center display-4">Messenger Schedule</h2><br>
            <form action="{{ route('index_result_messenger') }}" method="POST" enctype="multipart/form-data" id="search_messenger" name="search_messenger">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                {{-- <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum"> --}}
                                <select class="form-control form-control-lg select2bs4" data-placeholder="- Select Messenger -" style="height: 100%;" name="selected_messenger" id="selected_messenger">
                                <option value="" selected disabled>- Select Messenger -</option>
                                @foreach ($get_messenger as $item_messenger)
                                    <option value="{{ $item_messenger->id_tbl_messenger }}">{{ $item_messenger->name }}</option>
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
            <h2 class="text-center display-6">Messenger Name : {{ $item_messenger->name }}</h2><br>
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
                                              <table id="tbl_schedule_messenger0" class="table table-bordered table-striped">
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
                                                    @foreach ($get_order_messenger as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_messenger  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_messenger == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_messenger == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_messenger == 1)
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
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
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
                                              <table id="tbl_schedule_messenger1" class="table table-bordered table-striped">
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
                                                    @foreach ($get_order_messenger1 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_messenger  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_messenger == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_messenger == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_messenger == 1)
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
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
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
                                              <table id="tbl_schedule_messenger2" class="table table-bordered table-striped">
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
                                                    @foreach ($get_order_messenger2 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_messenger  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_messenger == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_messenger == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_messenger == 1)
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
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
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
                                <div class="tab-pane fade show" id="tabs_3" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="card">
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                              <table id="tbl_schedule_messenger3" class="table table-bordered table-striped">
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
                                                    @foreach ($get_order_messenger3 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_messenger  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_messenger == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_messenger == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_messenger == 1)
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
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
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
                                              <table id="tbl_schedule_messenger4" class="table table-bordered table-striped">
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
                                                    @foreach ($get_order_messenger4 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_messenger  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_messenger == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_messenger == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_messenger == 1)
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
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
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
                                <div class="tab-pane fade show" id="tabs_5" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="card">
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                              <table id="tbl_schedule_messenger5" class="table table-bordered table-striped">
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
                                                    @foreach ($get_order_messenger5 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_messenger  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_messenger == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_messenger == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_messenger == 1)
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
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
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
                                              <table id="tbl_schedule_messenger6" class="table table-bordered table-striped">
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
                                                    @foreach ($get_order_messenger6 as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->client }}</td>
                                                            <td>{{ $item->order_arrive_date }} {{ $item->order_arrive_time }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->order_pick_up_date }} {{ $item->order_pick_up_time }}</td>
                                                            <td>
                                                              @if ( $item->status_order_messenger  == 4)
                                                                  Order Rejected
                                                              @elseif ( $item->status_order_messenger == 3)
                                                                  Waiting Confirmation
                                                              @elseif ( $item->status_order_messenger == 2)
                                                                  On Progress
                                                              @elseif ( $item->status_order_messenger == 1)
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
                                                                            <form onsubmit="return confirm('Are you sure you want to APPROVE this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
                                                                                <button class="dropdown-item toastrDefaultError" name="btn_app" value="approve_order">Approve Order</button>
                                                                            </form>

                                                                            <form onsubmit="return confirm('Are you sure you want to Reject this request ?');" action="{{ route('approve_messenger') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="txt_id_order" id="txt_order_id" value="{{ $item->id_order_messenger }}" readonly>
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
        $("#tbl_schedule_messenger0").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_messenger0_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_messenger1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_messenger1_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_messenger2").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_messenger2_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_messenger3").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_messenger3_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_messenger4").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_messenger4_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_messenger5").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_messenger5_wrapper .col-md-6:eq(0)');
        // 
        $("#tbl_schedule_messenger6").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_schedule_messenger6_wrapper .col-md-6:eq(0)');
    });
</script>