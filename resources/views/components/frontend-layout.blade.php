<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frontend</title>
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="container-fluid ps-4 my-3">
            <div class="row">
                <div class=" col-md-2 d-none d-sm-block">
                    <div class="card " >
                        <img src="{{ asset($company->logo) }}" class="img-fluid" alt="{{ $company->logo }}">
                    </div>
                    <div class="col-md-8">
                        <div class="me-auto">
                            <p class="mb-0">&copy; <span id="year"></span> Silas Rai. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-frontend-navbar />
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>

    </footer>
    <script src="/frontend/js/bootstrap.min.js" >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
