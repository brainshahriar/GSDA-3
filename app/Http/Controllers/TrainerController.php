<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use Validator;
use Response;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
class TrainerController extends Controller
{

    public function addTrainer(Request $request)
    {
     
        $name = $request->name;
        $designation = $request->designation;
        $facebook_profile = $request->facebook_profile;
        $linkdin_profile = $request->linkdin_profile;
        $biography = $request->biography;
        $image =$request->file('file');
        $filename=null;
        if ($image) {
            $filename = time() . $image->getClientOriginalName();

            Storage::disk('public')->putFileAs(
                'trainer/',
                $image,
                $filename
            );
          }

        $trainer = new Trainer();
        $trainer->name = $name;
        $trainer->designation =$designation;
        $trainer->facebook_profile = $facebook_profile;
        $trainer->linkdin_profile =$linkdin_profile;
        $trainer->biography = $biography;
        $trainer->image= $filename;
        $trainer->save();

        $notification=array(
            'message'=>'Trainer added successfully!!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function create()
    { 
        $trainer= Trainer::all();
        return view('backend.trainer.create',compact('trainer'));
    }
    public function updateTrainer(Request $request)
    {
        $name = $request->name;
        $designation = $request->designation;
        $facebook_profile = $request->facebook_profile;
        $linkdin_profile = $request->linkdin_profile;
        $biography = $request->biography;
        $filename=null;
        $uploadedFile = $request->file('image');
        $oldfilename = $trainer['image'] ?? 'demo.jpg';

        $oldfileexists = Storage::disk('public')->exists('trainer/' . $oldfilename);

        if ($uploadedFile !== null) {

            if ($oldfileexists && $oldfilename != $uploadedFile) {
                //Delete old file
                Storage::disk('public')->delete('trainer/' . $oldfilename);
            }
            $filename_modified = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
            $filename = time() . '_' . $filename_modified;

            Storage::disk('public')->putFileAs(
                'trainer/',
                $uploadedFile,
                $filename
            );

            $trainer['image'] = $filename;
        } elseif (empty($oldfileexists)) {
            //throw new GeneralException('Trainer image not found!');
            //return redirect()->back()->with(['flash_danger' => 'User image not found!']);
            //file check in storage

        }



        $trainer = Trainer::find($request->id);
        $trainer->name = $name;
        $trainer->designation =$designation;
        $trainer->facebook_profile = $facebook_profile;
        $trainer->linkdin_profile =$linkdin_profile;
        $trainer->biography = $biography;
        $trainer->image= $filename;
        $trainer->save();

        $notification=array(
            'message'=>'Trainer Updated successfully!!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    
    public function deleteTrainer($id){

        $trainer = Trainer::find($id);
  
        $trainer->delete();
  
        $notification=array(
            'message'=>'Trainer Deleted successfully!!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
  }
}
