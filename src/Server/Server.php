<?php

namespace Laraver\Eleme\Server;

use Exception;

class Server
{
    private $secret;

    public function __construct($secret)
    {
        $this->secret = $secret;
    }

    /**
     * 监听饿了么消息推送.
     *
     * @return mixed|null
     */
    public function serve()
    {
        $content = file_get_contents('php://input');

        if (!$content) {
            return false;
        }

        $message = $this->convertMessage($content);

        $this->checkSignature($message);

        return $message;
    }

    private function convertMessage($content)
    {
        try {
            $message = json_decode($content, true, 512, JSON_BIGINT_AS_STRING);
        } catch (Exception $e) {
            throw new Exception('convert content to message error.');
        }

        return $message;
    }

    /**
     * 检查签名合法性.
     *
     * @param $message
     *
     * @throws Exception
     *
     * @return bool
     */
    private function checkSignature($message)
    {
        $signature = $message['signature'];

        unset($message['signature']);

        if ($signature != $this->getSignature($message)) {
            throw new Exception('invalid signature');
        }

        return true;
    }

    /**
     * 根据参数获取签名.
     *
     * @param $param
     *
     * @return string
     */
    private function getSignature($param)
    {
        ksort($param);
        $string = '';

        foreach ($param as $key => $value) {
            $string .= $key.'='.$value;
        }

        return strtoupper(md5($string.$this->secret));
    }
}
