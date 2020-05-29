<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Storage;
use App\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::orderBy('created_at','desc')->paginate(8);
        return view('todos.index',[
            'todos' => $todos,
        ]);

        //  //get the authentication user.
        // $user = Auth::user();
        // //get all the todos that belong to the user with pagination.
        // $todos = $user->todos()->orderBy('id','desc')->paginate(8);
        // //return a view with all the todos.
        // return view('todos.index',[
        //     'todos' => $todos,
        // ]);

        /*
        Todo::where('completed',true)->take(8)->get(); // only take 8 todos from the database. <- just an example, we don't have completed column
        Todo::where('title','LIKE',"{%}$search_keyword{%}")->get(); // with LIKE operator.
        Todo::where('title','LIKE',"{%}$search_keyword{%}")->take(8)->get(); //retrieve only 8 results.
        Todo::select(['title','body'])->findOrFail(id); // for specific columns, you can also chain where() with select().
        Todo::where('title','value')->whereOr('body','value')->firstOrFail(); // with SQL OR operator
        Todo::where('title','value')->whereAnd('body','value')->firstOrFail(); // with SQL AND operator.
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->filename; //for retrieve an uploaded file.
        $request->file('filename'); //same as above.
        $request->hasFile('filename'); //check if a file was uploaded.
        //validation rules
        $rules = [
            'title' => 'required|string|unique:todos,title|min:2|max:191',
            //'body'  => 'required|string|min:5|max:1000',
            'body'  => 'required|string|min:5',
            'image'     => 'nullable|image|max:1999', //formats: jpeg, png, bmp, gif, svg
        ];
        //custom validation error messages
        $messages = [
            'title.unique' => 'Todo title should be unique', //syntax: field_name.rule
        ];
        //First Validate the form data
        $request->validate($rules,$messages);

        /*
        $request->input('field_name'); // access an input field
        $request->has('field_name'); // check if field exists
        $request->title; // dynamically access input fields
        request('key') // you can use this global helper if needed inside a view
        */
        //Create a Todo
        // $todo = new Todo;
        // $todo->title = $request->title;
        // $todo->body = $request->body;

        // $todo->save();

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->user_id = Auth::id(); //add the authenticated user id to "user_id" column.
        if($request->hasFile('image')){
            //get image file.
            $image = $request->image;
            //get just extension.
            $ext = $image->getClientOriginalExtension();
            //make a unique name
            $filename = uniqid().'.'.$ext;
            //upload the image
            $image->storeAs('public/pics',$filename);
            //delete the previous image.
            Storage::delete("public/pics/{$todo->image}");
            //this column has a default value so don't need to set it empty.
            $todo->image = $filename;
        }
        $todo->save();

        //Redirect to a specified route with flash message.
        return redirect()
            ->route('todos.index')
            ->with('status','Created a new Todo!');

        /*
        return redirect('/todos'); // to a specific url
        return redirect(url('/todos')); // to a specific url with url helper
        return redirect(url()->previous()); // to a previous url
        return redirect()->back(); // redirect back (same as above)
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        //$todo = Todo::where('title','this is title')->firstOrFail();

        return view('todos.show',[
            'todo' => $todo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit',[
            'todo' => $todo,
        ]);
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

    $request->filename; //for retrieve an uploaded file.
    $request->file('filename'); //same as above.
    $request->hasFile('filename'); //check if a file was uploaded.
    //validation rules
    $rules = [
        'title'     => "required|string|unique:todos,title,{$id}|min:2|max:191", //Using double quotes
        //'body'      => 'required|string|min:5|max:1000',
        'body'      => 'required|string|min:5',
        'image'     => 'nullable|image|max:1999', //formats: jpeg, png, bmp, gif, svg
    ];



    $request->validate($rules);

    //custom validation error messages
    $messages = [
        'title.unique' => 'Todo title should be unique',
    ];
    //First Validate the form data
    $request->validate($rules,$messages);
    //Update the Todo
    $todo        = Todo::findOrFail($id);
    $todo->title = $request->title;
    $todo->body  = $request->body;

    if($request->hasFile('image')){
        //get image file.
        $image = $request->image;
        //get just extension.
        $ext = $image->getClientOriginalExtension();
        //make a unique name
        $filename = uniqid().'.'.$ext;
        //upload the image
        $image->storeAs('public/pics',$filename);
        //delete the previous image.
        Storage::delete("public/pics/{$todo->image}");
        //this column has a default value so don't need to set it empty.
        $todo->image = $filename;
    }

    $todo->save(); //Can be used for both creating and updating
    //Redirect to a specified route with flash message.
    return redirect()
        ->route('todos.show',$id)
        ->with('status','Updated the selected Todo!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        //Redirect to a specified route with flash message.
        return redirect()
            ->route('todos.index')
            ->with('status','Deleted the selected Todo!');
    }
}
