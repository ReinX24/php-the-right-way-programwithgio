<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Route;
use Generator;
use App\Models\Ticket;

class GeneratorExampleController
{
    public function __construct(private Ticket $ticketModel)
    {
    }

    #[Route("/examples/generator")]
    public function index()
    {
        $tickets = $this->ticketModel->all();

        foreach ($tickets as $ticket) {
            echo $ticket["id"]  . ":" . substr($ticket["content"], 0, 15) . "<br>";
            // $tickets->rewind();
        }

        // Throws an error, cannot rewind a Generator object
        // $tickets->rewind();

        // Will throw an error, cannot iterate Generator object again
        // foreach ($tickets as $ticket) {
        //     echo $ticket["id"]  . ":" . substr($ticket["content"], 0, 15) . "<br>";
        // }

        // $numbers = $this->lazyRange(1, 10); // generates array of numbers 1 to 10

        // foreach ($numbers as $key => $number) {
        //     echo $key . ":" . $number . "<br>";
        // }

        // echo $numbers->current();
        // $numbers->next();
        // echo $numbers->current();
        // $numbers->next();
        // echo $numbers->getReturn();

        // echo "<pre>";
        // print_r($numbers);
        // echo "</pre>";
    }

    private function lazyRange(int $start, int $end): Generator
    {
        for ($i = $start; $i <= $end; $i++) {
            yield $i * 5 => $i; // numbers are returned one by one instead of all at once
        }
    }
}
