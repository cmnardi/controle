<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Model\Transaction;
use App\Model\Category;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transactions = Transaction::take(20)->get();
        return view('transaction/index', [
            'transactions'=>$transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rootCategories = Category::listByIdCategory(null);
        return view('transaction/form', [
            'transaction'=>new Transaction()
            ,'categories'=>$rootCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ( $request->has('id')){
            $transaction = Transaction::find($request->id);
            $transaction->description = $request->description;
            $transaction->id_category = $request->id_category;
        }else {
            $transaction = new Transaction($request->all()) ;
        }
        $transaction->save();
        $rootCategories = Category::listByIdCategory(null);
        $categories = Category::listByIdCategory($transaction->category->id_category);
        return view('transaction/form', [
            'transaction'=>$transaction
            ,'rootCategories'=>$rootCategories
            ,'categories'=>$categories
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $transaction = Transaction::find($id);
        $rootCategories = Category::listByIdCategory(null);
        $categories = Category::listByIdCategory($transaction->category->id_category);
        return view('transaction/form', [
            'transaction'=>$transaction
            ,'rootCategories'=>$rootCategories
            ,'categories'=>$categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
