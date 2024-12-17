<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'categories'));
    }
    public function getProducts($id){
        try{
            $products = Product::where('category_id', $id)->get();
            if($products->isEmpty()) {
                return redirect()->route('user.sports')
                    ->with('error', 'No products found in this category');
            }
            return view('user.products', compact('products'));
        }
        catch(\Exception $e){
            return redirect()->route('user.sports')
                ->with('error', 'Error fetching products: ' . $e->getMessage());
        }
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'category_id' => 'required|exists:categories,id',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'quantity' => 'required|integer|min:0'
            ]);

            if ($request->hasFile('photo')) {
                $imagePath = $request->file('photo')->store('products', 'public');
                $data['photo'] = $imagePath;
            }

            Product::create([
                'name' => $data['name'],
                'category_id' => $data['category_id'],
                'photo' => $data['photo'] ?? null,
                // 'quantity' => $data['quantity']
            ]);

            return redirect()->route('admin.products.index')
                ->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error creating product: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            Storage::delete('public/' . $product->photo);
            $imagePath = $request->file('photo')->store('products', 'public');
            $data['photo'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        Storage::delete('public/' . $product->photo);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function checkout(Request $request)
    {
        $products = $request->input('products');
        
        // Create a new order
        $order = Order::create([
            'user_id' => auth()->id(),
            'status' => 'pending',
            'total' => 0, // We'll calculate this next
        ]);

        $total = 0;
        foreach ($products as $productData) {
            $product = Product::findOrFail($productData['id']);
            $subtotal = $product->category->price * $productData['quantity'];
            $total += $subtotal;

            // Add product to order
            $order->products()->attach($product->id, [
                'quantity' => $productData['quantity'],
                'price' => $product->category->price,
            ]);
        }

        // Update order total
        $order->update(['total' => $total]);

        return response()->json([
            'success' => true,
            'redirect' => route('user.order', ['order' => $order->id])
        ]);
    }
}

