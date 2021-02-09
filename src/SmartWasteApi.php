<?php

namespace Blucreation\SmartWaste;

use Blucreation\SmartWaste\Base\BaseMethod;
use Blucreation\SmartWaste\Entity\SWCompany;
use Blucreation\SmartWaste\Entity\SWLabel;
use Blucreation\SmartWaste\Entity\SWProject;
use Blucreation\SmartWaste\Entity\SWSubcontractor;
use Blucreation\SmartWaste\Entity\SWWasteCarrier;
use Blucreation\SmartWaste\Entity\SWWasteDestination;
use Blucreation\SmartWaste\Entity\SWWasteItem;
use Blucreation\SmartWaste\Method\Authenticate;
use Blucreation\SmartWaste\Method\AuthenticateUser;
use Blucreation\SmartWaste\Method\GetCompanies;
use Blucreation\SmartWaste\Method\GetDefaultCompanies;
use Blucreation\SmartWaste\Method\AssignSubcontractorToProject;
use Blucreation\SmartWaste\Method\AssignWasteCarrierToProject;
use Blucreation\SmartWaste\Method\AssignWasteDestinationToProject;
use Blucreation\SmartWaste\Method\GetSubcontractorsForProject;
use Blucreation\SmartWaste\Method\GetWasteCarriersForProject;
use Blucreation\SmartWaste\Method\GetWasteDestinationsForProject;
use Blucreation\SmartWaste\Method\SaveSubcontractorToCompany;
use Blucreation\SmartWaste\Method\SaveSubcontractorToProject;
use Blucreation\SmartWaste\Method\SaveWasteCarrierToCompany;
use Blucreation\SmartWaste\Method\SaveWasteCarrierToProject;
use Blucreation\SmartWaste\Method\SaveWasteDestinationToCompany;
use Blucreation\SmartWaste\Method\SaveWasteDestinationToProject;
use Blucreation\SmartWaste\Method\UpdateSubcontractor;
use Blucreation\SmartWaste\Method\UpdateWasteCarrier;
use Blucreation\SmartWaste\Method\UpdateWasteDestination;
use Blucreation\SmartWaste\Method\GetLabels;
use Blucreation\SmartWaste\Method\GetProject;
use Blucreation\SmartWaste\Method\GetProjects;
use Blucreation\SmartWaste\Method\GetProjectPhases;
use Blucreation\SmartWaste\Method\GetSkipsizes;
use Blucreation\SmartWaste\Method\GetTransportOptions;
use Blucreation\SmartWaste\Method\GetWasteItem;
use Blucreation\SmartWaste\Method\GetWasteItems;
use Blucreation\SmartWaste\Method\GetWasteManagementLocations;
use Blucreation\SmartWaste\Method\GetWasteManagementRoutes;
use Blucreation\SmartWaste\Method\GetWasteProductTypes;
use Blucreation\SmartWaste\Method\GetWorkpackages;
use Blucreation\SmartWaste\Method\SaveWasteItem;
use Blucreation\SmartWaste\Method\UpdateWasteItem;

use GuzzleHttp\Client;

/**
 * @method static string|null authenticate(SmartWasteCredentials $credentials, Authenticate $obj, Client $client = null)
 * @method static bool authenticateUser(SmartWasteCredentials $credentials, AuthenticateUser $obj, Client $client = null)
 * @method static SWCompany[] getCompanies(SmartWasteCredentials $credentials, GetCompanies $obj, Client $client = null)
 * @method static SWCompany[] getDefaultCompanies(SmartWasteCredentials $credentials, GetDefaultCompanies $obj, Client $client = null)
 * @method static bool assignSubcontractorToProject(SmartWasteCredentials $credentials, AssignSubcontractorToProject $obj, Client $client = null)
 * @method static bool assignWasteCarrierToProject(SmartWasteCredentials $credentials, AssignWasteCarrierToProject $obj, Client $client = null)
 * @method static bool assignWasteDestinationToProject(SmartWasteCredentials $credentials, AssignWasteDestinationToProject $obj, Client $client = null)
 * @method static SWSubcontractor[] getSubcontractorsForProject(SmartWasteCredentials $credentials, GetSubcontractorsForProject $obj, Client $client = null)
 * @method static SWWasteCarrier[] getWasteCarriersForProject(SmartWasteCredentials $credentials, GetWasteCarriersForProject $obj, Client $client = null)
 * @method static SWWasteDestination[] getWasteDestinationsForProject(SmartWasteCredentials $credentials, GetWasteDestinationsForProject $obj, Client $client = null)
 * @method static int|null saveSubcontractorToCompany(SmartWasteCredentials $credentials, SaveSubcontractorToCompany $obj, Client $client = null)
 * @method static int|null saveSubcontractorToProject(SmartWasteCredentials $credentials, SaveSubcontractorToProject $obj, Client $client = null)
 * @method static int|null saveWasteCarrierToCompany(SmartWasteCredentials $credentials, SaveWasteCarrierToCompany $obj, Client $client = null)
 * @method static int|null saveWasteCarrierToProject(SmartWasteCredentials $credentials, SaveWasteCarrierToProject $obj, Client $client = null)
 * @method static int|null saveWasteDestinationToCompany(SmartWasteCredentials $credentials, SaveWasteDestinationToCompany $obj, Client $client = null)
 * @method static int|null saveWasteDestinationToProject(SmartWasteCredentials $credentials, SaveWasteDestinationToProject $obj, Client $client = null)
 * @method static bool updateSubcontractor(SmartWasteCredentials $credentials, UpdateSubcontractor $obj, Client $client = null)
 * @method static bool updateWasteCarrier(SmartWasteCredentials $credentials, UpdateWasteCarrier $obj, Client $client = null)
 * @method static bool updateWasteDestination(SmartWasteCredentials $credentials, UpdateWasteDestination $obj, Client $client = null)
 * @method static SWLabel[] getLabels(SmartWasteCredentials $credentials, GetLabels $obj, Client $client = null)
 * @method static SWProject getProject(SmartWasteCredentials $credentials, GetProject $obj, Client $client = null)
 * @method static SWProject[] getProjects(SmartWasteCredentials $credentials, GetProjects $obj, Client $client = null)
 * @method static array getProjectPhases(SmartWasteCredentials $credentials, GetProjectPhases $obj, Client $client = null)
 * @method static array getSkipsizes(SmartWasteCredentials $credentials, GetSkipsizes $obj, Client $client = null)
 * @method static array getTransportOptions(SmartWasteCredentials $credentials, GetTransportOptions $obj, Client $client = null)
 * @method static SWWasteItem getWasteItem(SmartWasteCredentials $credentials, GetWasteItem $obj, Client $client = null)
 * @method static SWWasteItem[] getWasteItems(SmartWasteCredentials $credentials, GetWasteItems $obj, Client $client = null)
 * @method static array getWasteManagementLocations(SmartWasteCredentials $credentials, GetWasteManagementLocations $obj, Client $client = null)
 * @method static array getWasteManagementRoutes(SmartWasteCredentials $credentials, GetWasteManagementRoutes $obj, Client $client = null)
 * @method static array getWasteProductTypes(SmartWasteCredentials $credentials, GetWasteProductTypes $obj, Client $client = null)
 * @method static array getWorkpackages(SmartWasteCredentials $credentials, GetWorkpackages $obj, Client $client = null)
 * @method static int saveWasteItem(SmartWasteCredentials $credentials, SaveWasteItem $obj, Client $client = null)
 * @method static bool updateWasteItem(SmartWasteCredentials $credentials, UpdateWasteItem $obj, Client $client = null)
 */
class SmartWasteApi
{
    public static function __callStatic($method, $args)
    {
        /**
         * @var $credentials SmartWasteCredentials
         * @var $obj BaseMethod
         * @var $client Client|null
         */
        $credentials = $args[0] ?? null;
        $obj = $args[1] ?? null;
        $client = $args[2] ?? null;

        if (!$credentials || !$credentials instanceof SmartWasteCredentials) {
            throw new \LogicException('Credentials not provided');
        }

        if (!$obj || !$obj instanceof BaseMethod) {
            throw new \LogicException('API Method object not provided');
        }

        if ($client && !$client instanceof Client) {
            throw new \LogicException('Client should be instance of GuzzleClient');
        }

        $params = SmartWaste::params($obj);

        $client = $client ?? SmartWaste::client($credentials);

        $res = SmartWaste::call($credentials, $obj, $params, $client);

        return $res;
    }
}