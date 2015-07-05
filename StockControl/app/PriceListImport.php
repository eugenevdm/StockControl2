<?php

class PriceListImport extends \Maatwebsite\Excel\Files\ExcelFile
{

    protected $delimiter  = ',';
    protected $enclosure  = '"';
    protected $lineEnding = '\r\n';

    public function getFile()
    {
        // MiRO_All Products_Pricelist.xls
        return storage_path('exports') . '/file.csv';
    }

    public function getFilters()
    {
        return [
            'chunk'
        ];
    }

}