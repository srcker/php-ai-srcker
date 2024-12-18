<?php
/**
 * @project php-ai-srcker
 * @class   MessageToolCallParam
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/18 下午2:32
 */

namespace srcker\ai\entity;


class MessageToolCallParam
{
    // 当前工具调用 ID
    private string $id;
    // 工具类型，当前仅支持`function`
    private string $type;
    // 模型需要调用的函数相关信息
    private FunctionParam $function;

    /**
     * 设置id属性，并返回当前对象方便链式调用
     *
     * @param string $id 当前工具调用 ID
     * @return MessageToolCallParam 当前对象
     */
    public function setId(string $id): MessageToolCallParam
    {
        $this->id = $id;
        return $this;
    }

    /**
     * 设置type属性，并返回当前对象方便链式调用
     *
     * @param string $type 工具类型
     * @return MessageToolCallParam 当前对象
     */
    public function setType(string $type): MessageToolCallParam
    {
        $this->type = $type;
        return $this;
    }

    /**
     * 设置function属性，并返回当前对象方便链式调用
     *
     * @param FunctionParam $function 模型需要调用的函数相关信息
     * @return MessageToolCallParam 当前对象
     */
    public function setFunction(FunctionParam $function): MessageToolCallParam
    {
        $this->function = $function;
        return $this;
    }
}