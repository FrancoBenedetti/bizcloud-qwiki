<?php
$repo = 'https://bizverse.biz/qwiki/qwiki-core';
$currentFolder = array_pop(explode('/',$dir = __DIR__));
if ($currentFolder == 'qwiki-core-dev')
{
    if ($manifest = file_get_contents($repo.'/manifest.json'))
    {
        $manifest = json_decode($manifest);
        echo "<p>Repository for {$manifest->name} version {$manifest->version} found at $repo</p>";
        echo "<p>Target update folder = $dir</p>";
        echo "<p>Replacing all files of manifest</p>";   
        if (is_array($manifest->payload)) foreach ($manifest->payload as $fileName)
        {
            file_put_contents($fileName, file_get_contents("$repo/$fileName"));
            echo "<p>File: $fileName done</p>";
        } 
        echo  "<p>Version {$manifest->version} is now available for installation. You may now <a href=\"../install.php\">run the install script</a>.</p>";
    }
    else echo 'No update manifest was found at this location';
}
else echo 'The folder in which the script is located, is invalid for Qwiki';
die();

