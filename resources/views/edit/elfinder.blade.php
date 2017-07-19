<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>elFinder 2.0</title>

    <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/elfinder.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/theme.css')}}">

    <!-- elFinder JS (REQUIRED) -->
    <script src="{{asset('js/elfinder.min.js') }}"></script>

    <!-- elFinder translation (OPTIONAL) -->
    <script src="{{ asset('js/i18n/elfinder.ru.js')}}"></script>

    <!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript" charset="utf-8">
        $().ready(function() {
            $('#elfinder').elfinder({
                // set your elFinder options here
                lang: ' ru ', // locale
                customData:
                {
                    _token: '{{csrf_token()}}',
                    url : 'php/connector.minimal.php',  // connector URL
                }
            });
        });
    </script>
</head>
<body>

<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>

</body>
</html>
