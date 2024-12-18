<?php
/**
 * @project php-ai-srcker
 * @class   ToolParam
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/18 下午2:44
 */

namespace srcker\ai\entity;

class ToolParam
{
    // 工具类型，当前仅支持 `function`
    private string $type;
    // 模型可以调用的工具列表（具体函数相关定义）
    private FunctionDefinition $function;

    /**
     * 构造方法
     * @param string $type
     * @param FunctionDefinition $function
     */
    public function __construct(string $type, FunctionDefinition $function)
    {
        $this->type = $type;
        $this->function = $function;
    }

    /**
     * 获取工具类型
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * 设置工具类型
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * 获取工具列表
     * @return FunctionDefinition
     */
    public function getFunction(): FunctionDefinition
    {
        return $this->function;
    }

    /**
     * 设置工具列表
     * @param FunctionDefinition $function
     */
    public function setFunction(FunctionDefinition $function): void
    {
        $this->function = $function;
    }


    public function toJson(): bool|string
    {
        return json_encode([
            'type' => $this->type,
            'function' => $this->function->toArray(), // 假设 FunctionDefinition 类有 toArray 方法
        ], JSON_UNESCAPED_UNICODE);
    }
}
