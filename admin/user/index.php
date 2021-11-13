<?php
$title = "Quản lý người dùng";
$baseUrl = "../";
$selected = "user";
require_once "../layouts/header.php";

$sql =
    "select User.*, Role.name as role_name from User left join Role on User.role_id = Role.id where User.deleted = 0";
$data = executeResult($sql);
?>

<div class="px-10 py-9">
	<div class="col-md-12" style="margin-bottom: 20px;">
		<h<div class="flex items-center mb-10">
		<h3 class="text-2xl">Quản lý người dùng</h3>
		<a href="./editor.php" class="flex justify-center items-center ml-10 border-2 border-blue-500 rounded-md px-4 py-2 text-blue-500 hover:bg-blue-500 hover:text-white duration-200"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-6 mr-4"><path d="M8 12h8M12 16V8M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>Thêm tài khoản mới</a>
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
                                Họ và tên
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quyền
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
					<td class="px-6 py-4 whitespace-nowrap">' .
        $item["fullname"] .
        '</td>
					<td class="px-6 py-4 whitespace-nowrap">' .
        $item["email"] .
        '</td>
					<td class="px-6 py-4 whitespace-nowrap">' .
        $item["role_name"] .
        '</td>
					<td class="px-6 py-4 whitespace-nowrap"><div class="flex justify-end items-center">
						<a href="editor.php?id=' .
        $item["id"] .
        '"><button class="flex items-center border-2 border-blue-500 rounded-md px-3 py-1 hover:border-blue-500 text-white bg-blue-500 hover:bg-blue-700 duration-200"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 mr-2"><path d="M11 2H9C4 2 2 4 2 9v6c0 5 2 7 7 7h6c5 0 7-2 7-7v-2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16.04 3.02 8.16 10.9c-.3.3-.6.89-.66 1.32l-.43 3.01c-.16 1.09.61 1.85 1.7 1.7l3.01-.43c.42-.06 1.01-.36 1.32-.66l7.88-7.88c1.36-1.36 2-2.94 0-4.94-2-2-3.58-1.36-4.94 0Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M14.91 4.15a7.144 7.144 0 0 0 4.94 4.94" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg>Sửa</button></a>';
    if ($user["id"] != $item["id"] && $item["role_id"] != 1) {
        echo '<button onclick="showModal(' .
            $item["id"] .
            ')" class="flex items-center ml-4  border-2 border-gray-200 rounded-md px-3 py-1 hover:border-blue-500 hover:text-blue-500 duration-200"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-5 mr-2"><path d="m13.39 17.36-2.75-2.75M13.36 14.64l-2.75 2.75M8.81 2 5.19 5.63M15.19 2l3.62 3.63" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2 7.85c0-1.85.99-2 2.22-2h15.56c1.23 0 2.22.15 2.22 2 0 2.15-.99 2-2.22 2H4.22C2.99 9.85 2 10 2 7.85Z" stroke="currentColor" stroke-width="1.5"></path><path d="m3.5 10 1.41 8.64C5.23 20.58 6 22 8.86 22h6.03c3.11 0 3.57-1.36 3.93-3.24L20.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>Xoá</button></div>';
    }
    echo '
					</td>
				</tr>';
}
?>
			</tbody>
		</table>
</div></div></div></div>
	</div>
</div>
<div class="confirm-delete hidden justify-center items-center fixed top-20 left-0 right-0 bottom-0 w-screen h-screen" style="background-color: rgba(0, 0, 0, 0.5);">
		<div class="bg-white rounded-md overflow-hidden px-10 py-8  max-w-7xl" style="max-width: 480px;">
			<div class="font-semibold text-xl" id="title">Bạn có chắc muốn xoá người dùng này?</div>
			<div class="w-12 h-1 bg-gray-200 rounded-md my-6"></div>
			<div class="form-group">
			  <div class="border-2 border-yellow-600 rounded-md px-4 py-3 text-yellow-600" id="message">Người dùng và toàn bộ thông tin về người dùng sẽ bị xoá vĩnh viễn.</div>
			</div>
			<div class="flex mt-4">
				<button type="button" class="flex-1 mt-4 border-2 border-gray-200 rounded-md bg-gray-100 px-4 py-2 hover:bg-gray-200 duration-200" onclick="hideModal()" id="cancelDelete">Huỷ bỏ</button>
				<button type="submit" class="flex-1 mt-4 ml-4 border-2 border-red-500 rounded-md bg-red-500 px-4 py-2 text-white hover:bg-red-700 duration-200" id="deleteUser">Xoá</button>
			</div>
		</div>
	</div>
<script type="text/javascript">
	function deleteUser(id) {
		$.post('form_api.php', {
			'id': id,
			'action': 'delete'
		}, function(data) {
			location.reload()
		})
	}
	function hideModal() {
		const modal = document.querySelector('.confirm-delete');
		modal.classList.remove('flex');
		modal.classList.add('hidden');
	}
	function showModal(id) {
		const modal = document.querySelector('.confirm-delete');
		const deleteButton = document.getElementById('deleteUser');
		modal.classList.add('flex');
		modal.classList.remove('hidden');
		deleteButton.setAttribute('onclick', 'deleteUser(' + id + ')');
	}
</script>

<?php require_once "../layouts/footer.php";
?>
