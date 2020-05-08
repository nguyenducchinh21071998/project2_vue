<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Laravel Vuejs SPA</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>