<div>
    <style>
        nav svg{
            height:20px;

        }
        nav .hidden{
            display:block !important;
        }
    </style>
   <div class="container" style="padding: 30px 0;">
      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Orders
                </div>
                <div class="panel-body">
                    @if(Session::has('order_message'))
                       <div class="btn btn-success" role="alert">{{Session::get('order_message')}}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>OrderId</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>total</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Zipcode</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                              <tr>
                                <td>{{$order->id}}</td>
                                <td>ETB{{$order->subtotal}}</td>
                                <td>ETB{{$order->discount}}</td>
                                <td>ETB{{$order->tax}}</td>
                                <td>ETB{{$order->total}}</td>
                                <td>{{$order->firstname}}</td>
                                <td>{{$order->lastname}}</td>
                                <td>{{$order->mobile}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->zipcode}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->created_at}}</td>
                                <td><a href="{{ route('admin.orderdetails',['order_id'=>$order->id]) }}" class="btn btn-info btn-sm">Details </a></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                                            <span class="caret"></span> </button>
                                            <ul class="dropdown-menu">
                                                <li> <a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Deliverded</a></li>
                                                <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Cancelled</a></li>
                                            </ul>
                                    </div>
                                </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                   {{$orders->Links()}}
                </div>
            </div>
        </div>  
    </div>
   </div>
</div>
