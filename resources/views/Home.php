{% extends("Master.php") %}

{% part("content") %}
<section id="features">
    <h2><i class="fa fa-code"></i> RDev - A powerful new MVC framework for PHP</h2>
    RDev was built with a lot of functionality already baked-in, but also with customization in mind.  RDev makes it easy to do things like:

    <ul>
        <li><a href="{{route('docs', [$defaultBranch, 'routing'])}}" title="Routing">Route requests</a></li>
        <li><a href="{{route('docs', [$defaultBranch, 'view-basics'])}}" title="Views">Create extendable, cacheable views</a></li>
        <li><a href="{{route('docs', [$defaultBranch, 'orm-basics'])}}" title="ORM">ORM the right way with the repository pattern and heavy caching</a></li>
        <li><a href="{{route('docs', [$defaultBranch, 'console-basics'])}}" title="Console commands">Write powerful console commands</a></li>
        <li>Integration test all your <a href="{{route('docs', [$defaultBranch, 'http-testing'])}}" title="Testing HTTP routes">HTTP routes</a> and <a href="{{route('docs', [$defaultBranch, 'console-testing'])}}" title="Testing console commands">console commands</a></li>
    </ul>
    It is <a href="https://github.com/ramblingsofadev/RDev/tree/master/tests/app/rdev" target="_blank">thoroughly-tested</a>, <a href="https://github.com/ramblingsofadev/RDev" target="_blank">open source</a>, and free under the MIT license.
</section>
<section id="installation">
    <h2><i class="fa fa-download"></i> Installing</h2>
    Get up and running fast with Composer:
    <blockquote>
        <code>composer create-project rdev/project DESIRED_SERVER_PATH --prefer-dist</code>
    </blockquote>
    To learn more about installation, <a href="{{route('docs', [$defaultBranch, 'installing'])}}" title="Installing">read the documentation</a>.
</section>
<section id="why-rdev">
    <h2><i class="fa fa-question-circle"></i> Why Use RDev?</h2>
    In a world saturated with PHP frameworks, here are some reasons you should give RDev a try:

    <div class="highlight-wrapper">
        <article>
            <h4><i class="fa fa-bolt"></i> It's fast.</h4>
            <ul>
                <li>
                    On a cheap 512MB server, RDev can handle 350 requests per second.
                </li>
                <li>
                    Most of RDev's settings are cached to reduce overhead on each request.
                </li>
            </ul>
        </article>
        <article>
            <h4><i class="fa fa-wrench"></i> It's completely configurable.</h4>
            <ul>
                <li>
                    Want to write your own implementation of an RDev component?  Most are written to an interface, so you can <a href="{{route('docs', [$defaultBranch, 'dependency-injection'])}}" title="Learn about dependency injection">bind your implementation to RDev at runtime</a>.
                </li>
            </ul>
        </article>
        <article>
            <h4><i class="fa fa-sitemap"></i> It's scalable.</h4>
            <ul>
                <li>
                    Need to take a load off your database?  Learn how data mappers can <a href="{{route('docs', [$defaultBranch, 'orm-data-mappers'])}}" title="Learn about data mappers">send 95% of queries to cache</a>.
                </li>
                <li>
                    Need session support with multiple servers?  We've <a href="{{route('docs', [$defaultBranch, 'sessions'])}}" title="Learn about sessions">got you covered</a>.
                </li>
            </ul>
        </article>
        <article>
            <h4><i class="fa fa-chain-broken"></i> It's loosely coupled.</h4>
            <ul>
                <li>
                    Want to use a component without downloading half the framework?  Most components have 0 dependencies.
                </li>
                <li>
                    Want to write your own app from scratch?  RDev isn't bound to any config implementation like some frameworks.
                </li>
            </ul>
        </article>
        <article>
            <h4><i class="fa fa-thumbs-o-up"></i> It doesn't bleed into your code.</h4>
            <ul>
                <li>
                    Want to write an HTTP controller?  Use a <a href="{{route('docs', [$defaultBranch, 'http-basics'])}}#controllers" title="Learn about HTTP controllers">plain-old PHP object</a>.
                </li>
                <li>
                    Want to write a class that can be stored with ORM?  Use a plain-old PHP object.
                </li>
            </ul>
        </article>
        <article>
            <h4><i class="fa fa-shield"></i> It's secure.</h4>
            <ul>
                <li>
                    Need to store passwords?  Try our <a href="{{route('docs', [$defaultBranch, 'cryptography'])}}#hashing" title="Learn about hashing">hashing library</a>.
                </li>
                <li>
                    Need to prevent cross-site scripting attacks?  Try our <a href="{{route('docs', [$defaultBranch, 'view-basics'])}}#cross-site-scripting" title="Learn how to prevent cross-site scripting">template engine</a>.
                </li>
                <li>
                    Need to prevent cross-site request forgeries?  Try our <a href="{{route('docs', [$defaultBranch, 'http-security'])}}#cross-site-request-forgery" title="Learn how to prevent cross-site request forgeries">middleware</a>.
                </li>
            </ul>
        </article>
    </div>
</section>
<section id="about">
    <h2><i class="fa fa-info-circle"></i> About</h2>
    RDev was written by <a href="https://twitter.com/ramblingsofadev" target="_blank" title="David's Twitter">David Young</a>, a math and computer science graduate from the University of Illinois at Urbana-Champaign.
</section>
{% endpart %}