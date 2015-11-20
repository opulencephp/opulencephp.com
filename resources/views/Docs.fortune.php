<% extends("Master") %>

<% part("content") %>
    <article>
        {{! $doc !}}
    </article>
<% endpart %>

<% part("footerJS") %>
    <% parent %>
    var sidebar = document.querySelector("nav.sidebar");
    var versionDropdown = document.getElementById("doc-version-dropdown");
    var versionToggle = document.getElementById("doc-version-toggle");

    // Make sure our docs are at least as tall as the sidebar
    document.querySelector("main.docs").style.minHeight = (sidebar.offsetTop + sidebar.scrollHeight + 10) + "px";

    var versionMenu = {
        close: function()
        {
            versionDropdown.removeClass("open");
            document.removeEventListener("click", this.detectClickOff);
        },
        detectClickOff: function(e)
        {
            if(e.target != versionDropdown && e.target != versionToggle)
            {
                // Can't use this because that'll point to the document
                versionMenu.close();
            }
        },
        isOpen: function()
        {
            return versionDropdown.hasClass("open");
        },
        open: function()
        {
            versionDropdown.addClass("open");
            document.addEventListener("click", this.detectClickOff);
        }
    };

    // Handle toggling the version menu
    versionToggle.onclick = function()
    {
        if(versionMenu.isOpen())
        {
            versionMenu.close();
        }
        else
        {
            versionMenu.open();
        }

        return false;
    };
<% endpart %>