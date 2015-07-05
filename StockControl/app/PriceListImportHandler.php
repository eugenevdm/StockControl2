<?php

class PriceListImportHandler implements \Maatwebsite\Excel\Files\ImportHandler
{

    public function handle(PriceListImport $import)
    {
    // get the results
        $results = $import->get();
    }

}