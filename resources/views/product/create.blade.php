@extends('layouts.app')
@section('title')
Kantek | Add Product
@endsection

@section('content')
<!-- text-center -->

<section>
    <div class="mt-4 small-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <lable><b>Add Product Page</b></lable>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-justify">
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="category">Select category</label>
                                <select name="category[]" class="form-control" multiple size="10">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                <span class="invalid-feedback d-block">
                                    {{$errors->first('category')}}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="option">Select Option</label>
                                <select name="option[]" class="form-control" multiple size="10">
                                    @foreach ($optgroups as $optg)
                                    <optgroup label="{{ $optg->name }}">
                                        @foreach ($optg->option as $opt)
                                        <option value="{{ $opt->id }}">{{ $opt->name }}</option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                                @if($errors->has('option'))
                                <span class="invalid-feedback d-block">
                                    {{$errors->first('option')}}
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Name</label>
                                <input type="text" name="title" id="title" class="form-control {{$errors->has('title') ? 'is-invalid' : '' }}" value="{{old('title')}}" placeholder="Enter Title">
                                @if($errors->has('title'))
                                <span class="invalid-feedback">
                                    {{$errors->first('title')}}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control {{$errors->has('price') ? 'is-invalid' : '' }}" value="{{old('price')}}" placeholder="Enter price">
                                @if($errors->has('price'))
                                <span class="invalid-feedback">
                                    {{$errors->first('price')}}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-2">
                                <label for="image">Image Product</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}}" id="image">
                                    <label class="custom-file-label" for="image">Image Product</label>
                                    @if($errors->has('image'))
                                    <span class="invalid-feedback">
                                        {{$errors->first('image')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="body">Description</label>
                            <textarea name="body" id="body" rows="4" class="txt-tinymce form-control {{$errors->has('body') ? 'is-invalid' : ''}}" placeholder="Enter product Description">{{old('body')}}</textarea>
                            @if($errors->has('body'))
                            <span class="invalid-feedback">
                                {{$errors->first('body')}}
                            </span>
                            @endif
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
