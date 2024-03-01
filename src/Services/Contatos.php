<?php
namespace FuganholiSistemas\Services;
use FuganholiSistemas\PlugZapi;

class Contatos
{

    private $client;

    public function __construct(PlugZapi $client)
    {
        $this->client = $client;
    }

    public function consultarNumeroCadastradoWhatsApp(string $number) : bool
    {
        try {
            $res = $this->client->getHttpClient()->exec('GET', "phone-exists/{$number}");
            return isset($res['exists']) ? $res['exists'] : false;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
