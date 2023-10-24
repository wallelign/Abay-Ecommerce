<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;
class FooterComponent extends Component
{
    public function render()
    {
        $setting=Setting::find(1);
        return view('livewire.footer-component',['setting'=>$setting]);
    }
}
