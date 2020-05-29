@extends('layouts.app')
@section('title')
Kantek | Product Grid
@endsection

@section('content')
<!-- text-center -->

<section>
    <div class="mt-4 small-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">Product Grid - Search and show detail product info as: category, option...</div>
                    <div class="text-center">Press 'Ctr + Click' for multi select category and option</div>

                    <form action="">
                        {{ csrf_field() }}
                        {{-- <select name="category">
                                <option value="%" selected>Select all category</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select> --}}
                        <select name="category[]" multiple size="10">
                            <option value="0" selected>Select all category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        {{-- <select multiple size="5">
                            <option selected>Option 1</option>
                            <optgroup label="Option group 1">
                                <option>Sub option 1</option>
                                <option>Sub option 2</option>
                                <option>Sub option 3</option>
                            </optgroup>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select> --}}

                        <select name="option[]" multiple size="10">
                            <option value="0" selected>Select all option</option>
                            @foreach ($optgroups as $optg)
                                <optgroup label="{{ $optg->name }}">
                                    @foreach ($optg->option as $opt)
                                        <option value="{{ $opt->id }}">{{ $opt->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>


                        {{-- <select name="option[]" multiple>
                            <option value="0" selected>Select all option</option>
                            @foreach ($options as $opt)
                                <option value="{{ $opt->id }}">{{ $opt->name }}</option>
                            @endforeach
                        </select> --}}

                        <div class="input-group">
                            <input type="text" class="form-control" name="q" placeholder="Search products by name"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="fa fa-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    {{-- <form action="">
                            <div class="form-group">
                                <input type="text" name="q" placeholder="Search...!" class="form-control"/>
                                <input type="submit" class="btn btn-primary" value="Search"/>
                            </div>
                        </form> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-justify">
                    <ul class="list-group py-3 mb-3">
                        @forelse($product as $item)
                        <li class="list-group-item my-2">
                            <h6 class="float-left"><a href="{{route('product.show',$item->id)}}">{{$item->name}}</a></h6>
                            <p><img src="{{asset('storage/pics/'.$item->image_product)}}" class="rounded-circle mr-1" height="30px" width="30px"></p>
                            <lable>Product in Category: </lable>
                            <ul>
                                @foreach($item->categories as $category)
                                <li style="padding-left: 20px;">{{ $category->name }}</li>
                                @endforeach
                            </ul>
                            <lable>Product in Option: </lable>
                            <ul>
                                @foreach($item->option as $opt)
                                <li style="padding-left: 20px;">{{ $opt->optgroups['name'] }} : {{ $opt->name }}</li>
                                @endforeach
                            </ul>
                            <a href="{{route('product.show',$item->id)}}">Detail</a>
                        </li>
                        @empty
                        <h4 class="text-center">Not Found Item</h4>

                        @endforelse
                    </ul>

                    <div class="d-flex justify-content-center">
                        {{$product->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
