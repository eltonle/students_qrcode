<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormationRequest;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_formations = Formation::latest()->get();
        return view('frontend.formations.index',compact('all_formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.formations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request){
           // 3. On enregistre les informations du Post
           $foramtion = new Formation();
           $foramtion->name = $request->name;
           $foramtion->mat_code = $request->mat_code;
           $foramtion->created_by= 1;
           $foramtion->save();
        }
        return redirect()->route("formation.index")->with('message','Data saved successfully');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_formation = Formation::find($id);
        return view('frontend.formations.edit',compact('edit_formation'));
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
        $update_formation = Formation::find($id); 
        $update_formation ->name = $request->name;
        $update_formation ->mat_code = $request->mat_code;
        $update_formation-> updated_by = 1;
        $update_formation ->save();
        return redirect()->route('formation.index')->with('info','Data Updated successffully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = Formation::findOrfail($id);
        $formation ->delete();
        return redirect()->route('formation.index')->with('error','formation deleted successfully');
    }
}
