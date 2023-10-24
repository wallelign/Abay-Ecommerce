<div>
   <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Profiles
            </div>
            @if(Session::has('message'))
                   <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <div class="panel-body">
                <form wire:submit.prevent="updateProfile">
                    <div class="col-md-4">
                        @if($newimage)
                        <image src="{{$newimage->temporaryUrl()}}" width="100%">
                        @elseif($image)
                        <img src="{{asset('assets/images/profiles')}}/{{$user->Profiles->image}}" width="100%">
                        @else
                            <img src="{{asset('assets/images/profiles/imageno.jpg')}}" width="100%">
                        @endif
                        <input type="file" class="form-control" wire:model="newimage">
                    </div>
                    <div class="col-md-8">
                        <p><b>Name: </b> <input type="text" class="form-control"wire:model="name"> </p>
                        <p><b>Email: </b> {{$user->email}}</p>
                        <p><b>Phone: </b>  <input type="text" class="form-control" wire:model="mobile"></p>
                        <hr>
                        <p><b>Line1: </b> <input type="text" class="form-control" wire:model="line1"></p>
                        <p><b>Line2: </b> <input type="text" class="form-control" wire:model="line2"></p>
                        <p><b>City: </b> <input type="text" class="form-control" wire:model="city"></p>
                        <p><b>Province: </b> <input type="text" class="form-control" wire:model="province"></p>
                        <p><b>Country: </b> <input type="text" class="form-control" wire:model="country"></p>
                        <p><b>zipcode: </b> <input type="text" class="form-control" wire:model="zipcode"></p>
                        <button type="submit"class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
