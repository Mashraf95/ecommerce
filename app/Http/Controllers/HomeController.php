<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }



    public function getHomeView(){
        $sliderData = Slider::orderBy('created_at', 'DESC')->take(10)->get();
        $cats = \App\Models\Category::orderBy('created_at', 'ASC')->take(10)->get();
        $newProducts = Product::orderBy('created_at', 'DESC')->take(12)->get();
        $topsales = OrderDetail::groupBy('product_id')
            ->SELECT('product_id', \DB::raw('COUNT(*) AS K'))
            ->orderBy('K', 'DESC')
            ->take(15)
            ->pluck('product_id')
            ->toArray();
        $sales = Product::find($topsales);


        return view('home',[
            'sliders' => $sliderData,
            'cats' => $cats,
            'arrivals' => $newProducts,
            'sales' => $sales
        ]);
    }

    public function addToCart(Request $request){

        if (! \Auth::check()){
            return redirect('/login');
        }

        $rules = ["product" => "required"];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return redirect('/home');
        }

        $productID = $request->get('product');
        $product = Product::find($productID);

        if (!$product){
            return redirect('/home');
        }


        $lastorder = Order::where('is_checked_out', '=', false)
            ->where('user_id', '=', \Auth::user()->id)
            ->orderBy('created_at', 'DESC')->first();

        if ($lastorder){

            $orderProduct = OrderDetail::where('order_id', '=', $lastorder->id)
            ->where('product_id', '=', $product->id)->first();

            if ($orderProduct){
                $orderProduct->amount = $orderProduct->amount +1;
                $orderProduct->save();
            }else{
                $newOrderDetails = new OrderDetail();
                $newOrderDetails->order_id = $lastorder->id;
                $newOrderDetails->product_id = $productID;
                $newOrderDetails->amount = 1;
                $newOrderDetails->price = $product->selling_price;
                $newOrderDetails->discount = $product->discount;
                $newOrderDetails ->save();
            }

        }else{
            $newOrder = new Order();
            $newOrder-> user_id = Auth::user()->id;
            $newOrder-> firstname = "";
            $newOrder-> lastname = "";
            $newOrder-> address = "";
            $newOrder-> phone_number = "";
            $newOrder->save();

            $newOrderDetails = new OrderDetail();
            $newOrderDetails->order_id = $newOrder->id;
            $newOrderDetails->product_id = $productID;
            $newOrderDetails->amount = 1;
            $newOrderDetails->price = $product->selling_price;
            $newOrderDetails->discount = $product->discount;
            $newOrderDetails ->save();

        }
        return redirect('/home');
    }
}
