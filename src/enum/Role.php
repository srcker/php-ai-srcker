<?php
namespace srcker\ai\entity;
/**
 * @project php-ai-srcker
 * @class   Role
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/17 下午11:32
 */

/**
 * 消息角色枚举类
 *
 * 该枚举类定义了消息角色的不同类型，用于标识对话参与者的身份。
 */
enum Role: string
{
    /**
     * 系统消息角色
     *
     * 系统消息用于初始化对话或提供系统层面的指令。
     * 例如：设置助手的行为或设定对话的上下文。
     */
    case SYSTEM = 'system';

    /**
     * 用户消息角色
     *
     * 用户消息由用户发送，用于启动对话或向模型提问。
     * 例如：用户发送的问题或请求。
     */
    case USER = 'user';

    /**
     * 对话助手消息角色
     *
     * 对话助手消息由模型生成，回应用户的消息或请求。
     * 例如：模型生成的回答。
     */
    case ASSISTANT = 'assistant';

    /**
     * 工具调用消息角色
     *
     * 工具消息由模型生成，用于调用外部工具或函数执行任务。
     * 例如：模型请求天气信息时，调用外部API获取数据。
     */
    case TOOL = 'tool';

    /**
     * 获取所有角色的枚举值
     *
     * @return string[]
     */
    public static function getAllRoles(): array
    {
        return [
            self::SYSTEM->value,
            self::USER->value,
            self::ASSISTANT->value,
            self::TOOL->value,
        ];
    }
}