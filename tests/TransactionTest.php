<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Model\Transaction;

class TransactionTest extends TestCase
{
    /**
     * Testa se 2 transactions com o mesmo uniqueId faz a atualização ao invés de  inserir uma nova
     *
     * @return void
     */
    public function testExample()
    {
    	echo "ins 1... ";
        $transaction1 = new Transaction();
        $transaction1->uniqueId = 'abcde';
        $transaction1->memo = 'oshd kjhf ';
        $transaction1->amount = 44;
        $transaction1 = Transaction::testTransaction($transaction1);
        
        $transaction2 = new Transaction();
        $transaction2->uniqueId = 'abcde';
        $transaction2->memo = 'Alterando ';
        $transaction2->amount = 123;
        $transaction2->id_category = 1;
        $transaction2 = Transaction::testTransaction($transaction2);

		$this->assertEquals($transaction2->id, $transaction1->id);
    }

}
