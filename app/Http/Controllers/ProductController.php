<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Services\PriceService;
use App\Traits\PriceTrait;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // use PriceTrait; //traite usage
    // Service usage
    // protected $priceService;
    // public function __construct(PriceService $priceService)
    // {
    //     $this->priceService = $priceService;
    // }
    public function index()
    {
        $products = Product::paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $productData = $request->validated();
        // for the semi atomated slug
        // $productData['slug'] = Str::slug($productData['name'], '-');
        // $productData['price_usd'] =$this->convertPriceToUSD($productData['price']);//traite usage
        // $productData['price_usd'] = $this->priceService->convertPriceToUSD($productData['price']);// Service usage
        
        $productData['price_usd'] = convertPriceToUSD($productData['price']);
        $product = Product::create($productData);
        dd($productData);

        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
