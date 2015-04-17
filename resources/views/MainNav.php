<nav>
    <ul>
        <li><a href="{{route('home')}}" title="Home">{{!logo()!}}</a></li>
        <li class="movable{{!$request->isPath("/docs(/.*)?", true) ? ' current' : ""!}}"><a href="{{route('docs-index')}}" title="Documentation">Docs</a></li>
        <li class="movable"><a href="/api/master/" target="_blank" title="API">API</a></li>
        <li class="movable"><a href="https://github.com/ramblingsofadev/RDev" target="_blank" title="GitHub">GitHub</a></li>
        <li class="movable"><a href="https://www.twitter.com/ramblingsofadev" target="_blank" title="David's Twitter"><i class="fa fa-twitter"></i></a></li>
        <li id="mobile-menu" class="aux"><a href="#" title="Expand menu">&equiv;</a></li>
        <?php if(isset($docName) && isset($docVersion)): ?>
        <li id="doc-version-option" class="aux">
            <a id="doc-version-toggle" href="#" title="Select the documentation version">{{$branchTitles[$docVersion]}}</a>
            <ul id="doc-version-dropdown">
                <?php foreach($branchTitles as $branchName => $branchTitle): ?>
                <li><a href="{{route('docs', [$branchName, $docName])}}" title="View documentation for {{$branchTitle}} version">{{$branchTitle}}</a></li>
                <?php endforeach; ?>
            </ul>
        </li>
        <?php endif; ?>
    </ul>
</nav>