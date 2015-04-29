{% extends("Master.php") %}

{% part("content") %}
<section id="features">
    <h2><i class="fa fa-code"></i> RDev - A powerful new MVC framework for PHP</h2>
    RDev was built with a lot of functionality already baked-in, but also with customization in mind.  RDev makes it easy to do things like:

    <ul>
        <li><a href="{{route('docs', [$defaultBranch, 'routing'])}}" title="Routing">Route requests</a></li>
        <li><a href="{{route('docs', [$defaultBranch, 'views'])}}" title="Views">Create extendable, cacheable views</a></li>
        <li><a href="{{route('docs', [$defaultBranch, 'orm'])}}" title="ORM">ORM the right way with the repository pattern and heavy caching</a></li>
        <li><a href="{{route('docs', [$defaultBranch, 'console'])}}" title="Console commands">Write powerful console commands</a></li>
        <li><a href="{{route('docs', [$defaultBranch, 'testing-your-application'])}}" title="Testing">Integration test all your HTTP routes and console commands</a></li>
    </ul>
    It is <a href="https://github.com/ramblingsofadev/RDev/tree/master/tests/app/rdev" target="_blank">thoroughly-tested</a>, <a href="https://github.com/ramblingsofadev/RDev" target="_blank">open source</a>, and free under the MIT license.
</section>
<section id="installation">
    <h2><i class="fa fa-download"></i> Installing</h2>
    Get up and running fast with Composer:
    <blockquote>
        <code>composer create-project rdev/project --prefer-dist</code>
    </blockquote>
    To learn more about installation, <a href="{{route('docs', [$defaultBranch, 'installing'])}}" title="Installing">read the documentation</a>.
</section>
<section id="about">
    <h2><i class="fa fa-info-circle"></i> About</h2>
    RDev was written by <a href="https://twitter.com/ramblingsofadev" target="_blank" title="David's Twitter">David Young</a>, a math and computer science graduate from the University of Illinois at Urbana-Champaign.
</section>
{% endpart %}