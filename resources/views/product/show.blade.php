<section>
    <div class="mt-4 small-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Product Name: </h2>
                    <p>{{ $product->name }} || ${{ $product->price }}</p>

                    <h3>Product in Category: </h3>
                    <ul>
                        @foreach($product->categories as $category)
                        <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                    <h3>Product in Option: </h3>
                    <ul>
                        @foreach($product->option as $opt)
                            <li>{{ $opt->optgroups['name'] }} : {{ $opt->name }}</li>
                        @endforeach
                    </ul>
                    <h3>Description</h3>
                    <p>{!!$product->description!!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
