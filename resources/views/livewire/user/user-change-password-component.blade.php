<div>
   <div class="container" style="padding :30px 0;">
       <div class="row">
        <div class="col md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Change Password
                </div>
                <div class="panel-body">
                    @if(Session::has('message_success'))
                    <div class="alert alert-success" role="alert">{{Session::get('message_success')}}</div>
                    @endif
                    @if(Session::has('passord_fail'))
                    <div class="alert alert-danger" role="alert">{{Session::get('passord_fail')}}</div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="chagePassword">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Password:</label>
                            <div class="col-md-4">
                                <input type="password" placeholder="current password" class="form-control input-md" name="current_password" wire:model="current_password"/>
                                   @error('current_password')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">New Password:</label>
                            <div class="col-md-4">
                                <input type="password" placeholder="New password" class="form-control input-md" name="password" wire:model="password"/>
                                @error('password')<p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password:</label>
                            <div class="col-md-4">
                                <input type="password" placeholder="password confimation" class="form-control input-md" name="confirm_password" wire:model="confirm_password"/>
                                @error('confirm_password')<p class="text-danger">{{$message}}</p> @enderror
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
