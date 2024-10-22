@include('includes.header')
<!-- BS Stepper -->
<link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">
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
              <li class="breadcrumb-item active">Messenger Booking</li>
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
                  <h3 class="card-title">Messenger Booking Form</h3>
                </div>
                <div class="card-body p-0">
                  <div class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                      <!-- your steps here -->
                      <div class="step" data-target="#step1">
                        <button type="button" class="step-trigger" role="tab" aria-controls="step1" id="step1-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">Order</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#step2">
                        <button type="button" class="step-trigger" role="tab" aria-controls="step2" id="step2-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">Destination</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#step3">
                        <button type="button" class="step-trigger" role="tab" aria-controls="step3" id="step3-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">Confirm</span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content">
                      <!-- your steps content here -->
                        <form action="{{ route('store_book_messenger') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                      
                            <div id="step1" class="content" role="tabpanel" aria-labelledby="step1-trigger">
                                <div class="form-group">
                                    <label for="messenger_name">Select Messenger</label>
                                    <select name="messenger_name" id="messenger_name" class="form-control select2bs4" required>
                                        <option value="" selected disabled>- Select Messenger -</option>
                                        @foreach ($get_messenger as $messenger_list)
                                            <option value="{{ $messenger_list->id_tbl_messenger }}">{{ $messenger_list->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="opt_item_type">Item Type</label>
                                      <select name="item_type" id="inputItemType" class="form-control select2bs4" required>
                                        <option value="People">People</option>
                                        <option value="Office Supplies">Office Supplies</option>
                                        <option value="Documents">Documents</option>
                                        <option value="Etc">Etc</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="txt_pick">Pick Up Address</label>
                                      <input type="text" class="form-control" id="txt_pick" name="txt_pick" placeholder="Jl....." required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputOrderPickUpDate">Pick Up Date</label>
                                            <select name="inputOrderPickUpDate" id="inputOrderPickUpDate" class="form-control select2bs4">
                                                @for ($i = 0; $i < 7; $i++)
                                                    <option value="{{ date("d-M-Y", strtotime("+ $i days")); }}">{{ date("d-M-Y", strtotime("+ $i days")); }}</option>        
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputOrderPickUpTime">Pick Up Time</label>
                                            <select name="inputOrderPickUpTime" id="inputOrderPickUpTime" class="form-control select2bs4">
                                                @php
                                                    $times_plus = 30; 
                                                @endphp
                                                @for ($i = 0; $i <= 18; $i++)
                                                    @php
                                                        $time=strtotime('08:30 +'.$times_plus.' minutes');
                                                    @endphp
                                                    <option value="{{ date("H:i:s",$time); }}">{{ date("H:i:s",$time); }}</option>
                                                    @php
                                                        $times_plus = $times_plus+30;
                                                    @endphp
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txt_note">Notes ( Optional )</label>
                                    <textarea name="txt_note" id="inputNotes" cols="10" rows="5" style="resize: none;" class="form-control" placeholder="Invoice/Contract/Vendor Document/ATK/Receiver Name/Floor/Building/Room Name"></textarea>
                                </div>
                                <a href="#" class="btn btn-primary" onclick="stepper.next()"> Next </a>
                            </div>
                            <div id="step2" class="content" role="tabpanel" aria-labelledby="step2-trigger">
                                <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="arrive_date">Max Arrive Date</label>
                                        <select name="arrive_date" id="arrive_date" class="form-control select2bs4">
                                            @for ($i = 0; $i < 7; $i++)
                                                <option value="{{ date("d-M-Y", strtotime("+ $i days")); }}">{{ date("d-M-Y", strtotime("+ $i days")); }}</option>        
                                            @endfor
                                        </select>                       
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                            <label for="arrive_time">Max Arrive Time</label>
                                            <select name="arrive_time" id="arrive_time" class="form-control select2bs4">
                                                @php
                                                    $times_plus = 30; 
                                                @endphp
                                                @for ($i = 0; $i <= 18; $i++)
                                                    @php
                                                        $time=strtotime('08:30 +'.$times_plus.' minutes');
                                                    @endphp
                                                    <option value="{{ date("H:i:s",$time); }}">{{ date("H:i:s",$time); }}</option>
                                                    @php
                                                        $times_plus = $times_plus+30;
                                                    @endphp
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="txt_client">Client</label>
                                        <input type="text" class="form-control" id="txt_client" name="txt_client" placeholder="SKK Migas/PHR/PHE" required>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="txt_dest">Destination Address</label>
                                        <input type="text" class="form-control" id="txt_dest" name="txt_dest" placeholder="Jl....." required>
                                      </div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-warning" onclick="stepper.previous()"> Previous </a>
                                <a href="#" class="btn btn-primary" onclick="stepper.next()"> Next </a>
                            </div>
                            <div id="step3" class="content text-center" role="tabpanel" aria-labelledby="step3-trigger">
                                
                                <a href="#" class="btn btn-warning" onclick="stepper.previous()"> Previous </a>
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Submit</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
    </section>
</div>

@include('includes.footer')
<!-- BS-Stepper -->
<script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<script>
    // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    })
  });
</script>
