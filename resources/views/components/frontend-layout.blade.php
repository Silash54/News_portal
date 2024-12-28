<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frontend</title>

</head>
<body>
    <header>
        <x-frontend-navbar/>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
<h1 class="text-danger">hello world</h1>
<div class="badge bg-primary text-wrap" style="width: 6rem;">
    This text should wrap.
  </div>
    </footer>

</body>
</html>