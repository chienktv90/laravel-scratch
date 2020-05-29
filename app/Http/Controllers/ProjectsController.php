<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Storage;
use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::orderBy('created_at','desc')->paginate(8);
        // return view('projects.index',[
        //     'projects' => $projects,
        // ]);

         //get the authentication user.
        $user = Auth::user();
        //get all the projects that belong to the user with pagination.
        $projects = $user->projects()->orderBy('id','desc')->paginate(8);
        //return a view with all the projects.
        return view('projects.index',[
            'projects' => $projects,
        ]);

        /*
        Project::where('completed',true)->take(8)->get(); // only take 8 projects from the database. <- just an example, we don't have completed column
        Project::where('title','LIKE',"{%}$search_keyword{%}")->get(); // with LIKE operator.
        Project::where('title','LIKE',"{%}$search_keyword{%}")->take(8)->get(); //retrieve only 8 results.
        Project::select(['title','body'])->findOrFail(id); // for specific columns, you can also chain where() with select().
        Project::where('title','value')->whereOr('body','value')->firstOrFail(); // with SQL OR operator
        Project::where('title','value')->whereAnd('body','value')->firstOrFail(); // with SQL AND operator.
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
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
            'title' => 'required|string|unique:projects,title|min:2|max:191',
            //'body'  => 'required|string|min:5|max:1000',
            'body'  => 'required|string|min:5',
            'image'     => 'nullable|image|max:1999', //formats: jpeg, png, bmp, gif, svg
        ];
        //custom validation error messages
        $messages = [
            'title.unique' => 'Project title should be unique', //syntax: field_name.rule
        ];
        //First Validate the form data
        $request->validate($rules,$messages);

        /*
        $request->input('field_name'); // access an input field
        $request->has('field_name'); // check if field exists
        $request->title; // dynamically access input fields
        request('key') // you can use this global helper if needed inside a view
        */
        //Create a Project
        // $project = new Project;
        // $project->title = $request->title;
        // $project->body = $request->body;
        
        // $project->save(); 

        $project = new Project;
        $project->title = $request->title;
        $project->body = $request->body;
        $project->user_id = Auth::id(); //add the authenticated user id to "user_id" column.
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
            Storage::delete("public/pics/{$project->image}");
            //this column has a default value so don't need to set it empty.
            $project->image = $filename;
        }
        $project->save();

        //Redirect to a specified route with flash message.
        return redirect()
            ->route('projects.index')
            ->with('status','Created a new Project!');

        /*
        return redirect('/projects'); // to a specific url
        return redirect(url('/projects')); // to a specific url with url helper
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
        $project = Project::findOrFail($id);
        //$project = Project::where('title','this is title')->firstOrFail();

        return view('projects.show',[
            'project' => $project,
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
        $project = Project::findOrFail($id);
        return view('projects.edit',[
            'project' => $project,
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
        'title'     => "required|string|unique:projects,title,{$id}|min:2|max:191", //Using double quotes
        //'body'      => 'required|string|min:5|max:1000',
        'body'      => 'required|string|min:5',
        'image'     => 'nullable|image|max:1999', //formats: jpeg, png, bmp, gif, svg
    ];

    
    
    $request->validate($rules);

    //custom validation error messages
    $messages = [
        'title.unique' => 'Project title should be unique',
    ];
    //First Validate the form data
    $request->validate($rules,$messages);
    //Update the Project
    $project        = Project::findOrFail($id);
    $project->title = $request->title;
    $project->body  = $request->body;

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
        Storage::delete("public/pics/{$project->image}");
        //this column has a default value so don't need to set it empty.
        $project->image = $filename;
    }

    $project->save(); //Can be used for both creating and updating
    //Redirect to a specified route with flash message.
    return redirect()
        ->route('projects.show',$id)
        ->with('status','Updated the selected Project!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        //Redirect to a specified route with flash message.
        return redirect()
            ->route('projects.index')
            ->with('status','Deleted the selected Project!');
    }
}
