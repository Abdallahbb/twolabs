<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Products extends Controller
{
    public function index()
    {
        return view('shop_products')->with([
            'products' => Product::paginate(),
        ]);
    }

    public function addProduct(Request $request)
    {


        $validated = $request->validate([
            'image' => 'required',
            'name' => 'required|min:3|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'nullable|required',

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName); // Save the image to the public/uploads directory
            $validated['image'] = '/uploads/' . $imageName; // Store the image path in the database
        }
        Product::create($validated);
        return redirect()->route('dashboard')->with('product_success', 'Product created successfully');
    }


    public function show(Product $product, $id)
    {
        $product = Product::findOrFail($id);

        return view('edit-product')->with([
            'product' => $product,
        ]);
    }

    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $validated = $request->validate([
            'name' => [
                'required',
                'min:3',
                Rule::unique('products')->ignore($product->id),
            ],
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'nullable|required',

        ]);



        if ($request->hasFile('image')) {
            $validated = $request->validate([
                'image' => 'required|image'
            ]);
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $validated['image'] = '/uploads/' . $imageName;
            $product->update($validated);
            return redirect()->back()->with('success', 'Product updated successfully');
        } else {
            $product->update($validated);
            return redirect()->back()->with('success', 'Product updated successfully');
        }
    }

    public function single(Request $request){
        $product = Product::findOrFail($request->id);

        return view('product')->with([
            'product' => $product,
            'cart'=>Cart::where('product_id', $request->id)->where('completed','0')->first(),
            'products' => Product::inRandomOrder()->take(4)->get(),
        ]);
    }
}
