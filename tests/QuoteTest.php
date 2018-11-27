<?php

namespace Tests;

use App\Models\Quote;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class QuoteTest extends TestCase
{
    protected $client;
    protected $quote;


    protected function setUp()
    {
        $this->client = new Client([
            'base_uri' => 'http://portal.wildanet.local'
        ]);
    }
    public function testCreateQuote()
    {
    }
}
