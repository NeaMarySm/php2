<?php

namespace lesson6\Editor;

class UndoCommand extends Command
{
    public function execute()
    {
        $this->application->undo();
        return false;
    }
}