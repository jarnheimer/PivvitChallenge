<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostPurchase;
use App\Purchase;
use Illuminate\Http\Request;
use Response;

class Purchases extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userName = auth()->user()->name;
        $purchases = Purchase::where('customer_name', $userName)
            ->get();

        return Response::api($purchases->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostPurchase|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostPurchase $request)
    {
        $purchaseData = $request->only([
            'customer_name',
            'offering_id',
            'quantity',
        ]);

        $purchase = new Purchase($purchaseData);
        $purchase->save();

        return Response::api($purchase->toArray());
    }
}
