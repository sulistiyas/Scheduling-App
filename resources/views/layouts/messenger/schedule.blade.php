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
            </form><br><br>
            
        </div>
    </section>
</div>
@include('includes.footer')