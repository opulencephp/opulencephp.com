<% extends("Master.php") %>

<% part("content") %>
<article>
    {{!$doc!}}
</article>
<% endpart %>

<% part("footerJS") %>
<% parent("footerJS") %>
// Toggle the doc version selector
document.getElementById("doc-version-toggle").onclick = function(e)
{
    var dropdown = document.getElementById("doc-version-dropdown");

    if(hasClass(dropdown, "open"))
    {
        removeClass(dropdown, "open");
    }
    else
    {
        addClass(dropdown, "open");
    }

    return false;
};
<% endpart %>