<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class FilesRenamer
{
    public function __construct($filter=['png', 'hex', 'bin'])
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

        $d=[];


    }

}
