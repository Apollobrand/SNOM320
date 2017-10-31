var currentPath;
var pathFromRoot = $('<link type="text/css" id="headCss" rel="stylesheet" href="public_html/css/main.css"/>');
var pathFromViews = $('<link type="text/css" id="headCss" rel="stylesheet" href="../css/main.css"/>');

$(document).ready(function () {
    if (currentPath.indexOf('/view/')) {
        return pathFromViews;
    }
    else {
        return pathFromRoot;
    }
});
