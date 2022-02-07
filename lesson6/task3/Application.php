<?php

namespace lesson6\Editor;

class Application 
{
    private static array $editors;
    private $activeEditor;
    private $clipboard;
    private $history;


    public function createEditor(string $name)
    {
        $editor = new Editor($name);
        Application::addEditor($editor);
    }
    private static function addEditor($editor)
    {
        if(!in_array($editor, self::$editors)){
            array_push(self::$editors, $editor);
        }   
    }
    public function openEditor($name)
    {
        $filenames = [];
        foreach(self::$editors as $editor)
        {
            if($editor->filename = $name)
            {
                $this->activeEditor = $editor;
            }
            array_push($filenames, $editor->filename);
        }
        if(!in_array($name, $filenames))
        {
            $this->createEditor($name);
        }
    }
    public function createUI()
    {
        // привязка команд к кнопкам интерфейса, горячим клавишам и тд
    }

    public function executeCommand(Command $command)
    {
        if($command->execute())
        {
            $this->history->push($command);
        }

    }

    public function undo()
    {
        $command = $this->history->pop();
        if($command)
        {
            $command->undo();
        }
    }

}