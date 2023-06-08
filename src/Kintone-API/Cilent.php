<?php

/**
 * kintone REST API Client
 *
 * @category Client
 * @package  SoftSteps/KintoneAPI
 */

namespace SoftSteps\KintoneAPI;

use SoftSteps\KintoneAPI\HttpClient\HttpClient;

/**
 * REST API Client class.
 *
 * @package SoftSteps\KintoneAPI
 */
class Client
{
    /**
     * kintone REST API Client version.
     */
    public const VERSION = '1.0.0';

    /**
     * HttpClient instance.
     *
     * @var HttpClient
     */
    public $http;

    /**
     * Initialize client.
     *
     * @param string $host       kintone Host.
     * @param string $aap_id    APP ID.
     * @param string $api_token API token.
     * @param array  $options   Options.php (version, timeout, verify_ssl, oauth_only).
     */
    public function __construct($host, $aap_id, $api_token, $options = [])
    {
        $this->http = new HttpClient($host, $aap_id, $api_token, $options);
    }

    /**
     * POST method.
     *
     * @param string $endpoint API endpoint.
     * @param array  $data     Request data.
     *
     * @return \stdClass
     */
    public function post($endpoint, $data)
    {
        return $this->http->request($endpoint, 'POST', $data);
    }

    /**
     * PUT method.
     *
     * @param string $endpoint API endpoint.
     * @param array  $data     Request data.
     *
     * @return \stdClass
     */
    public function put($endpoint, $data)
    {
        return $this->http->request($endpoint, 'PUT', $data);
    }

    /**
     * GET method.
     *
     * @param string $endpoint   API endpoint.
     * @param array  $parameters Request parameters.
     *
     * @return \stdClass
     */
    public function get($endpoint, $parameters = [])
    {
        return $this->http->request($endpoint, 'GET', [], $parameters);
    }

    /**
     * DELETE method.
     *
     * @param string $endpoint   API endpoint.
     * @param array  $parameters Request parameters.
     *
     * @return \stdClass
     */
    public function delete($endpoint, $parameters = [])
    {
        return $this->http->request($endpoint, 'DELETE', [], $parameters);
    }

    /**
     * OPTIONS method.
     *
     * @param string $endpoint API endpoint.
     *
     * @return \stdClass
     */
    public function options($endpoint)
    {
        return $this->http->request($endpoint, 'OPTIONS', [], []);
    }
}