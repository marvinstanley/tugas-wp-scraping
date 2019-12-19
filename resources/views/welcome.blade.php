<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TUGAS WEB SCRAPING</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa|Patua+One" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="css/information.css">
    </head>
    <body>
            <header class="masthead clear">
            
                <div class="content">
                    <div class="site-branding">
                        <h1 class="site-title">Web Scraping detik.com</h1>
                        <p>Stanley Marvin - 2101654560 - LK01</p>
                    </div>
                </div>
            </header>

            <div class="flex-center position-ref full-height">
                <div class="centered">
                    <section class="cards">
                    @foreach($contents as $content)
                    <article class="card">
                        <a href="{{ $content->links }}" target="_blank">
                        <picture class="thumbnail">
                            <img src="{{ $content->thumbnail }}" alt="">
                        </picture>
                            <div class="card-content">
                                <h2>{{ $content->title }}</h2>
                                <p>{{ $content->description }}</p>
                            </div>
                        </a>
                    </article>
                    @endforeach
                    </section>
                </div>
            </div>
    </body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            setInterval(function() {
                $.ajax({
                    type: "GET",
                    url: "/",
                    success: function(response) {
                        if (response) {
                            window.location.reload(true);
                        }
                    }
                });
            }, 60000);
        });
    </script>
</html>
