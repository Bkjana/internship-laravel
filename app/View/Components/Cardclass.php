<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Cardclass extends Component
{
    public $cardimg;
    public $cardtitle;
    public $cardtext;
    public $lastupdate;
    public $classlink;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cardimg, $cardtitle, $cardtext, $lastupdate, $classlink)
    {
        $this->cardimg=$cardimg;
        $this->cardtitle=$cardtitle;
        $this->cardtext=$cardtext;
        $this->lastupdate=$lastupdate;
        $this->classlink=$classlink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cardclass');
    }
}
