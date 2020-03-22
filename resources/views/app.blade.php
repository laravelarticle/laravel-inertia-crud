<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="app-title">Laravel Inertia Js CRUD</h2>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        @inertia
    </div>
</div>

</body>
</html>