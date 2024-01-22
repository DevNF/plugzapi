<?php 

namespace FuganholiSistemas;
use GuzzleHttp\Client;
use FuganholiSistemas\Config\ProductionData;
use FuganholiSistemas\Config\SandboxData;

class HttpClient
{
    private Client $clientHttp;

    public function __construct(private PlugZapi $client)
    {
        $baseUri = ProductionData::BASE_URI . $client->getInstanceId() . '/token/' . $client->getToken() . '/';

        $this->clientHttp = new Client([
            'base_uri' => $baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Client-Token' => $client->getClientToken(),
            ],
        ]);
    }

    public function exec($method, $uri, $options = [])
    {
        $res = $this->clientHttp->request($method, $uri, array_merge([
            'debug' => $this->client->getDebug(),
            'http_errors' => false,
            ],$options))->getBody()->getContents();

        return json_decode($res, true);
    }
}