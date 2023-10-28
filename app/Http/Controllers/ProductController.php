<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Product::created($data);
        return redirect()->route('products.index');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * @param UpdateRequest $request
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        $product->update($data);
        return view('products.show', compact('product'));
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
