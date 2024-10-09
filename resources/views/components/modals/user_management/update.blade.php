@foreach ($edit_data as $item_data)
    <form action="{{ route('update_users',['id'=>$item_data->id]) }}" method="POST" enctype="multipart/form-data" id="users" name="users">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="txt_name">Name</label>
                    <input type="text" name="txt_name" id="txt_name" class="form-control" value="{{ $item_data->name }}" required >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="txt_phone">Phone Number</label>
                    <input type="number" name="txt_phone" id="txt_phone" class="form-control" value="{{ $item_data->user_phone }}" required >
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="txt_job">Job Status</label>
                    <select name="txt_job" id="txt_job" class="form-control select2bs4" required >
                        <option value="" disabled>- Select Role -</option>
                        <option value="Driver" {{ $item_data->user_job_status == "Driver" ? 'selected' : '' }}>Driver</option>
                        <option value="Messenger" {{ $item_data->user_job_status == "Messenger" ? 'selected' : '' }}>Messenger</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
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