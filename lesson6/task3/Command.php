<?php
namespace lesson6\Editor;

abstract class Command
{
    protected $application;
    protected $editor;
    protected $backup;

    public function __construct(Application $app, Editor $editor)
    {
        $this->application = $app;
        $this->editor = $editor;   
    }

    abstract public function execute();

    public function saveBackup(){
        $this->backup = $this->editor->text;
    }

    public function undo(){
        $this->editor->text = $this->backup;
    }

}