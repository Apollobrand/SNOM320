<?php

include(__DIR__ . '/../class/model/ProductSuperModel.php');
include(__DIR__ . '/../class/model/ProductVariantModel.php');
include(__DIR__ . '/../class/model/ProductPictureModel.php');


class prodFacade
{
    function getAllProducts($username, $pass)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));

        $Client->Solution_SetLanguage(array('LanguageISO' => 'DK'));

        $Client->Product_SetFields(array('Fields' => 'Id, Title, ItemNumber, CategoryId, Variants'));
        $Client->Product_SetVariantFields(array('Fields' => 'Id, ItemNumber'));
        $ProductReturn = $Client->Product_GetAll();

        return $ProductReturn->Product_GetAllResult->item;
    }

    function getProductsById($username, $pass, $searchString)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));

        $Client->Solution_SetLanguage(array('LanguageISO' => 'DK'));

        $Client->Product_SetVariantFields(array('Fields' => 'Id, Title, ItemNumber, BrandId, CategoryId, DescriptionLong, DescriptionShort, Weight'));
        $ProductReturn = $Client->Product_Search($searchString);
        return $Product = $ProductReturn->Product_GetByStringResult->item;
    }

    function createProduct($username, $pass, $catId, $desc, $descLong, $descShort, $itemNum, $itemNumSupplier, $producerId, $seoDesc, $seoKeywords, $seoTitle, $title, $url, $weight)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));

        $parameter                      = new productSuperModel();

        ///
        /// Values which are set on Admin page
        ///
        $parameter->CategoryId          = $catId;               // Page -> Selector w/ Category titles
        $parameter->Description         = $desc;                // Page
        $parameter->DescriptionLong     = $descLong;            // Page
        $parameter->DescriptionShort    = $descShort;           // Page
        $parameter->ItemNumber          = $itemNum;             // Page
        $parameter->ItemNumberSupplier  = $itemNumSupplier;     // Page
        $parameter->ProducerId          = $producerId;          // Page... Sat by user id?..
        $parameter->SeoDescription      = $seoDesc;             // Page
        $parameter->SeoKeywords         = $seoKeywords;         // Page
        $parameter->SeoTitle            = $seoTitle;            // Page
        $parameter->Title               = $title;               // Page
        $parameter->Url                 = $url;                 // Page
        $parameter->Weight              = $weight;              // Page

        ///
        /// Values which should not be altered.
        ///
        /*$parameter->DateCreated         = date('Y-m-d', 'H:i:s');
        $parameter->DateUpdated         = date('Y-m-d', 'H:i:s');*/

        $parameter->DateCreated         = '2017-12-05 05:55:22';
        $parameter->DateUpdated         = '2017-12-05 05:56:22';

        $parameter->DeliveryTimeId      = -1;                   // Facade
        $parameter->DisableOnEmpty      = false;                // Facade
        $parameter->FocusCart           = false;                // Facade
        $parameter->FocusFrontpage      = false;                // Facade
        $parameter->LanguageISO         = 'DK';                 // Facade
        $parameter->MinAmount           = 0;                    // Facade
        $parameter->Online              = false;                // Facade
        $parameter->Sorting             = 1;                    // Facade
        $parameter->Status              = true;                 // Facade
        $parameter->Stock               = 0;                    // Facade

        $ProductReturn = $Client->Product_Create(array('ProductData' => $parameter));

        $NewProductId = $ProductReturn->Product_CreateResult;

        return $NewProductId;
    }

    function createVariant($username, $pass, $itemNumber, $itemNumberSupplier, $pictureId, $newProductId, $unitId, $weight )
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));

        $parameter                      = new productVariantModel();

        /* Values which are sat on Page */
        $parameter->ItemNumber          = $itemNumber;          // Page
        $parameter->ItemNumberSupplier  = $itemNumberSupplier;  // Page??
        $parameter->PictureId           = $pictureId;           // Page?
        $parameter->ProductId           = $newProductId;        // Page...-ish
        $parameter->UnitId              = $unitId;              // Page
        $parameter->Weight              = $weight;              // Page

        /* Facade */
        $parameter->BuyingPrice         = 0.0;                  // Facade
        $parameter->DeliveryTimeId      = 0;                    // Facade
        $parameter->DisableOnEmpty      = false;                // Facade
        $parameter->Discount            = 0.0;                  // Facade
        $parameter->Ean                 = "";                   // Facade
        $parameter->MinAmount           = 0;                    // Facade
        $parameter->Price               = 0.0;                  // Facade
        $parameter->Sorting             = 1;                    // Facade
        $parameter->Status              = true;                 // Facade
        $parameter->Stock               = 0;                    // Facade
        $parameter->VariantTypeValues   = 0;                    // Facade
        //$parameter->height               = $height;

        $Client->Product_CreateVariant(array('VariantData' => $parameter));
    }

    function createImage($fileName, $newProductId, $sorting)
    {
        $parameter                      = new productPictureModel();

        $parameter->FileName            = $fileName;
        $parameter->ProductId           = $newProductId;
        $parameter->Sorting             = $sorting;
    }

    function updateProduct($username, $pass, $catId, $desc, $descLong, $descShort, $itemNum, $itemNumSupplier, $producerId, $seoDesc, $seoKeywords, $seoTitle, $title, $url, $weight)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));

        $parameter                          = new productSuperModel();

        ///
        /// Values which are set on Admin page
        ///
        $parameter->CategoryId          = $catId;               // Page -> Selector w/ Category titles
        $parameter->Description         = $desc;                // Page
        $parameter->DescriptionLong     = $descLong;            // Page
        $parameter->DescriptionShort    = $descShort;           // Page
        $parameter->ItemNumber          = $itemNum;             // Page
        $parameter->ItemNumberSupplier  = $itemNumSupplier;     // Page
        $parameter->ProducerId          = $producerId;          // Page... Sat by user id?..
        $parameter->SeoDescription      = $seoDesc;             // Page
        $parameter->SeoKeywords         = $seoKeywords;         // Page
        $parameter->SeoTitle            = $seoTitle;            // Page
        $parameter->Title               = $title;               // Page
        $parameter->Url                 = $url;                 // Page
        $parameter->Weight              = $weight;              // Page

        ///
        /// Values which should not be altered.
        ///
        $parameter->DateUpdated         = date('Y-m-d', 'H-i-s');

        $parameter->DeliveryTimeId      = -1;                   // Facade
        $parameter->DisableOnEmpty      = false;                // Facade
        $parameter->FocusCart           = false;                // Facade
        $parameter->FocusFrontpage      = false;                // Facade
        $parameter->LanguageISO         = 'DK';                 // Facade
        $parameter->MinAmount           = 0;                    // Facade
        $parameter->Online              = false;                // Facade
        $parameter->Sorting             = 1;                    // Facade
        $parameter->Status              = true;                 // Facade
        $parameter->Stock               = 0;                    // Facade

        $Client->Product_Update(array ('ProductData' => $parameter));
    }

    function deleteProduct($username, $pass, $ProductId)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));

        $Client->Product_Delete(array ('ProductId' => $ProductId));
    }

    function variantDelete($username, $pass, $variantId)
    {
        $Client = new SoapClient('https://api.hostedshop.dk/service.wsdl');
        $Client->Solution_Connect(array('Username' => $username, 'Password' => $pass));

        $Client->Product_DeleteVariant(array ('VariantId' => $variantId));
    }
}
