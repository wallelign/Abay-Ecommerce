<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
class UserEditProfileComponent extends Component
{
    
    use WithFileUploads;

    public $name;
    public $email;
    public $mobile;
    public $image;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $newimage;


    // public function validate($fileds){
    //     $this->validateOnly($fileds,[
    //         'name'=>'required',
    //         'email'=>'required|email',
    //         'mobile'=>'required|numeric',
    //         'image'=>'required',
    //         'line1'=>'required',
    //         'line2'=>'required',
    //         'city'=>'required',
    //         'province'=>'required',
    //         'country'=>'required',
    //         'zipcode'=>'required',
    //         'newimage'=>'required'
    //     ]);
        
    // }
    public function mount(){
        $user=User::find(Auth::user()->id);
        $this->name=$user->name;
        $this->email=$user->email;
        $this->image=$user->Profiles->image;
        $this->mobile=$user->Profiles->mobile;
        $this->line1=$user->Profiles->line1;
        $this->line2=$user->Profiles->line2;
        $this->city=$user->Profiles->city;
        $this->province=$user->Profiles->province;
        $this->country=$user->Profiles->country;
        $this->zipcode=$user->Profiles->zipcode;
    }
     public function updateProfile(){
        $user=User::find(Auth::user()->id);
        $user->name=$this->name;
        $user->save();

        if($this->newimage){
            // if($this->image){
            //     unlink('assets/images/profiles/' .$this->image);
            // }
            $imageName=Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('profiles',$imageName);
            $user->Profiles->image=$imageName;
            
        }
      
        $user->Profiles->mobile=$this->mobile;
        $user->Profiles->line1=$this->line1;
        $user->Profiles->line2=$this->line2;
        $user->Profiles->city=$this->city;
        $user->Profiles->province=$this->province;
        $user->Profiles->country=$this->country;
        $user->Profiles->zipcode=$this->zipcode;
        $user->Profiles->save();
        session()->flash('message',"updated your profile successfully");
    }
    public function render()
    {
        $user=User::find(Auth::user()->id);
        return view('livewire.user.user-edit-profile-component',['user'=>$user])->layout('layouts.base');
    }
}
