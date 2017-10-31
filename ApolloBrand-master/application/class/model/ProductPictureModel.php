<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/17/17
 * Time: 7:53 AM
 */

class productPictureModel
{
    public $FileName;  // The name of the actual file of the Picture (path relative to /shop/ folder)
    public $ProductId; // The id of the Product of the ProductPicture
    public $Sorting;   // The position of the Picture amongst its siblings
}