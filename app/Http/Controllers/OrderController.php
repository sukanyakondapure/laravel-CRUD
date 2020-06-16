<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;

class OrderController extends Controller {

    public function orderView() {
        $categories = Category::all();
        $products = Product::all();
        return view('/addOrder', ['categories' => $categories, 'products' => $products]);
    }

    public function getProducts($cid) {
        $products = Product::where('category', $cid)->get();
        return view('/productList1', ['products' => $products]);
    }

    public function getPrices($cid) {
        $products = Product::find($cid);
//        dd($products);
        return $products->price;
    }

    public function insertOrder(Request $request) {
        $post = $request->all();
        $post['orders'] = json_encode($post['orders']);
        $orders = Order::create($post);
        return redirect('/orderListForm');
    }

    public function orderListView() {
        return view('/orderListForm');
    }

    public function orderDataTable() {
        $order = Order::select(['id', 'name', 'address', 'email','contact']);

        return DataTables::of($order)
                        ->addColumn('action', function ($order) {

                            return '<center><a href="#' . $order->id . '"  class="btn btn-mini btn-success user_restore_alert" title="Edit User">Edit</a>
                                    <form method="POST" action="/deleterecord/' . $order->id . '" accept-charset="UTF-8" class="delete" style="display:inline">
                                        ' . csrf_field() . '
                                            <input name="_method" value="DELETE" type="hidden">
                                        <button type="button" class="btn btn-mini btn-danger user_delete_alert"  title="Delete User">Delete</button>
                                    </form></center>';
                        })
                        ->make(true);
    }

}
