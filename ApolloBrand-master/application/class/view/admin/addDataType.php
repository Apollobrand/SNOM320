<?php
$un = '';
$pw = '';

require_once(__DIR__ . '/../../../facade/ProductCustomDataTypeFacade.php');
require_once('../../../../vendor/twig/twig/lib/Twig/Autoloader.php');

$NewDataTypeFacade = new ProductCustomDataTypeFacade();

// For twig
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../../template/');
$twig = new Twig_Environment($loader);
// end twig

$dataTitle = isset($_POST['dataTypeTitle']) ? $_POST['dataTypeTitle'] : null;
if (isset($_POST['addNewType']))
{
    $NewDataTypeFacade->CreateNewDataType($un, $pw, $dataTitle);
}

$DataType = $NewDataTypeFacade->ReadAllProductCustomDataType($un, $pw);
$DataTimeArray = array();
foreach ($DataType as $var)
{
    if ($var->Id != 0)
    {
        array_push($DataTimeArray, $var->Title);
    }
}
echo $twig->render('adminAddDataType.html.twig', array(
    'dataTypeList' => $DataType
));
foreach ($DataTimeArray as $var)
{
    echo "<h4>". $var . "</h4>";
}