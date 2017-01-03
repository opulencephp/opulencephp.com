<nav>
    <ul>
        <li class="logo"><a href="{{! route('home') !}}" title="Home">{{! logo(false) !}}</a></li>
        <li {{! $request->isPath("/docs(/.*)?", true) ? ' class="current"' : "" !}}><a href="{{! route('docs-index') !}}" title="Documentation">Docs</a></li>
        <li><a href="https://github.com/opulencephp/Opulence" target="_blank" title="Source">Source</a></li>
    </ul>
</nav>