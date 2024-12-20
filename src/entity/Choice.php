<?php
/**
 * @project php-ai-srcker
 * @class   Choice
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/18 下午2:45
 */

namespace srcker\openai\entity;

class Choice
{
    // 当前元素在 `choices` 列表的索引
    private int $index;
    // 模型停止生成token的原因
    private string $finishReason;
    // 模型输出的内容
    private ChatMessage $message;
    // 当前内容的对数概率信息
    private ChoiceLogprobs $logprobs;

    /**
     * 获取当前元素的索引
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * 设置当前元素的索引
     * @param int $index
     */
    public function setIndex(int $index): void
    {
        $this->index = $index;
    }

    /**
     * 获取模型停止生成的原因
     * @return string
     */
    public function getFinishReason(): string
    {
        return $this->finishReason;
    }

    /**
     * 设置模型停止生成的原因
     * @param string $finishReason
     */
    public function setFinishReason(string $finishReason): void
    {
        $this->finishReason = $finishReason;
    }

    /**
     * 获取模型输出的内容
     * @return ChatMessage
     */
    public function getMessage(): ChatMessage
    {
        return $this->message;
    }

    /**
     * 设置模型输出的内容
     * @param ChatMessage $message
     */
    public function setMessage(ChatMessage $message): void
    {
        $this->message = $message;
    }

    /**
     * 获取当前内容的对数概率信息
     * @return ChoiceLogprobs
     */
    public function getLogprobs(): ChoiceLogprobs
    {
        return $this->logprobs;
    }

    /**
     * 设置当前内容的对数概率信息
     * @param ChoiceLogprobs $logprobs
     */
    public function setLogprobs(ChoiceLogprobs $logprobs): void
    {
        $this->logprobs = $logprobs;
    }

    /**
     * 将对象转换为数组形式
     * @return array
     */
    public function toArray(): array
    {
        return [
            'index' => $this->index,
            'finishReason' => $this->finishReason,
            'message' => $this->message->toArray(), // 假设 Message 类有 toArray 方法
            'logprobs' => $this->logprobs->toArray(), // 假设 ChoiceLogprobs 类有 toArray 方法
        ];
    }
}
