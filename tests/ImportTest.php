<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use \App\Model\Category;
use \App\Model\Transaction;
use \OfxParser\Ofx;

class ImportTest extends TestCase
{
    public function testOfx()
    {
        //echo "\n#OFX";
        $ofxdata = 'tests/bra.ofx';
        $OfxParser = new \OfxParser\Parser;
        $Ofx = $OfxParser->loadFromFile($ofxdata);
        //$Ofx = new Ofx($ofxdata);
        $Account = $Ofx->BankAccount;
        $Statement = $Account->Statement;
        $Transactions = $Statement->transactions;
        foreach( $Transactions as $i => $transaction ){
            //echo "\n[".$transaction->type."]\t".$transaction->name." ".$transaction->amount;
            //echo "\ntest ".$transaction->memo;
            $result = Transaction::testTransaction($transaction);
            $this->assertNotEquals($result, false);
        }
        //echo "\n";
    }

    public function testSum()
    {
    	$res = Transaction::getAgregateDataByCategory();
    	//print_r($res);
    	//$res = Transaction::getAgregateDataBySubCategory();
    	//print_r($res);
    	$this->assertEquals($res[5]->id, 6);
    	$this->assertEquals($res[5]->value, -124.90);
    }
}
