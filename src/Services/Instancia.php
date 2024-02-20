<?php
namespace FuganholiSistemas\Services;
use FuganholiSistemas\PlugZapi;

class Instancia
{

    private $client;

    public function __construct(PlugZapi $client)
    {
        $this->client = $client;
    }

    public function consultarStatusInstancia()
    {
        try {
            return $this->client->getHttpClient()->exec('GET', 'status');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function restaurarSessao()
    {
        try {
            return $this->client->getHttpClient()->exec('GET', 'restore-session');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function consultarQrCode()
    {
        try {
            return $this->client->getHttpClient()->exec('GET', 'qr-code');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function consultarQrCodeImagem()
    {
        try {
            return $this->client->getHttpClient()->exec('GET', 'qr-code/image');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function reiniciarInstancia()
    {
        try {
            return $this->client->getHttpClient()->exec('GET', 'restart');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function desconectar()
    {
        try {
            return $this->client->getHttpClient()->exec('GET', 'disconnect');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function recusarChamadas(bool $ativar)
    {
        try {
            return $this->client->getHttpClient()->exec('PUT', 'update-call-reject-auto', [
                'json' => [
                    'value' => $ativar
                ]
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    public function atualizarImagemPerfil(string $imagem)
    {
        try {
            return $this->client->getHttpClient()->exec('PUT', 'profile-picture', [
                'json' => [
                    'value' => $imagem
                ]
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
