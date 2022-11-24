<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_sessions = Section::latest()->get();
        return view('frontend.sections.index',compact('all_sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.sections.create');
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
            $section_store = new Section();
            $section_store->name = $request->name;
            $section_store->created_by = 1;
            $section_store->save();
         }
         return redirect()->route('sections.index')->with('message','Data saved successfully');
    
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
        $edit_section = Section::find($id);
        return view('frontend.sections.edit',compact('edit_section'));
   
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
        $update_section = Section::find($id); 
        $update_section ->name = $request->name;
        $update_section->updated_by = 1;
        $update_section->save(); 
        return redirect()->route('sections.index')->with('info','Data Updated successffully!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::findOrfail($id);
        $section ->delete();
        return redirect()->route('sections.index')->with('error','formation deleted successfully');
    
    }
}
