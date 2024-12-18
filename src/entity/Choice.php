<?php
/**
 * @project php-ai-srcker
 * @class   Choice
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/18 下午2:45
 */

namespace srcker\ai\entity;

class Choice
{
    // 当前元素在 `choices` 列表的索引
    private int $index;
    // 模型停止生成token的原因
    private string $finishReason;
    // 模型输出的内容
    private Message $message;
    // 当前内容的对数概率信息
    private ChoiceLogprobs $logprobs;

    /**
     * 设置index属性，并返回当前对象方便链式调用
     *
     * @param int $index 当前元素在 `choices` 列表的索引
     * @return Choice 当前对象
     */
    public function setIndex(int $index): Choice
    {
        $this->index = $index;
        return $this;
    }

    /**
     * 设置finishReason属性，并返回当前对象方便链式调用
     *
     * @param string $finishReason 模型停止生成token的原因
     * @return Choice 当前对象
     */
    public function setFinishReason(string $finishReason): Choice
    {
        $this->finishReason = $finishReason;
        return $this;
    }

    /**
     * 设置message属性，并返回当前对象方便链式调用
     *
     * @param Message $message 模型输出的内容
     * @return Choice 当前对象
     */
    public function setMessage(Message $message): Choice
    {
        $this->message = $message;
        return $this;
    }

    /**
     * 设置logprobs属性，并返回当前对象方便链式调用
     *
     * @param ChoiceLogprobs $logprobs 当前内容的对数概率信息
     * @return Choice 当前对象
     */
    public function setLogprobs(ChoiceLogprobs $logprobs): Choice
    {
        $this->logprobs = $logprobs;
        return $this;
    }
}