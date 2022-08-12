<?php

namespace App\Http\Controllers;

use DirectoryIterator;


class TreeScaner
{
    private string $directoryToFind;
    private array $treeOfFiles = [];
    private array $treeOfCategories = [];
    private bool $matched = false;//если совпадает содержимое файла с дерикториями с деревом директорий
    private array $unmatchedArray = [];//тут лежат несовпадения



    public function getUnmatchedArray(): array
    {
        return $this->unmatchedArray;
    }

    static function key_compare_func($key1, $key2)
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

    public function isMatched(): bool
    {


        $a = $this->treeOfCategories['Categories'];
        $b = $this->treeOfFiles;

        $r = array_diff_ukey($b, $a, [$this, "key_compare_func"]);

        if (sizeof($r) == 0) {
            $r = array_diff_ukey($a, $b, [$this, "key_compare_func"]);
        }
        $this->unmatchedArray = $r;
        if (sizeof($r) == 0) if (isset($this)) {
            $this->matched = true;
        } else {

            $this->matched = false;
        }

        unset($r);

        return $this->matched;

    }


    /**
     * @param bool $matched
     */
    public function setMatched(bool $matched): void
    {
        $this->matched = $matched;
    }

    public function getTreeOfFiles(): array
    {
        return $this->treeOfFiles;
    }

    public function getTreeOfCategories(): array
    {
        return $this->treeOfCategories;
    }


    public function __construct($directoryToFind)
    {
        $this->directoryToFind = $directoryToFind;
        $dir = new DirectoryIterator($this->directoryToFind);//на уровень вверх -> потом внутрь каталога флеш и в карт
        $treeOfFiles = [];
        $CategoryBuferArray = [];
        foreach ($dir as $fileInfo) {
            if ($fileInfo->isDot()) continue;
            if (pathinfo($fileInfo->getFilename(), PATHINFO_FILENAME) == "") continue; //dont take .name files!

            if ($fileInfo->isDir()) {
                //two variants: dir with "derictories" images or dir with files

                $filesBuferArray = [];

                $files = new DirectoryIterator($directoryToFind . '/' . $fileInfo->getFilename());
                foreach ($files as $file) {

                    if ($file->isDot()) continue;
                    if (pathinfo($file->getFilename(), PATHINFO_FILENAME) == "") continue; //dont take .name files!

                    if ($fileInfo->getFilename() == 'Categories') {
                        $CategoryBuferArray[] = $file->getFilename();
                        // pathinfo( $file->getFilename(),PATHINFO_FILENAME);
                    } else {
                        $filesBuferArray[] = $file->getFilename();
                    }
                }
                if ($fileInfo->getFilename() != 'Categories') {
                    $treeOfFiles[$fileInfo->getFilename()] = $filesBuferArray;
                } else {
                    //   $CategoryBuferArray[$fileInfo->getFilename()]=$CategoryBuferArray;
                }

                unset($files);
                unset($filesBuferArray);
            }
        }
        natsort($CategoryBuferArray);
        $CategoryBuferArray = array_flip($CategoryBuferArray);
//        foreach ($CategoryBuferArray as $k=>$v)
//            {
//
//            }


        $this->treeOfCategories = ['Categories' => $CategoryBuferArray];
        $this->treeOfFiles = $treeOfFiles;
        $ar = $this->getTreeOfFiles();
        foreach ($ar as $k => $v) {
            $arnames[] = $k;
            //   $ar[$k] = array_flip($ar[$k]);

            natsort($ar[$k]);
        }

        natsort($arnames);
        $arnames = array_flip($arnames);
        $arnames = array_replace($arnames, $ar);

        foreach ($arnames as $k => $v) {
            if (is_array($v)) {
                $arnames[$k] = array_flip($arnames[$k]);
            }

        }

        $this->treeOfFiles = $arnames;

    }


}
