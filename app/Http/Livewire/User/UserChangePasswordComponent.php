<?php

namespace App\Http\Livewire\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Component;

class UserChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $confirm_password;
    public function update($fields){
        $this->validateOnly($fields,[
            'current_password'=>'required',
             'password'=>'required|min:8|different:current_password'
        ]);
    }
    public function chagePassword(){
        $this->validate([
            'current_password'=>'required',
             'password'=>'required|min:8|different:current_password'
        ]);
        if(Hash::check($this->current_password,Auth::user()->password)){
            $user=User::findOrFail(Auth::user()->id);
            $user->password=Hash::make($this->password);
            $user->save();
            session()->flash('message_success','password has been changed Sucessfully');
        }
        else{
            session()->flash('passord_fail',"Password dose not Mach!");
        }
    }
    public function render()
    {
        return view('livewire.user.user-change-password-component')->layout('layouts.base');
    }
}
