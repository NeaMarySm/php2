<?php

namespace lesson6\Editor;

class CommandHistory
{
    private array $history;

    public function push(Command $command)
    {
        if(!$this->history)
        {
            $this->history = [];
        }
        array_push($this->history, $command);
    }

    public function pop()
    {
        if($this->history)
        {
            array_pop($this->history);
        }
    }

}