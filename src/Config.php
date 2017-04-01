<?php

namespace Abraham\TwitterOAuth;

class Config
{
    protected $timeout = 5;
    protected $connectionTimeout = 5;
    protected $decodeJsonAsArray = false;
    protected $userAgent = 'TwitterOAuth (+https://twitteroauth.com)';
    protected $proxy = [];
    protected $gzipEncoding = true;
    public function setTimeouts($connectionTimeout, $timeout)
    {
        $this->connectionTimeout = (int)$connectionTimeout;
        $this->timeout = (int)$timeout;
    }
    public function setDecodeJsonAsArray($value)
    {
        $this->decodeJsonAsArray = (bool)$value;
    }
    public function setUserAgent($userAgent)
    {
        $this->userAgent = (string)$userAgent;
    }
    public function setProxy(array $proxy)
    {
        $this->proxy = $proxy;
    }
    public function setGzipEncoding($gzipEncoding)
    {
        $this->gzipEncoding = (bool)$gzipEncoding;
    }
}
