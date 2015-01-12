<?php

namespace JiraConnectBundle\Utils;

use Guzzle\Http\Client;
use Guzzle\Http\Exception\BadResponseException;

/**
 * Service class that handles projects.
 */
class ProjectService extends AbstractService
{
    /**
     * Method to retrieve all projects.
     * 
     * @return boolean|array
     */
    public function getAllUsingGuzzle()
    {
        return $this->performQuery(
            $this->createUrl('project')
        );
    }
}
