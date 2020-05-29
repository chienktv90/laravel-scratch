<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Todo;
use App\Project;
use App\Contact;
use Mail;

class PagesController extends Controller
{
    public function index(){
        //return view('pages.index');

        $todos = Todo::orderBy('id','desc')->paginate(3);
         return view('pages.index',[
             'todos' => $todos,
         ]);
    }

    public function news(){
        $todos = Todo::orderBy('id','desc')->paginate(6);
         return view('pages.news',[
             'todos' => $todos,
         ]);
    }

    public function showDetail($id)
    {
        $todo = Todo::findOrFail($id);
        //$todo = Todo::where('title','this is title')->firstOrFail();

        return view('pages.news-detail',[
            'todo' => $todo,
        ]);
    }

    // public function projects(){
    //     $todos = Todo::orderBy('id','desc')->paginate(6);
    //      return view('pages.projects',[
    //          'todos' => $todos,
    //      ]);
    // }

    public function cats(){
        $cats = Project::orderBy('id','desc')->paginate(6);
         return view('pages.cats',[
             'cats' => $cats,
         ]);
    }

    public function showProjectDetail($id)
    {
        $todo = Project::findOrFail($id);
        //$todo = Todo::where('title','this is title')->firstOrFail();

        return view('pages.cats-detail',[
            'todo' => $todo,
        ]);
    }

    public function about(){
        return view('pages.about');
    }

    public function pricing(){
        return view('pages.pricing');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function getContact() { 

        return view('pages.contact'); 
       } 
 
      public function saveContact(Request $request) { 
         $this->validate($request, [
             'name' => 'required',
             'email' => 'required|email',
             'subject' => 'required',
             'phone_number' => 'required',
             'message' => 'required'
         ]);
 
         $contact = new Contact;
 
         $contact->name = $request->name;
         $contact->email = $request->email;
         $contact->subject = $request->subject;
         $contact->phone_number = $request->phone_number;
         $contact->message = $request->message;
 
         $contact->save();
 
         \Mail::send('pages.contact_email',
              array(
                  'name' => $request->get('name'),
                  'email' => $request->get('email'),
                  'subject' => $request->get('subject'),
                  'phone_number' => $request->get('phone_number'),
                  'user_message' => $request->get('message'),
              ), function($message) use ($request)
                {
                   $message->from($request->email);
                   $message->to('chienktv90@gmail.com');
                   //$message->bcc('chienktv90@gmail.com', $name = $request->name);
                   //$message->cc($address, $name = null);
                   $message->bcc('chienktv90@gmail.com');
                   $message->cc('chienktv90@gmail.com');
                });
 
           return back()->with('success', 'Thank you for contact us!');
 
     }
}
