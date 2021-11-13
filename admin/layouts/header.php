<?php
session_start();
require_once $baseUrl . "../utils/utility.php";
require_once $baseUrl . "../database/dbhelper.php";

$user = getUserToken();
if ($user == null) {
    header("Location: " . $baseUrl . "authen/login.php");
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?> - Nhóm Đỗng</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
  <link rel="shortcut icon" href="/assets/icons/svg/emoji-happy-bold.svg">
  <link rel="stylesheet" href="/assets/css/home.min.css">
  <link rel="stylesheet" href="/assets/css/app.min.css">

</head>
<body>
  <div class="w-full fixed top-0 left-0 right-0 z-50 shadow-md px-4 bg-white">
    <div class="nav flex items-center justify-between h-20">
      <a href="/" class="flex items-center text-blue-500">
          <div>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-12">
                  <path d="M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7Z" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round" class="stroke-current"></path>
                  <path
                      d="M15.5 9.75a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM8.5 9.75a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM8.4 13.3h7.2c.5 0 .9.4.9.9 0 2.49-2.01 4.5-4.5 4.5s-4.5-2.01-4.5-4.5c0-.5.4-.9.9-.9Z"
                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"
                      class="stroke-current"></path>
              </svg>
          </div>
          <div class="ml-4  uppercase text-blue-500">
              <div class="mt-1 font-semibold text-xs">Bài tập lớn</div>
              <div class="font-bold text-xl">Nhóm Đỗng</div>
          </div>
      </a>
      <a href="<?= $baseUrl ?>authen/logout.php" class="flex items-center border-2 border-blue-500 rounded-md px-4 py-2 font-semibold text-blue-500 hover:bg-blue-500 hover:text-white duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-6 mr-2"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M17.44 14.62L20 12.06 17.44 9.5M9.76 12.06h10.17M11.76 20c-4.42 0-8-3-8-8s3.58-8 8-8"></path></svg>
        Đăng xuất
      </a>
    </div>
  </div>
  <div class="w-full h-20"></div>
  <div class="">
  <div class="flex">
    <div class="w-72 border-r-2 border-gray-100 px-4 fixed bg-white" style="height: calc(100vh - 80px)">
      <div class="sidebar-sticky">
        <ul class="nav flex-column py-8">
          <li class="nav-item font-semibold">
            <a href="<?= $baseUrl ?>category" class="flex items-center py-2 <?php if (
    $selected == "category"
) {
    echo "text-blue-500";
} ?>">
              <div class="flex justify-center items-center w-16">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-6 mr-4"><path d="M5 10h2c2 0 3-1 3-3V5c0-2-1-3-3-3H5C3 2 2 3 2 5v2c0 2 1 3 3 3ZM17 10h2c2 0 3-1 3-3V5c0-2-1-3-3-3h-2c-2 0-3 1-3 3v2c0 2 1 3 3 3ZM17 22h2c2 0 3-1 3-3v-2c0-2-1-3-3-3h-2c-2 0-3 1-3 3v2c0 2 1 3 3 3ZM5 22h2c2 0 3-1 3-3v-2c0-2-1-3-3-3H5c-2 0-3 1-3 3v2c0 2 1 3 3 3Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg>
              </div>
              Quản lý danh mục
            </a>
          </li>
          <li class="nav-item font-semibold">
            <a href="<?= $baseUrl ?>product" class="flex items-center py-2 <?php if (
    $selected == "product"
) {
    echo "text-blue-500";
} ?>">
              <div class="flex justify-center items-center w-16">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-6 mr-4"><path d="M3.17 7.44 12 12.55l8.77-5.08M12 21.61v-9.07" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.93 2.48 4.59 5.45c-1.21.67-2.2 2.35-2.2 3.73v5.65c0 1.38.99 3.06 2.2 3.73l5.34 2.97c1.14.63 3.01.63 4.15 0l5.34-2.97c1.21-.67 2.2-2.35 2.2-3.73V9.18c0-1.38-.99-3.06-2.2-3.73l-5.34-2.97c-1.15-.64-3.01-.64-4.15 0Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17 13.24V9.58L7.51 4.1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
              </div>
              Quản lý sản phẩm
            </a>
          </li>
          <li class="nav-item font-semibold">
            <a href="<?= $baseUrl ?>user" class="flex items-center py-2 <?php if (
    $selected == "user"
) {
    echo "text-blue-500";
} ?>">
              <div class="flex justify-center items-center w-16">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-6 mr-4"><path d="M9.16 10.87c-.1-.01-.22-.01-.33 0a4.42 4.42 0 0 1-4.27-4.43C4.56 3.99 6.54 2 9 2a4.435 4.435 0 0 1 .16 8.87ZM16.41 4c1.94 0 3.5 1.57 3.5 3.5 0 1.89-1.5 3.43-3.37 3.5a1.13 1.13 0 0 0-.26 0M4.16 14.56c-2.42 1.62-2.42 4.26 0 5.87 2.75 1.84 7.26 1.84 10.01 0 2.42-1.62 2.42-4.26 0-5.87-2.74-1.83-7.25-1.83-10.01 0ZM18.34 20c.72-.15 1.4-.44 1.96-.87 1.56-1.17 1.56-3.1 0-4.27-.55-.42-1.22-.7-1.93-.86" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
              </div>
              Quản lý người dùng
            </a>
          </li>
          <li class="nav-item font-semibold">
            <a href="<?= $baseUrl ?>order" class="flex items-center py-2 <?php if (
    $selected == "order"
) {
    echo "text-blue-500";
} ?>">
              <div class="flex justify-center items-center w-16">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-6 mr-4"><path d="M8 12.2h7M8 16.2h4.38M10 6h4c2 0 2-1 2-2 0-2-1-2-2-2h-4C9 2 8 2 8 4s1 2 2 2Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 4.02c3.33.18 5 1.41 5 5.98v6c0 4-1 6-6 6H9c-5 0-6-2-6-6v-6c0-4.56 1.67-5.8 5-5.98" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg>
              </div>
              Quản lý đơn hàng
            </a>
          </li>
        </ul>
      </div>
    </div>

    <main role="main" class="flex-1 col-lg-10 px-4 ml-72">
      <!-- hien thi tung chuc nang cua trang quan tri START-->