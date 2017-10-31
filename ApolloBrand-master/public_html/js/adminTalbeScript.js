$(document).ready(function () {
    var s_id = '#spec-table';
    var s_th = $('#spec-table th');
    var s_tr = $('#spec-table tr');
    var s_td = $('#spec-table td');

    var v_id = '#spec-table';
    var v_th = $('#vari-table th');
    var v_tr = $('#vari-table tr');
    var v_td = $('#vari-table td');

    var rowString = '<th><input type="text" name="spec-head-1" title="spec-head-1" placeholder="Emne"></th>';
    var colString = '<td><input type="text" name="spec-data-1" title="spec-data-1" placeholder="Data"></td>';

    /* BUTTONS */
    // Adds rows and columns.
    $('.addCol').onclick(function () {
        addToTable();
    });

    $('.deleteCol').onclick(function () {
        deleteFromTable();
    });

    $('.addRow').onclick(function () {
        addToTable();
    });

    $('.deleteRow').onclick(function () {
        deleteFromTable();
    });

    /* CODE WHICH MAKES STUFF ACTIVE AND MAYBE LIGHT UP */
    tableLightUp(s_id, s_th, s_td);
    tableLightUp(v_id, v_th, v_td);

    /* Buttons */

    // Add to #spec-table
    addToTable(s_th, colString);
    addToTable(s_tr, rowString);

    // Delete from #spec-table
    deleteFromTable();
    deleteFromTable();

    // Add to #vari-table
    addToTable(v_th, colString);
    addToTable(v_tr, colString);

    // Delete form #spec-table
    deleteFromTable();
    deleteFromTable();
});

function tableLightUp(_id, _th, _td) {
    //Table head
    _th.mouseover(function () {
        $(this).css('background-color', '#EAD575');

        var ind = $(this).index();
        $(_id, 'td:nth-child(' + (ind + 1) + ')').css('background-color', '#EAD575');
    });

    _th.mouseleave(function () {
        $(this).css('background-color', '');
        var ind = $(this).index();
        $(_id, 'td:nth-child(' + (ind + 1) + ')').css('background-color', '');
    });

    _th.click(function () {
        $(this).addClass('.active');
    });

    // Table data
    _td.mouseover(function () {
        $(this).css('background-color', '#EAD575');
    });

    _td.mouseleave(function () {
        $(this).css('background-color', '');
    });

    _td.click(function () {
        $(this).addClass('.active');
    });
}

function addToTable(selector, appender) {
    // todo:Adds a column to it's parent table
    if (selector.addClass() === '.active') {
        this.append(appender)
    } else {
        $('th:last').append(appender)
    }
}

function deleteFromTable() {
    // todo:Deletes a column from it's parent table
}







/*
function addRows(selector) {
   // Adds a new Data row
   $('.addRow').onclick(function () {
       // todo:Adds a column to it's parent table
       if (selector.className === '.active') {
           this.append(rowString)
       } else {
           $('tr:last').append(rowString)
       }
   });
}

function deleteRows() {
   // deletes selected data row
   $('.deleteRow').onclick(function () {
       // todo:Deletes a row from it's parent table
   });

}
*/

