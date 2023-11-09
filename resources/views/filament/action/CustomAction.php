<?php

namespace App\Filament\Actions;

use Filament\Actions\Action;

class MyCustomAction extends Action
{
    public Livewire $livewire;

    public function __construct()
    {
        $this->livewire = new Livewire(); // Initialize the property
    }

    public function handle()
    {
        // Your action logic here
        $this->livewire->doSomething();
    }
}
