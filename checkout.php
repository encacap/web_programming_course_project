<?php
require_once "layouts/header.php"; ?>
<div class="px-4 lg:px-10 py-10">
	<form method="post" onsubmit="return completeCheckout();">
	<div class="grid lg:grid-cols-2 gap-10">
		<div class="border-2 border-gray-100 rounded-md px-6 lg:px-10 pt-4 lg:pt-8 pb-8 lg:pb-10">
			<div class="mb-6 font-semibold">Thông tin người nhận hàng</div>
			<div class="">
			  <input required="true" type="text" class="block w-full mb-6 outline-none border-none rounded-md ring-2 ring-gray-100 px-4 py-2 focus:ring-blue-500" id="usr" name="fullname" placeholder="Họ và tên">
			</div>
			<div class="">
			  <input type="email" class="block w-full mb-6 outline-none border-none rounded-md ring-2 ring-gray-100 px-4 py-2 focus:ring-blue-500" id="email" name="email" placeholder="Email">
			</div>
			<div class="">
			  <input required="true" type="tel" class="block w-full mb-6 outline-none border-none rounded-md ring-2 ring-gray-100 px-4 py-2 focus:ring-blue-500" id="phone" name="phone" placeholder="Số điện thoại">
			</div>
			<div class="">
			  <input required="true" type="text" class="block w-full mb-6 outline-none border-none rounded-md ring-2 ring-gray-100 px-4 py-2 focus:ring-blue-500" id="address" name="address" placeholder="Địa chỉ">
			</div>
			<div class="">
			  <textarea class="block w-full outline-none border-none rounded-md ring-2 ring-gray-100 px-4 py-2 focus:ring-blue-500" rows="3" placeholder="Ghi chú"></textarea>
			</div>
		</div>
		<div class="flex flex-col">
			<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
				<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
					<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
						<table class="min-w-full divide-y divide-gray-200">
							<thead class="bg-gray-50">
								<tr>
									<th scope="col"
										class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Sản phẩm
									</th>
									<th scope="col"
										class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Đơn giá
									</th>
									<th scope="col"
										class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Số lượng
									</th>
									<th scope="col"
										class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Tổng tiền
									</th>
								</tr>
							</thead>
							<tbody class="bg-white divide-y divide-gray-100">
							<?php
       if (!isset($_SESSION["cart"])) {
           $_SESSION["cart"] = [];
       }
       $index = 0;
       foreach ($_SESSION["cart"] as $item) {
           echo '<tr c><td class="px-6 py-4 whitespace-nowrap">' .
               $item["title"] .
               '</td>
				<td class="px-6 py-4 whitespace-nowrap">' .
               number_format($item["discount"]) .
               ' VND</td>
				<td class="px-6 py-4 whitespace-nowrap">' .
               $item["num"] .
               '</td>
				<td class="px-6 py-4 whitespace-nowrap">' .
               number_format($item["discount"] * $item["num"]) .
               ' VND</td>
				</tr>';
       }
       ?>				</tbody>
						</table>
					</div>
					<a href="checkout.php" class="flex justify-center">
						<button class="flex justify-center items-center w-full mt-10 border-2 border-blue-500 rounded-md px-10 py-2 text-blue-500 hover:text-white font-semibold hover:bg-blue-500 duration-200 ring-2 ring-transparent focus:ring-blue-200">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-8 mr-4"><path d="m9.62 16 1.5 1.5 3.25-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.81 2 5.19 5.63M15.19 2l3.62 3.63" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2 7.85c0-1.85.99-2 2.22-2h15.56c1.23 0 2.22.15 2.22 2 0 2.15-.99 2-2.22 2H4.22C2.99 9.85 2 10 2 7.85Z" stroke="currentColor" stroke-width="1.5"></path><path d="m3.5 10 1.41 8.64C5.23 20.58 6 22 8.86 22h6.03c3.11 0 3.57-1.36 3.93-3.24L20.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
							Thanh toán
						</button>
					</a>
				</div>
			</div>
		</div>
	</div>
</form>
</div>

<script type="text/javascript">
	function completeCheckout() {
		$.post('api/ajax_request.php', {
			'action': 'checkout',
			'fullname': $('[name=fullname]').val(),
			'email': $('[name=email]').val(),
			'phone_number': $('[name=phone]').val(),
			'address': $('[name=address]').val(),
			'note': $('[name=note]').val()
		}, function() {
			window.open('complete.php', '_self');
		})

		return false;
	}
</script>
<?php require_once "layouts/footer.php";
?>
