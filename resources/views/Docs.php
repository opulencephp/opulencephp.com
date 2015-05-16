{% extends("Master.php") %}

{% part("content") %}
<article>
    {{!$doc!}}
</article>
{% endpart %}

{% part("footerJS") %}
function addClass(element, className)
{
if(element.className != " ")
{
element.className += " ";
}

element.className += className;
}

function hasClass(element, className)
{
return (' ' + element.className + ' ').indexOf(' ' + className + ' ') > -1;
}

function removeClass(element, className)
{
var regex = new RegExp("\\b" + className + "\\b", "g");
element.className = element.className.replace(regex, "");
}

// Toggle the "nav-open" class when clicking the link
document.getElementById("mobile-menu").getElementsByTagName("a")[0].onclick = function(e)
{
// How to tell if an element has a particular class
if(hasClass(document.body, 'nav-open'))
{
removeClass(document.body, "nav-open");
}
else
{
addClass(document.body, "nav-open");
}

return false;
};

// Close the sidebar when clicking on gray-out
document.getElementById("gray-out").onclick = function(e)
{
removeClass(document.body, "nav-open");
};
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
{% endpart %}