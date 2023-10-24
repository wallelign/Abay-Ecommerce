<main id="main" class="main-site">
           <style>
		        .summary-item .row-in-form input[type=password], .summary-item .row-in-form input[type=text], .summary-item .row-in-form input[type=tel] {
					font-size: 13px;
					line-height: 19px;
					display: inline-block;
					height: 43px;
					padding: 2px 20px;
					max-width: 300px;
					width: 100%;
					border: 1px solid #e6e6e6;
}
		   </style>
		<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>upload-file</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<!-- @if(Session::has('message_cart'))
				<div class="alert alert-success" role="alert">{{Session::get('message_cart')}}</div>
				@endif -->
			   <form  enctype="multipart/form-data" action="">
				<div class="row">
					<div class="col-md-12">
					<div class="wrap-address-billing">
					<h3 class="box-title">Upload File</h3>
					<div class="billing-address">
						<p class="row-in-form">
							<label for="fname">Product name<span>*</span></label>
							<input  type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
						</p>
                     <p class="product-name" style="margin-top:40px">
                          <label for="c_name" style="color:grey">Select-category</label> <br>
                         <select name="" id="" style="height:30px;width:150px; border: 1px lightgrey solid">
                           <option value="">T-shert</option>
                           <option value="">Shoes</option>
                           <option value="">Jacket</option>
                           <option value="">trouther</option>
                            <option value="">Bonda</option>
                        </select>
                         </p>
						<p class="row-in-form" >
							<label for="qty">Quantity<span>*</span></label>
							<input  type="text" name="qty" value="" placeholder="" wire:model="mobile">
						</p>
						<p class="row-in-form" >
							<label for="min_price">minumim price</label>
							<input  type="text" name="min_price" value="" placeholder="Street at apartment number" wire:model="line2">
						</p>
                        <p class="row-in-form">
							<label for="max_price">maximu price</label>
							<input  type="text" name="max_price" value="" placeholder="Street at apartment number" wire:model="line2">
						</p>
                        <p class="row-in-form">
							<label for="desc">description of product</label>
							<input  type="text" name="desc" value="" placeholder="Street at apartment number" wire:model="line2">
						</p>
						<div class="form-group ">
                            <label for="" class="col-md-2 control-label">Product Gallery:</label>
                            <div class="col-md-4" style="border:1px solid lightgrey; padding:20px 10px 20px 10px; border-radius:5px;">
                            <input type="file" class="input-file" wire:model="images">
                            </div>
						</div>

                    </div>
				    </div>
				 </div>
				</div>
              </form> 
			  <div>
			  </div>

			</div><!--end main content area-->
		</div><!--end container-->

		<style>
			.aa{
				border:2px solid gray;
			}
		</style>
	</main>
