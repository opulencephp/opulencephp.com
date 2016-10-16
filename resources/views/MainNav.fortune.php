<nav>
    <ul>
        <li><a href="{{! route('home') !}}" title="Home">{{! logo() !}}</a></li>
        <li class="movable main-nav{{! $request->isPath("
        /docs(/.*)?", true) ? ' current' : "" !}}"><a href="{{! route('docs-index') !}}"
                                                      title="Documentation">Docs</a></li>
        <li class="movable main-nav"><a href="https://github.com/opulencephp/Opulence" target="_blank" title="Source">Source</a>
        </li>
        <li class="movable main-nav"><a href="https://www.twitter.com/opulencephp" target="_blank" title="David's Twitter"><i class="fa fa-twitter"></i></a></li>
        <li id="mobile-menu" class="aux"><a href="#" title="Expand menu">&equiv;</a></li>
        <% part("docVersion") %>

        <% show %>
    </ul>
</nav>