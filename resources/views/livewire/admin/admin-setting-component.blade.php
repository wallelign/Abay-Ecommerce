<div>
   <div class="container" style="padding :30px 0;">
       <div class="row">
        <div class="col md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Setting
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="saveSetting">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Email:</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="email" class="form-control input-md"  wire:model="email"/>
                                   @error('email')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone:</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="phone" class="form-control input-md" wire:model="phone"/>
                                @error('phone')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone2:</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="phone2" class="form-control input-md"  wire:model="phone2"/>
                                @error('phone2')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Address:</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="adress" class="form-control input-md" wire:model="adress"/>
                                @error('adress')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Map:</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="map" class="form-control input-md" wire:model="map"/>
                                @error('map')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Twiter:</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="twiter" class="form-control input-md" wire:model="twiter"/>
                                @error('twiter')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Facebook :</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="facebook " class="form-control input-md" wire:model="facebook"/>
                                @error('facebook')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Pinterest :</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="pinterest " class="form-control input-md" wire:model="pinterest"/>
                                @error('pinterest')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Instagram :</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="instagram " class="form-control input-md" wire:model="instagram"/>
                                @error('instagram')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Youtube :</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Youtube " class="form-control input-md" wire:model="youtube"/>
                                @error('youtube')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                   </form>
                </div>
            </div>
        </div>
       </div>

   </div>
</div>
