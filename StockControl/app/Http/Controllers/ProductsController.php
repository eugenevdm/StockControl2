<?php

namespace App\Http\Controllers;

use App\Cat;
use DB;
use Stevebauman\Inventory\Models\Category;
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
        \Excel::load('MiRO_All Products_Pricelist.xls', function ($reader) {

            // Get workbook title
            $results = $reader->get();
            $workbookTitle = $results->getTitle();
            echo "workbookTitle: " . $workbookTitle . "<br>";

//            $n = 0;

            foreach ($results as $sheet) {
                // get sheet title
                $sheetTitle = $sheet->getTitle();
                echo "sheetTitle: " . $sheetTitle . "<br>";
                // Check if Category exists, and if so, get category ID
                $category = Cat::where('name', $sheetTitle)->first();
                if ($category) {
                    //echo "Category exists id'" . $category->id . "'<br>";
                } else {
                    echo "Category does not exist, now adding<br>";
                    $category = new Cat();
                    $category->name = $sheetTitle;
                    $category->save();
                }
                foreach ($sheet as $cells) {
                    // Check if it's an empty line, and if so, assume this is a subcategory

                    // Check if valid data before loading into products array
                    if ($cells->sku && $cells->name && $cells->qty_1) {
                        // Check if product exists, if not, add it
                        //echo "Sheet sku: " . $cells->sku . "<br>";
                        $product = Product::where('sku', $cells->sku)->first();
                        if ($product) {
                            // Update product
                            //echo "Found a product with this SKU, updating<br>";
                            $product->name = $cells->name;
                            $product->price1 = $cells->qty_1;
                            $product->cat_id = $category->id;
                            $product->save();
                        } else {
                            // Create product
                            echo "Can't find a product with this SKU, creating<br>";
                            $product = new Product();
                            $product->sku = $cells->sku;
                            $product->name = $cells->name;
                            $product->price1 = $cells->qty_1;
                            $product->cat_id = $category->id;
                            $product->save();
                        }

                    }

//                    $n = $n + 1;
//                    if ($n > 10) {
//                        //break;
//                        dd($cells);
//                    }

                }
            }

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
