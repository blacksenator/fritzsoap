<?php

namespace blacksenator\fritzsoap;

/**
 * The class provides functions to read and manipulate data via SOAP interface
 * on FRITZ!Box router from AVM.
 * No specific documentation available! As of FRITZ!OS 7.50, control services
 * can no longer be found in the description files
 *
 * @see: https://avm.de/service/schnittstellen/
 *
 * +++++++++++++++++++++ ATTENTION +++++++++++++++++++++
 * THIS FILE IS AUTOMATIC ASSEMBLED!
 * ALL FUNCTIONS ARE FRAMEWORKS AND HAVE TO BE CORRECTLY
 * CODED, IF THEIR COMMENT WAS NOT OVERWRITTEN!
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 * @author Volker Püschel <knuffy@anasco.de>
 * @copyright Volker Püschel 2019 - 2025
 * @license MIT
**/

use blacksenator\fritzsoap\fritzsoap;

class Control_2 extends fritzsoap
{
    const
        SERVICE_TYPE = 'urn:schemas-upnp-org:service:ContentDirectory:1',
        CONTROL_URL  = '/MediaServer/ContentDirectory/Control';

    /**
     * getSearchCapabilities
     *
     * automatically generated; complete coding if necessary!
     *
     * out: SearchCaps (string)
     *
     * @return string
     */
    public function getSearchCapabilities()
    {
        $result = $this->client->GetSearchCapabilities();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSortCapabilities
     *
     * automatically generated; complete coding if necessary!
     *
     * out: SortCaps (string)
     *
     * @return string
     */
    public function getSortCapabilities()
    {
        $result = $this->client->GetSortCapabilities();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * getSystemUpdateID
     *
     * automatically generated; complete coding if necessary!
     *
     * out: Id (ui4)
     *
     * @return int
     */
    public function getSystemUpdateID()
    {
        $result = $this->client->GetSystemUpdateID();
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * browse
     *
     * automatically generated; complete coding if necessary!
     *
     * in: ObjectID (string)
     * in: BrowseFlag (string)
     * in: Filter (string)
     * in: StartingIndex (ui4)
     * in: RequestedCount (ui4)
     * in: SortCriteria (string)
     * out: Result (string)
     * out: NumberReturned (ui4)
     * out: TotalMatches (ui4)
     * out: UpdateID (ui4)
     *
     * @param string $objectID
     * @param string $browseFlag
     * @param string $filter
     * @param int $startingIndex
     * @param int $requestedCount
     * @param string $sortCriteria
     * @return array
     */
    public function browse($objectID, $browseFlag, $filter, $startingIndex, $requestedCount, $sortCriteria)
    {
        $result = $this->client->Browse(
            new \SoapParam($objectID, 'ObjectID'),
            new \SoapParam($browseFlag, 'BrowseFlag'),
            new \SoapParam($filter, 'Filter'),
            new \SoapParam($startingIndex, 'StartingIndex'),
            new \SoapParam($requestedCount, 'RequestedCount'),
            new \SoapParam($sortCriteria, 'SortCriteria'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }

    /**
     * search
     *
     * automatically generated; complete coding if necessary!
     *
     * in: ContainerID (string)
     * in: SearchCriteria (string)
     * in: Filter (string)
     * in: StartingIndex (ui4)
     * in: RequestedCount (ui4)
     * in: SortCriteria (string)
     * out: Result (string)
     * out: NumberReturned (ui4)
     * out: TotalMatches (ui4)
     * out: UpdateID (ui4)
     *
     * @param string $containerID
     * @param string $searchCriteria
     * @param string $filter
     * @param int $startingIndex
     * @param int $requestedCount
     * @param string $sortCriteria
     * @return array
     */
    public function search($containerID, $searchCriteria, $filter, $startingIndex, $requestedCount, $sortCriteria)
    {
        $result = $this->client->Search(
            new \SoapParam($containerID, 'ContainerID'),
            new \SoapParam($searchCriteria, 'SearchCriteria'),
            new \SoapParam($filter, 'Filter'),
            new \SoapParam($startingIndex, 'StartingIndex'),
            new \SoapParam($requestedCount, 'RequestedCount'),
            new \SoapParam($sortCriteria, 'SortCriteria'));
        if ($this->errorHandling($result, 'Could not ... from/to FRITZ!Box')) {
            return;
        }

        return $result;
    }
}
