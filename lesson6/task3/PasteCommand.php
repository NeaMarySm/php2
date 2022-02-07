<?php

namespace lesson6\Editor;

class PasteCommand extends Command
{
    public function execute()
    {
        $this->saveBackup();
        $this->editor->replaceSelection($this->application->clipboard);
        return true;
    }
}