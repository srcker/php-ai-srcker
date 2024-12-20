<?php
/**
 * @project php-ai-srcker
 * @class   Method
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/19 下午7:14
 */

namespace srcker\openai\enum;

enum Method: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';

}