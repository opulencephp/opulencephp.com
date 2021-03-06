<% extends("Master") %>

<% part("content") %>
    <article>
        {{! $doc !}}
        <footer>
            <a href="https://github.com/opulencephp/docs/blob/{{ $version }}/{{ $docName }}.md" target="_blank" title="Edit this document"><i class="fa fa-pencil" aria-hidden="true"></i> Edit this document</a>
        </footer>
    </article>
<% endpart %>

<% part("docVersion") %>
    <li id="doc-version-option" class="aux dropdown-option">
        <a id="doc-version-toggle" class="dropdown-toggle" href="#" title="Select the documentation version">{{ $branchTitles[$docVersion] }}</a>
        <ul id="doc-version-dropdown">
            <% foreach($branchTitles as $branchName => $branchTitle) %>
            <li><a href="{{! route('docs', $branchName, $docName) !}}" title="View documentation for {{ $branchTitle }} version">{{ $branchTitle }}</a></li>
            <% endforeach %>
        </ul>
    </li>
<% endpart %>

<% part("docNav") %>
    <% foreach($docs as $category => $subDocs) %>
    <section>
        <h5>{{ $category }}</h5>
        <ul class="sidebar-doc-nav">
            <% foreach($subDocs as $docName => $docData) %>
            <li><a href="{{! route('docs', $version, $docName) !}}" title="{{ $docData['title'] }}">{{ $docData['linkText'] }}</a></li>
            <% endforeach %>
        </ul>
    </section>
    <% endforeach %>
<% endpart %>

<% part("footerJS") %>
    <% parent %>
    var versionDropdown = document.getElementById("doc-version-dropdown");
    var versionToggle = document.getElementById("doc-version-toggle");
    versionMenu = new toggleMenu(versionToggle, versionDropdown);

    // Make sure our docs are at least as tall as the sidebar
    var sidebar = document.querySelector("nav.sidebar");
    document.querySelector("main.docs").style.minHeight = (sidebar.offsetTop + sidebar.scrollHeight + 10) + "px";
<% endpart %>