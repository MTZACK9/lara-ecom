<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $trendingProducts = Product::where('trending', 1)->latest()->take(15)->get();
        $newArrivalProducts = Product::latest()->take(15)->get();
        $featuredProducts = Product::where('featured', '1')->latest()->take(15)->get();
        return view('frontend.index', compact('sliders', 'trendingProducts', 'newArrivalProducts', 'featuredProducts'));
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();

            if ($product) {
                return view('frontend.collections.products.view', compact('product', 'category'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function newArrival()
    {
        $newArrivalProducts = Product::where('status', '0')->latest()->take(16)->get();
        return view('frontend.pages.new-arrival', compact('newArrivalProducts'));
    }
    public function featured()
    {
        $featuredProducts = Product::where('featured', '1')->where('status', '0')->latest()->take(16)->get();
        return view('frontend.pages.featured', compact('featuredProducts'));
    }

    public function searchProducts(Request $request)
    {
        if ($request->search) {
            $searchHistory = $request->search;
            $searchProducts =  Product::where('status', '0')->where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProducts', 'searchHistory'));
        } else {
            return redirect()->back();
        }
    }
}
