<?php

namespace App\Http\Controllers;

use DirectoryIterator;
use Illuminate\Support\Facades\Storage;


class TreeScaner
{

    private  array $treeOfFiles = [];
    private  array $treeOfCategories = [];
    private array $unmatchedArray = [];//тут лежат несовпадения


    /**
     * @return array
     */
    public function getTreeOfCategories(): array
    {
        return $this->treeOfCategories;
    }

    /**
     * @return array
     */
    public function getTreeOfFiles(): array
    {
        return $this->treeOfFiles;
    }

    public function __construct($filter=['png', 'hex'])
    {
        $this->index($filter);
    }


    public function index($filter=['png', 'hex'])
    {
        $disk = Storage::disk('cartrige');
        $dirs = $disk->allDirectories('');
        natsort($dirs);
        $dirs = array_flip($dirs);

        foreach ($dirs as $k => $v) {
            $files = $disk->Files($k);
            natsort($files);
            $files = array_flip($files);
            $dirs[$k] = $files;
        }

        //чистка от всех файлов кроме png и hex:
        foreach ($dirs as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    $fileExtensionToCompare = pathinfo(basename($k2), PATHINFO_EXTENSION);
                    if (!in_array($fileExtensionToCompare, $filter)) {
                        unset($dirs[$k][$k2]);
                    }
                }
            }
        }
$d=[];
        foreach ($dirs as $k => $v) {
            if ($k == 'Categories') {
                $d['Ctegories'] = $v;
                break;
            }
        }

        unset($dirs['Categories']);

      $this->treeOfFiles = $dirs;
        $this->treeOfCategories = $d;

        unset($d);
        unset($dirs);


    }


  private   function key_compare_func($key1, $key2)
    {

        {
            if (pathinfo($key1, PATHINFO_FILENAME) == pathinfo($key2, PATHINFO_FILENAME))
                return 0;
            else if ($key1 > $key2)
                return 1;
            else
                return -1;
        }
    }



    public function getUnmatchedArray(): array//массив несовпадающих категорий и файлов (нужен ли?)
    {
//        $a = $this->treeOfCategories;
//        $b = $this->treeOfFiles;
//
//        $r = array_diff_ukey($b, $a, [$this, "key_compare_func"]);
//
//        if (sizeof($r) == 0) {
//            $r = array_diff_ukey($a, $b, [$this, "key_compare_func"]);
//        }
//        $this->unmatchedArray = $r;
//        if (sizeof($r) == 0) if (isset($this)) {
//            $this->matched = true;
//        } else {
//
//            $this->matched = false;
//        }
//
//        unset($r);

        return $this->unmatchedArray;
    }
}


