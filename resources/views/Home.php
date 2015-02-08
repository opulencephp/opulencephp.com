{% extends("Master.php") %}

{% part("content") %}
<h2>A fast, customizable MVC PHP framework</h2>
<p>
    RDev was built with a lot of functionality already baked-in, but also with customization in mind.  RDev makes it easy to do things like:

    <ul>
        <li><a href="{{route('docs', ['master', 'routing'])}}" title="Routing">Route requests</a></li>
        <li><a href="{{route('docs', ['master', 'views'])}}" title="Views">Create extendable, cacheable views</a></li>
        <li><a href="{{route('docs', ['master', 'orm'])}}" title="ORM">ORM done right with the repository pattern and heavy caching</a></li>
        <li><a href="{{route('docs', ['master', 'console'])}}" title="Console commands">Write powerful console commands</a></li>
    </ul>
</p>
<p>
    The project is <a href="https://github.com/ramblingsofadev/RDev" target="_blank">open source</a> and free under the MIT license.
</p>
<h2>Installing</h2>
<p>
    Get up and running fast with Composer:
    <blockquote>
        <code>composer create-project rdev/project --prefer-dist</code>
    </blockquote>
    To learn more about installation, <a href="{{route('docs', ['master', 'installing'])}}" title="Installing">read the documentation</a>.
</p>
<h2>About</h2>
<p>
    RDev was written by David Young, a math and computer science graduate from the University of Illinois at Urbana-Champaign.
</p>

{% endpart %}