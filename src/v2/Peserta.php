<?php

namespace redzjovi\pcare\v2;

use GuzzleHttp\Client;

class Peserta extends \redzjovi\pcare\v1\BpjsIntegration
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($keyword)
    {
        try {
            $response = $this->client->request(
                'GET',
                'dvlp.bpjs-kesehatan.go.id:9080/pcare-rest-dev/v2/peserta/'.$keyword,
                ['headers' => $this->headers]
            )
            ->getBody()->getContents();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse()->getBody();
        }

        return json_decode($response, true);
    }

    public function getByJenisKartu($keyword)
    {
        try {
            $response = $this->client->request(
                'GET',
                'dvlp.bpjs-kesehatan.go.id:9080/pcare-rest-dev/v2/peserta/nik/'.$keyword,
                ['headers' => $this->headers]
            )
            ->getBody()->getContents();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse()->getBody();
        }

        return json_decode($response, true);
    }
}
