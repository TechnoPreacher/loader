<?php

namespace App\Http\Controllers;




use Illuminate\Support\Facades\Storage;
use function MongoDB\BSON\toRelaxedExtendedJSON;

class DirectoryViewerController
{

public function index()
    {
        $nameOfHumanCsvWithRelativePath = '../' .env('PALM_CART_DIR').'/'. env('PALM_CSV_NAME');
        $nameOfCsvWithRelativePath = '../' .env('PALM_CART_DIR').'/flashcart-index.csv';
       $csv = new CsvMaker($nameOfCsvWithRelativePath,$nameOfHumanCsvWithRelativePath);



        //    $tree = new TreeScaner(['png']);//дерево с рисунками
     //  $f = $tree->getTreeOfFiles();

        $tree = new FilesRenamer();

        $f = [];
        return view('catalog4', ["files"=>$f]);

    }



}
