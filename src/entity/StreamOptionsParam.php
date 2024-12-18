<?php
/**
 * @project php-ai-srcker
 * @class   StreamOptionsParam
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/18 下午2:45
 */

namespace srcker\ai\entity;

class StreamOptionsParam
{
    // 是否包含本次请求的token用量统计信息
    private bool $includeUsage = false;

    /**
     * 设置includeUsage属性，并返回当前对象方便链式调用
     *
     * @param bool $includeUsage 是否包含token用量统计信息
     * @return StreamOptionsParam 当前对象
     */
    public function setIncludeUsage(bool $includeUsage): StreamOptionsParam
    {
        $this->includeUsage = $includeUsage;
        return $this;
    }
}