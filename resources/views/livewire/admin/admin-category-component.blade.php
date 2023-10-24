<div>
    <style>
        nav svg{
            height:20px;
        }
        nav .hidden{
            display:block !important;
        }
        .sclist{
           list-style:none;
        }
        .sclist li{
            border-bottom:1px solid #ccc;
            line-height:30px;
        }
        .slink i{
            font-size:16px;
            margin-left:12px;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="row">
                       <div class="col-md-6">
                       All Categories
                       </div>
                       <div class="col-md-6">
                           <a href="{{route('admin.addcategories')}}" class="btn btn-success pull-right">Add New</a>
                       </div>
                      </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif

                        @if(Session::has('subcategory_message'))
                        <div class="alert alert-success" role="alert">{{Session::get('subcategory_message')}}</div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Subcategory</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <ul class="sclist">
                                        @foreach($category->subcategory as $scategory)
                                        <li><i class="fa fa-caret-right"> </i> {{$scategory->name}} 
                                        <a href="{{route('admin.editcategory',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}"  class="slink"> <i class="fa fa-edit"> </i></a> 
                                        <a href="#" onclick="confirm('Are you sure?,You went to delete this subcategory?')||event.stopImmediatePropagation()" wire:click.prevent="deleteSubcategory({{$scategory->id}})"  class="slink"><i class="fa fa-times text-danger"></i> </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}"> <i class="fa fa-edit fa-2x"> </i> </a>
                                    <a href="#" onclick="confirm('Are you sure?,You went to delete this category?')||event.stopImmediatePropagation()" wire:click.prevent="deletecategory({{$category->id}})" style="padding-left:15px ";><i class="fa fa-times fa-2x text-danger"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
