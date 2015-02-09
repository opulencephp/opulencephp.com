<!DOCTYPE html>
<html>
    <head>
        {{!charset("utf-8")!}}
        {{!pageTitle($title)!}}
        {{!css($css)!}}
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#336699">
        <meta name="theme-color" content="#ffffff">
        {{!metaKeywords($metaKeywords)!}}
        {{!metaDescription($metaDescription)!}}
        {{!script($javaScript)!}}
    </head>
    <body>
        <header class="main">
            {% include("MainNav.php") %}
        </header>
        <main class="{{!$mainClasses!}}">
            {% show("content") %}
        </main>
        <footer class="main">
            {% include("MainNav.php") %}
            &copy; {{date("Y")}} David Young
        </footer>
    </body>
</html>