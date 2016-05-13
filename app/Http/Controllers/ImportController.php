<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Validator;


use \App\Model\Category;
use \App\Model\Transaction;
use \OfxParser\Ofx;

class ImportController extends Controller
{
    //

    public function index()
    {
    	return view('import');
    }

    public function store()
    {
    	$image = Input::file('image');
       /** $validator = Validator::make([$image], ['image' => 'required']);
        if ($validator->fails()) {
            return $this->errors(['message' => 'Not an image.', 'code' => 400]);
        }***/
        $destinationPath = storage_path() . '/uploads';
        if(!$image->move($destinationPath, $image->getClientOriginalName())) {
            return $this->errors(['message' => 'Error saving the file.', 'code' => 400]);
        }

        $ofxdata = storage_path() . '/uploads/'.$image->getClientOriginalName();
        $OfxParser = new \OfxParser\Parser;
        $Ofx = $OfxParser->loadFromFile($ofxdata);
        $Account = $Ofx->BankAccount;
        $Statement = $Account->Statement;
        $Transactions = $Statement->transactions;
        foreach( $Transactions as $i => $transaction ){
            $result = Transaction::testTransaction($transaction);
        }
        return response()->json(['success' => true], 200);
    }

}
