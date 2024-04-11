<?php 
$ini = parse_ini_file('qwiki.ini.php');

if ($ini) 
{
    define('QWIKI_INI', $ini);
    define('Q_FOLDER', __DIR__.'/qwiki-core');
    define('Q_INDEX','index.php');
    define('Q_CORE_FILES',[Q_INDEX,'qwiki.css','qwiki.php','template.php']);
    $template = download_template();
    if ($template)
    {
        refreshScript();
        file_put_contents(__DIR__."/qwiki.json", json_encode($template['entryBook']));
        echo "<p>Book at bundle root was added</p>";
        echo "<p>".json_encode($template['entryBook'])."</p>";
        createFolders($template);
        echo "<p>INSTALLATION COMPLETED</p>";
        die();
    }
    echo '<p>No template found</p>';
    die();
}
echo "<p>NO INI FILE FOUND</p><p>Nothing done</p>";
die();

function refreshScript()
{
    foreach (Q_CORE_FILES as $file) copy (Q_FOLDER."/$file.txt", __DIR__."/$file" );
}

function download_template()
{
    $url = QWIKI_INI['host'].'/get/qwiki/bundle/?ws='.QWIKI_INI['ws'].'&id='.QWIKI_INI['id'].'&token='.QWIKI_INI['token'];
    $json = file_get_contents($url);
    $template = json_decode($json, true);
    if ($template && $template['id'] == QWIKI_INI['id']) return $template;
}

function createFolders($template)
{

    foreach ($template['books'] as $book)
    {
        $folderName = $book['bookFolder'];
        mkdir(__DIR__."/$folderName");
        copy (Q_FOLDER.'/'.Q_INDEX.'.txt', __DIR__."/$folderName"."/".Q_INDEX );
        file_put_contents(__DIR__."/$folderName/qwiki.json", json_encode($book));
        echo "<p>Book $folderName was added</p>";
        echo "<p>".json_encode($book)."</p>";
    }
}

function logger ($a,$b, $isObject) {
    if ($isObject) $b = json_encode($b);
    echo "<p><b>$a</b></p>";
    echo "<p>$b</p>";
}


