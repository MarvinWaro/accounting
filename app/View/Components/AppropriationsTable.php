<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppropriationsTable extends Component
{
   /**
    * Create a new component instance.
    */
   public $appropriations;
   public function __construct($appropriations)
   {
      $this->appropriations = $appropriations;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.appropriations-table');
   }
}
