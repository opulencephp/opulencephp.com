<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1" />
        {{!charset("utf-8")!}}
        {{!pageTitle($title)!}}
        {{!css("http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700")!}}
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
        {% include("GoogleAnalytics.php") %}
    </head>
    <body>
        <header class="main {{!$mainClasses!}}">
            {% include("MainNav.php") %}
        </header>
        <main class="{{!$mainClasses!}}">
            {% show("content") %}
        </main>
        <footer class="main {{!$mainClasses!}}">
            {% include("MainNav.php") %}
            &copy; {{date("Y")}} David Young
        </footer>
        <script type="text/javascript">
            // Toggle the "nav-open" class when clicking the link
            document.getElementsByClassName("mobile-menu")[0].getElementsByTagName("a")[0].onclick = function(e)
            {
                // How to tell if an element has a particular class
                if((' ' + document.body.className + ' ').indexOf(' nav-open ') > -1)
                {
                    document.body.className = document.body.className.replace(/\bnav\-open\b/, "");
                }
                else
                {
                    if(document.body.className != "")
                    {
                        document.body.className += " ";
                    }

                    document.body.className += "nav-open";
                }

                return false;
            };
        </script>
    </body>
</html>