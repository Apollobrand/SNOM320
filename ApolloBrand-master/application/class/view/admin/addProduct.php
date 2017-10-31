<?php
require_once(__DIR__ . '/../../../facade/ProdFacade.php');
require_once(__DIR__ . '/../../../facade/CategoryFacade.php');
require_once(__DIR__ . '/../../../facade/ImageFacade.php');
require_once(__DIR__ . '/../../../facade/ProductCustomDataFacade.php');
require_once(__DIR__ . '/../../../facade/ProductCustomDataTypeFacade.php');
require_once('../../../../vendor/twig/twig/lib/Twig/Autoloader.php');

$un = '';
$pw = '';

// For twig
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../../template/');
$twig = new Twig_Environment($loader);
// end twig

$pFacade = new prodFacade();
$cFacade = new categoryFacade();
$iFacade = new ImageFacade();
$pcdFacade = new ProductCustomDataFacade();
$pDataTypeFacade = new ProductCustomDataTypeFacade();

// Category selector
$catValH            = isset($_POST['categorySelector'])     ? $_POST['categorySelector'] : null;

// Basic Product
$descriptionLong    = isset($_POST['productDescLong'])      ? $_POST['productDescLong'] : null;
$descriptionShort   = isset($_POST['productDescShort'])     ? $_POST['productDescShort'] : null;
$itemNumber         = isset($_POST['itemNumber'])           ? $_POST['itemNumber'] : null;
$itemNumberShort    = isset($_POST['itemNumberSupplier'])   ? $_POST['itemNumberSupplier'] : null;
$producerId         = isset($_POST['producerId'])           ? $_POST['producerId'] : null;
$seoDescription     = isset($_POST['seoDescription'])       ? $_POST['seoDescription'] : null;
$seoKeywords        = isset($_POST['seoKeywords'])          ? $_POST['seoKeywords'] : null;
$seoTitle           = isset($_POST['seoTitle'])             ? $_POST['seoTitle'] : null;
$title              = isset($_POST['productTitle'])         ? $_POST['productTitle'] : null;
$url                = isset($_POST['url'])                  ? $_POST['url'] : null;
$weight             = isset($_POST['productWeight']) ? $_POST['productWeight'] : null;

// Picture


// Custom
$customDataTypes = $pDataTypeFacade->ReadAllProductCustomDataType($un, $pw);
if (isset($_POST['dimensions'])) {
    $dimensions = $_POST['dimensions'];
} else {
    $dimensions = null;
}

//print_r($customDataTypes);
// TODO: Get all entries of ValListD into an array
$varArrayD = json_decode(stripslashes(isset($_POST['data']) ? $_POST['data'] : null));
print_r($varArrayD);
// Variants
$vItemNumber        = isset($_POST['vItemNumber']) ? $_POST['vItemNumber'] : null;


// This is the heavenly piece of code, which took me three days to write. THREE
$cats = $cFacade->readAllCategories($un, $pw);
$catHead = array();
$catIds = array();
$selectedCatId = 0;
$catSub = array();

///TODO: GET VALUE AND TEXT TO BE THE SAME
//NOTE ParentId == Id of parent
///TODO: TEST IF THERE IS A MATCH AND THEN SEND SUB CATS TO PAGE

foreach ($cats as $var)
{
    //Setting the Subject selector
    if ($var->ParentId == 0)
        array_push($catHead, $var->Title);

    if ($var->ParentId != 0)
        array_push($catSub, $var->Title);

    if ($var->Title == $catValH)
        $selectedCatId = $var->Id;
}

$cdtArray = [];
foreach ($customDataTypes as $var)
    if ($var->Id != 0)
        array_push($cdtArray, $var->Title);

if (isset($_POST['button']))
{
    $newProduct = $pFacade->createProduct($un, $pw, $selectedCatId, "", $descriptionLong, $descriptionShort, "", "", 0, $seoDescription, $seoKeywords, $seoTitle, $title, $url, $weight);
    $pFacade->createVariant($un, $pw, $vItemNumber, "", 0, $newProduct, 0, 0);

    // TODO: Foreach entry in ValArrayD: AddCustomData
    /* Iterates through array of DataTypes and assigns each to it's DataType and
     * assigns that id to the product */
    /*foreach ($varArrayD as $var)
    {
        $newSpec = $pcdFacade->CreateNewData($un, $pw, $newCustomSpec, $customDataType);
        $pcdFacade->AddCustomData($un, $pw, $newProduct, $newSpec);
    }*/

    /* PICTURE ALGORITHM
      if (isset($_FILES['files']))
    {
        $file = $_FILES['files'];

        // Filer properties
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        // Work out the file extension
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($file_ext, $allowed))
        {
            if ($file_error == 0)
            {
                if ($file_size <= 2097152)
                {
                    $file_name_new = uniqid('', true) . '.' . $file_ext;
                    $file_destination = __DIR__ . '/../../../../public_html/img/products/' . $file_name_new;
                    $iFacade->createImage($un, $pw, $file_name_new, $newProduct, $imgSort);
                    if (move_uploaded_file($file_tmp, $file_destination.umask()))
                    {
                        echo 'ayy';
                    }
                    else
                        echo 'not moved';
                }
                else
                    echo 'filesize over';
            }
            else
                echo 'error';
        }
        else
        {
            echo 'fail allowed';
        }
    }
    else
        echo 'here?';*/
}

echo $twig->render('adminAddProduct.html.twig', array(
    'catcat'    => $catSub,
    'datatypes' => $cdtArray
));