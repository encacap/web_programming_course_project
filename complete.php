<?php
require_once "layouts/header.php"; ?>
<div class="flex items-center justify-center container p-10">
	<div class="border-2 border-gray-100 rounded-md shadow-xs px-10 py-10">
		<div class="text-center">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="mx-auto w-28 text-green-400"><path d="m9.62 16 1.5 1.5 3.25-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.81 2 5.19 5.63M15.19 2l3.62 3.63" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2 7.85c0-1.85.99-2 2.22-2h15.56c1.23 0 2.22.15 2.22 2 0 2.15-.99 2-2.22 2H4.22C2.99 9.85 2 10 2 7.85Z" stroke="currentColor" stroke-width="1.5"></path><path d="m3.5 10 1.41 8.64C5.23 20.58 6 22 8.86 22h6.03c3.11 0 3.57-1.36 3.93-3.24L20.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
			<h1 class="py-4 text-xl text-green-500 font-semibold">Bạn đã tạo đơn hàng thành công</h1>
			<h4>Đơn hàng của bạn sẽ được giao trong thời gian sơm nhất. Cảm ơn bạn!</h4>
			<a href="./" class="flex justify-center">
				<button class="flex justify-center items-center w-full mt-10 border-2 border-blue-500 rounded-md px-10 py-2 text-blue-500 hover:text-white font-semibold hover:bg-blue-500 duration-200 ring-2 ring-transparent focus:ring-blue-200">
					Quay lại trang chủ
				</button>
			</a>
		</div>
	</div>
</div>
<?php require_once "layouts/footer.php";
?>
