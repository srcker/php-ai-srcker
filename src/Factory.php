<?php
namespace srcker\openai;
use Closure;
use Exception;
use srcker\openai\chat\ChatCompletionRequest;
use srcker\openai\enum\Method;
use srcker\openai\utils\Client;
use srcker\openai\utils\Headers;
use srcker\openai\utils\QueryParams;

/**
 * @project php-ai-srcker
 * @class   Factory
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/19 下午6:24
 */
class Factory
{

    private ChatCompletionRequest $chatCompletionRequest;
    /**
     * The API key for the requests.
     */
    private ?string $apiKey = null;

    /**
     * The organization for the requests.
     */
    private ?string $model = null;

    /**
     * The base URI for the requests.
     */
    private ?string $baseUrl = null;

    /**
     * The HTTP headers for the requests.
     *
     * @var array<string, string>
     */
    private array $headers = [];

    private ?Closure $streamHandler = null;

    private array $queryParams = [];

    private array $options = [];

    private ?string $proxy = null;


    public function withProxy(string $proxy): self
    {
        $this->proxy = $proxy;
        return $this;
    }

    public function withOptions(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    public function withApiKey(string $apiKey): self
    {
        $this->apiKey = trim($apiKey);
        return $this;
    }

    public function withChatCompletionRequest(ChatCompletionRequest $chatCompletionRequest): self
    {
        $this->chatCompletionRequest = $chatCompletionRequest;
        return $this;
    }


    /**
     * Sets the stream handler for the requests. Not required when using Guzzle.
     */
    public function withStreamHandler(Closure $streamHandler): self
    {
        $this->streamHandler = $streamHandler;
        return $this;
    }

    /**
     * Sets the base URI for the requests.
     * If no URI is provided the factory will use the default OpenAI API URI.
     */
    public function withBaseUrl(string $baseUrl): self
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Adds a custom HTTP header to the requests.
     */
    public function withHttpHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;
        return $this;
    }

    /**
     * Adds a custom query parameter to the request url.
     */
    public function withQueryParam(string $name, string $value): self
    {
        $this->queryParams[$name] = $value;
        return $this;
    }

    /**
     * make
     * @throws Exception
     * @author  Sinda
     * @email   sinda@srcker.com
     * @time    2024/12/19 20:21:11
     */
    public function make(): bool|string|null
    {
        $headers = Headers::create();

        if ($this->apiKey !== null) {
            $headers = Headers::withAuthorization($this->apiKey);
        }

        foreach ($this->headers as $name => $value) {
            $headers = $headers->withCustomHeader($name, $value);
        }

        $queryParams = QueryParams::create();
        foreach ($this->queryParams as $name => $value) {
            $queryParams = $queryParams->withParam($name, $value);
        }

        try {
            return (new Client())
                ->setHeaders($headers)
                ->setParams($queryParams)
                ->setBaseUrl($this->baseUrl)
                ->setOptions($this->options)
                ->setProxy($this->proxy)
                ->request(method: Method::POST, data: $this->chatCompletionRequest->toJson());
        } catch (Exception $e) {
            throw new Exception("Error while creating client: ". $e->getMessage());
        }

    }

    /**
     * makeStreamHandler
     * @return Closure|void|null
     * @throws Exception
     * @author  Sinda
     * @email   sinda@srcker.com
     * @time    2024/12/19 20:20:49
     */
    public function makeStreamHandler()
    {
        if (is_null($this->streamHandler)) {
            return $this->streamHandler;
        }

        $this->chatCompletionRequest->setStream(true);

        $headers = Headers::create();

        if ($this->apiKey !== null) {
            $headers = Headers::withAuthorization($this->apiKey);
        }

        foreach ($this->headers as $name => $value) {
            $headers = $headers->withCustomHeader($name, $value);
        }

        $queryParams = QueryParams::create();
        foreach ($this->queryParams as $name => $value) {
            $queryParams = $queryParams->withParam($name, $value);
        }

        try {
            (new Client())
                ->setHeaders($headers)
                ->setParams($queryParams)
                ->setBaseUrl($this->baseUrl)
                ->setOptions($this->options)
                ->setProxy($this->proxy)
                ->request(method: Method::POST, data: $this->chatCompletionRequest->toJson(),stream: true,onChunk: $this->streamHandler);
        } catch (Exception $e) {
            throw new Exception("Error while creating client: ". $e->getMessage());
        }
    }
}