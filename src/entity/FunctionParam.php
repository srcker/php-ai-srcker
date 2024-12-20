<?php
/**
 * @project php-ai-srcker
 * @class   FunctionParam
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/18 下午4:00
 */

namespace srcker\openai\entity;

class FunctionParam
{
    private string $name;
    private string $arguments;

    /**
     * 构造方法，可用于初始化对象时传入必要参数
     *
     * @param string $name 模型需要调用的函数名称
     * @param string $arguments 模型生成的用于调用函数的参数（JSON格式）
     */
    public function __construct(string $name, string $arguments)
    {
        $this->name = $name;
        $this->arguments = $arguments;
    }

    /**
     * 获取函数名称属性
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 设置函数名称属性，并返回当前对象方便链式调用
     *
     * @param string $name 模型需要调用的函数名称
     * @return FunctionParam 当前对象
     */
    public function setName(string $name): FunctionParam
    {
        $this->name = $name;
        return $this;
    }

    /**
     * 获取函数参数属性（JSON格式字符串）
     *
     * @return string
     */
    public function getArguments(): string
    {
        return $this->arguments;
    }

    /**
     * 设置函数参数属性（JSON格式字符串），并返回当前对象方便链式调用
     *
     * @param string $arguments 模型生成的用于调用函数的参数（JSON格式）
     * @return FunctionParam 当前对象
     */
    public function setArguments(string $arguments): FunctionParam
    {
        $this->arguments = $arguments;
        return $this;
    }
}