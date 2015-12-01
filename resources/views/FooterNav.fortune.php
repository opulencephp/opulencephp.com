<nav>
    <ul>
        <li><a href="{{! route('home') !}}" title="Home">{{! logo(false) !}}</a></li>
        <li{{! $request->isPath("/docs(/.*)?", true) ? ' class="current"' : "" !}}><a href="{{! route('docs-index') !}}" title="Documentation">Docs</a></li>
        <li><a href="/api/{{ $defaultBranch }}/" target="_blank" title="API">API</a></li>
        <li><a href="https://github.com/opulencephp/Opulence" target="_blank" title="GitHub">GitHub</a></li>
        <li><a href="https://www.twitter.com/opulencephp" target="_blank" title="David's Twitter"><i class="fa fa-twitter"></i></a></li>
    </ul>
</nav>