<div>
<div class ="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Edit Coupons
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right"> All Coupons</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                       <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="editCoupons">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Coupon Code</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="coupon code" class="form-control input-md" wire:model="code">
                                 @error('code') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                           </div>
                            <div class="form-group">
                            <label for="" class="col-md-4 control-label">Coupon type</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="type">
                                    <option value="select">select</option>
                                    <option value="fixed">fixed</option>
                                    <option value="percent">percent</option>
                                </select>
                                 @error('type') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Coupon Value</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="coupon value" class="form-control input-md" wire:model="value">
                                @error('value') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">cart Value</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="cart value" class="form-control input-md" wire:model="cart_value">
                                @error('cart_value') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">expiry_date</label>
                            <div class="col-md-4">
                                <input type="date" id="expiry_date" placeholder="expiry_date" class="form-control input-md" wire:model="expiry_date">
                                @error('expiry_date') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"> </label>
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
