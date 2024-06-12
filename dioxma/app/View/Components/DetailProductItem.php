<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class DetailProductItem extends Component
{
    /**
     * Create a new component instance.
     */
    public $product;

    public function __construct()
    {
        //
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.detail-product-item');
    }
}
