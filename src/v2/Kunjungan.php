<?php

namespace redzjovi\pcare\v2;

use GuzzleHttp\Client;

class Kunjungan extends \redzjovi\pcare\v1\BpjsIntegration
{
    public function __construct()
    {
        parent::__construct();
    }

    public function rujukanGet($noKunjungan)
    {
        $response = $this->client->request(
            'GET',
            'dvlp.bpjs-kesehatan.go.id:9080/pcare-rest-dev/v2/kunjungan/rujukan/'.$noKunjungan,
            ['headers' => $this->headers]
        )
        ->getBody()->getContents();

        return json_decode($response, true);
    }
}