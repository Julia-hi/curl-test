<?php

namespace app\Data;

/**
 *
 * Class GetData
 * This class defines the data of user, object of URL and result obtained from the web page.
 */
class GetData
{
    /**
     * URL of resourse for get data of persons
     *
     * @var string
     */
    private $_urlCall;

    /**
     * Result obtained from the page
     *
     * @var string
     */
    private $_callResult;

    /**
     * Constructor for GetData
     *
     * @param string
     */
    public function __construct(string $url)
    {
        $this->_urlCall = $url;
        $this->_callResult = $this->getDataFromCurl($url);
    }

    /**
     * Setter for URL
     *
     * @param string
     */
    private function setUrl(string $url)
    {
        $this->_urlCall = $url;
    }

    public function getUrl()
    {
        return $this->_urlCall;
    }

    /**
     * Getter for stored result obtained from the page
     *
     * @return string _callResult
     */
    public function getCallResult()
    {
        return $this->_callResult;
    }

     /**
     * Method for obtain response from the page using library CURL
     *
     * @return string output
     */
    private function getDataFromCurl()
    {
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $this->getUrl());

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        curl_close($ch);
        return $output;
    }

}
