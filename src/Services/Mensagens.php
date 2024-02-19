<?php
namespace FuganholiSistemas\Services;
use FuganholiSistemas\PlugZapi;

class Mensagens
{

    private PlugZapi $client;

    public function __construct(PlugZapi $client)
    {
        $this->client = $client;
    }

    public function enviarMensagemTexto(
        string $phone,
        string $message,
        ?string $messageId = null,
        ?int $delayMessage = null,
        ?int $delayTyping = null
        )
    {
        try {
            return $this->client->getHttpClient()->exec('POST', 'send-text', [
                'json' => [
                    'phone' => $phone,
                    'message' => $message,
                    'messageId' => $messageId,
                    'delayMessage' => $delayMessage,
                    'delayTyping' => $delayTyping
                ]
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function deletarMensagem(
        string $messageId,
        string $phone,
        bool $owner
        )
    {
        try {
            return $this->client->getHttpClient()->exec('DELETE', 'messages', [
                'query' => [
                    'messageId' => $messageId,
                    'phone' => $phone,
                    'owner' => $owner ? 'true' : 'false'
                ]
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function enviarLink(
        string $phone,
        string $message,
        string $image,
        string $linkUrl,
        string $title,
        string $linkDescription,
        ?string $messageId = null,
        ?int $delayMessage = null,
        ?string $linkType = null
        )
    {
        try {
            return $this->client->getHttpClient()->exec('POST', 'send-link', [
                'json' => [
                    'phone' => $phone,
                    'message' => $message,
                    'image' => $image,
                    'linkUrl' => $linkUrl,
                    'title' => $title,
                    'linkDescription' => $linkDescription,
                    'messageId' => $messageId,
                    'delayMessage' => $delayMessage,
                    'linkType' => $linkType
                ]
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function enviarSticker(
        string $phone,
        string $sticker,
        ?string $messageId = null,
        ?int $delayMessage = null
        )
    {
        try {
            return $this->client->getHttpClient()->exec('POST', 'send-sticker', [
                'json' => [
                    'phone' => $phone,
                    'sticker' => $sticker,
                    'messageId' => $messageId,
                    'delayMessage' => $delayMessage
                ]
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function enviarImagem(
        string $phone,
        string $image,
        string $caption,
        ?string $messageId = null,
        ?int $delayMessage = null
        )
    {
        try {
            return $this->client->getHttpClient()->exec('POST', 'send-image', [
                'json' => [
                    'phone' => $phone,
                    'image' => $image,
                    'caption' => $caption,
                    'messageId' => $messageId,
                    'delayMessage' => $delayMessage
                ]
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function lerMensagem(
        string $messageId,
        string $phone,
        bool $owner
        )
    {
        try {
            return $this->client->getHttpClient()->exec('POST', 'read-message', [
                'json' => [
                    'messageId' => $messageId,
                    'phone' => $phone,
                ]
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
