<x-app-layout>
	<x-slot name="title">
		<h1>Add Customer</h1>
	</x-slot>
	<x-slot name="content">
		<form method="post" id="create_customer" class="customer_add" action="{{ url('customer_store') }}">
		{{csrf_field()}}
			<div class="row">
				<div class="col-xs-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Customer Information</h4>
							<div class="clear"></div>
						</div>
						<div class="panel-body form-group form-group-sm">
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<input type="text" class="form-control margin-bottom copy-input required"
											name="name" id="customer_name" placeholder="Enter Name"
											tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" class="form-control margin-bottom copy-input required"
											name="address_1" id="customer_address_1" placeholder="Address 1"
											tabindex="3">
									</div>
									<div class="form-group">
										<input type="text" class="form-control margin-bottom copy-input required"
											name="town" id="customer_town" placeholder="Town/City"
											tabindex="5">
									</div>
									<div class="form-group no-margin-bottom">
										<input type="text" class="form-control copy-input required"
											name="postcode" id="customer_postcode" placeholder="Postcode"
											tabindex="7" maxlength="6">
									</div>
								</div>
								<div class="col-xs-6">
									<div class="input-group float-right margin-bottom">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="email" class="form-control copy-input required"
											name="email" id="customer_email" placeholder="Email"
											aria-describedby="sizing-addon1" tabindex="2">
									</div>
									<div class="form-group">
										<input type="text" class="form-control margin-bottom copy-input"
											name="address_2" id="customer_address_2" placeholder="Address 2"
											tabindex="4">
									</div>
									<div class="form-group">
										<input type="text" class="form-control margin-bottom copy-input required"
											name="state" id="customer_state" placeholder="State"
											tabindex="6">
									</div>
									<div class="form-group no-margin-bottom">
										<input type="text" class="form-control required" name="phone"
											id="invoice_phone" placeholder="Phone Number" tabindex="8" >
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 text-right">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Shipping Information</h4>
						</div>
						<div class="panel-body form-group form-group-sm">
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<input type="text" class="form-control margin-bottom required"
											name="name_ship" id="customer_name_ship" placeholder="Enter name"
											tabindex="9">
									</div>
									<div class="form-group">
										<input type="text" class="form-control margin-bottom"
											name="address_2_ship" id="customer_address_2_ship"
											placeholder="Address 2" tabindex="11">
									</div>
									<div class="form-group no-margin-bottom">
										<input type="text" class="form-control required" name="state_ship"
											id="customer_state_ship" placeholder="State" tabindex="13">
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<input type="text" class="form-control margin-bottom required"
											name="address_1_ship" id="customer_address_1_ship"
											placeholder="Address 1" tabindex="10">
									</div>
									<div class="form-group">
										<input type="text" class="form-control margin-bottom required"
											name="town_ship" id="customer_town_ship" placeholder="Town/City"
											tabindex="12">
									</div>
									<div class="form-group no-margin-bottom">
										<input type="text" class="form-control required" name="postcode_ship"
											id="customer_postcode_ship" placeholder="Postcode" tabindex="14">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 margin-top btn-group">
					<input type="submit" id="action_create_customer" class="btn btn-success float-right"
						value="Create Customer" data-loading-text="Creating...">
				</div>
			</div>
		</form>
	</x-slot>
</x-app-layout>