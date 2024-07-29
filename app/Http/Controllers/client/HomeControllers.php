<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\catelogue;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeControllers extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::query()->latest('id')->paginate(8);
        $catelogue = catelogue::query()->get();
        return view('Client.dashboard', compact('products', 'catelogue'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id = null)
    {
        $catelogue = catelogue::query()->get();
        $catelogues = catelogue::query()->findOrFail($id);
        return view('Client.users.CategorieProduct', compact('catelogues', 'catelogue'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function product(string $id)
    {
        $catelogue = catelogue::query()->get();
        $products = product::query()->findOrFail($id);
        return view('client.users.product-detal', compact('products', 'catelogue'));
    }

    /**
     * Display the specified resource.
     */
    public function listCart()
    {
        $cart = session()->get('cart', []);
        $catelogue = catelogue::query()->get();

        return  view('client.users.cart', compact('catelogue' ,'cart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function cart(Request $request)
    {

        $product_id = $request->input('id_product');
        $quantity = $request->input('quantity');
        $product = product::query()->findOrFail($product_id);
        // dd($product);
        $cart = session()->get('cart', []);
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity;
        } else {
            $cart[$product_id] =
                [
                    'name' =>  $product->name,
                    'quantity' =>  $quantity,
                    'price_regular' => isset($product->price_sale) ? $product->price_sale : $product->price_regular,
                    'img_thumbnail' => $product->img_thumbnail
                ];
        }
        session()->put('cart', $cart);
        return redirect()->route('client.listCart') ->with('erro' ,'Thêm vào giỏ hàng thành công');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
   
}
