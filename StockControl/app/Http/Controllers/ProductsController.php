<?php

namespace App\Http\Controllers;

use DB;
use Stevebauman\Inventory\Models\Inventory;
use Response;
use \App\Product;
use Input;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function json()
    {
        $query = Input::get('sku');

        $res = DB::table('inventories')
            ->join('inventory_skus', 'inventory_skus.id', '=', 'inventories.id')
            ->join('inventory_stocks', 'inventory_stocks.id', '=', 'inventories.id')
            ->select('inventories.*', 'inventory_skus.code', 'inventory_stocks.quantity')
            ->where('code', 'LIKE', "%$query%")
            ->get();

        //$res = Product::where('name', 'LIKE', "%$query%")->get();

        return Response::json($res);
    }

    public function importPriceList(UserListImport $import)
    {
        // Handle the import
        $import->handleImport();
    }


    public function imporPriceList1(PriceListImport $import)
    {
        // get the results
        $results = $import->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //\Excel::load('miro.xlsx', function($reader) {
        //\Excel::load('Untitled 1.xlsx', function($reader) {
        \Excel::load('MiRO_All Products_Pricelist.xls', function ($reader) {

            // Get workbook title
            $results = $reader->get();
            $workbookTitle = $results->getTitle();
            echo "Title: " . $workbookTitle;

            //$results = $reader->get();
            //dd($results);

            $n = 0;

            foreach ($results as $sheet) {
                // get sheet title
                $sheetTitle = $sheet->getTitle();
                echo "Sheet: " . $sheetTitle;
                foreach ($sheet as $cells) {
                    //echo "Data: ";
                    $n = $n + 1;
                    if ($n > 1) {
                        dd($cells);
                    }
                }
            }

            // reader methods
            // Getting all results
            //$results = $reader->get();
            //dd($results);

            //dd($results->first());

        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
