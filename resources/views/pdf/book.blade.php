<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('assets/argon-dashboard/assets/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
</head>

<body class='bg-white'>
    <div class='text-dark'>
        <div class="title text-center">
            <img class='float-left' src="{{ asset('images/icons/logo.png') }}" alt="logo">
            <div class="mx-auto title-header" style='max-width: 400px;'>
                <h2>Data Member</h2>
                <h3>Library blabla</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis minima cupiditate ab debitis nulla,
                    saep
                </p>
            </div>
        </div>
        <hr>
        <table class="table table-striped">
            <thead class=' text-uppercase thead-dark text-white'>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Hal</th>
                    <th scope="col">Publisher</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $item)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->hal }}</td>
                    <td>{{ $item->publisher->name }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">Total data : {{ count($book) }}</td>
                </tr>
            </tfoot>
        </table>
        <span><small>Print date : {{ now() }}</small></span>
    </div>
</body>

</html>
