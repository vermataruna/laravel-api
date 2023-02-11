<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Product\DeleteRequest;
use App\Http\Requests\Product\SearchRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(SearchRequest $request)
    {
        $products = Product::query()
            ->searchKeyword($request->input('search'))
            ->latest('id')
            ->paginate();

        return ProductResource::collection($products);
    }

    public function store(StoreRequest $request)
    {
        $product = new Product();
        $product->fill($request->validated());
        $product->save();

        return new ProductResource($product);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $product->fill($request->validated());
        $product->save();

        return new ProductResource($product);
    }

    public function destroy(DeleteRequest $request, Product $product)
    {
        $product->deleteOrFail();

        return response('Product deleted!');
    }
}
