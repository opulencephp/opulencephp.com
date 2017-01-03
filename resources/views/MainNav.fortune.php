<nav>
    <ul>
        <li class="logo"><a href="{{! route('home') !}}" title="Home">{{! logo() !}}</a></li>
        <li class="movable main-nav{{! $request->isPath("/docs(/.*)?", true) ? ' current' : "" !}}"><a href="{{! route('docs-index') !}}" title="Documentation">Docs</a></li>
        <li class="movable main-nav"><a href="https://github.com/opulencephp/Opulence" target="_blank" title="Source">Source</a></li>
        <li id="community-option" class="movable main-nav dropdown-option">
            <a id="community-toggle" class="dropdown-toggle" href="#" title="View various ways of getting in touch with the community">Community</a>
            <ul id="community-dropdown">
                <li><a href="{{! route('slack') !}}" title="Get invited to Opulence's Slack channel"><i class="fa fa-slack"></i> Slack</a></li>
                <li><a href="https://www.twitter.com/opulencephp" target="_blank" title="David's Twitter"><i class="fa fa-twitter"></i> Twitter</a></li>
            </ul>
        </li>
        <li id="mobile-menu" class="aux"><a href="#" title="Expand menu">&equiv;</a></li>
        <% part("docVersion") %>

        <% show %>
    </ul>
</nav>