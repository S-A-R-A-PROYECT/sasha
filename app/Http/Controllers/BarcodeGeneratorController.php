<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG;

class BarcodeGeneratorController extends Controller
{
    public function index(string $barcode)
    {
        $generator = new BarcodeGeneratorPNG();
        $image = $generator->getBarcode($barcode, $generator::TYPE_CODE_128);

        return response($image)->header('Content-type', 'image/png');
    }
}
