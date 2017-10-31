<?php

include_once __DIR__ . '/../class/model/ProductCustomDataModel.php';
include_once __DIR__ . '/../class/model/AddCustomDataModel.php';

class ProductCustomDataFacade
{
    ///This method adds the custom data value to a product.
    function AddCustomData($username, $password, $productId, $customDataId)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $password));

        $parameter      = new AddCustomDataModel();
        $parameter->ProductId               = $productId;
        $parameter->CustomDataId            = $customDataId;

        $ProductAddCustomDataReturn = $Client->Product_AddCustomData(array('ProductId' => $productId, 'CustomDataId' => $customDataId));
        return ($ProductAddCustomDataReturn->Product_AddCustomDataResult);
    }

    function CreateCustomData($username, $pass, $title, $productCustomTypeId)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));
        $parameter              = new productCustomDataModel();

        $parameter->LanguageISO             = 'DK';
        $parameter->ProductCustomId         = 0;
        $parameter->ProductCustomTypeId     = $productCustomTypeId;
        $parameter->Sorting                 = 1;
        $parameter->Title                   = $title;


        $ProductCustomDataReturn = $Client->Product_CreateCustomData(array('ProductCustomData' => $parameter));
        return ($ProductCustomDataReturn->Product_CreateCustomDataResult);
    }

    function ReadAllProductCustomData($username, $pass)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));

        $Client->Solution_SetLanguage(array('LanguageISO' => 'DK'));

        //$Client->Category_SetFields(array('Fields' => 'Title'));
        $CustomDataReturn = $Client-> Product_GetCustomDataAll();
        return $Products = $CustomDataReturn-> Product_GetCustomDataAllResult;
    }

    function UpdateCustomData($username, $pass)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));

        $Client->Solution_SetLanguage(array('LanguageISO' => 'DK'));
    }

    function DeleteCustomData($uname, $pass, $productCustomDataId)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

        $Client-> Product_DeleteCustomData (array ('ProductCustomDataId' => $productCustomDataId));
    }
}