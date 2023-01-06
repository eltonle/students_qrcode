<?php

namespace App\Http\Controllers\Backend;

use App\Models\Mention;
use App\Models\Section;
use App\Models\Etudiant;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EtudaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_students = Etudiant::orderBy('id', 'asc')->with('formation','section','mention')->get();
        // dd($all_students);
        return view('frontend.etudiants.index',compact('all_students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formations = Formation::all();
        $sessions = Section::all();
        $mentions = Mention::all();
        return view('frontend.etudiants.create',compact('formations','sessions','mentions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $input = $request->all();

          //save data to database
          $etudiant = new Etudiant();
          $etudiant->name = $request->name;
          $etudiant->prenom = $request->prenom;
          $etudiant->email = $request->email;
          $etudiant->phone = $request->phone;
          $etudiant->qr_code = "qrcode";
          $etudiant->formation_id = $request->formation_id;
          $etudiant->section_id = $request->section_id;
          $etudiant->mention_id = $request->mention_id;
          $etudiant->created_by = 1;
          $etudiant->save();

         //generate qrcode 
         // save qrcode image in our folder on this site
        // 2. On upload l'image dans "/storage/app/public/posts"
        // $chemin_image = $request->picture->store("posts");
        //   $file = 'generated_qrcodes/'.$etudiant->id.'png';
        $url = "http://localhost_Academic/verifier_diplome/".$etudiant->id;
        // $urll = "{{ route('auth.diplome', $etudiant->id) }}";
        // $urll = "{{ generate(Request::route('auth.diplome',$etudiant->id)) }}";
           $img = time() . '.png';
            $newQrcode = QrCode::color(255,0, 25)
                        ->size(200)
                        ->format('png')
                        ->generate($url);
                        $output_file = '/public/' . $img;
                        Storage::disk('local')->put($output_file, $newQrcode);
            // $image = QrCode::format('png')
            //      ->size(200)
            //      ->generate('A simple example of QR code!');
            //     $output_file = '/img/qr-code/img-' . time() . '.png';
            //     Storage::disk('local')->put($output_file, $image);

          if ($newQrcode) {
              $input['qr_code']=$img;  
              //update database
              Etudiant::where('id',$etudiant->id)
                       ->update([
                        'qr_code'=>$input['qr_code']
                    ]); 

                return redirect()->route("etudiants.index")->with('message','Data saved successfully');
          }else{
            return redirect()->route("etudiants.index")->with('error','qrcode failed to save successfully');
    
          }
          
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
        $formations = Formation::all();
        $sessions = Section::all();
        $mentions = Mention::all();
        $edit_students = Etudiant::find($id);
        return view('frontend.etudiants.edit',compact('edit_students','formations','sessions','mentions'));
   
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
         // dd($request);
         $etudiant = Etudiant::find($id);

         $etudiant->name = $request->name;
         $etudiant->prenom = $request->prenom;
         $etudiant->email = $request->email;
         $etudiant->phone = $request->phone;
        //  $etudiant->qr_code = "qrcode";
         $etudiant->formation_id = $request->formation_id;
         $etudiant->section_id = $request->section_id;
         $etudiant->mention_id = $request->mention_id;
         $etudiant->created_by = 1;
         $etudiant->save();

        
        return redirect()->route('etudiants.index')->with('info','Data Updated successffully!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etudiant = Etudiant::findOrfail($id);
        $image_path = storage_path().'/app/public/'.$etudiant->qr_code;
   
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $etudiant ->delete();
        return redirect()->route('etudiants.index')->with('error','formation deleted successfully');
    
    }


    public function verification(Request $request) {
         $result = Etudiant::where('id', $request->id)->first();
      
         return view('frontend.etudiants.resultat',compact('result'));
    }

    public function downloadf($id)
    {
        $dl = Etudiant::findOrfail($id);
       $image_path = storage_path().'/app/public/'.$dl->qr_code;
       
       if (file_exists($image_path)) {
            $content = file_get_contents($image_path);
            return response($content)->withHeaders([
            'content-type'=>mime_content_type($image_path)
        ]);
       }
       return redirect('/404');
    }

}
