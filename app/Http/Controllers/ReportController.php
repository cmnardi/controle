<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Transaction;

class ReportController extends Controller
{
    //
    public function index()
    {
    	return 
    	[
    	Transaction::getAgregateDataByMonth()
    	,Transaction::getAgregateDataByMonth('>')
    	,Transaction::getAgregateDataByMonth('<')
    	];
    }
}
