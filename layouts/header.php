<?php
session_start();
require_once "utils/utility.php";
require_once "database/dbhelper.php";

$sql = "SELECT * FROM Category";
$menuItems = executeResult($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if (!empty($title)) {
        echo $title;
    } else {
        echo "Trang chủ";
    } ?> - Đặc sản Quảng Ngãi</title>
    <link rel="shortcut icon" href="/assets/icons/svg/emoji-happy-bold.svg">
    <link rel="stylesheet" href="/assets/css/home.min.css">
    <link rel="stylesheet" href="/assets/css/app.min.css">
</head>

<body>
    <!-- Menu START -->
    <div class="w-full fixed top-0 left-0 right-0 z-50 shadow-md px-4 lg:px-10 bg-white">
        <ul class="nav flex items-center justify-between h-20">
            <li class="nav-item mt-0">
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
            </li>
            <li class="flex items-center">
                <nav class="hidden md:flex justify-center items-center ml-10 font-semibold">
                    <a class="mr-6 py-2 <?php if (
                        !isset($categoryId) &&
                        !empty($isHomePage)
                    ) {
                        echo "active text-blue-500";
                    } ?>" href="index.php">Trang Chủ</a>
                    <?php foreach ($menuItems as $item) {
                        if ($categoryId === $item["id"]) {
                            echo '
                                        <a class="mr-6 py-2 active text-blue-500" href="category.php?id=' .
                                $item["id"] .
                                '">' .
                                $item["name"] .
                                "</a>";
                        } else {
                            echo '
                                        <a class="mr-6 py-2" href="category.php?id=' .
                                $item["id"] .
                                '">' .
                                $item["name"] .
                                "</a>";
                        }
                    } ?>

                    <?php
                    if (!isset($_SESSION["cart"])) {
                        $_SESSION["cart"] = [];
                    }
                    $count = 0;
                    foreach ($_SESSION["cart"] as $item) {
                        $count += $item["num"];
                    }
                    ?>
                </nav>
                <a href="cart.php"
                    class="group flex items-center ml-4 border-2 border-blue-500 rounded-full px-4 py-2 hover:border-none hover:text-white hover:bg-blue-500 duration-200">
                    <div class="mr-2 md:mr-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            class="w-6 text-blue-500 group-hover:text-white duration-200">
                            <path
                                d="M8.5 14.25c0 1.92 1.58 3.5 3.5 3.5s3.5-1.58 3.5-3.5M8.81 2 5.19 5.63M15.19 2l3.62 3.63"
                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M2 7.85c0-1.85.99-2 2.22-2h15.56c1.23 0 2.22.15 2.22 2 0 2.15-.99 2-2.22 2H4.22C2.99 9.85 2 10 2 7.85Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path d="m3.5 10 1.41 8.64C5.23 20.58 6 22 8.86 22h6.03c3.11 0 3.57-1.36 3.93-3.24L20.5 10"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                    </div>
                    <div class="hidden md:block mx-2">Giỏ hàng</div>
                    <div
                        class="flex items-center justify-center w-6 h-6 rounded-full bg-blue-500 pb-0.5 text-white text-sm group-hover:text-blue-500 group-hover:bg-white duration-200">
                        <?= $count ?>
                    </div>
                </a>
            </li>
        </ul>
        <div class="flex flex-wrap md:hidden h-12 border-t-2 border-gray-100 overflow-hidden">
            <a href="/" class="mr-6 py-2 <?php if (
                !isset($categoryId) &&
                !empty($isHomePage)
            ) {
                echo "active text-blue-500 font-semibold";
            } ?>">Trang chủ</a>
            <?php foreach ($menuItems as $item) {
                if ($categoryId === $item["id"]) {
                    echo '
                                        <a class="mr-6 py-2 active text-blue-500" href="category.php?id=' .
                        $item["id"] .
                        '">' .
                        $item["name"] .
                        "</a>";
                } else {
                    echo '
                                        <a class="mr-6 py-2" href="category.php?id=' .
                        $item["id"] .
                        '">' .
                        $item["name"] .
                        "</a>";
                }
            } ?>
            
        </div>
    </div>
    <div class="h-32 md:h-20 w-full"></div>
    <!-- Menu Stop -->