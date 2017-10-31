<?php

include(__DIR__ . '/../class/model/PictureModel.php');


class ImageFacade
{
    function createImage($uname, $pass, $fileName, $productId, $sorting)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

        $parameter                  = new PictureModel();
        $parameter->FileName        = $fileName;
        $parameter->ProductId       = $productId;
        $parameter->Sorting         = $sorting;

        $imageReturn = $Client->Product_CreatePicture(array('PictureData' => $parameter));
        return $imageReturn->Product_CreatePictureResult;
    }

    function readAllImages($uname, $pass, $productId)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

        //$Client->image_SetFields(array('Fields' => 'Title'));
        $ProductImageReturn = $Client->Product_GetPictures($productId);
        return $ProductImageReturn->Product_GetPicturesResult->item;
    }

    function readImageByString($searchString, $uname, $pass)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

        $Client->Solution_SetLanguage(array('LanguageISO' => 'DK'));

        $Client->Product_SetVariantFields(array('Fields' => 'Id, FileName, ProductId, Sorting'));
        $PictureReturn = $Client->Picture_Search($searchString);
        return $PictureReturn->Picture_GetByStringResult->item;
    }

    function updateImage($uname, $pass)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

    }

    function deleteImage($uname, $pass, $imageId)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $uname, 'Password' => $pass));

        $Client->image_Delete(array ('imageId' => $imageId));
    }
}