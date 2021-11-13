<?php
$title = "Thông tin chi tiết đơn hàng";
$baseUrl = "../";
$selected = "order";
require_once "../layouts/header.php";

$orderId = getGet("id");

$sql = "SELECT Order_Details.*, Product.title, Product.thumbnail 
	FROM Order_Details LEFT JOIN Product ON Product.id = Order_Details.product_id 
	WHERE Order_Details.order_id = $orderId";

$data = executeResult($sql);

$sql = "SELECT * FROM Orders WHERE id = $orderId";
$orderItem = executeResult($sql, true);
?>

<div class="px-10 py-9">
	<div class="mb-10">
		<h3 class="text-2xl">Chi tiết đơn hàng</h3>
	</div>
	<div class="grid grid-cols-3 gap-4">
		<div class="col-span-2 flex flex-col">
			<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
				<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
					<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
		<table class="min-w-full divide-y divide-gray-200">
				<thead class="bg-gray-50">
								<tr>
									<th scope="col"
										class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Thứ tự
									</th>
									<th scope="col"
										class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
										Hình ảnh
									</th>
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
									<th scope="col" class="relative px-6 py-3">
										<span class="sr-only">Hành động</span>
									</th>
								</tr>
							</thead>
						<tbody class="bg-white divide-y divide-gray-200">
		<?php
  $index = 0;
  foreach ($data as $item) {
      echo '<tr>
						<td class="px-10 py-4 whitespace-nowrap">' .
          ++$index .
          '</td>
						<td class="px-6 py-4 whitespace-nowrap"><img src="' .
          fixUrl($item["thumbnail"]) .
          '" class="h-16" /></td>
						<td class="px-6 py-4 whitespace-nowrap">' .
          $item["title"] .
          '</td>
						<td class="px-6 py-4 whitespace-nowrap">' .
          $item["price"] .
          '</td>
						<td class="px-6 py-4 whitespace-nowrap">' .
          $item["num"] .
          '</td>
						<td class="px-6 py-4 whitespace-nowrap">' .
          $item["total_money"] .
          '</td>
					</tr>';
  }
  ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="px-6 py-4 whitespace-nowrap font-semibold">Tổng Tiền</td>
						<td class="px-6 py-4 whitespace-nowrap font-semibold"><?= $orderItem[
          "total_money"
      ] ?></td>
					</tr>
				</tbody>
			</table>
			</div></div></div>
		</div>
		<div class="border-2 border-gray-100 rounded-md px-6 py-5">
			<div class="font-semibold">Thông tin người đặt hàng</div>
			<div class="w-10 h-1 mt-6 mb-5 bg-gray-200"></div>
			<div class="flex items-center justify-between pb-2">
				<div class="font-semibold">Họ và tên:</div>
				<div class="ml-4"><?= $orderItem["fullname"] ?></div>
			</div>
			<div class="flex items-center justify-between pb-2">
				<div class="font-semibold">Email:</div>
				<div class="ml-4"><?= $orderItem["email"] ?></div>
			</div>
			<div class="flex items-center justify-between pb-2">
				<div class="font-semibold">Số điện thoại:</div>
				<div class="ml-4"><?= $orderItem["phone_number"] ?></div>
			</div>
			<div class="flex items-center justify-between pb-2">
				<div class="font-semibold">Địa chỉ:</div>
				<div class="ml-4"><?= $orderItem["address"] ?></div>
			</div>
			<div class="flex items-center justify-between pb-2">
				<div class="font-semibold">Ghi chú:</div>
				<div class="ml-4"><?= $orderItem["note"] ?></div>
			</div>
			<div class="flex items-center justify-between pb-2">
				<div class="font-semibold">Trạng thái đơn hàng:</div>
				<div class="ml-4">
					<?php if ($orderItem["status"] == 0) {
         echo "Chờ xác nhận";
     } elseif ($orderItem["status"] == 1) {
         echo "Đã xác nhận";
     } else {
         echo "Đã huỷ";
     } ?>
				</div>
			</div>
			</div>
			<!-- <table class="table table-bordered table-hover" style="margin-top: 20px;">
				<tr>
					<th>Họ & Tên: </th>
					<td><?= $orderItem["fullname"] ?></td>
				</tr>
				<tr>
					<th>Email: </th>
					<td><?= $orderItem["email"] ?></td>
				</tr>
				<tr>
					<th>Địa Chỉ: </th>
					<td><?= $orderItem["address"] ?></td>
				</tr>
				<tr>
					<th>Phone: </th>
					<td><?= $orderItem["phone_number"] ?></td>
				</tr>
			</table> -->
		</div>
	</div>
</div>
<?php require_once "../layouts/footer.php";
?>
