<?php

namespace FuganholiSistemas;
use FuganholiSistemas\Services\Contatos;
use FuganholiSistemas\Services\EmpresaCliente;
use FuganholiSistemas\Services\Instancia;
use FuganholiSistemas\Services\Mensagens;

class PlugZapi
{
    private bool $isProduction = false;
    private bool $debug = false;
    private HttpClient $httpClient;
    private string $instance_id;
    private string $token;
    private string $clientToken;
    public function __construct(
        string $instance_id,
        string $token,
        string $clientToken,
        $isProduction = false,
        $debug = false)
    {
        $this->instance_id = $instance_id;
        $this->token = $token;
        $this->clientToken = $clientToken;
        $this->isProduction = $isProduction;
        $this->debug = $debug;
        $this->httpClient = new HttpClient($this);
    }

    public function Instancia(): Instancia
    {
        return new Instancia($this);
    }
    public function Mensagens(): Mensagens
    {
        return new Mensagens($this);
    }
    public function Contatos(): Contatos
    {
        return new Contatos($this);
    }

    public function getHttpClient(): HttpClient
    {
        return $this->httpClient;
    }

    public function getIsProduction(): bool
    {
        return $this->isProduction;
    }

    public function setIsProduction(bool $isProduction): void
    {
        $this->isProduction = $isProduction;
    }

    public function getDebug(): bool
    {
        return $this->debug;
    }

    public function setDebug(bool $debug): void
    {
        $this->debug = $debug;
    }

    public function getInstanceId(): string
    {
        return $this->instance_id;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getClientToken(): string
    {
        return $this->clientToken;
    }

}
