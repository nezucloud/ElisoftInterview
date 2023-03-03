@extends('layouts.admin-container')

@section('content')
    <h3>Variable Swap</h3>
    <form action="" method="POST" id="formNumber">
        <div class="form-group row">
            <label for="num" class="col-sm-2 col-form-label">Number</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="num" placeholder="Number" name="num" required
                    value="">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Convert</button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        const url = $('#url');

        $('#formNumber').on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData($(this)[0]);
            let num = 0;
            num = formData.get('num');

            $('pre').remove();
            $('#formNumber').after(
                `<pre>result :
${JSON.stringify(numberToWords(num), null, 2)}

${numberToWords}
${frontWords}
${rearWords}
${theWords}
</pre>`)
        });

        function numberToWords(number) {
            number = Number(number);
            let result = theWords(number);

            return result;
        }

        function frontWords(money) {
            var sub = '';

            if (money == 1) {
                sub = 'Satu '
            } else
            if (money == 2) {
                sub = 'Dua '
            } else
            if (money == 3) {
                sub = 'Tiga '
            } else
            if (money == 4) {
                sub = 'Empat '
            } else
            if (money == 5) {
                sub = 'Lima '
            } else
            if (money == 6) {
                sub = 'Enam '
            } else
            if (money == 7) {
                sub = 'Tujuh '
            } else
            if (money == 8) {
                sub = 'Delapan '
            } else
            if (money == 9) {
                sub = 'Sembilan '
            } else
            if (money == 0) {
                sub = '  '
            } else
            if (money == 10) {
                sub = 'Sepuluh '
            } else
            if (money == 11) {
                sub = 'Sebelas '
            } else
            if ((money >= 11) && (money <= 19)) {
                sub = frontWords(money % 10) + 'Belas ';
            } else
            if ((money >= 20) && (money <= 99)) {
                sub = frontWords(Math.floor(money / 10)) + 'Puluh ' + frontWords(money % 10);
            } else
            if ((money >= 100) && (money <= 199)) {
                sub = 'Seratus ' + frontWords(money - 100);
            } else
            if ((money >= 200) && (money <= 999)) {
                sub = frontWords(Math.floor(money / 100)) + 'Ratus ' + frontWords(money % 100);
            } else
            if ((money >= 1000) && (money <= 1999)) {
                sub = 'Seribu ' + frontWords(money - 1000);
            } else
            if ((money >= 2000) && (money <= 999999)) {
                sub = frontWords(Math.floor(money / 1000)) + 'Ribu ' + frontWords(money % 1000);
            } else
            if ((money >= 1000000) && (money <= 999999999)) {
                sub = frontWords(Math.floor(money / 1000000)) + 'Juta ' + frontWords(money % 1000000);
            } else
            if ((money >= 100000000) && (money <= 999999999999)) {
                sub = frontWords(Math.floor(money / 1000000000)) + 'Milyar ' + frontWords(money % 1000000000);
            } else
            if ((money >= 1000000000000)) {
                sub = frontWords(Math.floor(money / 1000000000000)) + 'Triliun ' + frontWords(money % 1000000000000);
            }
            return sub;
        }

        function rearWords(t) {
            if (t.length == 0) {
                return '';
            }
            return t
                .split('0').join('Kosong ')
                .split('1').join('Satu ')
                .split('2').join('Dua ')
                .split('3').join('Tiga ')
                .split('4').join('Empat ')
                .split('5').join('Lima ')
                .split('6').join('Enam ')
                .split('7').join('Tujuh ')
                .split('8').join('Delapan ')
                .split('9').join('Dembilan ');
        }

        function theWords(nNumber) {
            var
                v = 0,
                sisa = 0,
                tanda = '',
                tmp = '',
                sub = '',
                subcoma = '',
                p1 = '',
                p2 = '',
                pkoma = 0;
            if (nNumber > 999999999999999999) {
                return 'Kebanyakan Angkanyaaa...';
            }
            v = nNumber;
            if (v < 0) {
                tanda = 'Minus ';
            }
            v = Math.abs(v);
            tmp = v.toString().split('.');
            p1 = tmp[0];
            p2 = '';
            if (tmp.length > 1) {
                p2 = tmp[1];
            }
            v = parseFloat(p1);
            sub = frontWords(v);
            subcoma = rearWords(p2);
            sub = tanda + sub.replace('  ', ' ') + subcoma.replace('  ', ' ');
            return sub.replace('  ', ' ');
        }
    </script>
@endsection
