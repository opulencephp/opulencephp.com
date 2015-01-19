<!DOCTYPE html>
<html>
    <head>
        {{!charset("utf-8")!}}
        {{!pageTitle($title)!}}
        {{!css($css)!}}
        {{!metaKeywords($metaKeywords)!}}
        {{!metaDescription($metaDescription)!}}
    </head>
    <body>
        <header>
            <h1><a href="{{route('home')}}" title="Home">RDev</a></h1>
            <nav>
                <ul>
                    <li><a href="{{route('home')}}" title="Home">Home</a></li>
                </ul>
            </nav>
        </header>
        <main>
            {% show("content") %}
        </main>
        <footer>
            &copy; {{date("Y")}} <a href="{{route('home')}}" title="Home">RDev</a>
        </footer>
    </body>
</html>