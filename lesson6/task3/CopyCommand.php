<?php

namespace lesson6\Editor;

class CopyCommand extends Command
{
    public function execute()
    {
        $this->application->clipboard = $this->editor->getSelection();
        return false;
    }
}