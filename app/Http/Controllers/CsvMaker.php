<?php

namespace App\Http\Controllers;

class CsvMaker
{

    private array $csvRecord = [
        "List"=>"",
        "Discription"=>"",
        "Title"=>"",
        "Hex"=>"",
        "Data"=>"",
        "Save"=>"",
        "Version"=>"",
        "Developer"=>"",
        "Info"=>"",
        "Likes"=>"",
        "URL"=>"",
        "Source"=>"",
    ];

    private string $csvFilename;

    public function getCsvRecord(): array
    {
        return $this->csvRecord;
    }

    public function setCsvRecord(array $csvRecord): void
    {
        $this->csvRecord = $csvRecord;
    }

    /**
     * @param string $csvFilename
     */
    public function setCsvFilename(string $csvFilename): void
    {
        $this->csvFilename = $csvFilename;
    }

    /**
     * @return mixed
     */
    public function getCsvFilename()
    {
        return $this->csvFilename;
    }

}
