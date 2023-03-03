@extends('layouts.admin-container')

@section('content')
    <h3>Fetch Available Users</h3>

    <form action="" method="POST" id="formUsers">
        <div class="form-group row">
            <label for="url" class="col-sm-2 col-form-label">URL</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="url" placeholder="Url" name="url" required
                    value="{{ url('api/users') }}">
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

        $('#formUsers').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'GET',
                url: url.val(),
                success: function(response) {
                    $('pre').remove();
                    $('#formUsers').after(`<pre>${JSON.stringify(response, null, 2)}</pre>`)
                }
            });
        });
    </script>
@endsection
