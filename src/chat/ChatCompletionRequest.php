<?php

namespace srcker\ai\chat;
use srcker\ai\entity\Message;

/**
 * @project php-ai-srcker
 * @class   ChatCompletionRequest
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/18 下午3:28
 */
class ChatCompletionRequest
{
    // 您创建的推理接入点 ID
    private string $model;
    // 由目前为止的对话组成的消息列表
    /** @var Message[] */
    private array $messages = [];
    // 响应内容是否流式返回
    private bool $stream = false;
    // 流式响应的选项。仅当 `stream: true` 时可以设置 `stream_options` 参数。
    private array $streamOptions = [];
    // 模型回复最大长度（单位 token），取值范围为 [0, 4096]
    private int $maxTokens = 4096;
    // 模型遇到 `stop` 字段所指定的字符串时将停止继续生成，这个词语本身不会输出。最多支持 4 个字符串。
    private $stop;
    // 频率惩罚系数。如果值为正，会根据新 token 在文本中的出现频率对其进行惩罚，从而降低模型逐字重复的可能性。取值范围为 [-2.0, 2.0]。
    private float $frequencyPenalty = 0;
    // 存在惩罚系数。如果值为正，会根据新 token 到目前为止是否出现在文本中对其进行惩罚，从而增加模型谈论新主题的可能性。取值范围为 [-2.0, 2.0]。
    private float $presencePenalty = 0;
    // 采样温度。控制了生成文本时对每个候选词的概率分布进行平滑的程度。取值范围为 [0, 1]。
    private float $temperature = 1;
    // 核采样概率阈值。模型会考虑概率质量在 `top_p` 内的 token 结果。取值范围为 [0, 1]。
    private float $topP = 0.7;
    // 是否返回输出 tokens 的对数概率。
    private bool $logprobs = false;
    // 指定每个输出 token 位置最有可能返回的 token 数量，每个 token 都有关联的对数概率。仅当 `logprobs: true` 时可以设置 `top_logprobs` 参数，取值范围为 [0, 20]。
    private int $topLogprobs = 0;
    // 调整指定 token 在模型输出内容中出现的概率，使模型生成的内容更加符合特定的偏好。
    private array $logitBias = [];
    // 模型可以调用的工具列表。目前，仅函数作为工具被支持。
    private array $tools = [];

    /**
     * 获取model属性
     *
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * 设置model属性，并返回当前对象方便链式调用
     *
     * @param string $model 您创建的[推理接入点] ID
     * @return ChatCompletionRequest 当前对象
     */
    public function setModel(string $model): ChatCompletionRequest
    {
        $this->model = $model;
        return $this;
    }

    /**
     * 获取messages属性
     *
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * 设置messages属性，并返回当前对象方便链式调用
     *
     * @param array $messages 由目前为止的对话组成的消息列表
     * @return ChatCompletionRequest 当前对象
     */
    public function addMessage(array $messages): ChatCompletionRequest
    {
        $this->messages[] = $messages;
        return $this;
    }

    /**
     * 获取stream属性
     *
     * @return bool
     */
    public function getStream(): bool
    {
        return $this->stream;
    }

    /**
     * 设置stream属性，并返回当前对象方便链式调用
     *
     * @param bool $stream 响应内容是否流式返回
     * @return ChatCompletionRequest 当前对象
     */
    public function setStream(bool $stream): ChatCompletionRequest
    {
        $this->stream = $stream;
        return $this;
    }

    /**
     * 获取streamOptions属性
     *
     * @return array
     */
    public function getStreamOptions(): array
    {
        return $this->streamOptions;
    }

    /**
     * 设置streamOptions属性，并返回当前对象方便链式调用
     *
     * @param array $streamOptions 流式响应的选项
     * @return ChatCompletionRequest 当前对象
     */
    public function setStreamOptions(array $streamOptions): ChatCompletionRequest
    {
        $this->streamOptions = $streamOptions;
        return $this;
    }

    /**
     * 获取maxTokens属性
     *
     * @return int
     */
    public function getMaxTokens(): int
    {
        return $this->maxTokens;
    }

    /**
     * 设置maxTokens属性，并返回当前对象方便链式调用
     *
     * @param int $maxTokens 模型回复最大长度（单位 token）
     * @return ChatCompletionRequest 当前对象
     */
    public function setMaxTokens(int $maxTokens): ChatCompletionRequest
    {
        $this->maxTokens = $maxTokens;
        return $this;
    }

    /**
     * 获取stop属性
     *
     * @return mixed
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * 设置stop属性，并返回当前对象方便链式调用
     *
     * @param mixed $stop 模型停止生成的指定字符串
     * @return ChatCompletionRequest 当前对象
     */
    public function setStop($stop): ChatCompletionRequest
    {
        $this->stop = $stop;
        return $this;
    }

    /**
     * 获取frequencyPenalty属性
     *
     * @return float
     */
    public function getFrequencyPenalty(): float
    {
        return $this->frequencyPenalty;
    }

    /**
     * 设置frequencyPenalty属性，并返回当前对象方便链式调用
     *
     * @param float $frequencyPenalty 频率惩罚系数
     * @return ChatCompletionRequest 当前对象
     */
    public function setFrequencyPenalty(float $frequencyPenalty): ChatCompletionRequest
    {
        $this->frequencyPenalty = $frequencyPenalty;
        return $this;
    }

    /**
     * 获取presencePenalty属性
     *
     * @return float
     */
    public function getPresencePenalty(): float
    {
        return $this->presencePenalty;
    }

    /**
     * 设置presencePenalty属性，并返回当前对象方便链式调用
     *
     * @param float $presencePenalty 存在惩罚系数
     * @return ChatCompletionRequest 当前对象
     */
    public function setPresencePenalty(float $presencePenalty): ChatCompletionRequest
    {
        $this->presencePenalty = $presencePenalty;
        return $this;
    }

    /**
     * 获取temperature属性
     *
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * 设置temperature属性，并返回当前对象方便链式调用
     *
     * @param float $temperature 采样温度
     * @return ChatCompletionRequest 当前对象
     */
    public function setTemperature(float $temperature): ChatCompletionRequest
    {
        $this->temperature = $temperature;
        return $this;
    }

    /**
     * 获取topP属性
     *
     * @return float
     */
    public function getTopP(): float
    {
        return $this->topP;
    }

    /**
     * 设置topP属性，并返回当前对象方便链式调用
     *
     * @param float $topP 核采样概率阈值
     * @return ChatCompletionRequest 当前对象
     */
    public function setTopP(float $topP): ChatCompletionRequest
    {
        $this->topP = $topP;
        return $this;
    }

    /**
     * 获取logprobs属性
     *
     * @return bool
     */
    public function getLogprobs(): bool
    {
        return $this->logprobs;
    }

    /**
     * 设置logprobs属性，并返回当前对象方便链式调用
     *
     * @param bool $logprobs 是否返回输出 tokens 的对数概率
     * @return ChatCompletionRequest 当前对象
     */
    public function setLogprobs(bool $logprobs): ChatCompletionRequest
    {
        $this->logprobs = $logprobs;
        return $this;
    }

    /**
     * 获取topLogprobs属性
     *
     * @return int
     */
    public function getTopLogprobs(): int
    {
        return $this->topLogprobs;
    }

    /**
     * 设置topLogprobs属性，并返回当前对象方便链式调用
     *
     * @param int $topLogprobs 指定每个输出 token 位置最有可能返回的 token 数量
     * @return ChatCompletionRequest 当前对象
     */
    public function setTopLogprobs(int $topLogprobs): ChatCompletionRequest
    {
        $this->topLogprobs = $topLogprobs;
        return $this;
    }

    /**
     * 获取logitBias属性
     *
     * @return array
     */
    public function getLogitBias(): array
    {
        return $this->logitBias;
    }

    /**
     * 设置logitBias属性，并返回当前对象方便链式调用
     *
     * @param array $logitBias 调整指定 token 出现概率的配置
     * @return ChatCompletionRequest 当前对象
     */
    public function setLogitBias(array $logitBias): ChatCompletionRequest
    {
        $this->logitBias = $logitBias;
        return $this;
    }

    /**
     * 获取tools属性
     *
     * @return array
     */
    public function getTools(): array
    {
        return $this->tools;
    }

    /**
     * 设置tools属性，并返回当前对象方便链式调用
     *
     * @param array $tools 模型可以调用的工具列表
     * @return ChatCompletionRequest 当前对象
     */
    public function setTools(array $tools): ChatCompletionRequest
    {
        $this->tools = $tools;
        return $this;
    }

    /**
     * 将ChatCompletionRequest对象的属性转换为数组形式返回，若属性值为空则不添加到返回数组中
     *
     * @return array
     */
    public function toArray(): array
    {
        $result = [];

        if (!empty($this->model)) {
            $result['model'] = $this->model;
        }
        if (!empty($this->messages)) {
            $result['messages'] = $this->messages;
        }
        if ($this->stream!== false) {
            $result['stream'] = $this->stream;
        }
        if (!empty($this->streamOptions)) {
            $result['stream_options'] = $this->streamOptions;
        }
        if ($this->maxTokens!== 4096) {
            $result['max_tokens'] = $this->maxTokens;
        }
        if (!empty($this->stop)) {
            $result['stop'] = $this->stop;
        }
        if ($this->frequencyPenalty!== 0) {
            $result['frequency_penalty'] = $this->frequencyPenalty;
        }
        if ($this->presencePenalty!== 0) {
            $result['presence_penalty'] = $this->presencePenalty;
        }
        if ($this->temperature!== 1) {
            $result['temperature'] = $this->temperature;
        }
        if ($this->topP!== 0.7) {
            $result['top_p'] = $this->topP;
        }
        if ($this->logprobs!== false) {
            $result['logprobs'] = $this->logprobs;
        }
        if ($this->topLogprobs!== 0) {
            $result['top_logprobs'] = $this->topLogprobs;
        }
        if (!empty($this->logitBias)) {
            $result['logit_bias'] = $this->logitBias;
        }
        if (!empty($this->tools)) {
            $result['tools'] = $this->tools;
        }

        return $result;
    }


    /**
     * 将ChatCompletionRequest对象的属性转换为数组形式返回，若属性值为空则不添加到返回数组中
     *
     * @return string
     */
    public function toJson(): string
    {
        $result = [];

        if (!empty($this->model)) {
            $result['model'] = $this->model;
        }
        if (!empty($this->messages)) {
            $result['messages'] = $this->messages;
        }
        if ($this->stream!== false) {
            $result['stream'] = $this->stream;
        }
        if (!empty($this->streamOptions)) {
            $result['stream_options'] = $this->streamOptions;
        }
        if ($this->maxTokens!== 4096) {
            $result['max_tokens'] = $this->maxTokens;
        }
        if (!empty($this->stop)) {
            $result['stop'] = $this->stop;
        }
        if ($this->frequencyPenalty!== 0) {
            $result['frequency_penalty'] = $this->frequencyPenalty;
        }
        if ($this->presencePenalty!== 0) {
            $result['presence_penalty'] = $this->presencePenalty;
        }
        if ($this->temperature!== 1) {
            $result['temperature'] = $this->temperature;
        }
        if ($this->topP!== 0.7) {
            $result['top_p'] = $this->topP;
        }
        if ($this->logprobs!== false) {
            $result['logprobs'] = $this->logprobs;
        }
        if ($this->topLogprobs!== 0) {
            $result['top_logprobs'] = $this->topLogprobs;
        }
        if (!empty($this->logitBias)) {
            $result['logit_bias'] = $this->logitBias;
        }
        if (!empty($this->tools)) {
            $result['tools'] = $this->tools;
        }

        return json_encode($result,JSON_UNESCAPED_UNICODE);
    }


}