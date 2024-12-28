<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frontend</title>
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
</head>

<body>
    <header>
        <div class="card" style="width: 10rem;">
            <img src="{{ asset($company->logo) }}" class="card-img-top" alt="{{ $company->logo }}">
        </div>
        <x-frontend-navbar />
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>

    </footer>
    <script src="/frontend/js/bootstrap.min.js" >
</body>

</html>
