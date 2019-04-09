<?php


namespace Qpdb\Tests;


use Qpdb\HtmlBuilder\Abstracts\AbstractHtmlElement;

class Input
{
    private $actualInputGenerated = 'actual-input.txt';
    private $expectedInput = 'expected-input.txt';

    /**
     * @var string
     */
    private $location;

    /**
     * Input constructor.
     * @param string $location
     */
    public function __construct($location)
    {
        $this->location = $location;
    }


    /**
     * @param AbstractHtmlElement $element
     */
    public function setGeneratedInput(AbstractHtmlElement $element)
    {
        ob_start();
        $element->render();
        file_put_contents($this->location . '/' . $this->actualInputGenerated, ob_get_clean());
    }

    /**
     * @return false|string
     */
    public function getGeneratedInput() {
        return file_get_contents($this->location . '/' . $this->actualInputGenerated);
    }

    /**
     * @return bool|false|string
     */
    public function getExpectedInput() {
        return file_get_contents($this->location . '/' . $this->expectedInput);
    }


    public function removeGeneratedInput() {
        unlink($this->location . '/' . $this->actualInputGenerated);
    }
}