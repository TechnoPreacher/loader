<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CsvMaker
{
    private array $csv;

    private const CSV_RECORD = [
        "List",
        "Discription",
        "Title",
        "Hex",
        "Data",
        "Save",
        "Version",
        "Developer",
        "Info",
        "Likes",
        "URL",
        "Source",
    ];

    private array $csvUsedFields = [];

    private string $csvDecompileFile = "";//файл с машинными названиями, вытащенный из карты
    private string $csvHumanFile = "";//файл с вербальными названиями

    private array $csvActiveRows = [];


    public function __construct($csvDecompileFile, $csvHumanFile)
    {

        $this->csvDecompileFile = $csvDecompileFile;
        $this->csvHumanFile = $csvHumanFile;
        $this->csvUsedFields = array_slice(self::CSV_RECORD, 0, 6, true);
        $this->index();
    }

    public function numberOfCsvRows($f): int
    {
        $i = 0;
        if (($handle = fopen($f, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $i++;
            }
            fclose($handle);
        }
        return $i;
    }

    public function index()
    {
        $rows = [];
        $disk = Storage::disk('cartrige');

        echo "size of decompile file:" . $this->numberOfCsvRows($this->csvDecompileFile) . "<br>";
        echo "size of decompile file:" . $this->numberOfCsvRows($this->csvHumanFile) . "<br>";

        $machineLines = file($this->csvDecompileFile);
        $humanLines = file($this->csvHumanFile);

        $comapre = array_combine($machineLines, $humanLines);

        foreach ($comapre as $k => $v) {
            $a = str_getcsv($k, ';');
            $b = str_getcsv($v, ';');
            echo($k);

            $motion=false;

            if (Storage::disk('cartrige')->fileExists($a[2])) {//проверка есть ли файл png в каталоге
                Storage::disk('cartrige')->move($a[2], $b[2]);//переименовываю файл png
                $motion=true;
            }
            if (Storage::disk('cartrige')->fileExists($a[3])) {//проверка есть ли файл hex в каталоге
                Storage::disk('cartrige')->move($a[3], $b[3]);//переименовываю файл hex
                $motion=true;
            }

            $binFile = str_replace('.png', '.bin', $a[2]);
            if (Storage::disk('cartrige')->fileExists($binFile)) {
                Storage::disk('cartrige')->move($binFile, str_replace('.png', '.bin', $b[2]));//переименовываю файл hex
            }

            if (true==$motion)
            {
          $folder = str_replace('-', '/', $a[1]);
            Storage::disk('cartrige')->deleteDirectory($folder);
            }

        }

  foreach ($comapre as $k => $v)
  {
      $a = str_getcsv($k, ';');

      if ( Storage::disk('cartrige')->exists($a[0]))
      {
        Storage::disk('cartrige')->deleteDirectory($a[0]);
      }
  }

    }


    public function getCsvRecord(): array
    {
        return $this->csvRecord;
    }

    public function setCsvRecord(array $csvRecord): void
    {
        $this->csvRecord = $csvRecord;
    }


    public function getCsvFilename()
    {
        return $this->csvFilename;
    }

}
