<?php

namespace lesson6\Editor;

class CutCommand extends Command
{
    public function execute()
    {
        $this->saveBackup();
        $this->application->clipboard = $this->editor->getSelection();
        $this->editor->deleteSelection();
        return true;
    }
}