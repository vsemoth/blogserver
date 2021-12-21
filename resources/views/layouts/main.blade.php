<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
     crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="css/styles.css">
     <x-head.tinymce-config/>
</head>
<body>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                @yield('main-content')
            </div>
        </div>
    </div>

<script src="{{ url('js/tinymce.js') }}"></script>
</body>
</html>