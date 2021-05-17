<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use App\Models\Product;
use Cart;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;

class BasketController extends Controller
{
    public function index()
    {
        $products = Cart::session(1)->getContent()->toArray();
        sort($products);
        $allPrice = Cart::session(1)->getTotal();
        return view(
            'basket.index',
            [
                'products' => $products,
                'allPrice' => $allPrice
            ]
        );
    }

    public function addToBusket(Request $request)
    {
        $product = Product::where('idProduct', $request->idProduct)->firstOrFail();
        Cart::session(1)->add([
            'id' => $product->idProduct,
            'name' => $product->nameProduct,
            'price' => $product->price,
            'quantity' => (int) $request->qty,
            'attributes' => [
                'image' => $product->image,
            ]
        ]);
        return response()->json($product);
    }

    public function delToBusket(Request $request)
    {
        $id = $request->idProduct;
        $product = Cart::session(1)->get($id);
        $qty = $product->quantity;
        Cart::session(1)->update(
            $id,
            [
                'quantity' => $qty > 1 ? -1 : 0,
            ]
        );
        return response()->json($qty);
    }

    public function removeToBusket(Request $request)
    {
        $id = $request->idProduct;
        Cart::session(1)->remove($id);
    }

    public function sendMail(MailRequest $request)
    {
        $products = Cart::session(1)->getContent()->toArray();
        $sum = Cart::session(1)->getTotal();
        $email = $request->mail;
        Mail::to($email)->send(new OrderCreated($sum, $products));
        return redirect(route('home'));
    }
}
