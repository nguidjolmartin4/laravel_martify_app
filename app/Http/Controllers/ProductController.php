<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

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
        // Fetch products from the same category, excluding the current product
        $similarProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4) // Limit the number of similar products
            ->get();

        return view('store.single-product', [
            'product' => $product,
            'similarProducts' => $similarProducts // Pass similar products to the view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = ['Sony'];

        $categories = Category::all();
        $user = Auth::user();

        return view('users.add-product', compact(['categories', 'user', 'brands']));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        // Step 1: Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand' => 'required|string|max:100',
            'price' => 'required|numeric|min:500',
            'shipping_fee' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
            'condition' => 'required|in:new,refurbished,pre-owned',
            'ship_from_address' => 'required|string',
            'description' => 'required|string',
            'images' => 'required|array|min:3|max:10', // Ensure between 3 and 10 images
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048', // Individual image validation
        ]);

        // Step 2: Create the product
        $product = Auth::user()->products()->create($validatedData);

        // Step 3: Handle the image uploads
        foreach ($request->file('images') as $image) {
            // Store the image and get its path
            $imagePath = $image->store('product_images', 'public');

            // Create a new ProductImage record
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $imagePath,
            ]);
        }

        return redirect()->back()->with('success', 'The product was added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Product $product)
    // {
    //     $brands = ['Sony', 'Samsung', 'Apple', 'LG', 'Panasonic', 'HP', 'Dell', 'Lenovo', 'Bose', 'Microsoft', 'IKEA', 'La-Z-Boy', 'West Elm', 'Herman Miller', 'Wayfair', 'Restoration Hardware', 'Crate & Barrel', 'Pottery Barn', 'Havertys', 'Nike', 'Adidas', 'H&M', 'Zara', 'Levis', 'Ralph Lauren', 'Gap', 'Uniqlo', 'Under Armour', 'Calvin Klein', 'Penguin Random House', 'HarperCollins', 'Simon & Schuster', 'Hachette', 'Scholastic', 'Macmillan', 'Oxford University Press', 'Bloomsbury', 'Pearson', 'Wiley', 'LEGO', 'Mattel', 'Hasbro', 'Fisher-Price', 'Nerf', 'Barbie', 'Hot Wheels', 'Playmobil', 'Melissa & Doug', 'VTech', 'Nike', 'Adidas', 'Puma', 'Under Armour', 'Reebok', 'New Balance', 'Wilson', 'Spalding', 'Decathlon', 'Ford', 'Toyota', 'Chevrolet', 'Honda', 'Nissan', 'BMW', 'Mercedes-Benz', 'Audi', 'Goodyear (Tires)', 'Michelin (Tires)', 'Johnson & Johnson', 'Pfizer', 'GSK (GlaxoSmithKline)', 'Abbott', 'Bayer', 'Roche', 'Medtronic', 'Philips Healthcare', 'GE Healthcare', 'Novartis', 'Loréal', 'Estée Lauder', 'Maybelline', 'Sephora', 'MAC Cosmetics', 'Dove', 'Clinique', 'Revlon', 'NARS', 'Chanel', 'Tiffany & Co.', 'Cartier', 'Pandora', 'Swarovski', 'Harry Winston', 'Bulgari', 'Chopard', 'Rolex'];

    //     $Categories = Category::all();
    //     $user = Auth::user();

    //     return view('users.edit-product', compact(['product', 'brands', 'subcategories', 'user']));
    // }

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
    // public function destroy($id)
    // {
    //     // Find the product by ID
    //     $product = Auth::user()->products()->findOrFail($id);

    //     // Delete associated images from storage
    //     $imageFields = ['image_1', 'image_2', 'image_3', 'image_4', 'image_5'];
    //     foreach ($imageFields as $imageField) {
    //         if ($product->$imageField) {
    //             Storage::disk('public')->delete($product->$imageField);
    //         }
    //     }

    //     // Delete the product from the database
    //     $product->delete();

    //     // Redirect or return a response
    //     return redirect()->route('user.dashboard')->with('success', 'Product deleted successfully!');
    // }
}
