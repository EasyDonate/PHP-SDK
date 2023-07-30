<?php namespace EasyDonate\Managers;

use EasyDonate\Exceptions\BadRequestCallException;

class RequestManager
{
    protected $url;
    protected $key;

    public function __construct(string $key, string $version)
    {
        $this->url = "https://easydonate.ru/api/v{$version}/shop";
        $this->key = $key;
    }

    public function get(string $urn, array $params = [])
    {
        $query = '';
        if ($params) {
            $query = '?' . http_build_query($params);
        }

        $curl = curl_init("{$this->url}/{$urn}{$query}");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Shop-key: ' . $this->key,
            'Accept: application/json',
            'Content-Type: application/json',
            'User-Agent: EasyDonate/PHP-SDK'
        ]);

        $request = json_decode(curl_exec($curl));
        curl_close($curl);

        if (!is_object($request) || !isset($request->success, $request->response)) {
            return false;
        }

        if ($request->success) {
            return $request->response;
        }

        return null;
    }
}
