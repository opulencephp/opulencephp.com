{% extends("Master.php") %}

{% part("content") %}
<nav class="sidebar">
    <?php foreach($docs as $category => $subDocs): ?>
    <section>
        <h5>{{$category}}</h5>
        <ul>
            <?php foreach($subDocs as $docName => $docData): ?>
            <li><a href="{{route('docs', [$version, $docName])}}" title="{{$docData['title']}}">{{$docData['title']}}</a></li>
            <?php endforeach; ?>
        </ul>
    </section>
    <?php endforeach; ?>
</nav>
<article>
    {{!$doc!}}
</article>

{% endpart %}