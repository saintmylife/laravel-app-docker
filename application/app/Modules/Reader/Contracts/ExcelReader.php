<?php

namespace App\Modules\Reader\Contracts;

interface ExcelReader
{
    public function read(string $filePath);
}
