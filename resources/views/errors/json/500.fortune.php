<% extends("errors/json/Error") %>

<% part("errorCode") %>500<% endpart %>
<% part("errorMessage") %>
<% if($__inDevelopmentEnvironment) %>
{{ $__exception->getMessage() }}
<% while($__exception = $__exception->getPrevious()) %>
<li>
    <pre>{{ $__exception->getMessage() }}</pre>
</li>
<% endwhile %>
<% else %>
There was a technical error while handling your request
<% endif %>
<% endpart %>