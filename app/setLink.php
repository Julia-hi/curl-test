<?php
namespace app;

/**
 * URL for get data of users
 *
 * @var string
 */
$url = "https://randomuser.me/api/?inc=gender,name, picture, location, email, phone, id";

/**
 * check availability of the URL
 *
 * This method will check if the URL exixts. Get header of the page and check value of request answer.
 * if the value is 404, the page does not exist and at this case returns false. If value is different of 404,
 * returns true.
 *
 * @param string $url
 * @return bool
 */
function checkUrl(string $url)
{
    // Getting page header data
    $array = @get_headers($url);

// Storing value at 1st position because
// that is only what we need to check
    $string = $array[0];

// 404 for error, 200 for no error
    if (strpos($string, "200")) {
        return true;
    } else {
        return false;
    }
}
