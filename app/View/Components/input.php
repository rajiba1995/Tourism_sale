<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    public $name;
    public $type;
    public $placeholder;
    
    /**
     * Create a new component instance.
     */
    public function __construct($name,$type,$placeholder)
    {
       $this->name = $name;
       $this->type = $type;
       $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
