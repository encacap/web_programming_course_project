<?php
$isHomePage = true;
require_once "./layouts/header.php";

$sql = "SELECT Product.*, Category.name as category_name 
	FROM Product 
	LEFT JOIN Category 
	ON Product.category_id = Category.id 
    WHERE Product.deleted = 0
	ORDER BY Product.updated_at DESC 
	LIMIT 0, 10";
$latestItems = executeResult($sql);
?>
<!-- banner -->
<div class="splide">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide">
                <img src="https://dulichtoday.vn/wp-content/uploads/2019/05/banh_no_dac_san_quang_ngai.jpg"
                    alt="Slide 01">
            </li>
            <li class="splide__slide">
                <img src="https://topquangngai.vn/wp-content/uploads/2021/07/dac-san-quang-ngai-o-sai-gon.jpg"
                    class="object-center object-cover" alt="Slide 02">
            </li>
        </ul>
    </div>
</div>
<!-- banner stop -->
<div class="py-10 px-4 lg:px-10">
    <div class="text-center mb-4 uppercase text-xs text-gray-400 font-semibold">Đặc sản Quảng Ngãi</div>
    <h1 class="text-center text-2xl font-semibold tracking-wide">SẢN PHẨM MỚI NHẤT</h1>
    <div class="mx-auto w-20 h-1 mt-6 rounded-md bg-blue-500"></div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mt-8">
        <?php 
        foreach ($latestItems as $item) {
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
                ' VND <span style="color:black; font-size: 12px; font-weight: normal; -webkit-text-stroke: 1px black; text-decoration-line: line-through">'.number_format($item["price"]) .' VND </span></p>
							<div><button class="flex items-center justify-center w-full mt-3 border-2 border-blue-500 rounded-md py-2 text-blue-500 duration-200 hover:text-white hover:bg-blue-500" onclick="addCart(' .
                $item["id"] .
                ', 1)"><div class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-7 mr-2"><path d="M7.5 7.67V6.7c0-2.25 1.81-4.46 4.06-4.67a4.5 4.5 0 0 1 4.94 4.48v1.38M9 22h6c4.02 0 4.74-1.61 4.95-3.57l.75-6C20.97 9.99 20.27 8 16 8H8c-4.27 0-4.97 1.99-4.7 4.43l.75 6C4.26 20.39 4.98 22 9 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.495 12h.01M8.495 12h.008" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></div> Thêm vào giỏ hàng</button></div>
				</div>';
        } ?>
    </div>
</div>
<?php
$sql = "SELECT id, name FROM Category";
$menuItems = executeResult($sql);
$count = 0;
foreach ($menuItems as $item) {

    $sql =
        "SELECT Product.*, Category.name AS category_name 
			FROM Product 
			LEFT JOIN Category ON Product.category_id = Category.id 
			WHERE Product.deleted = 0
            AND Product.category_id = " .
        $item["id"] .
        " ORDER BY Product.updated_at desc limit 0, 5" ;
    $items = executeResult($sql);
    // if ($items == null || count($items) < 4) {
    //     continue;
    // }
    ?>
<div class=<?= $count++ % 2 == 0 ? "bg-gray-100" : "bg-white" ?>>
    <div class="py-10 px-4 lg:px-10">
        <div class="text-center mb-4 uppercase text-xs text-gray-400 font-semibold">Đặc sản Quảng Ngãi</div>
        <h1 class="text-center text-2xl font-semibold tracking-wide">
            <?= $item["name"] ?>
        </h1>
        <div class="mx-auto w-20 h-1 mt-6 rounded-md bg-blue-500"></div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mt-8">
            <?php foreach ($items as $pItem) {
                echo '
			<div class="rounded-lg border-2 border-gray-100 overflow-hidden p-4 bg-white duration-200 hover:border-blue-500 shadow-sm">
				<a href="detail.php?id=' .
                    $pItem["id"] .
                    '" class="block w-full h-52 rounded-md overflow-hidden">
					<img src="' .
                    $pItem["thumbnail"] .
                    '" class="w-full h-full object-center object-cover">
				</a>
				<div class="flex mt-4 mb-3"><p class="rounded-full bg-gray-200 px-3 py-1 text-sm text-gray-500">' .
                    $pItem["category_name"] .
                    '</p></div>
							<a href="detail.php?id=' .
                    $pItem["id"] .
                    '"><p style="font-weight: bold;">' .
                    $pItem["title"] .
                    '</p></a>
							<p class="my-1" style="color: red; font-weight: bold;">' .
                    number_format($pItem["discount"]) .
                    ' VND <span style="color:black; font-size: 12px; font-weight: normal; -webkit-text-stroke: 1px black; text-decoration-line: line-through">'.number_format($pItem["price"]) .' VND </span></p>
							<div><button class="flex items-center justify-center w-full mt-3 border-2 border-blue-500 rounded-md py-2 text-blue-500 duration-200 hover:text-white hover:bg-blue-500" onclick="addCart(' .
                    $pItem["id"] .
                    ', 1)"><div class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-7 mr-2"><path d="M7.5 7.67V6.7c0-2.25 1.81-4.46 4.06-4.67a4.5 4.5 0 0 1 4.94 4.48v1.38M9 22h6c4.02 0 4.74-1.61 4.95-3.57l.75-6C20.97 9.99 20.27 8 16 8H8c-4.27 0-4.97 1.99-4.7 4.43l.75 6C4.26 20.39 4.98 22 9 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.495 12h.01M8.495 12h.008" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></div> Thêm vào giỏ hàng</button></div>
				</div>';
            } 
            ?>
        </div>
        <div class="flex justify-center mt-10">
            <a href="category.php?id=<?= $item["id"] ?>" class="
                        flex
                        items-center
                        bg-white
                        rounded-full
                        border-2 border-gray-300
                        px-6
                        py-3
                        font-semibold
                        duration-200
                        hover:border-blue-500 hover:text-blue-500
                    ">
                Xem thêm các sản phẩm thuộc <?= $item["name"] ?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 ml-2" fill="none">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                        stroke-width="1.5" d="M14.43 5.93L20.5 12l-6.07 6.07M3.5 12h16.83"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
<?php
}
?>
<script src="/assets/js/home.min.js"></script>
<?php require_once "./layouts/footer.php"; ?>
