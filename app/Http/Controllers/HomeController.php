<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Transaction;

class HomeController extends Controller
{
    //
    public function index()
    {
    	$categoryData = Transaction::getAgregateDataByCategory();
    	$subCategoryData = Transaction::getAgregateDataBySubCategory();
		$total = Transaction::getTotal();
    	return view('home', [
			'total' => $total,
    		'categoryData'=>$categoryData,
    		'subCategoryData' => $subCategoryData
		]);
    }
}
