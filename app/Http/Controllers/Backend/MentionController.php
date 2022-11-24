<?php

namespace App\Http\Controllers\Backend;

use App\Models\Mention;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_mentions = Mention::latest()->get();
        return view('frontend.mentions.index',compact('all_mentions'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('frontend.mentions.create');
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
            //  On enregistre les informations du Post
            $mention_store = new Mention();
            $mention_store->name = $request->name;
            $mention_store->created_by = 1;
            $mention_store->save();
         }
         return redirect()->route('mentions.index')->with('message','Data saved successfully');
    
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
        $edit_mention = Mention::find($id);
        return view('frontend.mentions.edit',compact('edit_mention'));
   
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
        
        $update_mention = Mention::find($id); 
        $update_mention ->name = $request->name;
        $update_mention->updated_by = 1;
        $update_mention->save();
        return redirect()->route('mentions.index')->with('info','Data Updated successffully!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mention = Mention::findOrfail($id);
        $mention ->delete();
        return redirect()->route('mentions.index')->with('error','formation deleted successfully');
    
    }
}
