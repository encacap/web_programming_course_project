<?php
$title = "Quản lý sản phẩm";
$baseUrl = "../";
$selected = "product";
require_once "../layouts/header.php";

$sql =
    "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.deleted = 0";
$data = executeResult($sql);
?>

<div class="px-10 py-8">
	<div class="flex items-center mb-10">
		<h3 class="text-2xl">Quản lý sản phẩm</h3>
		<a href="./editor.php" class="flex justify-center items-center ml-10 border-2 border-blue-500 rounded-md px-4 py-2 text-blue-500 hover:bg-blue-500 hover:text-white duration-200"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-6 mr-4"><path d="M8 12h8M12 16V8M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>Thêm sản phẩm mới</a>
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
					Thứ tự
				</th>
				<th scope="col"
					class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					Hình ảnh
				</th>
				<th scope="col"
					class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					Tên sản phẩm
				</th>
				<th scope="col"
					class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					Giá gốc
				</th>
				<th scope="col"
					class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					Giảm giá
				</th>
				<th scope="col"
					class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					Danh mục
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
					<td class="px-6 py-4 whitespace-nowrap"><img class="h-14" src="' .
        fixUrl($item["thumbnail"]) .
        '"/></td>
					<td class="w-1/3 px-6 py-4 whitespace-nowrap">' .
        $item["title"] .
        '</td>
					<td class="px-6 py-4 whitespace-nowrap">' .
        number_format($item["price"]) .
        ' VNĐ</td>
		</td>
					<td class="px-6 py-4 whitespace-nowrap">' .
        number_format($item["discount"]) .
        ' VNĐ</td>
					<td class="px-6 py-4 whitespace-nowrap">' .
        $item["category_name"] .
        '</td>
					<td class="px-6 py-4 whitespace-nowrap">
					<div class="flex items-center">
						<a href="editor.php?id=' .
        $item["id"] .
        '"><button class="flex items-center mr-4 border-2 border-blue-500 rounded-md px-3 py-1 hover:border-blue-500 text-white bg-blue-500 hover:bg-blue-700 duration-200"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 mr-2"><path d="M11 2H9C4 2 2 4 2 9v6c0 5 2 7 7 7h6c5 0 7-2 7-7v-2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16.04 3.02 8.16 10.9c-.3.3-.6.89-.66 1.32l-.43 3.01c-.16 1.09.61 1.85 1.7 1.7l3.01-.43c.42-.06 1.01-.36 1.32-.66l7.88-7.88c1.36-1.36 2-2.94 0-4.94-2-2-3.58-1.36-4.94 0Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M14.91 4.15a7.144 7.144 0 0 0 4.94 4.94" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg>Sửa</button></a>
						<button onclick="deleteProduct(' .
        $item["id"] .
        ')" class="flex items-center border-2 border-gray-200 rounded-md px-3 py-1 hover:border-blue-500 hover:text-blue-500 duration-200"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-5 mr-2"><path d="m13.39 17.36-2.75-2.75M13.36 14.64l-2.75 2.75M8.81 2 5.19 5.63M15.19 2l3.62 3.63" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2 7.85c0-1.85.99-2 2.22-2h15.56c1.23 0 2.22.15 2.22 2 0 2.15-.99 2-2.22 2H4.22C2.99 9.85 2 10 2 7.85Z" stroke="currentColor" stroke-width="1.5"></path><path d="m3.5 10 1.41 8.64C5.23 20.58 6 22 8.86 22h6.03c3.11 0 3.57-1.36 3.93-3.24L20.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg> Xoá</button></div>
					</td>
				</tr>';
}
?>
			</tbody>
		</table>
</div></div></div>
	</div>
</div>

<script type="text/javascript">
	function deleteProduct(id) {
		option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
		if(!option) return;

		$.post('form_api.php', {
			'id': id,
			'action': 'delete'
		}, function(data) {
			location.reload()
		})
	}
</script>

<?php require_once "../layouts/footer.php";
?>
