<% extends("Master") %>

<% part("content") %>
<section>
    <h2><% show("errorTitle") %></h2>
    <% part("errorDescription") %>
    Something went wrong. We will look into what happened.
    <% show %>
</section>
<% endpart %>