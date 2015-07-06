<?php

/**
 * IFRS International Framework Regular Standards
 */

namespace App\Http\Controllers;

use Stevebauman\Inventory\Models\Location;
use Stevebauman\Inventory\Models\Category;
use Stevebauman\Inventory\Models\Metric;
use Stevebauman\Inventory\Models\Inventory;
use Input;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $newStock = Input::get('name');
        echo "Name: " . $newStock;
        echo "<br>";

        $item = Inventory::findBySku(Input::get('sku'));
        $location = Location::find(Input::get('location_id'));

        if ($item) {
            echo "Found item by SKU, adding to stock";

            echo "<br>";

            if ($location) {
                echo "Found location, adding stock";
                echo "<br>";
                $stock = $item->getStockFromLocation($location);
                $reason = Input::get('reason');
                $cost = Input::get('price');
                $stock->put(Input::get('new_quantity'), $reason, $cost);
            }

        } else {
            echo "Could not find sku for item '" . $newStock . "'";
            echo "<br>";
        }

        echo "Item 1 SKU:";
        echo "<br>";
        $item = Inventory::find(1);
        echo $item->sku_code;
        echo "<br>";

    }

    public function StockCreationExample()
    {
        $metric = new Metric;

        $metric->name = 'Unit';
        $metric->symbol = 'U';
        $metric->save();

        //Now, create a category to store the inventory record under:

        $category = new Category;

        $category->name = 'VoIP';
        $category->save();

        $item = new Inventory;

        $item->metric_id = $metric->id;
        $item->category_id = $category->id;
        $item->name = 'SNOM Headset';
        $item->description = 'Very nice for the ear';
        $item->save();

        $location = new Location;
        $location->name = 'Snowball Small Stock Room';
        $location->save();

        $item->createStockOnLocation(2, $location);

        $item->createSku('PART1234');

        dd($item->sku_code);

        //$res = Inventory::findBySku(Input::get('sku'));

        //$item = Inventory::find(1);
        //dd($item);
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
