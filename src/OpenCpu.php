<?php

namespace OpenCpu;

use GuzzleHttp\Client;

class OpenCpu {

    /**
     * @var Client
     */
    protected $client;

    /**
     * OpenCpu constructor.
     * @param string $baseUrl
     */
    public function __construct($baseUrl) {
        $this->client = new Client([
            'base_url' => $baseUrl
        ]);
    }

    /**
     * @param string $packageName
     * @param string $scriptName
     * @param array $input
     *
     * @return \GuzzleHttp\Message\FutureResponse|\GuzzleHttp\Message\ResponseInterface|\GuzzleHttp\Ring\Future\FutureInterface|null
     */
    public function runScript($packageName, $scriptName, $input = []) {
        return $this->client->post('library/' . $packageName . '/R' . $scriptName . '/json', [
            'body' => $input
        ]);
    }
}