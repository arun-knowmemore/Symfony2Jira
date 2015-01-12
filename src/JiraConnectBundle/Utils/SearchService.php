<?php

namespace JiraConnectBundle\Utils;

use Guzzle\Http\Client;
use Guzzle\Http\Exception\BadResponseException;

/**
 * Service class that handles searches.
 */
class SearchService extends AbstractPagedService
{
	/**
     * Search for issues using PHP curl
     * 
     * @param array $params
     * 
     * @return boolean|array
     */
    public function search(array $params = array())
    {
    	try {
			$ch = curl_init();
			$url = $this->get('connect_jira.url') . 'search';
			curl_setopt($ch,CURLOPT_URL,$this->createUrl($url, $params);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch,CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_POST, false);
			$apiresponse = curl_exec($ch);
 
			curl_close($ch);
			return $apiresponse;
		}
		catch (Exception $ex)
		{
			return false;
		}
    }
    
    /**
     * Search for issues using Guzzle bundle
     * 
     * @param array $params
     * 
     * @return boolean|array
     */
    public function searchUsingGuzzle(array $params = array())
    {
        return $this->performQuery(
            $this->createUrl('search', $params)
        );
    }
}
