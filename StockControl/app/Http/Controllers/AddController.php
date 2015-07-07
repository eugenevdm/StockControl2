<?php

namespace App\Http\Controllers;

use Redirect;
use Stevebauman\Inventory\Models\Location;
use Stevebauman\Inventory\Models\Category;
use Stevebauman\Inventory\Models\Metric;
use Stevebauman\Inventory\Models\Inventory;
use Input;
use Illuminate\Http\Request;

use App\Http\Requests;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $item = Inventory::findBySku(Input::get('sku'));
        $location = Location::find(Input::get('location_id'));

        if ($item) {
            if ($location) {
                //echo "Found location, adding stock";
                //echo "<br>";
                $stock = $item->getStockFromLocation($location);
                $reason = Input::get('reason');
                $cost = Input::get('price');
                $stock->put(Input::get('new_quantity'), $reason, $cost);
            } else {
                // Location not found
            }
        } else {
            // Item not found
        }
        //$locations = Location::orderBy('name')->lists('name', 'id');
        //return view('scan', compact('locations'))->with('message', 'Product added to stock');
        // TODO ->with('message', 'xxx') doesn't work
        return redirect('stockin')->with('message', 'Inventory item added to stock.');
        //Redirect::route('scan',compact('locations'))->with('message', 'Product added to stock');
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

        $supplier = new Supplier;

//Mandatory fields
        $supplier->name = 'Miro Distribution';

//Optional fields
        $supplier->address = 'Montague Gardens';
        $supplier->postal_code = '8000';
        $supplier->zip_code = '12345';
        $supplier->country = 'South Africa';
        $supplier->region = 'Western Cape';
        $supplier->city = 'Cape Town';
        $supplier->contact_title = 'Sales Rep';
        $supplier->contact_name = 'Mark Sparky';
        $supplier->contact_phone = '555 555-5555';
        $supplier->contact_fax = '555 555-5556';
        $supplier->contact_email = 'mark@miro.co.za';

        $supplier->save();

        $item = Inventory::find(1);
        //$supplier = Supplier::find(1);
        $item->addSupplier($supplier);
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
