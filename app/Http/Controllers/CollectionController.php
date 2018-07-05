<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'branch_id' => 'required|string|min:0',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|string|min:0',
            'type' => 'required|string|min:0',

        ]);



        // register collection
        $collection = new Collection(array(
            'branch_id' => $request->get('branch_id'),
            'amount' => $request->get('amount'),
            'date_collected' => date('Y-m-d',strtotime($request->get('date'))),
            'type' => $request->get('type'),
        ));
        $collection->save();

        return redirect()->route('collection.offering')->with('status', 'collection successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }
    /**
     * Show Collection report.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function report()
    {

        $sql = 'SELECT SUM(amount) AS amount, MONTH(date_collected) AS month, count(*) AS entries FROM `collections` GROUP BY month';
        $collections = \DB::select($sql);

        
        return view('collection.report', compact('collections'));
    }

    
}
