<?php

namespace App\Http\Controllers;

use App\Models\TipCategory;
use Illuminate\Http\Request;

class TipCatController extends Controller
{
    public $categories;
    public function __construct(){
            $this->categories = TipCategory::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        return view('tip-cats.index',['categories'=>$this->categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_name'=>'required',
        ]);
        try {
            
            TipCategory::create($request->all());
        }catch(e){
            return redirect()->route('tip-categories.index');
        }

        return redirect()->route('tip-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       
        $tipCat = TipCategory::find($id);
        $tipCat->update($request->all());
        return redirect()->route('tip-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    
        if(TipCategory::destroy($id)){
            return redirect()->route('tip-categories.index');   
        }else{
            return redirect()->route('tip-categories.index');    
        }
        
    }
}
