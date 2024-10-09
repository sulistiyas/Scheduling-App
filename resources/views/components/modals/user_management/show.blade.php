@foreach ($fetch_data as $item_fetch)
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="txt_name">Name</label>
            <input type="text" name="txt_name" id="txt_name" class="form-control" value="{{ $item_fetch->name }}" required readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="txt_phone">Phone Number</label>
            <input type="number" name="txt_phone" id="txt_phone" class="form-control" value="{{ $item_fetch->user_phone }}" required readonly>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="txt_job">Job Status</label>
            <select name="txt_job" id="txt_job" class="form-control select2bs4" required readonly>
                <option value="" disabled>- Select Role -</option>
                <option value="{{ $item_fetch->user_job_status}}">{{ $item_fetch->user_job_status}}</option>
                {{-- <option value="Messenger" {{ $item_fetch->user_job_status == "Messenger" ? 'selected' : '' }}>Messenger</option> --}}
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="txt_email">Email</label>
            <input type="email" name="txt_email" id="txt_email" class="form-control" value="{{ $item_fetch->email }}" required readonly>
        </div>
    </div>
</div>    
@endforeach
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