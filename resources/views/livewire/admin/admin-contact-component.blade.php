<div>
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
                   Contacts
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Comment</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($contacts as $contact)
                              <tr>
                                <td>{{$i++}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->comment}}</td>
                                <td>{{$contact->created_at}}</td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                   {{$contacts->Links()}}
                </div>
            </div>
        </div>  
    </div>
   </div>
</div>

</div>
