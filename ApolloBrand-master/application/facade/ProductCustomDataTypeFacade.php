<?php

include_once __DIR__ . '/../class/model/ProductCustomDataTypeModel.php';

class ProductCustomDataTypeFacade
{
    function CreateNewDataType($username, $pass, $title)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));
        $parameter              = new productCustomDataTypeModel();

        $parameter->Display     = 0;
        $parameter->LanguageISO = 'DK';
        $parameter->Sorting     = 1;
        $parameter->Title       = $title;
        $parameter->Type        = 1;

        $ProductCustomDataTypeReturn = $Client->Product_CreateCustomDataType(array('ProductCustomDataType' => $parameter));
        return ($ProductCustomDataTypeReturn->Product_CreateCustomDataTypeResult);
    }

    function ReadAllProductCustomDataType($username, $pass)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));

        $Client->Solution_SetLanguage(array('LanguageISO' => 'DK'));
        //$Client->CustomDataType_SetFields(array('Fields' => 'Title'));
        $CustomDataReturn = $Client-> Product_GetCustomDataTypeAll();
        return $CustomDataReturn-> Product_GetCustomDataTypeAllResult->item;
    }

    function UpdateProduct($username, $pass)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));

        $Client->Solution_SetLanguage(array('LanguageISO' => 'DK'));
    }

    function DeleteCategory($uname, $pass, $productCustomDataTypeId)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

        $Client-> Product_DeleteCustomDataType (array ('ProductCustomDataTypeId' => $productCustomDataTypeId));
    }




}