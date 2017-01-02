<nav class="sidebar">
    <section id="sidebar-main-nav">
        <h5>Main</h5>
        <ul>
            <li><a href="{{! route('home') !}}" title="Home">Home</a></li>
            <li{{! $request->isPath("/docs(/.*)?", true) ? ' class="current"' : "" !}}><a href="{{! route('docs-index') !}}" title="Documentation">Docs</a></li>
            <li><a href="https://github.com/opulencephp/Opulence" target="_blank" title="Source">Source</a></li>
            <li><a href="https://slackinvite.me/to/opulencephp" target="_blank" title="Get invited to Opulence's Slack channel"><i class="fa fa-slack"></i> Slack</a></li>
            <li><a href="https://www.twitter.com/opulencephp" target="_blank" title="David's Twitter"><i class="fa fa-twitter"></i> Twitter</a></li>
        </ul>
    </section>
    <% part("docNav") %>

    <% show %>
</nav>