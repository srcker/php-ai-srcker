<?php
/**
 * @project php-ai-srcker
 * @class   Headers
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/19 下午9:05
 */

namespace srcker\openai\utils;

use srcker\openai\enum\ContentType;

/**
 * 处理 HTTP 头部的类
 */
final class Headers implements \JsonSerializable
{

    private function __construct(private readonly array $headers)
    {
    }

    /**
     * 创建一个新的 Headers 实例
     *
     * @return self
     */
    public static function create(): self
    {
        return new self([]);
    }


    /**
     * 使用授权信息创建 Headers 实例
     *
     * @param string $apiKey
     * @return self
     */
    public static function withAuthorization(string $apiKey): self
    {
        return new self([
            'Authorization' => "Bearer {$apiKey}",
        ]);
    }

    /**
     * 添加内容类型到头部
     *
     * @param ContentType $contentType
     * @param string $suffix
     * @return self
     */
    public function withContentType(ContentType $contentType, string $suffix = ''): self
    {
        return new self([
            ...$this->headers,
            'Content-Type' => $contentType->value.$suffix,
        ]);
    }


    /**
     * 添加自定义头部
     *
     * @param string $name
     * @param string $value
     * @return self
     */
    public function withCustomHeader(string $name, string $value): self
    {
        return new self([
            ...$this->headers,
            $name => $value,
        ]);
    }

    /**
     * 将头部转换为数组形式
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->headers;
    }


    public function formatHeaders(): array
    {
        $formatted = [];
        foreach ($this->headers as $key => $value) {
            $formatted[] = "$key: $value";
        }
        return $formatted;
    }

    public function jsonSerialize(): array
    {
        $formatted = [];
        foreach ($this->headers as $key => $value) {
            $formatted[$key] = $value;
        }
        return $formatted;
    }

}
