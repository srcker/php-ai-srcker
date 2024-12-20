<?php
/**
 * @project php-ai-srcker
 * @class   Message
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/17 下午11:34
 */
namespace srcker\openai\entity;

use srcker\openai\enum\Role;

/**
 * 消息类，用于表示对话中的一条消息。
 */
class ChatMessage implements \JsonSerializable
{
    /**
     * @var Role 消息角色，表示该消息的发送者角色
     */
    private Role $role;

    /**
     * @var string|array 消息内容，可以是单条消息内容或多条消息内容的数组
     */
    private string|array $content;

    /**
     * @var array<MessageToolCallParam>|null 工具调用列表，仅当角色为 assistant 时有效
     */
    private ?array $tool_calls = null;

    /**
     * Message constructor.
     *
     * @param Role $role 消息角色
     * @param string|array $content 消息内容，可以是单条消息或者多个消息内容
     * @param array|null $tool_calls 工具调用列表，角色为 assistant 时有效
     */
    public function __construct(Role $role, string|array $content, ?array $tool_calls = null)
    {
        $this->role = $role;
        $this->content = $content;
        $this->tool_calls = $tool_calls;
    }

    /**
     * 获取消息角色
     *
     * @return Role 消息的角色
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * 设置消息角色
     *
     * @param Role $role 消息的角色
     */
    public function setRole(Role $role): static
    {
        $this->role = $role;
        return $this;
    }

    /**
     * 获取消息内容
     *
     * @return string|array 消息的内容，可以是字符串或字符串数组
     */
    public function getContent(): string|array
    {
        return $this->content;
    }

    /**
     * 设置消息内容
     *
     * @param string|array $content 消息内容，可以是字符串或字符串数组
     */
    public function setContent(string|array $content): static
    {
        $this->content = $content;
        return $this;
    }

    /**
     * 获取工具调用列表
     *
     * @return array|null 工具调用列表，仅当角色为 assistant 时有效
     */
    public function getToolCalls(): ?array
    {
        return $this->tool_calls;
    }

    /**
     * 设置工具调用列表
     *
     * @param array|null $tool_calls 工具调用列表，仅当角色为 assistant 时有效
     */
    public function setToolCalls(?array $tool_calls): static
    {
        $this->tool_calls = $tool_calls;
        return $this;
    }

    /**
     * 转换为数组格式，以便用于 API 请求
     *
     * @return array 返回格式化后的数组，适用于 API 请求
     */
    public function toArray(): array
    {
        $data = [
            'role' => $this->role->value,
            'content' => $this->content,
        ];

        // 如果是 assistant 角色且有工具调用，则加入 tool_calls 字段
        if ($this->role === Role::ASSISTANT && $this->tool_calls) {
            $data['tool_calls'] = $this->tool_calls;
        }

        return $data;
    }


    public function jsonSerialize(): array
    {
        $data = [
            'role' => $this->role->value,
            'content' => $this->content,
        ];

        // 如果是 assistant 角色且有工具调用，则加入 tool_calls 字段
        if ($this->role === Role::ASSISTANT && $this->tool_calls) {
            $data['tool_calls'] = $this->tool_calls;
        }

        return $data;
    }

    public function toJson(): string
    {
        return json_encode($this->jsonSerialize(), JSON_UNESCAPED_UNICODE);
    }

}