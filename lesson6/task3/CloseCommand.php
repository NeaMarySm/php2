<?php

namespace lesson6\Editor;

class CloseCommand extends Command
{
    public function execute()
    {
        $this->editor->close();
    }
}