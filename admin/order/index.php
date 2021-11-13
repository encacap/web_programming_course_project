<?php
$title = "Quản lý đơn hàng";
$baseUrl = "../";
$selected = "order";
require_once "../layouts/header.php";

//pending, approved, cancel
$sql = "select * from Orders order by status asc, order_date desc";
$data = executeResult($sql);
?>

<div class="px-10 py-9">
	<div class="col-md-12" style="margin-bottom: 20px;">
		<h3 class="text-2xl">Quản lý đơn hàng</h3>
	</div>
	<div class="flex flex-col mt-10">
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
                                Họ & Tên
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Điện thoại
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tổng tiền
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ngày tạo
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
    echo '<tr class="hover:text-blue-500 duration-200">
					<td class="px-10 py-4 whitespace-nowrap">' .
        ++$index .
        '</td>
					<td class="px-6 py-4"><a href="detail.php?id=' .
        $item["id"] .
        '">' .
        $item["fullname"] .
        '</a></td>
					<td class="px-6 py-4"><a href="detail.php?id=' .
        $item["id"] .
        '">' .
        $item["phone_number"] .
        '</a></td>
					<td class="px-6 py-4"><a href="detail.php?id=' .
        $item["id"] .
        '">' .
        $item["email"] .
        '</a></td>
					<td class="px-6 py-4">' .
        $item["total_money"] .
        '</td>
					<td class="px-6 py-4">' .
        $item["order_date"] .
        '</td>
					<td class="px-6 py-4 whitespace-nowrap">';
    if ($item["status"] == 0) {
        echo '<div class="flex items-center"><button onclick="changeStatus(' .
            $item["id"] .
            ', 1)" class="flex items-center mr-4 border-2 border-blue-500 rounded-md px-3 py-1 hover:border-blue-500 text-white bg-blue-500 hover:bg-blue-700 duration-200">Xác nhận</button>
			<button onclick="changeStatus(' .
            $item["id"] .
            ', 2)" class="flex items-center border-2 border-red-200 text-red-500 rounded-md px-3 py-1 hover:border-red-500 hover:bg-red-500 hover:text-white duration-200">Huỷ</button></div>';
    } elseif ($item["status"] == 1) {
        echo '<label class="border-2 border-green-200 bg-green-100 text-green-600 rounded-md px-3 py-1">Đã xác nhận</label>';
    } else {
        echo '<label class="border-2 border-red-200 bg-red-100 text-red-600 rounded-md px-3 py-1">Đã huỷ</label>';
    }
    echo '</td>
				</tr>';
}
?>
			</tbody>
		</table></div></div></div>
	</div>
</div>

<script type="text/javascript">
	function changeStatus(id, status) {
		$.post('form_api.php', {
			'id': id,
			'status': status,
			'action': 'update_status'
		}, function(data) {
			location.reload()
		})
	}
</script>

<?php require_once "../layouts/footer.php";
?>
