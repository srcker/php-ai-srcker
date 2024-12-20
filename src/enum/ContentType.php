<?php
/**
 * @project php-ai-srcker
 * @class   ContentType
 * @author  Sinda
 * @email   sinda@srcker.com
 * @time    2024/12/19 下午7:14
 */

namespace srcker\openai\enum;
enum ContentType: string
{
    case JSON = 'application/json';
    case MULTIPART = 'multipart/form-data';
    case TEXT_PLAIN = 'text/plain';
}