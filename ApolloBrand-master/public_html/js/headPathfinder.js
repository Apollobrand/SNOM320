var currentPath;
var pathFromRoot = $('<link type="text/css" id="headCss" rel="stylesheet" href="public_html/css/main.css"/>');
var pathFromViews = $('<link type="text/css" id="headCss" rel="stylesheet" href="../css/main.css"/>');

$(document).ready(function () {
    // TODO: Create a script which change the title in head to the current page.
    if (currentPath.indexOf('/view/')) {
        return pathFromViews;
    }
    else {
        return pathFromRoot;
    }
});
