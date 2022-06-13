<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') ?? 'Fridge Master1' }} - API documentation</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('swagger/css/swagger-ui.css') }}">
        <style>
            *, *:before, *:after {
                box-sizing: inherit;
            }
            html {
                box-sizing: border-box;
                overflow: -moz-scrollbars-vertical;
                overflow-y: scroll;
            }
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div id="swagger-ui"></div>

        <script type="text/javascript" src="{{ asset('swagger/js/swagger-ui-bundle.js') }}"></script>
        <script type="text/javascript">
            window.onload = () => {
                window.ui = SwaggerUIBundle({
                    url: '{{ config('app.url') }}/swagger/specification.yml',
                    dom_id: '#swagger-ui',
                    deepLinking: true,
                    presets: [
                        SwaggerUIBundle.presets.apis,
                    ],
                    plugins: [
                        SwaggerUIBundle.plugins.DownloadUrl,
                    ],
                });
            }
        </script>
    </body>
</html>
