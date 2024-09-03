<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller implements HasMiddleware
{
    /**
     * Implementing middleware for Auths and Guests
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieves all the products present in the db and paginate, with 6 products on each page
        $products = Product::latest()->paginate(6);

        return view('products.index', ['products' => $products]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = ['Sony', 'Samsung', 'Apple', 'LG', 'Panasonic', 'HP', 'Dell', 'Lenovo', 'Bose', 'Microsoft', 'IKEA', 'La-Z-Boy', 'West Elm', 'Herman Miller', 'Wayfair', 'Restoration Hardware', 'Crate & Barrel', 'Pottery Barn', 'Havertys', 'Nike', 'Adidas', 'H&M', 'Zara', 'Levis', 'Ralph Lauren', 'Gap', 'Uniqlo', 'Under Armour', 'Calvin Klein', 'Penguin Random House', 'HarperCollins', 'Simon & Schuster', 'Hachette', 'Scholastic', 'Macmillan', 'Oxford University Press', 'Bloomsbury', 'Pearson', 'Wiley', 'LEGO', 'Mattel', 'Hasbro', 'Fisher-Price', 'Nerf', 'Barbie', 'Hot Wheels', 'Playmobil', 'Melissa & Doug', 'VTech', 'Nike', 'Adidas', 'Puma', 'Under Armour', 'Reebok', 'New Balance', 'Wilson', 'Spalding', 'Decathlon', 'Ford', 'Toyota', 'Chevrolet', 'Honda', 'Nissan', 'BMW', 'Mercedes-Benz', 'Audi', 'Goodyear (Tires)', 'Michelin (Tires)', 'Johnson & Johnson', 'Pfizer', 'GSK (GlaxoSmithKline)', 'Abbott', 'Bayer', 'Roche', 'Medtronic', 'Philips Healthcare', 'GE Healthcare', 'Novartis', 'Loréal', 'Estée Lauder', 'Maybelline', 'Sephora', 'MAC Cosmetics', 'Dove', 'Clinique', 'Revlon', 'NARS', 'Chanel', 'Tiffany & Co.', 'Cartier', 'Pandora', 'Swarovski', 'Harry Winston', 'Bulgari', 'Chopard', 'Rolex'];

        $subcategories = Subcategory::all();
        $user = Auth::user();

        return view('users.add-product', compact(['subcategories', 'user', 'brands']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'subcategory_id' => 'required|exists:subcategories,id',
            'brand' => 'required|string',
            'description' => 'required|string',
            'condition' => 'required|in:new,used',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer|min:1',
            'image_1' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_5' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Handle file uploads and store the file paths
        $imagePaths = [];
        for ($i = 1; $i <= 5; $i++) {
            $imageKey = 'image_' . $i;
            if ($request->hasFile($imageKey)) {
                $file = $request->file($imageKey);
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $imagePaths[$imageKey] = $file->storeAs('images/product_images', $fileName, 'public');
            } else {
                $imagePaths[$imageKey] = null;
            }
        }

        // Use a database transaction to ensure atomicity
        DB::transaction(function () use ($validatedData, $imagePaths) {
            // Create a new product with the validated data
            $product = Auth::user()->products()->create([
                'subcategory_id' => $validatedData['subcategory_id'],
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'brand' => $validatedData['brand'],
                'condition' => $validatedData['condition'],
                'price' => $validatedData['price'],
                'stock_quantity' => $validatedData['stock_quantity'],
                'image_1' => $imagePaths['image_1'],
                'image_2' => $imagePaths['image_2'],
                'image_3' => $imagePaths['image_3'],
                'image_4' => $imagePaths['image_4'],
                'image_5' => $imagePaths['image_5'],
                'status' => 'available', // Default status
            ]);
        });

        // Redirect or return a response
        return redirect()->route('user.dashboard')->with('success', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Implementing policies
        // Gate::authorize('modify', $product);

        $brands = ['Sony', 'Samsung', 'Apple', 'LG', 'Panasonic', 'HP', 'Dell', 'Lenovo', 'Bose', 'Microsoft', 'IKEA', 'La-Z-Boy', 'West Elm', 'Herman Miller', 'Wayfair', 'Restoration Hardware', 'Crate & Barrel', 'Pottery Barn', 'Havertys', 'Nike', 'Adidas', 'H&M', 'Zara', 'Levis', 'Ralph Lauren', 'Gap', 'Uniqlo', 'Under Armour', 'Calvin Klein', 'Penguin Random House', 'HarperCollins', 'Simon & Schuster', 'Hachette', 'Scholastic', 'Macmillan', 'Oxford University Press', 'Bloomsbury', 'Pearson', 'Wiley', 'LEGO', 'Mattel', 'Hasbro', 'Fisher-Price', 'Nerf', 'Barbie', 'Hot Wheels', 'Playmobil', 'Melissa & Doug', 'VTech', 'Nike', 'Adidas', 'Puma', 'Under Armour', 'Reebok', 'New Balance', 'Wilson', 'Spalding', 'Decathlon', 'Ford', 'Toyota', 'Chevrolet', 'Honda', 'Nissan', 'BMW', 'Mercedes-Benz', 'Audi', 'Goodyear (Tires)', 'Michelin (Tires)', 'Johnson & Johnson', 'Pfizer', 'GSK (GlaxoSmithKline)', 'Abbott', 'Bayer', 'Roche', 'Medtronic', 'Philips Healthcare', 'GE Healthcare', 'Novartis', 'Loréal', 'Estée Lauder', 'Maybelline', 'Sephora', 'MAC Cosmetics', 'Dove', 'Clinique', 'Revlon', 'NARS', 'Chanel', 'Tiffany & Co.', 'Cartier', 'Pandora', 'Swarovski', 'Harry Winston', 'Bulgari', 'Chopard', 'Rolex'];

        $subcategories = Subcategory::all();
        $user = Auth::user();

        return view('users.edit-product', compact(['product', 'brands', 'subcategories', 'user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the product by ID
        $product = Auth::user()->products()->findOrFail($id);

        // Delete associated images from storage
        $imageFields = ['image_1', 'image_2', 'image_3', 'image_4', 'image_5'];
        foreach ($imageFields as $imageField) {
            if ($product->$imageField) {
                Storage::disk('public')->delete($product->$imageField);
            }
        }

        // Delete the product from the database
        $product->delete();

        // Redirect or return a response
        return redirect()->route('user.dashboard')->with('success', 'Product deleted successfully!');
    }
}
