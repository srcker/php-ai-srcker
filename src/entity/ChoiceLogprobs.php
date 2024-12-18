<?php
/**
 * @project php-ai-srcker
 * @class   ChoiceLogprobs
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/18 下午2:51
 */

namespace srcker\ai\entity;

class ChoiceLogprobs
{
    // `message` 列表中每个 `content` 元素中的 token 对数概率信息
    // @var array<>
    private array $content = [];

    /**
     * 构造方法
     * @param array $content
     */
    public function __construct(array $content = [])
    {
        $this->content = $content;
    }

    /**
     * 获取 content 中的 token 对数概率信息
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * 设置 content 中的 token 对数概率信息
     * @param array $content
     */
    public function setContent(array $content): void
    {
        $this->content = $content;
    }

    /**
     * 将对象转换为数组形式
     * @return array
     */
    public function toArray(): array
    {
        return [
            'content' => $this->content,
        ];
    }
}
