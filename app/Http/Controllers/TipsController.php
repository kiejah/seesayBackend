<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use App\Models\TipCategory;
use Illuminate\Http\Request;

class TipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $tips,$mssg;

    public function __construct() {
        $this->tips = Tip::all();
        $this->tipCats = TipCategory::all();
    }

    public function index(Request $request)
    {
        //
         $response = [
            'tips'=>$this->tips 
         ];
        if($request->is('tips') || $request->segment(1)=="tips"){
            return view('tips.index',['tips'=>$this->tips,'cats'=>$this->tipCats,'mssg'=>$this->mssg]);
        }
        return response($response,201);
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
            'tip_cat_id'=>'required',
            'county_name'=>'required',
            'location_name'=>'required',
            'tipdesc'=>'required',
            'user_id'=>'required',
        ]);

        $data = Tip::create($request->all());
        $response = [
            'posted_tip'=>$data,
            'post'=>"Success"
         ];

        return response($response,201);

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
        $data= Tip::find($id);
        $response = [
            'tip'=>$data
         ];

        return response($response,201);
    }
    public function edit(Request $request,$id)
    {
        //
        $tip= Tip::find($id);
        Tip::where('id', $id)->update([
            'status' => true
            ]);
        
        return view('tips.show',['tip'=>$tip,'cats'=>$this->tipCats]);
       
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
        $tip = Tip::find($id);
        $tip->update($request->all());
        if($request->route && $request->route == 'web'){
            return view('tips.show',['tip'=>$tip,'cats'=>$this->tipCats]);
        }else{
            $response = [
                'updated_tip'=>$tip
             ];
             return response($response,201);
        }
        

        
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //

        $mssg="";
        if(Tip::destroy($id)){
            $mssg .= 'Delete Successful';
        }else{
            $mssg .= 'Delete UnSuccessful';
        }
        $response = [
            'mssg'=>$mssg
         ];
        
        if($request->segment(1)=="tips"){
            $this->mssg= $mssg;
            return redirect()->route('tips.index');
        }

         return response($response,201);

    }
    public function searchTip(Request $request){

        $results= Tip::where('county_name','LIKE','%'.$request->search_term.'%')
                    ->orWhere('location_name','LIKE','%'.$request->search_term.'%')
                    ->orWhere('tipdesc','LIKE','%'.$request->search_term.'%')
                    ->get();
        
        return view('tips.index',['tips'=>$results]);

    }
}
