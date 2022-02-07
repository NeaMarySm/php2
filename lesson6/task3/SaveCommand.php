<?php

namespace lesson6\Editor;

class PasteCommand extends Command
{
    public function execute()
    {
        $this->editor->save();      
    }
}