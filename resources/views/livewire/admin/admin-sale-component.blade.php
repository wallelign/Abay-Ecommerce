<div>
   <div class="container"style="padding: 30px 0;">
   <div class="row">
       <div class="panel panel-default">
           <div class="panel-heading">
               Sale Setting
           </div>
           <div class="panel-body">
                 @if(Session::has('message'))
                   <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                 @endif
               <form class="form-horizontal" wire:submit.prevent="updateSale">
                   <div class="form-group">
                       <label for="" class="col-md-4 control-label">Status</label>
                       <div class="col-md-4">
                           <select name="" id="" class="form-control" wire:model="status">
                               <option value="1">Active</option>
                               <option value="0">Inactive</option>
                           </select>
                       </div>
                   </div>

                   <div class="form-group">
                       <label for="" class="col-md-4 control-label">Sale date</label>
                       <div class="col-md-4">
                          <input type="text" id="sale-date" placeholder="YY/MM/DD H:M:S" class="form-control input-md" wire:model="sale_date">
                       </div>
                   </div>
                   <div class="form-group">
                       <label for="" class="col-md-4 control-label"></label>
                       <div class="col-md-4">
                          <button type="submit" class="btn btn-primary">Update</button>
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
         $('#sale-date').datetimepicker({
             format:'Y-MM-DD h:m:s',
         })
         .on('dp.change',function(ev){
             var date= $('#sale-date').val();
             @this.set('sale_date',date);
         });
     });
 </script>
 @endpush