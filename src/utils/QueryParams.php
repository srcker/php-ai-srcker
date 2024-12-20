<?php
/**
 * @project php-ai-srcker
 * @class   QueryParams
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/19 下午7:30
 */

namespace srcker\openai\utils;

/**
 * 查询参数类，处理参数的存储和管理
 */
final class QueryParams
{

    /**
     * QueryParams 构造函数，初始化参数
     *
     * @param array $params 初始参数
     */
    private function __construct(private readonly array $params)
    {
    }

    /**
     * 创建一个新的 QueryParams 实例
     *
     * @return self 返回一个空的 QueryParams 实例
     */
    public static function create(): self
    {
        return new self([]);
    }

    /**
     * 添加一个新的参数并返回一个新的 QueryParams 实例
     *
     * @param string $name 参数名称
     * @param string|int $value 参数值
     * @return self 返回一个包含新参数的 QueryParams 实例
     */
    public function withParam(string $name, string|int $value): self
    {
        return new self([
            ...$this->params,
            $name => $value,
        ]);
    }

    /**
     * 将参数转换为数组
     *
     * @return array 返回参数数组
     */
    public function toArray(): array
    {
        return $this->params;
    }

    public function isEmpty(): bool
    {
        return empty($this->params);
    }

    public function build(): string
    {
        return http_build_query($this->params);
    }



}
