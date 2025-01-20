<?php

namespace srcker\openai\utils;

use Exception;
use srcker\openai\enum\Method;


/**
 * @project php-ai-srcker
 * @class   Client
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/19 下午6:28
 */
class Client
{
    private string $baseUrl;
    private Headers $headers;
    private QueryParams $params;
    private array $options = [];
    private ?string $proxy = null;

    /**
     * Client constructor.
     * author Sinda
     * email sinda@srcker.com
     * @param string $baseUrl
     * @param Headers $headers
     * @param QueryParams $params
     * @param array $options
     * @param string|null $proxy
     */
//    public function __construct(
//        string  $baseUrl,
//        Headers   $headers,
//        QueryParams   $params,
//        array   $options,
//        ?string $proxy = null
//    )
//    {
//        $this->baseUrl = $baseUrl;
//        $this->headers = $headers;
//        $this->params = $params;
//        $this->options = $options;
//        $this->proxy = $proxy;
//    }


    /**
     * setBaseUrl
     * @param string $baseUrl
     * @return $this
     * @author  Sinda
     * @email   sinda@srcker.com
     * @time    2024/12/19 19:55:28
     */
    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * 动态设置代理
     * @param string|null $proxy 代理设置 (格式: "http://user:password@host:port")
     */
    public function setProxy(?string $proxy): static
    {
        $this->proxy = $proxy;
        return $this;
    }

    public function setHeaders(Headers $headers): static
    {
        $this->headers = $headers;
        return $this;
    }

    public function setParams(QueryParams $queryParams): static
    {
        $this->params = $queryParams;
        return $this;
    }

    /**
     * setHeaders
     * @param array $options
     * @return $this
     * @author  Sinda
     * @email   sinda@srcker.com
     * @time    2024/12/19 18:54:44
     */
    public function setOptions(array $options): static
    {
        $this->options = $options;
        return $this;
    }


    /**
     * request
     * @param Method $method
     * @param array $params
     * @param bool $stream
     * @param callable|null $onChunk
     * @return string|bool|null
     * @throws Exception
     * @author  Sinda
     * @email   sinda@srcker.com
     * @time    2024/12/19 20:07:58
     */
    public function request(Method $method = Method::GET, mixed $data = [], bool $stream = false, ?callable $onChunk = null): string|bool|null
    {
        $ch = curl_init($this->formatUrl());

        // 配置 HTTP 方法和参数
        if ($method != Method::GET) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method->value);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, !$stream);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers->formatHeaders());

        // 设置代理
        if ($this->proxy) {
            curl_setopt($ch, CURLOPT_PROXY, $this->proxy);
        }

        // 设置额外的 cURL 配置
        foreach ($this->options as $option => $value) {
            curl_setopt($ch, $option, $value);
        }

        // 处理流式返回
        if ($stream) {
            curl_setopt($ch, CURLOPT_WRITEFUNCTION, function ($ch, $data) use ($onChunk) {
                if ($onChunk) {
                    $onChunk($data); // 数据块回调
                } else {
                    echo $data; // 默认直接输出
                }
                return strlen($data);
            });
        }

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception('CURL Error: ' . curl_error($ch));
        }
        curl_close($ch);
        // 流式返回无需返回完整数据
        if ($stream) {
            return null;
        }
        return $response;
    }

    /**
     * formatUrl
     * @return string
     * @author  Sinda
     * @email   sinda@srcker.com
     * @time    2024/12/19 20:12:16
     */
    private function formatUrl(): string
    {
        return $this->baseUrl. ($this->params->isEmpty() ? '' : '?'. $this->params->build());
    }



}