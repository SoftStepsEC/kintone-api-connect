<?php
/**
 * Basic Authentication
 *
 * @category HttpClient
 * @package  SoftSteps/KintoneAPI
 */

namespace SoftSteps\KintoneAPI\HttpClient;

/**
 * API Authentication class.
 *
 * @package SoftSteps/KintoneAPI
 */
class APIAuth
{
    /**
     * cURL handle.
     *
     * @var resource
     */
    protected $ch;

    /**
     * api token.
     *
     * @var string
     */
    protected $api_token;

    /**
     * Do query string auth.
     *
     * @var bool
     */
    protected $doQueryString;

    /**
     * Request parameters.
     *
     * @var array
     */
    protected $parameters;

    /**
     * Initialize Basic Authentication class.
     *
     * @param resource $ch             cURL handle.
     * @param string   $api_token      API token.
     * @param bool     $doQueryString  Do or not query string auth.
     * @param array    $parameters     Request parameters.
     */
    public function __construct($ch, $api_token, $doQueryString, $parameters = [])
    {
        $this->ch             = $ch;
        $this->api_token      = $api_token;
        $this->doQueryString  = $doQueryString;
        $this->parameters     = $parameters;

        $this->processAuth();
    }

    /**
     * Process auth.
     */
    protected function processAuth()
    {
        if ($this->doQueryString) {
            $this->parameters['api_token']    = $this->api_token;
        } else {
            \curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('X-Cybozu-API-Token: '.$this->api_token, 'Content-Type: application/json'));
        }
    }

    /**
     * Get parameters.
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
