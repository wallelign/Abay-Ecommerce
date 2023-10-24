<div>
    <div class="container" style="padding:30px 0;">
        <div class=" row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Add New Product
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All Products </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form  class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addproduct">
                        @csrf
                        <div class="form-group">
                        <label  class="col-md-4 control-label">Product Name</label>
                        <div class="col-md-4">
                        <input type="text" placeholder="product name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Product Slug</label>
                        <div class="col-md-4">
                        <input type="text" placeholder="product slug" class="form-control input-md" wire:model="slug">
                        @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Short Description</label>
                        <div class="col-md-4" wire:ignore>
                        <textarea class="form-control"id="Short_description" paceholder="short description" wire:model="Short_description"></textarea>
                        @error('Short_description') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Description</label>
                        <div class="col-md-4" wire:ignore>
                        <textarea class="form-control" id="description" paceholder="description" wire:model="description"></textarea>
                        @error('description') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Regular Price</label>
                        <div class="col-md-4">
                        <input type="text" placeholder="regular price" class="form-control input-md" wire:model="regular_price">
                        @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Sale Price</label>
                        <div class="col-md-4">
                        <input type="text" placeholder="sales price" class="form-control input-md" wire:model="sale_price">
                        @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">SKU</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                                @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Stock</label>
                        <div class="col-md-4">
                        <select name="" id="" class="form-control" wire:model="stock_status">
                            <option value="instock">InStock</option>
                            <option value="outofstock">Outstock</option>
                        </select>
                        @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Featured</label>
                        <div class="col-md-4">
                        <select name="" id="" class="form-control" wire:model="featured">
                            <option value="0">NO</option>
                            <option value="1">Yes</option>
                        </select>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-4 control-label">Quantity</label>
                        <div class="col-md-4">
                        <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity">
                        @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Product Image</label>
                            <div class="col-md-4">
                                <input type="file" class="input-file" wire:model="image">
                                @if($image)
                                <image src="{{$image->temporaryUrl()}}" width="120">
                                @endif
                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Product Gallery:</label>
                            <div class="col-md-4">
                                <input type="file" class="input-file" wire:model="images" multiple>
                                @if($images)
                                @foreach($images as $image)
                                <image src="{{$image->temporaryUrl()}}" width="120">
                                    @endforeach
                                @endif
                                @error('images') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Category</label>
                            <div class="col-md-4">
                                <select name="" id="" class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                                          <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                          <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                  </select>
                                   @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Subcategory</label>
                            <div class="col-md-4">
                                <select name="" id="" class="form-control" wire:model="scategory_id">
                                          <option value="0">Select Subcategory</option>
                                        @foreach($scategories as $scategory)
                                          <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                        @endforeach
                                  </select>
                                   @error('scategory_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Product Attributte</label>
                            <div class="col-md-4">
                                <select name="" id="" class="form-control" wire:model="attr">
                                          <option value="0">Select Attribute</option>
                                        @foreach($pattributes as $pattribute)
                                          <option value="{{$pattribute->id}}">{{$pattribute->name}}</option>
                                        @endforeach
                                  </select>
                                   @error('attr') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-info" wire:click.prevent="add">Add</button>
                            </div>
                        </div>

                        @foreach($inputs as $key=>$value)
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}" class="form-control input-md" wire:model="attribute_values.{{$value}}"> 
                                </div>
                                <button type="button" class="btn btn-danger btn-sm" wire:click.perevent="remove({{$key}})">Remove </button>
                            </div>
                        @endforeach

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

@push('scripts')
<script>
    $(function(){
        tinymce.init({
            selector:'#Short_description',
            setup:function(editor){
                editor.on('change',function(e){
                    tinyMCE.triggerSave();
                    var sd_data=$('#Short_description').val();
                    @this.set('Short_description',sd_data);
                });
            }
        });
        tinymce.init({
            selector:'#description',
            setup:function(editor){
                editor.on('change',function(e){
                    tinyMCE.triggerSave();
                    var d_data=$('#description').val();
                    @this.set('description',d_data);
                });
            }
        });
    });
</script>
@endpush
