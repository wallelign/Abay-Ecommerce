<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChangeInToAmharicLanguage extends Component
{

    public function localization($locale){
        App::setlocale($locale);
        session->put('locale',$locale);
        return redirect()->back();
    }
    public function render()
  
    {
        $this->localization();
        return view('livewire.change-in-to-amharic-language')->layout('layouts.base');
    }
}
