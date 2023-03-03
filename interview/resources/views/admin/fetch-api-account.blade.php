@extends('layouts.admin-container')

@section('content')
    <h3>Fetch Api Account</h3>
    <div class="form-group row">
        <label for="url" class="col-sm-2 col-form-label">URL</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="url" placeholder="Url" name="url" required
                value="http://149.129.221.143/kanaldata/Webservice/bank_account">
        </div>
    </div>
    <form action="" method="POST" id="formAccount">
        <h3>Form Data</h3>
        <div class="form-group row">
            <label for="bank_id" class="col-sm-2 col-form-label">Bank ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="bank_id" placeholder="Url" name="bank_id" required
                    value="2">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        const url = $('#url');

        $('#formAccount').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: url.val(),
                data: new FormData($('#formAccount')[0]),
                processData: false, // Using FormData, no need to process data.
                contentType: false,
                success: function(response) {
                    $('pre').remove();
                    $('#formAccount').after(`<pre>${JSON.stringify(response, null, 2)}</pre>`)
                }
            });
        });
    </script>
@endsection
