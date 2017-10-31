$(document).ready(function(){
    // Create and Delete Datafield

    // Specs
    // TODO: When #CreateValD.click - ADD NEW DATAFIELD WITH UNIQUE ID
    $('#addDataSpec').click(function () {
        var selectorValue = $('select[name="SpecDataTypeSelector"]').val();
        if (selectorValue !=='default') {
            addToTable('specTable', 'deleteDataSpec', 'SvarD', selectorValue);
        }
    });

    // TODO: When #DeleteValD.click - DELETE GIVEN DATAFIELD .. SOMEHOW

    // Variants
    // TODO: When #CreateValD.click - ADD NEW DATAFIELD WITH UNIQUE ID
    $('#addDataVari').click(function () {
        var selectorValue = $('select[name="VariantDataTypeSelector"]').val();
        if (selectorValue !=='default') {
            addToTable('variTable', 'deleteDataVari', 'varD', selectorValue);
        }
    });

    // TODO: When #DeleteValD.click - DELETE GIVEN DATAFIELD .. SOMEHOW

    // Create Product
    // TODO: When #CreateProduct.click - TAKE ALL ValD INTO ValListD
    // TODO: When #CreateProduct.click - POST ValListD WITH AJAX TO addProduct.php
    var valListD = [];
    var variantList = [];
    var datatypeOfValueS = $('.SvarD').attr("name");
    var datatypeOfValueV = $('.varD').attr("name");


    $('#CreateProduct').click(function () {
        // All with class varD gets pushed to valListD
        productObj = [
            { productTitle: $('#productTitle').val() },
            { productDescLong: $('#productDescLong').val() },
            { productDescShort: $('#productDescShort').val() },
            { productWeight: $('#productWeight').val() },
            { seoDescription: $('#seoDescription').val() },
            { seoKeywords: $('#seoKeywords').val() },
            { seoTitle: $('#seoTitle').val() }
        ];
        variantObj = {
            variantSerial: $('#variantSerial').val(),
            variantWeight: $('#variantWeight').val()

        };
        valListD.push(productObj);
        valListD.push(variantObj);
        // valListD.push({datatype:datatypeOfValueS, value:$(".SvarD").val()});
        // valListD.push({datatype:datatypeOfValueV, value:$(".varD").val()});

        // Array gets converted to a JSON string and posted to addProduct.php
        //var jsonString = JSON.stringify(valListD, variantList);

        jQuery.post(
            url = "addProduct.php",
            data = JSON.stringify(productObj),
            dataType = 'application/json',
            success = function () {
                alert('success');
            },
            error = function () {
                alert('Error');
            }
        );

        /* $.ajax({
            type: "POST",
            url: "addProduct.php",
            contentType: "application/json",
            data: JSON.stringify({ product: productObj} ),
            success: function () {
                alert(productObj);
            },
            error: function () {
                alert("Error");
            }
        }) */
    });
});

/// And a row to a given table
/// Note: type is set to whether it is spec or vari
function addToTable(tableId, deleteButtonId, classD, value) {
    $('#'+tableId+' tr:last').after(
        '<tr>' +
        '<td>' + value + '</td>' +
        '<td><input type="text" class=\".' + classD + '\" name=\"' + value + '\" title=\"' + value + '\"></td>' +
        '<td><button class="btn btn-danger" type="button" id=\"' + deleteButtonId + '\">Slet</button>\n' +
        '</td>'+
        '/tr>');
}

function addNewVariantFields() {

}
//
// function createProduct() {
//     // Create XMLHttpRequest object
//     var hr = new XMLHttpRequest();
//     // Create somevariables we need to send to our PHP file
//     var url = "addProduct.php";
//     var productTitle = document.getElementById("productTitle").value;
//     var productDescLong = document.getElementById("productDescLong").value;
//     var productDescShort = document.getElementById("productDescShort").value;
//     var productWeight = document.getElementById("productWeight").value;
//     var seoDescription = document.getElementById("seoDescription").value;
//     var seoKeywords = document.getElementById("seoKeywords").value;
//     var seoTitle = document.getElementById("seoTitle").value;
//     var vars = "productTitle="+productTitle+"productDescLong="+productDescLong+
//         "productDescShort="+productDescShort+"productWeight="+productWeight+
//         "seoDescription="+seoDescription+"seoKeywords="+seoKeywords+
//         "seoKeywords="+seoKeywords+"seoTitle="+seoTitle;
//
//     hr.open("POST", url, true);
//     // Set content type header information for sending url endcoded variables in the request
//     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     // Access the onreadythatechange event for the XMLHttpRequest object
//     hr.onreadystatechange = function () {
//         if(hr.readyState == 4 && hr.status == 200) {
//             var return_data = hr.responseText;
//             document.getElementById("status").innerHTML = return_data;
//         }
//     }
//
//     hr.send(vars);
//     document.getElementById("status").innerHTML = "processing...";
// }
