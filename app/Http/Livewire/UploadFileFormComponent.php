<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UploadFileFormComponent extends Component
{
    public function render()
    {
        return view('livewire.upload-file-form-component')->layout('layouts.base');
    }
}
