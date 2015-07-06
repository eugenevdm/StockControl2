<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Stevebauman\Inventory\Models\Location;


//namespace App\Http\Controllers;

use App\Project;
use App\User;
use DB;
use Illuminate\Pagination\Paginator;
use Input;
use Auth;
//use Illuminate\Http\Request;
use Redirect;

class ScanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$locations = Location::all();
        $locations = Location::orderBy('name')->lists('name', 'id');
        $movements = DB::table('inventory_stock_movements')->orderBy('created_at', 'desc')->limit(5)->get();
        return view('scan', compact('locations', 'movements'));
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
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
