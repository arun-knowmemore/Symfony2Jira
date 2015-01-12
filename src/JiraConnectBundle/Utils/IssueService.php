<?php

namespace JiraConnectBundle\Utils;

use Guzzle\Http\Client;
use Guzzle\Http\Exception\BadResponseException;
use Guzzle\Http\Exception\ClientErrorResponseException;

/**
 * Service class that manages issues.
 */
class IssueService extends AbstractService
{
	/**
	 * Retrieve details for a specific issue
	 * 
	 * @param string $key
	 * 
	 * @return array|bool
	 */
	public function get($key, $params = array())
	{
		try {
			$ch = curl_init();
			$url = $this->get('connect_jira.url') . sprintf('issue/%s', $key);
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
     * Retrieve details for a specific issue using Guzzle bundle
     * 
     * @param string $key
     * 
     * @return array|bool
     */
    public function getUsingGuzzle($key, $params = array())
    {
        try{
            return $this->performQuery(
                $this->createUrl(
                    sprintf('issue/%s', $key),
                    $params
                )
            );
        } 
        catch (ClientErrorResponseException $ex) {
        	
            return false;
        }
    }
}
