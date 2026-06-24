<?php

namespace App\Http\Controllers;

use App\models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric|min:0',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $imageName,
        ]);
        return redirect()->route('admin.products.create')->with('success', 'Product created successfully.');
    }

    public function adminIndex()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric|min:0',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $product->image;

        if ($request->hasFile('image')) {

            if($product->image && File::exists(public_path('images/' . $product->image))) {
                File::delete(public_path('images/' . $product->image));
            }

            $imageName = time(). '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        if ($product->image && File::exists(public_path('images/' . $product->image))) {
            File::delete(public_path('images/' . $product->image));
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

        public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Product::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $products = $query->get();
        return view('user.index', compact('products', 'search'));
    
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('user.show', compact('product'));
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('user.cart', compact('cart'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "max_stock" => $product->stock,

            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.view')->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $request->validate(['quantity' => 'required|numeric|min:1']);
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.view')->with('success', 'Cart updated successfully!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.view')->with('success', 'Product removed from cart successfully!');
    }
    
    public function checkoutView()
    {
        $cart = session()->get('cart', []);

        if(empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }

        foreach($cart as $id => $details) {
            $product = Product::find($id);
            if(!$product || $product->stock < $details['quantity']) {
                return redirect()->route('cart.view')->with('error', "Product {$details['name']} is out of stock or does not have enough quantity.");
            }
        }

        return view('user.checkout', compact('cart'));
    }
        
    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);

        if(empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|numeric',
        ]);

        $totalPrice = 0;
        $orderItems = [];

        foreach($cart as $id => $details) {
            $product = Product::find($id);

            if(!$product || $product->stock < $details['quantity']) {
                return redirect()->route('cart.view')->with('error', "Product {$details['name']} is out of stock or does not have enough quantity.");
            }
        
            $totalPrice += $details['price'] * $details['quantity'];

            $orderItems[] = [
            'name' => $details['name'],
            'quantity' => $details['quantity'],
            'price' => $details['price'],
            ];

            $product->decrement('stock', $details['quantity']);
        }

        Order::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'total_price' => $totalPrice,
            'items' => json_encode($orderItems)
        ]);

        session()->forget('cart');

        return redirect()->route('cart.view')->with('success', "Checkout successful! Your order has been placed.");

    }

    public function buyNow($id)
    {
        $product = Product::findOrFail($id);
        session()->forget('cart');

        $cart = [
            $id => [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "max_stock" => $product->stock,
            ]
        ];
        session()->put('cart', $cart);
        return redirect()->route('cart.checkout.view');
    }

    public function adminOrders()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }
}
