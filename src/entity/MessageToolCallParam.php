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

}