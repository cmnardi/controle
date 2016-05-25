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
		$monthTotalOut = Transaction::getMonthTotal($year, $month);
        $monthTotalIn = Transaction::getMonthTotal($year, $month, false);
        $months = null;
        if ( is_null($month) ) {
            $months = Transaction::getAgregateDataByMonth();
        }

        $diference = ($monthTotalIn-(-$monthTotalOut));
    	return view('home', [
			'total' => $total,
			'monthTotalOut' => $monthTotalOut,
            'monthTotalIn' => $monthTotalIn,
            'diference' => $diference,
            'months' => $months,
    		'categoryData'=>$categoryData,
    		'subCategoryData' => $subCategoryData,
            'date' => $month.'/'.$year
		]);
    }
}
