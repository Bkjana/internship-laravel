<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $textcolor;
    public $bgcolor;
    public $homelink;
    public $name;
    public $classlink;
    public $preseentlink;
    public $present;
    public $todayclasslink;
    public $todayclass;
    public $joincratelink;
    public $joincrate;
    public $allparticipatelink;
    public $allparticipate;
    public $logoutlink;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($textcolor, $bgcolor, $homelink, $name, $classlink, $preseentlink, $present, $todayclasslink, $todayclass, $joincrate, $joincratelink, $allparticipatelink, $allparticipate, $logoutlink)
    {
        $this->textcolor = $textcolor;
        $this->bgcolor = $bgcolor;
        $this->homelink=$homelink;
        $this->name=$name;
        $this->classlink=$classlink;
        $this->preseentlink=$preseentlink;
        $this->present=$present;
        $this->todayclasslink=$todayclasslink;
        $this->$todayclass=$todayclass;
        $this->joincratelink=$joincratelink;
        $this->joincrate=$joincrate;
        $this->allparticipatelink=$allparticipatelink;
        $this->allparticipate=$allparticipate;
        $this->logoutlink=$logoutlink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
