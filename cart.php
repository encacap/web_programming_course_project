<?php
require_once "layouts/header.php"; ?>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col p-10">
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
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        if (!isset($_SESSION["cart"])) {
                            $_SESSION["cart"] = [];
                        }
                        $index = 0;
                        foreach ($_SESSION["cart"] as $item) {
                            echo '<tr>
									<td class="px-12">' .
                                ++$index .
                                '</td>
									<td class="px-6 py-4 whitespace-nowrap"><img src="' .
                                $item["thumbnail"] .
                                '" class="h-20 rounded-md" /></td>
									<td class="px-6 py-4 whitespace-nowrap">' .
                                $item["title"] .
                                '</td>
								<td class="px-6 py-4 whitespace-nowrap">' .
                                number_format($item["discount"]) .
                                ' VND</td>
								<td class="px-6 py-4 whitespace-nowrap"><div class="flex"><button class="flex items-center justify-center h-10 rounded-l-md border-2 border-r-0 border-gray-200 px-2" onclick="addMoreCart(' .
                                $item["id"] .
                                ', -1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 text-black">
								<path d="M6 12h12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
									stroke-linejoin="round"></path>
								</svg></button>
								<input type="number" id="num_' .
                                $item["id"] .
                                '" value="' .
                                $item["num"] .
                                '" class="w-20 border outline-none ring-1 ring-gray-200 ring-inset px-4 text-center focus:ring-blue-500" onchange="fixCartNum(' .
                                $item["id"] .
                                ')"/>
								<button class="flex items-center justify-center h-10 rounded-r-md border-2 border-l-0 border-gray-200 px-2" onclick="addMoreCart(' .
                                $item["id"] .
                                ', 1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 text-black">
								<path d="M6 12h12M12 18V6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
									stroke-linejoin="round"></path>
								</svg></button></div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">' .
                                number_format(
                                    $item["discount"] * $item["num"]
                                ) .
                                ' VND</td>
								<td class="px-6 py-4 whitespace-nowrap"><button class="flex items-center border-2 border-gray-200 rounded-md px-3 py-2 hover:border-blue-500 hover:text-blue-500 duration-200" onclick="updateCart(' .
                                $item["id"] .
                                ', 0)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-6 mr-2"><path d="m13.39 17.36-2.75-2.75M13.36 14.64l-2.75 2.75M8.81 2 5.19 5.63M15.19 2l3.62 3.63" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2 7.85c0-1.85.99-2 2.22-2h15.56c1.23 0 2.22.15 2.22 2 0 2.15-.99 2-2.22 2H4.22C2.99 9.85 2 10 2 7.85Z" stroke="currentColor" stroke-width="1.5"></path><path d="m3.5 10 1.41 8.64C5.23 20.58 6 22 8.86 22h6.03c3.11 0 3.57-1.36 3.93-3.24L20.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg> Xoá</button></td>
								</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="checkout.php" class="flex justify-center">
        <button class="flex justify-center items-center mt-10 border-2 border-blue-500 bg-blue-500 rounded-md px-10 py-2 text-white font-semibold hover:bg-blue-700 duration-200 ring-2 ring-transparent focus:ring-blue-200">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-8 mr-4"><path d="m9.62 16 1.5 1.5 3.25-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.81 2 5.19 5.63M15.19 2l3.62 3.63" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2 7.85c0-1.85.99-2 2.22-2h15.56c1.23 0 2.22.15 2.22 2 0 2.15-.99 2-2.22 2H4.22C2.99 9.85 2 10 2 7.85Z" stroke="currentColor" stroke-width="1.5"></path><path d="m3.5 10 1.41 8.64C5.23 20.58 6 22 8.86 22h6.03c3.11 0 3.57-1.36 3.93-3.24L20.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
            Thanh toán
        </button>
    </a>
</div>
<script type="text/javascript">
function addMoreCart(id, delta) {
    num = parseInt($('#num_' + id).val())
    num += delta
    $('#num_' + id).val(num)

    updateCart(id, num)
}

function fixCartNum(id) {
    $('#num_' + id).val(Math.abs($('#num_' + id).val()))

    updateCart(id, $('#num_' + id).val())
}

function updateCart(productId, num) {
    $.post('api/ajax_request.php', {
        'action': 'update_cart',
        'id': productId,
        'num': num
    }, function(data) {
        location.reload()
    })
}
</script>
<?php require_once "layouts/footer.php";
?>
