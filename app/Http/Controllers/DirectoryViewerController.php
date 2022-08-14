<?php

namespace App\Http\Controllers;




use function MongoDB\BSON\toRelaxedExtendedJSON;

class DirectoryViewerController
{

public function index()
    {
        $tree = new TreeScaner(['png']);//дерево с рисунками
       $f = $tree->getTreeOfFiles();
       return view('catalog', ["files"=>$f]);

    }



}
