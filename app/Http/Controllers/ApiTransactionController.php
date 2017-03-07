<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Model\Transaction;
use App\Model\Category;

class ApiTransactionController extends Controller
{
    //
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $row = Transaction::find($id);
        return [
            'row'=>$row
            ,'categories'=>Category::listByIdCategory($row->category->id_category)
        ];
    }

    /**
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $id = $request->id;
        $row = Transaction::find($id);
        $row->id_category = $request->id_category;
        $row->save();

        if ( $request->changeAll == 'true') {
            $rows = Transaction::findByDescription($row->description);
            foreach ($rows as $row2) {
                $row2->id_category = $request->id_category;
                $row2->save();
            }
        }
        return $row;
    }
}
