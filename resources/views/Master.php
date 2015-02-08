<!DOCTYPE html>
<html>
    <head>
        {{!charset("utf-8")!}}
        {{!pageTitle($title)!}}
        {{!css($css)!}}
        {{!metaKeywords($metaKeywords)!}}
        {{!metaDescription($metaDescription)!}}
        {{!script($javaScript)!}}
    </head>
    <body>
        <header>
            <h1><a href="{{route('home')}}" title="Home">RDev</a></h1>
            <nav class="main">
                <ul>
                    <li><a href="{{route('home')}}" title="Home">Home</a></li>
                    <li><a href="{{route('docs-index')}}" title="Docs">Documentation</a></li>
                    <li><a href="https://github.com/ramblingsofadev/RDev" target="_blank" title="GitHub">GitHub</a></li>
                </ul>
            </nav>
        </header>
        <main class="{{!$mainClasses!}}">
            {% show("content") %}
        </main>
        <footer>
            &copy; {{date("Y")}} <a href="{{route('home')}}" title="Home">RDev</a>
        </footer>
    </body>
</html>