<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminEvent;
use Illuminate\Support\Facades\Storage;
use App\Models\EventDetail;

class AdminEventController extends Controller
{
    public function index()
    {
      $events= AdminEvent::all();
      $event= AdminEvent::paginate(9);
      return view('backend.pages.events.manage',compact('events','event'));
    }
    public function Store(Request $request)
    {



        $event_title = $request->event_title;
        $description = $request->description;


        $month=$request->month;
        $date=$request->date;
        $event_image =$request->file('file');
        $filename=null;
        if ($event_image) {
            $filename = time() . $event_image->getClientOriginalName();

            Storage::disk('public')->putFileAs(
                'events/',
                $event_image,
                $filename
            );
          }



        $event = new AdminEvent();
        $event->event_title = $event_title;
        $event->description =$description;

        $event->date=$date;
        $event->month=$month;
        $event->event_image= $filename;


        $event->save();

      return back()->with('event_added','Event has been added successfully!');
    }



    public function Delete($id){

      $event = AdminEvent::find($id);

      $event->delete();

    return back()->with('event_deleted','Event has been deleted successfully!');
    }

    public function EventDetails($id)
    {
      $event = EventDetail::where('admin_event_id',$id)->get();
      $events=AdminEvent::find($id);

      return view('backend.pages.events.event_details',compact('events'));
    }
    public function StoreDetails(Request $request)
    {
      $admin_event_id=$request->admin_event_id;
      $event_schedule=$request->event_schedule;
      $event_description=$request->event_description;
      $event_banner_image =$request->file('file');
      $filename=null;

      if ($event_banner_image) {
          $filename = time() . $event_banner_image->getClientOriginalName();

          Storage::disk('public')->putFileAs(
              'Events Banner/',
              $event_banner_image,
              $filename
          );
        }

      $event_details = new EventDetail();
      $event_details->admin_event_id=$admin_event_id;
      $event_details->event_schedule=$event_schedule;
      $event_details->event_description=$event_description;
      $event_details->event_banner_image= $filename;
      $event_details->save();
      return back()->with('blog_details_added','Blog details has been added successfully created!');

    }
    public function EventDetailView($id)
    {

      $events=AdminEvent::find($id);
      $event_details=EventDetail::where('admin_event_id',$id)->get();

      return view('backend.pages.events.view',compact('events','event_details'));
    }





}
