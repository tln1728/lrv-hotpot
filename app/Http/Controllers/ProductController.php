<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // - except | + only
    // RESOURCE (-show)
    public function index()
    {
        return view('product.index', [
            'products' => Auth::user() -> products() -> latest() -> paginate(5),
        ]);
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'  => 'required',
            'price'  => 'required|int',
            'cover'  => 'required|mimes:jpg,png,webp,gif|max:5000',
            'images' => 'array',
        ]);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers');
        }

        $product = Auth::user() -> products() -> create($data);

        if ($request->has('images')) {
            foreach ($request->images as $img) {
                $product->images()->create([
                    'path' => $img->store('images'),
                ]);
            }
        };

        return redirect()->route('products.index')
            ->with('success', __('public.success_msg'));
    }
    public function edit(Product $product)
    {
        return view('product.edit',[
            'product' => $product,
        ]);
    }
    public function update(Product $product)
    {
        return redirect() -> back() ->with('error', 'Chưa update');
    }
    public function destroy(Product $product)
    {        
        $product -> delete();

        return redirect()->back()
            ->with('success', __('public.success_msg'));
    }
    // END RESOURCE

    // Bin index
    public function bin()
    {
        return view('product.bin', [
            'products' => Auth::user() -> products() -> onlyTrashed() -> latest('deleted_at') -> paginate(5),
        ]);
    }

    // Force delete
    public function force_delete($id)
    {
        $product = Product::withTrashed() -> findOrFail($id);

        $this -> deleteProductFiles($product);

        $product -> forceDelete();

        return redirect()->back()
            -> with('success', __('public.success_msg'));
    }
    // Restore
    public function restore($id)
    {
        $product = Product::onlyTrashed() -> findOrFail($id);

        $product->restore();

        return redirect() -> back() -> with('success', __('public.success_msg'));
    }
    // Delete, restore, force delete ALL 
    public function action_all(Request $request)
    {
        $request -> validate([
            'ids'    => 'array|min:1',
            'ids.*'  => 'exists:products,id',
            'action' => 'required|in:restore,force_delete,delete',
        ]);

        $ids = $request -> ids;
        $action = $request -> action;

        // nếu ko tích bất kỳ checkbox nào
        if (!$ids) 
        return redirect() -> back() -> with('error', __('public.no_items_selected'));

        $products = Product::withTrashed() -> whereIn('id', $ids) -> get();

        switch ($action) {
            case 'force_delete': {
                foreach ($products as $p) {
                    $this -> force_delete($p -> id);
                }
                break;
            }

            case 'delete': {
                foreach ($products as $p) {
                    $this -> destroy($p);
                }
                break;
            }

            case 'restore': {
                foreach ($products as $p) {
                    $this -> restore($p -> id);
                }
                break;
            }

            default :
                return redirect() -> back() -> with('error', 'Something wrong');
        }

        return redirect() -> back() -> with('success', __('public.success_msg'));
    }
    // Xóa file (khi force delete)
    public function deleteProductFiles(Product $product) {
        if (Storage::disk('public') -> exists($product->cover)) {
            Storage::disk('public') -> delete($product->cover);
        }
        
        if ($product -> images() -> count() > 0) {
            foreach ($product -> images as $img) {
                if (Storage::disk('public') -> exists($img -> path)) {
                    Storage::disk('public') -> delete($img -> path);
                };
            }
        }
    }
}
