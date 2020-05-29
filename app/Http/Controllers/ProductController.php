<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Option;
use App\OptGroup;
use Storage;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {

        $categories = Category::all();
        $optgroups = OptGroup::all();
        $options = Option::all();

        $cate = $request->input('category');
        $otp = $request->input('option');

        $search =  $request->input('q');
        if ($search == "")
            $search = "%";
        if ($search != "") {
            $product = Product::whereHas('categories', function ($query) use ($cate) {
                    if ($cate != "" && !in_array("0", $cate))
                        $query->wherein('categories.id', $cate);
                    else
                        $query->where('categories.id', 'like', '%%%');
                })
                ->whereHas('option', function ($query) use ($otp) {
                    if ($otp != "" && !in_array("0", $otp))
                        $query->wherein('option.id', $otp);
                    else
                        $query->where('option.id', 'like', '%%%');
                })
                ->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orderBy('id', 'desc')
                ->paginate(6);
            $product->appends(['q' => $search]);
        } else {
            $product = Product::orderBy('id', 'desc')->paginate(6);
        }
        //dd($product);
        //return view('Admin.categories.edit', compact('product','categories'));
        return view('product.index', [
            'product' => $product,
            'categories' => $categories,
            'options' => $options,
            'optgroups' => $optgroups,
        ]);
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $optgroups = OptGroup::all();
        $options = Option::all();

        return view('product.create', [
            'categories' => $categories,
            'options' => $options,
            'optgroups' => $optgroups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->filename;
        $request->file('filename');
        $request->hasFile('filename');
        //validation rules
        $rules = [
            // 'category' => 'exists:categories',
            'category' => 'required|array',
            // 'option' => 'exists:option',
            'option' => 'required|array',
            'category' => 'required',
            'title' => 'required|string|unique:products,name|min:2|max:191',
            'price'  => "required|regex:/^\d*(\.\d{1,2})?$/",
            'body'  => 'required|string|min:5',
            'image'     => 'nullable|image|max:1999', //formats: jpeg, png, bmp, gif, svg
        ];
        //custom validation error messages
        $messages = [
            'title.unique' => 'Product name should be unique', //syntax: field_name.rule
            'category.required'  => 'Category is required',
            'option.required'  => 'Option is required',
        ];

        //Validate the form data
        $request->validate($rules,$messages);

        $cate = $request->category;
        $otp = $request->option;
        //dd($otp);

        $product = new Product;
        $product->name = $request->title;
        $product->price = $request->price;
        $product->description = $request->body;
        if ($request->hasFile('image')) {
            //get image file.
            $image = $request->image;
            //get just extension.
            $ext = $image->getClientOriginalExtension();
            //make a unique name
            $filename = uniqid() . '.' . $ext;
            //upload the image
            $image->storeAs('public/pics', $filename);
            //delete the previous image.
            Storage::delete("public/pics/{$product->image}");
            //this column has a default value so don't need to set it empty.
            $product->image_product = $filename;
        }
        //dd($product);
        $product->save();

        $input_category = Category::find($request->category);
        $product->categories()->attach($input_category);
        
        $input_option = Option::find($request->option);
        $product->option()->attach($input_option);

        //return 'Success';

        //Redirect to a specified route with flash message.
        return redirect()
            ->route('product.index')
            ->with('status', 'Created a new Product!');
    }

    public function show(Product $product)
    {
        //dd($product);
        return view('product.show', compact('product'));
    }

    public function removeCategory(Product $product)
    {
        $category = Category::find(3);

        $product->categories()->detach($category);

        return 'Success';
    }
}
