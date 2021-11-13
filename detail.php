<?php

$categoryId = $_GET["category"];
require_once "layouts/header.php";

$productId = getGet("id");
$sql = "SELECT Product.*, Category.name AS category_name 
	FROM Product LEFT JOIN Category 
	ON Product.category_id = Category.id 
	WHERE Product.id = $productId
";
$product = executeResult($sql, true);

$category_id = $product["category_id"];
$sql = "SELECT Product.*, Category.name AS category_name 
	FROM Product LEFT JOIN Category ON Product.category_id = Category.id 
	WHERE Product.category_id = $category_id 
	ORDER BY Product.updated_at DESC 
	LIMIT 0, 5
";

$latestItems = executeResult($sql);
?>
<div class="px-4 lg:px-10 mt-10">
    <div class="grid lg:grid-cols-2 gap-10">
        <div class="w-full h-96 rounded-2xl bg-black">
            <img src="<?= $product[
                "thumbnail"
            ] ?>" class="w-full h-full object-contain object-center">
        </div>
        <div class="">
            <div class="pb-2">
                <a href="/" class="text-gray-400 hover:text-blue-500">Trang chủ</a>
                <span class="text-gray-400">/</span>
                <!-- <a href="category.php?id=<?= $categoryId ?>" class="text-gray-400 hover:text-blue-500">Phụ nữ</a> -->
                <!-- <span class="text-gray-400">/</span> -->
            </div>
            <h2 class="text-2xl py-1"><?= $product["title"] ?></h2>
            <div class="w-20 h-1 bg-gray-200 mt-5"></div>
            <div class="mt-4">
                <span style="font-size: 30px; color: red; margin-top: 15px; margin-bottom: 15px;">
                    <?= number_format($product["discount"]) ?> VND
                </span>
                <span style="font-size: 15px; color: grey; margin-top: 15px; margin-bottom: 15px;">
                    <del><?= number_format($product["price"]) ?> VND</del>
                </span>
            </div>
            <div class="mt-6 border-2 border-gray-200 rounded-md px-7 py-5">
                <div class="font-semibold text-blue-500">Khuyến mãi hấp dẫn</div>
                <ul class="list-disc list-inside">
                    <li class="py-2">Miễn phí vận chuyển cho đơn hàng tối thiểu 880.000 VND.</li>
                    <li class="pb-2">Chuyển hàng toàn quốc, thanh toán COD.</li>
                    <li class="pb-2">Cam kết hàng chất lượng và giá tốt nhất.</li>
                    <li class="">Đổi trả hàng nếu hàng lỗi hay hư hỏng.</li>
                </ul>
            </div>
            <div class="flex mt-10">
                <div class="flex">
                    <button
                        class="flex items-center justify-center h-full rounded-l-md border-2 border-r-0 border-gray-200 px-2 text-xl"
                        onclick="addMoreCart(-1)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 text-black">
                            <path d="M6 12h12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg></button>
                    <input type="number" name="num" step="1" value="1" onchange="fixCartNum()"
                        class="w-20 border outline-none ring-1 ring-gray-200 ring-inset px-4 text-center focus:ring-blue-500" />
                    <button
                        class="flex items-center justify-center h-full rounded-r-md border-2 border-l-0 border-gray-200 px-2 text-xl"
                        onclick="addMoreCart(1)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 text-black">
                            <path d="M6 12h12M12 18V6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg></button>
                </div>
                <button
                    class="flex-1 flex items-center justify-center w-full ml-10 border-2 border-blue-500 rounded-md py-2 text-blue-500 duration-200 hover:text-white hover:bg-blue-500"
                    onclick="addCart(<?= $product[
                        "id"
                    ] ?>, $('[name=num]').val())">
                    <div class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            class="w-7 mr-2">
                            <path
                                d="M7.5 7.67V6.7c0-2.25 1.81-4.46 4.06-4.67a4.5 4.5 0 0 1 4.94 4.48v1.38M9 22h6c4.02 0 4.74-1.61 4.95-3.57l.75-6C20.97 9.99 20.27 8 16 8H8c-4.27 0-4.97 1.99-4.7 4.43l.75 6C4.26 20.39 4.98 22 9 22Z"
                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M15.495 12h.01M8.495 12h.008" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></div> Thêm vào giỏ hàng
                </button>
            </div>
        </div>
        <div class="">
            <h3 class="font-semibold text-xl mb-4">Chi Tiết Sản Phẩm</h3>
            <?= $product["description"] ?>
        </div>
    </div>
</div>
<div class="mt-4 px-4 lg:px-10 mb-10">
    <div class="w-full h-0.5 bg-gray-100"></div>
    <h1 class="font-semibold text-xl mt-4">Sản phẩm liên quan</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mt-6">
        <?php foreach ($latestItems as $item) {
            echo '
			<div class="rounded-lg border-2 border-gray-100 overflow-hidden p-4 bg-white duration-200 hover:border-blue-500 shadow-sm">
				<a href="detail.php?id=' .
                $item["id"] .
                '" class="block w-full h-52 rounded-md overflow-hidden">
					<img src="' .
                $item["thumbnail"] .
                '" class="w-full h-full object-center object-cover">
				</a>
				<div class="flex mt-4 mb-3"><p class="rounded-full bg-gray-200 px-3 py-1 text-sm text-gray-500">' .
                $item["category_name"] .
                '</p></div>
							<a href="detail.php?id=' .
                $item["id"] .
                '"><p style="font-weight: bold;">' .
                $item["title"] .
                '</p></a>
							<p class="my-1" style="color: red; font-weight: bold;">' .
                number_format($item["discount"]) .
                ' VND</p>
							<div><button class="flex items-center justify-center w-full mt-3 border-2 border-blue-500 rounded-md py-2 text-blue-500 duration-200 hover:text-white hover:bg-blue-500" onclick="addCart(' .
                $item["id"] .
                ', 1)"><div class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-7 mr-2"><path d="M7.5 7.67V6.7c0-2.25 1.81-4.46 4.06-4.67a4.5 4.5 0 0 1 4.94 4.48v1.38M9 22h6c4.02 0 4.74-1.61 4.95-3.57l.75-6C20.97 9.99 20.27 8 16 8H8c-4.27 0-4.97 1.99-4.7 4.43l.75 6C4.26 20.39 4.98 22 9 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.495 12h.01M8.495 12h.008" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></div> Thêm vào giỏ hàng</button></div>
				</div>';
        } ?>
    </div>
</div>

<script type="text/javascript">
function addMoreCart(delta) {
    num = parseInt($('[name=num]').val())
    num += delta
    if (num < 1) num = 1;
    $('[name=num]').val(num)
}

function fixCartNum() {
    $('[name=num]').val(Math.abs($('[name=num]').val()))
}
</script>
<?php require_once "layouts/footer.php";
?>
