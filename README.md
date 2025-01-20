# srcker-open-ai




```php
       $chatCompletionRequest = new ChatCompletionRequest();

        $chatCompletionRequest
            ->setModel("ep-20241220124901-pc5gs")
            ->addMessage(new ChatMessage(Role::USER, '介绍下自己'));

        $result = $this->factory
            ->withApiKey("****-6904-***-ba03-**")
            ->withBaseUrl("https://ark.cn-beijing.volces.com/api/v3/chat/completions")
            ->withHttpHeader("Content-Type", "application/json")
            ->withOptions([])
            ->withProxy($this->proxy) //格式: "http://user:password@host:port"
            ->withChatCompletionRequest($chatCompletionRequest)
            ->make();

        print_r($result);

```

```php

        $chatCompletionRequest = new ChatCompletionRequest();

        $chatCompletionRequest
            ->setModel("ep-20241220124901-pc5gs")
            ->addMessage(new ChatMessage(Role::USER, '介绍下自己'));

        $this->factory
            ->withApiKey("****-333-****-ba03-***")
            ->withBaseUrl("https://ark.cn-beijing.volces.com/api/v3/chat/completions")
            ->withHttpHeader("Content-Type", "application/json")
            ->withOptions([])
            ->withProxy($this->proxy) //格式: "http://user:password@host:port"
            ->withChatCompletionRequest($chatCompletionRequest)
            ->withStreamHandler(function ($chunk) {
                echo $chunk;
            })
            ->makeStreamHandler();

```