<?php
// Define the target directory where the deployment will take place
$targetDirectory = '/home/pselierc/public_html/testing-dummy';

// Get the JSON payload sent by the webhook
$payload = json_decode(file_get_contents('php://input'), true);

// Retrieve the HEAD commit information
$headCommit = $payload['head_commit'];

// Get the commit hash
$commitHash = $headCommit['id'];

// Log the deployment details
file_put_contents('deployment.log', "Deploying commit: $commitHash\n", FILE_APPEND);

// Perform the deployment using Git
chdir($targetDirectory);
exec('git pull');

// Additional deployment steps (e.g., running build scripts, clearing caches, etc.)

// Respond with a success message
echo 'Deployment successful.';
