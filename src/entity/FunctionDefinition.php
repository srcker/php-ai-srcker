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
    // 函数请求参数，以JSON Schema格式描述
    private object $parameters;

    /**
     * 设置name属性，并返回当前对象方便链式调用
     *
     * @param string $name 函数的名称
     * @return FunctionDefinition 当前对象
     */
    public function setName(string $name): FunctionDefinition
    {
        $this->name = $name;
        return $this;
    }

    /**
     * 设置description属性，并返回当前对象方便链式调用
     *
     * @param string $description 对函数用途的描述
     * @return FunctionDefinition 当前对象
     */
    public function setDescription(string $description): FunctionDefinition
    {
        $this->description = $description;
        return $this;
    }

    /**
     * 设置parameters属性，并返回当前对象方便链式调用
     *
     * @param object $parameters 函数请求参数（JSON Schema格式）
     * @return FunctionDefinition 当前对象
     */
    public function setParameters(object $parameters): FunctionDefinition
    {
        $this->parameters = $parameters;
        return $this;
    }
}