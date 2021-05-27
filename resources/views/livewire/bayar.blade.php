<div class="container" style="margin-top: 100px;">
	<div class="row justify-content-center">
		<div class="col-md-6">
			@if($belanja->status == 1)
			 <div class="row">
			 	<h1 class="mb-5 text-center">Choose Your Payment Method and Checkout</h1>
			 	<div class="justify-content-center">
			 		<img class="justify-content-center text-center" src="{{ asset('assets/Payment.png')}}" style="size: 50px;" alt="..."></img>
			 	</div>
			 	<div class="col-md-12 justify-content-center">
			 		<button id="pay-button" type="button" class="btn btn-primary justify-content-center text-center shadow rounded-pill">Choose Payment</button>
			 	</div>
			 </div>
			 @elseif($belanja->status == 2)
			 <div class="shadow p-3 mb-5 bg-white rounded">
			 	<div class="col-md-12">
				 <h1 class="text-center mb-5" style="color: grey;"><i class="fa fa-info"></i> Payment Information</h1>
			 		<div class="row">
			 			<div class="col">
			 				<table class="table" style="border-top : hidden">
			 					<!-- <tr>
			 						<td>Virtual Akun Number</td>
			 						<td>:</td>
			 						<td>{{$va_number}}</td>
			 					</tr>
			 					<tr>
			 						<td>Bank</td>
			 						<td>:</td>
			 						<td>{{$bank}}</td>
			 					</tr> -->
			 					<tr>
			 						<td>Total Pembayaran</td>
			 						<td>:</td>
			 						<td>{{$gross_amount}}</td>
			 					</tr>
			 					<tr>
			 						<td>Status</td>
			 						<td>:</td>
			 						<td>{{$transaction_status}}</td>
			 					</tr>
			 					<tr>
			 						<td>Batas Waktu Pembayaran</td>
			 						<td>:</td>
			 						<td>{{$deadline}}</td>
			 					</tr>
			 				</table>
			 			</div>
			 		</div>
			 	</div>
			 </div>
			@endif
		</div>
	</div>
</div>

<div>
	<form id="payment-form" method="get" action="payment">
			<input type="hidden" name="result_data" id="result-data" value="">
	</form>
</div>

</body>

<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-NGoHWurz0Pn1ILn6"></script>
<script type="text/javascript">
	document.getElementById('pay-button').onclick = function(){
		//snapToken acquired from previous step

		var resultType = document.getElementById('result-type');
		var resultData = document.getElementById('result-data');
		function changeResult(type,data){
			$("#result-type").val(type);
			$("#result-data").val(JSON.stringify(data));
			//resultType.innerHTML = type;
			//resultData.innerHTML = JSON.stringify(data);
		}

		snap.pay('<?=$snapToken?>', {
			//optional
			onSuccess: function(result){
				changeResult('success', result);
				console.log(result.status_message);
				console.log(result);
				$("#payment-form").submit();
			},
			onPending: function(result){
				changeResult('pending', result);
				console.log(result.status_message);
				$("#payment-form").submit();
			},
			onError: function(result){
				changeResult('error', result);
				console.log(result.status_message);
				$("#payment-form").submit();
		}
    });
};
</script>