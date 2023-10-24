<div>
   <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Profiles
            </div>
            <div class="panel-body">
                <div class="col-md-4">
                    @if($user->Profiles->image)
                       <img src="{{asset('assets/images/profiles')}}/{{$user->Profiles->image}}" width="100%">
                    
                    @else
                        <img src="{{asset('assets/images/profiles/image.jpg')}}" width="100%">
                    
                    @endif
                </div>
                <div class="col-md-8">
                    <p><b>Name: </b> {{$user->name}}</p>
                    <p><b>Email: </b> {{$user->email}}</p>
                    <p><b>Phone: </b> {{$user->Profiles->mobile}}</p>
                    <hr>
                    <p><b>Line1: </b> {{$user->Profiles->line1}}</p>
                    <p><b>Line2: </b> {{$user->Profiles->line2}}</p>
                    <p><b>City: </b> {{$user->Profiles->city}}</p>
                    <p><b>Province: </b> {{$user->Profiles->province}}</p>
                    <p><b>zipcode: </b> {{$user->Profiles->zipcode}}</p>
                    <a href="{{route('user.editprofile')}}" class="btn btn-info pull-right">Update Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
