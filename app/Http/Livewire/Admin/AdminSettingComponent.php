<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;
class AdminSettingComponent extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $adress;
    public $map;
    public $twiter;
    public $facebook;
    public $pinterest;
    public $instagram;
    public $youtube;
    
    public function mount(){
        $setting=Setting::find(1);
        if($setting){
           $this->email=$setting->email;
           $this->phone=$setting->phone;
           $this->phone2=$setting->phone2;
           $this->adress=$setting->address;
           $this->map=$setting->map;
           $this->twiter=$setting->twiter;
           $this->facebook=$setting->facebok;
           $this->pinterest=$setting->pinterest;
           $this->instagram=$setting->instagram;
           $this->youtube=$setting->youtube;
        }
    }
    public function update($fields){
        $this->validateOnly($fields,[
            'email'=>'required|email',
            'phone'=>'required',
            'phone2'=>'required',
            'adress'=>'required',
            'map'=>'required',
            'twiter'=>'required',
            'facebook'=>'required',
            'pinterest'=>'required',
            'instagram'=>'required',
            'youtube'=>'required'
             
         ]);
    }
    public function saveSetting(){
        $this->validate([
           'email'=>'required|email',
           'phone'=>'required',
           'phone2'=>'required',
           'adress'=>'required',
           'map'=>'required',
           'twiter'=>'required',
           'facebook'=>'required',
           'pinterest'=>'required',
           'instagram'=>'required',
           'youtube'=>'required'
            
        ]);
        $setting=Setting::find(1);
        if(!$setting){
        $setting=new Setting();
        }
            $setting->email=$this->email;
            $setting->phone=$this->phone;
            $setting->phone2=$this->phone2;
            $setting->address=$this->adress;
            $setting->map=$this->map;
            $setting->twiter=$this->twiter;
            $setting->facebok=$this->facebook;
            $setting->pinterest=$this->pinterest;
            $setting->instagram=$this->instagram;
            $setting->youtube=$this->youtube;
            $setting->save();
            session()->flash('message',"Setting has been saved Successfully");

    }

    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}
