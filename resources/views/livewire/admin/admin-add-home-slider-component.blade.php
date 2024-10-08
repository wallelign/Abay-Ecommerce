
<div>
    <div class="container" style="padding:30px 0;">
        <div class=" row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Add New Slider
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.homeslider')}}" class="btn btn-success pull-right">All Sliders </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form  class="form-horizontal" wire:submit.prevent="addSlider" >
                        @csrf
                        <div class="form-group">
                        <label  class="col-md-4 control-label">Title</label>
                        <div class="col-md-4">
                        <input type="text" placeholder="Title" class="form-control input-md" wire:model="title">
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Subtitle</label>
                        <div class="col-md-4">
                        <input type="text" placeholder="Subtitle" class="form-control input-md" wire:model="subtitle">
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Price</label>
                        <div class="col-md-4">
                        <input type="text" placeholder="price" class="form-control input-md" wire:model="price">
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Link</label>
                        <div class="col-md-4">
                        <input type="text" placeholder="Link" class="form-control input-md" wire:model="link">
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Image</label>
                            <div class="col-md-4" >
                                <input type="file" class="input-file" wire:model="image">
                                @if($image)
                                <img src="{{$image->temporaryUrl()}}" width="120" height="60">
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Status</label>
                        <div class="col-md-4">
                        <select name="" id="" class="form-control"  wire:model="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label"></label>
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
