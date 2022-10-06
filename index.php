<?php
require_once 'vendor/autoload.php';
require 'app/setLink.php';

use app\Data\GetData;
use app\RandomUser\User;

$status = "development"; // development or production
if ($status == "development") {
    require "app/ErrorReporting.php";
}

$callData = new GetData($url);
$result = $callData->getCallResult(); //get string of json format

$array = json_decode($result, true); //convert json to array

//print_r($array['results'][0]);

$newArray = decodeArray($array['results'][0]);

// print_r($newArray);
$newUser = new User($newArray); //create new user object of the first element of result

try {
    if (!property_exists($newUser, '_large') || !property_exists($newUser, '_first') || !property_exists($newUser, '_last') || !property_exists($newUser, '_gender')
        || !property_exists($newUser, '_name') || !property_exists($newUser, '_value') || !property_exists($newUser, '_number') || !property_exists($newUser, '_phone')
        || !property_exists($newUser, '_large')) {
        throw new Exception('Error: not found users data.');
    } else {
        require_once 'app/views/viewUser.php';
    }

} catch (Exception $e) {
    echo $e;
}

/**
 *
 * decode multi array to simple array
 * ATTENTION! works only until 3rd level
 */
function decodeArray($mixedData)
{
    $newArray = [];
    try {
        foreach (array_keys($mixedData) as $key) {

            if (checkArray($mixedData[$key])) {
                foreach (array_keys($mixedData[$key]) as $secondLevelKey) {
                    if (!checkArray($mixedData[$key][$secondLevelKey])) {
                        $newArray[$secondLevelKey] = $mixedData[$key][$secondLevelKey];
                    } else {
                        foreach (array_keys($mixedData[$key][$secondLevelKey]) as $thirdLevelKey) {
                            if (!checkArray($mixedData[$key][$secondLevelKey][$thirdLevelKey])) {
                                $newArray[$thirdLevelKey] = $mixedData[$key][$secondLevelKey][$thirdLevelKey];
                            } else {
                                throw new Exception('Error: only accepted data until third level.');
                            }
                        }
                    }
                }
            } else {
                $newArray[$key] = $mixedData[$key];
            }

        }
    } catch (Exception $e) {
        echo $e;
    }
    return $newArray;
}

/**
 *
 * check if element of array is array
 *
 * @param mixedData
 * @retunr bool
 */
function checkArray($mixedData)
{
    if (is_array($mixedData)) {
        return true;
    } else {
        return false;
    }
}
