<?php

include(__DIR__ . '/../class/model/CategorySuperModel.php');

class categoryFacade
{
    function createCategory($uname, $pass, $title, $parentId, $sorting)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

        $parameter                          = new categorySuperModel();
        $parameter->LanguageISO                        = "DK";
        $parameter->Title                              = $title;
        $parameter->ParentId                           = $parentId;
        $parameter->Status                             = false;
        $parameter->Sorting                            = $sorting;
        $parameter->Description                        = '';

        $CategoryReturn = $Client->Category_Create(array('CategoryData' => $parameter));
        return $CategoryReturn->Category_CreateResult;
    }

    function readAllCategories($uname, $pass)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

        $Client->Solution_SetLanguage(array('LanguageISO' => 'DK'));

        //$Client->Category_SetFields(array('Fields' => 'Title'));
        $CategoryReturn = $Client->Category_GetAll();
        return $CategoryReturn->Category_GetAllResult->item;
    }

    function readCategoriesByString($searchString, $uname, $pass)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

        $Client->Solution_SetLanguage(array('LanguageISO' => 'DK'));

        $Client->Product_SetVariantFields(array('Fields' => 'Id, Title, ItemNumber, BrandId, CategoryId, DescriptionLong, DescriptionShort, Weight'));
        $ProductReturn = $Client->Product_Search($searchString);
        return $Product = $ProductReturn->Product_GetByStringResult->item;
    }

    function updateProduct($uname, $pass)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

        $Client->Solution_SetLanguage(array('LanguageISO' => 'DK'));
    }

    function deleteCategory($uname, $pass, $CategoryId)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

        $Client->Category_Delete(array ('CategoryId' => $CategoryId));
    }
}
