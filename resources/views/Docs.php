{% extends("Master.php") %}

{% part("content") %}
<nav class="sidebar">
    <?php foreach($docs as $category => $subDocs): ?>
    <h4>{{$category}}</h4>
    <ul>
        <?php foreach($subDocs as $docName => $linkText): ?>
        <li><a href="{{route('docs', [$version, $docName])}}" title="{{$linkText}}">{{$linkText}}</a></li>
        <?php endforeach; ?>
    </ul>
    <?php endforeach; ?>
</nav>
<article>
    {{!doc!}}
</article>

{% endpart %}