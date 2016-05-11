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
            $p1 = Category::testPattern($transaction->memo);
            if ($p1){
                //echo "\t#".$p1->id_category."[".$p1->description."]";
                //print_r($transaction);
                $t = new Transaction();
                $t->description = $transaction->memo;
                $t->id_category = $p1->id;
                $t->value = $transaction->amount;
                $t->date = $transaction->date;
                $t->save();
            }
        }
        echo "\n";
    }
}
