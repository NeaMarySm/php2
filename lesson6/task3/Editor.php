<?php

namespace lesson6\Editor;

class Editor 
{
    public $content;
    private $filename;
    private $selectionStart;
    private $selectionLength;

    public function __construct($filename)
    {
        $this->filename = $filename;
        fopen($this->filename, 'r+');
        $this->content = fread($this->filename, filesize($this->filename));

    }
    public function setSelectionCoordinates($start, $length)
    {
        $this->selectionStart = $start;
        $this->selectionLength = $length;
    }
    public function getSelection()
    {
        return $selection = substr($this->content, $this->selectionStart, $this->selectionLength);
    }

    public function deleteSelection()
    {
        $this->content = substr_replace('', $this->content, $this->selectionStart, $this->selectionLength);
    }

    public function replaceSelection($text)
    {
        substr_replace($text, $this->content, $this->selectionStart, $this->selectionLength);
    }

    public function save()
    {
        fwrite($this->filename, $this->content);
    }
    public function close()
    {
        fclose($this->filename);
    }

}