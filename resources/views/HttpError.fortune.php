<% extends("Master") %>

<% part("content") %>
    <h2>{{ $errorTitle }}</h2>
    {{ $errorDescription }}
<% endpart %>