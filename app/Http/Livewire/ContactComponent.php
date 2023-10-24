<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Setting;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    public function update($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'comment'=>'required'
       ]);
    }
    public function sendMessage(){
        $this->validate([
             'name'=>'required',
             'email'=>'required|email',
             'phone'=>'required',
             'comment'=>'required'
        ]);
        $contact=new Contact();
        $contact->name=$this->name;
        $contact->email=$this->email;
        $contact->phone=$this->phone;
        $contact->comment=$this->comment;
        $contact->save();
        session()->flash('message',"Thanks,your Message has been sent SuccessFully");


    }
    public function render()
    {
        $setting=Setting::find(1);
        return view('livewire.contact-component',['setting'=>$setting])->layout('layouts.base');
    }
}
