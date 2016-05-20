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
		$monthTotal = Transaction::getMonthTotal(date('m'));
    	return view('home', [
			'total' => $total,
			'monthTotal' => $monthTotal,
    		'categoryData'=>$categoryData,
    		'subCategoryData' => $subCategoryData
		]);
    }
}
