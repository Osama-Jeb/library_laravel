<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

</head>

<body>
    <nav class="d-flex justify-content-around align-items-center mb-1">
        <a href={{ route('home.index') }}>HOME PAGE</a>
        <a href={{ route('about.index') }}>ABOUT PAGE</a>
        <a href={{ route('books.index') }}>BOOKS ADMIN</a>
        <a href={{ route('basket.index') }}>USER BASKET</a>
    </nav>
    @yield('content')
</body>

</html>
