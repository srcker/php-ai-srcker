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
     * 设置type属性，并返回当前对象方便链式调用
     *
     * @param string $type 工具类型
     * @return ToolParam 当前对象
     */
    public function setType(string $type): ToolParam
    {
        $this->type = $type;
        return $this;
    }

    /**
     * 设置function属性，并返回当前对象方便链式调用
     *
     * @param FunctionDefinition $function 模型可以调用的工具列表（函数相关定义）
     * @return ToolParam 当前对象
     */
    public function setFunction(FunctionDefinition $function): ToolParam
    {
        $this->function = $function;
        return $this;
    }
}