<?php
/**
 * @project php-ai-srcker
 * @class   FunctionDefinition
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/18 下午2:44
 */

namespace srcker\ai\entity;

class FunctionDefinition
{
    // 函数的名称
    private string $name;
    // 对函数用途的描述，供模型判断何时以及如何调用该工具函数
    private string $description = '';
    // 函数请求参数，以 JSON Schema 格式描述
    private object $parameters;

    /**
     * 构造方法
     * @param string $name
     * @param string $description
     * @param object $parameters
     */
    public function __construct(string $name, string $description, object $parameters)
    {
        $this->name = $name;
        $this->description = $description;
        $this->parameters = $parameters;
    }

    /**
     * 获取函数名称
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 设置函数名称
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * 获取函数描述
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * 设置函数描述
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * 获取函数请求参数
     * @return object
     */
    public function getParameters(): object
    {
        return $this->parameters;
    }

    /**
     * 设置函数请求参数
     * @param object $parameters
     */
    public function setParameters(object $parameters): void
    {
        $this->parameters = $parameters;
    }

    /**
     * 将对象转换为数组形式
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'parameters' => $this->parameters, // 假设需要进一步序列化时，调用相关方法
        ];
    }
}
