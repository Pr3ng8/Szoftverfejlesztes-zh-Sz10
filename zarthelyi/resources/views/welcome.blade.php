<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
    <div class="container">

        <div class="table-responsive">
        <table class="table table-success table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cím</th>
                <th scope="col">Értékelések száma</th>
                <th scope="col">Értékelés</th>
                <th scope="col">Ár</th>
                <th scope="col">Év</th>
                <th scope="col">Szerző</th>
                <th scope="col">Műfaj</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($books as $book)
                <tr>
                    <th scope="row">{{ $loop->index }}</th>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->reviews }}</td>
                    <td>{{ $book->user_rating }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->genre->name }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>

    <canvas id="myChart" width="400" height="400"></canvas>
    <script>
        const ctx = document.getElementById('myChart');
        const labels = @json($names);
        const data = {
            labels: labels,
            datasets: [{
                label: 'Price',
                data: @json($prices),
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };
        const config = {
            type: 'line',
            data: data,
        };
        const myChart = new Chart(ctx, config);
    </script>
    </body>
</html>
