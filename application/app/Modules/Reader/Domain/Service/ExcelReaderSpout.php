<?php

namespace App\Modules\Reader\Domain\Service;

use App\Modules\Reader\Contracts\ExcelReader;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

/**
 * ExcelReader spout.
 */
class ExcelReaderSpout implements ExcelReader
{
    private $reader;

    public function __construct()
    {
        $this->setting();
    }

    public function read(string $filePath)
    {
        $this->setting();
        $this->reader->open($filePath);
        $sheetIterator = $this->reader->getSheetIterator();
        $output = [];
        foreach ($sheetIterator as $sheet) {
            foreach ($sheet->getRowIterator() as $rowKey => $row) {
                foreach ($row->getCells() as $colKey => $v) {
                    $output[$sheet->getName()][$rowKey][$colKey] = $v->getValue();
                };
            }
        }

        $this->reader->close();

        return $output;
    }

    private function setting()
    {
        $this->reader = ReaderEntityFactory::createXLSXReader();
        $this->reader->setShouldPreserveEmptyRows(true);
    }
}
