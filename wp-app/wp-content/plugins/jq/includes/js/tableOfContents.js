$(document).ready(function(){
    const body =  $("body.single");
    const header = $("header.entry-header");
    header.after("<div class='contents'></div>");
    const tableOfContents = $("div.contents");
    tableOfContents.append("<ul id='clist'></ul>");

    var prevH2Item = null;
    var prevH2List = null;
    var prevH3Item = null;
    var prevH3List = null;
    var prevH4Item = null;
    var prevH4List = null;
    var prevH5Item = null;
    var prevH5List = null;

    var index = 0;
    $("body.single article h2, body.single article h3, body.single article h4, body.single article h5").each(function (){
        var anchor = "<a name='" + index + "'></a>";
        $(this).before(anchor);
        var li = "<li><a href='#" + index + "'>" + $(this).text() + "</a></li>";

        switch ($(this).prop("tagName")) {
            case 'H2':
                prevH2List = $("<ul></ul>");
                prevH2Item = $(li);
                prevH2Item.append(prevH2List);
                prevH2Item.appendTo("#clist");
                break;
            case 'H3':
                prevH3List = $("<ul></ul>");
                prevH3Item = $(li);
                prevH3Item.append(prevH3List);
                prevH3Item.appendTo(prevH2List);
                break;
            case 'H4':
                prevH4List = $("<ul></ul>");
                prevH4Item = $(li);
                prevH4Item.append(prevH4List);
                prevH4Item.appendTo(prevH3List);
                break;
            case 'H5':
                prevH5List = $("<ul></ul>");
                prevH5Item = $(li);
                prevH5Item.append(prevH5List);
                prevH5Item.appendTo(prevH4List);
                break;
            case 'H6':
                prevH5List.append(li);
                break;
        }
        index++;
    });

})