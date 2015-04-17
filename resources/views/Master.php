<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1" />
        {{!charset("utf-8")!}}
        {{!rdevTitle($title, $doFormatTitle)!}}
        {{!css("http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700")!}}
        {{!css($masterCSS)!}}
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
            {% include("SidebarNav.php") %}
            {% show("content") %}
        </main>
        <footer class="main {{!$mainClasses!}}">
            {% include("FooterNav.php") %}
            &copy; {{date("Y")}} David Young
        </footer>
        <script type="text/javascript">
            function addClass(element, className)
            {
                if(element.className != " ")
                {
                    element.className += " ";
                }

                element.className += className;
            }

            function hasClass(element, className)
            {
                return (' ' + element.className + ' ').indexOf(' ' + className + ' ') > -1;
            }

            function removeClass(element, className)
            {
                var regex = new RegExp("\\b" + className + "\\b", "g");
                element.className = element.className.replace(regex, "");
            }

            // Toggle the "nav-open" class when clicking the link
            document.getElementById("mobile-menu").getElementsByTagName("a")[0].onclick = function(e)
            {
                // How to tell if an element has a particular class
                if(hasClass(document.body, 'nav-open'))
                {
                    removeClass(document.body, "nav-open");
                }
                else
                {
                    addClass(document.body, "nav-open");
                }

                return false;
            };

            document.getElementById("doc-version-toggle").onclick = function(e)
            {
                var dropdown = document.getElementById("doc-version-dropdown");

                if(hasClass(dropdown, "open"))
                {
                    removeClass(dropdown, "open");
                }
                else
                {
                    addClass(dropdown, "open");
                }

                return false;
            };
        </script>
    </body>
</html>