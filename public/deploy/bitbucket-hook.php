<?php
$repo_dir = '/var/www/service.stomdevice.info/data/www/service.stomdevice.info/';
$web_root_dir = '/var/www/service.stomdevice.info/data/www/service.stomdevice.info/';

$git_bin_path = 'git';

$update = false;

// Parse data from Bitbucket hook payload
$payload = json_decode($_POST['payload']);

if (empty($payload->commits)){
    $update = true;
} else {
    foreach ($payload->commits as $commit) {
        $branch = $commit->branch;
        if ($branch === 'master' || isset($commit->branches) && in_array('master', $commit->branches)) {
            $update = true;
            break;
        }
    }
}

if ($update) {
    // Do a git checkout to the web root
    exec('cd ' . $repo_dir . ' && ' . $git_bin_path  . ' fetch');
    exec('cd ' . $repo_dir . ' && ' . $git_bin_path  . ' merge');
    exec('cd ' . $repo_dir . ' && GIT_WORK_TREE=' . $web_root_dir . ' ' . $git_bin_path  . ' checkout -f');

    // Log
    $commit_hash = shell_exec('cd ' . $repo_dir . ' && ' . $git_bin_path  . ' rev-parse --short HEAD');
    file_put_contents('deploy.log', date('m/d/Y h:i:s a') . " Deployed branch: " .  $branch . " Commit: " . $commit_hash . "\n", FILE_APPEND);
}
?>