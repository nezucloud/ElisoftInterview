@extends('layouts.admin-container')

@section('content')
    <h3>Variable Swap</h3>
    <form action="" method="POST" id="formNumber">
        <div class="form-group row">
            <label for="numA" class="col-sm-2 col-form-label">Number A</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="numA" placeholder="Number A" name="numA" required
                    value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="numB" class="col-sm-2 col-form-label">Number B</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="numB" placeholder="Number B" name="numB" required
                    value="">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Swap</button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        const url = $('#url');

        $('#formNumber').on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData($(this)[0]);
            let num = [];
            for (const pair of formData.entries()) {
                num.push(pair[1]);
            }

            $('pre').remove();
            $('#formNumber').after(
                `<pre>${variableSwap}

result :
${JSON.stringify(variableSwap(num[0], num[1]), null, 2)}</pre>`)
        });

        function variableSwap(a, b) {
            a = Number(a);
            b = Number(b);

            a = a + b;
            b = a - b;
            a = a - b;

            return {
                a,
                b
            }
        }
    </script>
@endsection
