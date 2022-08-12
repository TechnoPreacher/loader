<?php

namespace App\Http\Controllers;

class DirectoryViewerController
{

    public function index()
    {
        $tree = new TreeScaner('../' . env('PALM_DIR'));
        echoArray($tree->getTreeOfFiles(), false);
        var_dump($tree->isMatched());
        echo "</br>";
        echo "</br>";
        var_dump($tree->getUnmatchedArray());
        echo "</br>";
        echo "</br>";
        echoArray($tree->getTreeOfCategories(), false);
        echo "</br>";
        echo "</br>";
    }

}
