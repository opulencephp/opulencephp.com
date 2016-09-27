<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1" />
        {{! charset("utf-8") !}}
        {{! opulenceTitle($title, $doFormatTitle) !}}
        {{! css("//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700") !}}
        {{! css($masterCSS) !}}
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=1.0">
        <link rel="icon" type="image/png" href="/favicon-32x32.png?v=1.0" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-16x16.png?v=1.0" sizes="16x16">
        <link rel="manifest" href="/manifest.json?v=1.0">
        <link rel="mask-icon" href="/safari-pinned-tab.svg?v=1.0" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">
        {{! metaKeywords($metaKeywords) !}}
        {{! metaDescription($metaDescription) !}}
        {{! script($javaScript) !}}
        <% include("GoogleAnalytics.php") %>
    </head>
    <body>
        <header class="main {{! $mainClasses !}}">
            <% include("MainNav", compact("request", "defaultBranch")) %>
        </header>
        <main class="{{! $mainClasses !}}">
            <% include("SidebarNav", compact("request", "defaultBranch")) %>
            <% show("content") %>
            <div id="gray-out"></div>
        </main>
        <footer class="main {{! $mainClasses !}}">
            <% include("FooterNav", compact("request", "defaultBranch")) %>
            Opulence &reg; is a registered trademark of David Young.
        </footer>
        <script type="text/javascript">
            <% part("footerJS") %>
                Element.prototype.addClass = function(className)
                {
                    if(this.className != " ")
                    {
                        this.className += " ";
                    }

                    this.className += className;
                };
                Element.prototype.hasClass = function(className)
                {
                    return (' ' + this.className + ' ').indexOf(' ' + className + ' ') > -1;
                };
                Element.prototype.removeClass = function(className)
                {
                    var regex = new RegExp("\\b" + className + "\\b", "g");
                    this.className = this.className.replace(regex, "");
                };

                var mobileMenu = {
                    isOpen: function()
                    {
                        return document.body.hasClass('nav-open');
                    },
                    close: function()
                    {
                        document.body.removeClass("nav-open");
                    },
                    open: function()
                    {
                        document.body.addClass("nav-open");
                    }
                };

                // Handle toggling the mobile menu
                document.querySelector("#mobile-menu a").onclick = function()
                {
                    if(mobileMenu.isOpen())
                    {
                        mobileMenu.close();
                    }
                    else
                    {
                        mobileMenu.open();
                    }

                    return false;
                };

                // Close the sidebar when clicking on gray-out
                document.getElementById("gray-out").onclick = function()
                {
                    mobileMenu.close();
                };
            <% show %>
        </script>
    </body>
</html>