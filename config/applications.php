<?php
$systemApps = new SystemApplications();

// Applications that are dependent on http request, use 1st segment uri value as application ID
$systemApps->add("zdash");

//Configure your applications
// $systemApps->config("zdash", "apiId", "api");
// $systemApps->config("zdash", "nameSpace","vilshub/zdash");
// $systemApps->config("zdash", "configInUse", "vendor"); // vendor or system
// $systemApps->config("zdash", "routeFiles", [
//     "apiHandler"    => "/http/handlers/api.php"
// ]);

return $systemApps;
?>