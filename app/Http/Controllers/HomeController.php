<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Transaction;

class HomeController extends Controller
{
    //
    public function index($month = null, $year = null)
    {
    	$categoryData = Transaction::getAgregateDataByCategory($year, $month);
    	$subCategoryData = Transaction::getAgregateDataBySubCategory($year, $month);
		$total = Transaction::getTotal();
		$monthTotal = Transaction::getMonthTotal($year, $month);
        $months = null;
        if ( is_null($month) ) {
            $months = Transaction::getAgregateDataByMonth();
        }

    	return view('home', [
			'total' => $total,
			'monthTotal' => $monthTotal,
            'months' => $months,
    		'categoryData'=>$categoryData,
    		'subCategoryData' => $subCategoryData,
            'date' => $month.'/'.$year
		]);
    }
}
