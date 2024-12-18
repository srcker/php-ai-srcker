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
    // `message`列表中每个 `content` 元素中的token对数概率信息
    private array $content = [];

    /**
     * 设置content属性，并返回当前对象方便链式调用
     *
     * @param array $content token对数概率信息
     * @return ChoiceLogprobs 当前对象
     */
    public function setContent(array $content): ChoiceLogprobs
    {
        $this->content = $content;
        return $this;
    }
}