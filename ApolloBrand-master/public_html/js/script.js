$(document).ready(function () {
    var listSw = $('#listButton');
    var gridSw = $('#gridButton');
    var listVi = $('#listView');
    var gridVi = $('#gridView');

    // Hides the gridView from when page is loaded
    gridVi.hide();

    // Activate LISTVIEW!
    listSw.click(function () {
        switch_a_roo(gridSw, gridVi, listSw, listVi);
    });

    // Activate GRIDVIEW!
    gridSw.click(function () {
        switch_a_roo(listSw, listVi, gridSw, gridVi);
    });
});

function switch_a_roo(fromButton, fromFormat, toButton, toFormat) {
    //Button highlighted
    fromButton.removeClass('active');
    toButton.addClass('active');

    //Format switch
    fromFormat.hide();
    toFormat.show();
}