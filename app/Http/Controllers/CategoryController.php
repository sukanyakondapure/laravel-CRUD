<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Category;
use DataTables;
use App\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;


class CategoryController extends Controller {

    public function categoryView() {
        return view('/addCategory');
    }

    public function productView() {
        $Categories = Category::all();
//       dd($Categories);
        return view('/addProduct', ['categories' => $Categories]);
    }

    public function insertCategory(Request $request) {
        $post = $request->all();
        $Category = Category::create($post);
        return redirect('/addCategory');
    }

    public function insertProduct(Request $request) {
        $Categories = Category::all();
        $post = $request->all();
        $Product = Product::create($post);
        return redirect('/addProduct');
    }

    public function getCategory($cid) {
        $Categories = Category::all();
        return view('/addProduct', ['categories' => $Categories]);
    }

    public function categoryDataTable() {
        $category = Category::select(['id', 'name', 'description']);

        return DataTables::of($category)
                        ->addColumn('action', function ($category) {

                            return '<center><a href="/editCategory/' . $category->id . '"  class="btn btn-mini btn-success user_restore_alert" title="Edit User">Edit</a>
                                    <form method="POST" action="/deleteCategory/' . $category->id . '" accept-charset="UTF-8" class="delete" style="display:inline">
                                        ' . csrf_field() . '
                                            <input name="_method" value="DELETE" type="hidden">
                                        <button type="button" class="btn btn-mini btn-danger user_delete_alert"  title="Delete User">Delete</button>
                                    </form></center>';
                        })
                        ->make(true);
    }

    public function productDataTable(Request $request) {
//        $product = Product::select(['id', 'category', 'name', 'type', 'colour']);
        $product = Product::select(['products.*','products.id as pid']);

        return DataTables::of($product)
                ->filter(function ($query) use ($request) {
//                            if ($request->get('keyword') != '') {
//                                $query->join('categories', function($join)use($request) {
//                                    $join->on('categories.id', '=', 'products.category')
//                                    ->whereRaw('(categories.name like ?)', ["%{$request->get('keyword')}%"]);
//                                });
//
//                            }
                            if ($request->get('cat_input') != '') {
                                $query->join('categories', function($join)use($request) {
                                    $join->on('categories.id', '=', 'products.category')
                                    ->whereRaw('(categories.name like ?)', ["%{$request->get('cat_input')}%"]);
                                });

                            }
                          if ($request->get('name')) {
                                $query->whereRaw('name LIKE "' . $request->get('name') . '%"');
                            }
                             if ($request->get('type')) {
                                $query->whereRaw('type LIKE "' . $request->get('type') . '%"');
                            }
                            if ($request->get('colour')) {
                                $query->whereRaw('colour LIKE "' . $request->get('colour') . '%"');
                            }
                            
                          
                          
                        
                            
                        })
                       
                        ->addColumn('action', function ($product) {
                            return '<center><a href="/editProduct/' . $product->pid . '"  class="btn btn-mini btn-success user_restore_alert" title="Edit User">Edit</a>
                                    <form method="POST" action="/deleteProduct/' . $product->pid . '" accept-charset="UTF-8" class="delete" style="display:inline">
                                        ' . csrf_field() . '
                                            <input name="_method" value="DELETE" type="hidden">
                                        <button type="button" class="btn btn-mini btn-danger user_delete_alert"  title="Delete User">Delete</button>
                                    </form></center>';
                        })
                        ->editColumn('category', function($product) {
                            return $product->getCategory->name;
                        })
                     
                        ->make(true);
    }

    public function categoryList() {
        return view('/categoryList');
    }

    public function productList() {
        $Categories = Category::all();
        return view('/productList', ['categories' => $Categories]);
    }

    public function delProduct($id) {
        Product::where('id', $id)->delete();
        return redirect('/productList');
    }

    public function delcategory($id) {
        Category::where('id', $id)->delete();
//        echo("deleting category");
        return redirect('/categoryList');
    }
    
    
     public function export() 
    {
        return Excel::download(new ProductsExport, 'product.xlsx');
    }

}
