<nav>
    <ul>
        <li><a href="{{route('home')}}" title="Home">{{!logo()!}}</a></li>
        <li{{!$request->isPath("/docs(/.*)?", true) ? ' class="current"' : ""!}}><a href="{{route('docs-index')}}" title="Documentation">Documentation</a></li>
        <li><a href="https://github.com/ramblingsofadev/RDev" target="_blank" title="GitHub">GitHub</a></li>
        <li class="mobile-menu"><a href="#" title="Expand menu">&equiv;</a></li>
    </ul>
</nav>