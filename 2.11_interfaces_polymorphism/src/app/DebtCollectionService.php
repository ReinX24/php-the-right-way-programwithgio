<?php

namespace App;

class DebtCollectionService
{
    // Accepts objects that implement the DebtCollector interface
    public function collectDebt(DebtCollector $collector)
    {
        // var_dump($collector instanceof CollectionAgency);
        $owedAmount = mt_rand(100, 1000);
        $collectedAmount = $collector->collect($owedAmount);

        echo "Collected: $$collectedAmount out of $$owedAmount";
    }
}
