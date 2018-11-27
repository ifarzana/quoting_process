<?php

namespace Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ProductTypeTest extends TestCase
{
    protected $client;

    protected function setUp()
    {
        $this->client = new Client([
            'base_uri' => 'http://portal.wildanet.local'
        ]);
    }
    public function testGetProductType()
    {
        $response = $this->client->get('/get-product-type');

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertArraySubset(
            [
                '1'=> 'Subscription',
                '2' => 'Service',
                '3'=> 'Goods'
            ], $data);


    }
}
