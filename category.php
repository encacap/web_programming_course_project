<?php
require_once "./database/config.php";
$title = "Danh mục";
$categoryId = $_GET["id"];
require_once "layouts/header.php";
$category_id = getGet("id");

$sql = "SELECT name FROM Category WHERE id = " . $categoryId . "";
$categoryName = executeResult($sql);

$sql = "SELECT id FROM Product WHERE category_id = " . $categoryId . " AND Product.deleted = 0" ;
$items = executeResult($sql);
$totalItems = count($items);
$page = 1;
$totalPages = ceil($totalItems / ITEMS_PER_PAGE);

if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page < 1) {
        $page = 1;
    } elseif ($page > $totalPages) {
        $page = $totalPages;
    }
}

if ($category_id == null || $category_id == "") {
    $sql =
        "SELECT Product.*, Category.name AS category_name 
		FROM Product LEFT JOIN Category 
		ON Product.category_id = Category.id 
        WHERE Product.deleted = 0
		ORDER BY Product.updated_at DESC 
		LIMIT " .
        ($page - 1) * ITEMS_PER_PAGE .
        ", " .
        ITEMS_PER_PAGE .
        "
	";
} else {
    $sql =
        "SELECT Product.*, Category.name AS category_name 
		FROM Product LEFT JOIN Category 
		ON Product.category_id = Category.id 
		WHERE Product.category_id = $category_id 
        AND Product.deleted = 0
		ORDER BY Product.updated_at DESC 
		LIMIT " .
        ($page - 1) * ITEMS_PER_PAGE .
        ", " .
        ITEMS_PER_PAGE .
        "
	";
}

$latestItems = executeResult($sql);
?>
<div class="px-4 lg:px-10 mb-10">
    <div class="mt-4 py-3">
        <span class="text-gray-400">Trang chủ</span>
        <span class="text-gray-400">/</span>
        <!-- <a href="category.php?id=<?= $categoryId ?>" class="hover:text-blue-500">Phụ nữ</a> -->
    </div>
    <div class="mt-0">
        <div class="text-xl uppercase">Tất cả sản phẩm thuộc danh mục <?= $categoryName[0][
            "name"
        ] ?></div>
        <div class="py-2 text-gray-400">
            <span>Hiện có <?= $totalItems ?> sản phẩm</span>
            <span class="mx-1">•</span>
            <span>Đang hiển thị trang <?= $page ?> trong tổng số <?= $totalPages ?> trang</span>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mt-6">
        <?php foreach ($latestItems as $item) {
            echo '
			<div class="rounded-lg border-2 border-gray-100 overflow-hidden p-4 bg-white duration-200 hover:border-blue-500 shadow-sm">
				<a href="detail.php?id=' .
                $item["id"] .
                "&category=" .
                $categoryId .
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
                "&category=" .
                $categoryId .
                '"><p style="font-weight: bold;">' .
                $item["title"] .
                '</p></a>
							<p class="my-1" style="color: red; font-weight: bold;">' .
                number_format($item["discount"]) .
                ' VND <span style="color:black; font-size: 12px; font-weight: normal; -webkit-text-stroke: 1px black; text-decoration-line: line-through">'.number_format($item["price"]) .' VND </span></p>
							<div><button class="flex items-center justify-center w-full mt-3 border-2 border-blue-500 rounded-md py-2 text-blue-500 duration-200 hover:text-white hover:bg-blue-500" onclick="addCart(' .
                $item["id"] .
                ', 1)"><div class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-7 mr-2"><path d="M7.5 7.67V6.7c0-2.25 1.81-4.46 4.06-4.67a4.5 4.5 0 0 1 4.94 4.48v1.38M9 22h6c4.02 0 4.74-1.61 4.95-3.57l.75-6C20.97 9.99 20.27 8 16 8H8c-4.27 0-4.97 1.99-4.7 4.43l.75 6C4.26 20.39 4.98 22 9 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.495 12h.01M8.495 12h.008" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></div> Thêm vào giỏ hàng</button></div>
				</div>';
        } ?>
    </div>
    <div class="z-0 flex justify-center mb-4 md:mb-0 mt-10 mx-auto rounded-md -space-x-px">
        <a href="category.php?id=<?= $categoryId ?>&page=<?= $page -
    1 ?>" class="
                                    relative
                                    inline-flex
                                    items-center
                                    px-2
                                    py-2
                                    rounded-l-md
                                    border border-gray-300
                                    bg-white
                                    text-sm
                                    font-medium
                                    text-gray-500
                                    hover:bg-gray-50
                                ">
            <span class="sr-only">Previous</span>

            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
        <?php for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $page) {
                echo '<a href="/real_estate_detail.html" aria-current="page" class="
				z-10
				bg-blue-100
				border-blue-500
				text-blue-500
				relative
				inline-flex
				items-center
				px-4
				py-2
				border
				text-sm
				font-medium
			">
	' .
                    $i .
                    '
	</a>';
            } else {
                echo '<a href="category.php?id=' .
                    $categoryId .
                    "&page=" .
                    $i .
                    '" class="
				bg-white
				border-gray-300
				text-gray-500
				hover:bg-gray-50
				relative
				inline-flex
				items-center
				px-4
				py-2
				border
				text-sm
				font-medium
			">
' .
                    $i .
                    '
</a>';
            }
        } ?>
        <a href="category.php?id=<?= $categoryId ?>&page=<?= $page +
    1 ?>" class="
                                    relative
                                    inline-flex
                                    items-center
                                    px-2
                                    py-2
                                    rounded-r-md
                                    border border-gray-300
                                    bg-white
                                    text-sm
                                    font-medium
                                    text-gray-500
                                    hover:bg-gray-50
                                ">
            <span class="sr-only">Next</span>

            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</div>
<?php require_once "layouts/footer.php";
?>
