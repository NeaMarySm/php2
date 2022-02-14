<?php

class DirectoryScanner
{
    private $path;
    private $directory;
    private $iterator;
    private $showHiddenDir;

    public function __construct(string $path, int $level = -1, bool $hidden = false)
    {
        $this->path = $path;
        $this->directory = new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS | FilesystemIterator::FOLLOW_SYMLINKS);
        $this->iterator = new RecursiveIteratorIterator($this->directory, RecursiveIteratorIterator::SELF_FIRST, RecursiveIteratorIterator::CATCH_GET_CHILD);
        $this->iterator->setMaxDepth($level);
        $this->showHiddenDir = $hidden;
    }

    public function getFiles()
    {
        foreach($this->iterator as $path => $object){
            $name = $object->getFilename();
            
            if($name[0] === '.' && !$this->showHiddenDir)
            {
                continue;
            }
            if(is_dir($object))
            {
                $level = $this->iterator->getDepth();
                 echo 'DIR '.$name.' level '.$level.PHP_EOL;
                 
            }
            else echo ' '.$name.PHP_EOL;
        }
        

    }

}

$scanner = new DirectoryScanner('/Users/mac/project/testproj/test.local/www/php_lessons', -1, true);
$scanner->getFiles();