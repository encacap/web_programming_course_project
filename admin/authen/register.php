<?php
session_start();

require_once "../../utils/utility.php";
require_once "../../database/dbhelper.php";
require_once "process_form_register.php";

$user = getUserToken();
if ($user != null) {
    header("Location: ../");
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký tài khoản người dùng - Nhóm Đỗng</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="shortcut icon" href="/assets/icons/svg/emoji-happy-bold.svg">
  <link rel="stylesheet" href="/assets/css/home.min.css">
  <link rel="stylesheet" href="/assets/css/app.min.css">

</head>
<body class="overflow-x-hidden">
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
    </div>
  	</div>
	  <div class="mt-20 w-screen" style="height: calc(100vh - 80px);">
	  <div class="mx-auto" style="width: 480px;">
	  <div class="mt-28 border-2 border-gray-100 rounded-md px-10 py-8 shadow-sm">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<h3 class="text-2xl">Đăng ký tài khoản</h3>
					<div class="w-20 h-1 bg-gray-200 rounded-md mt-6"></div>
				</div>
			<div>
				<?php if (!empty($msg)) {
        echo '<h5 class="border-2 border-red-500 text-red-500 bg-red-200 rounded-md px-4 py-2 my-6">' .
            $msg .
            "</h5>";
    } ?>
				
			</div>
			<div class="panel-body">
				<form method="post" onsubmit="return validateForm();">
					<div class="mb-2">
					  <label class="font-semibold" for="usr">Họ & Tên:</label>
					  <input required="true" type="text" class="w-full ring-1 ring-gray-200 outline-none my-4 px-4 py-2 rounded-md focus:ring-blue-500" id="usr" name="fullname" value="<?= $fullname ?>">
					</div>
					<div class="mb-2">
					  <label class="font-semibold" for="email">Email:</label>
					  <input required="true" type="email" class="w-full ring-1 ring-gray-200 outline-none my-4 px-4 py-2 rounded-md focus:ring-blue-500" id="email" name="email" value="<?= $email ?>">
					</div>
					<div class="mb-2">
					  <label class="font-semibold" for="pwd">Mật Khẩu:</label>
					  <input required="true" type="password" class="w-full ring-1 ring-gray-200 outline-none my-4 px-4 py-2 rounded-md focus:ring-blue-500" id="pwd" name="password" minlength="6">
					</div>
					<div class="mb-2">
					  <label class="font-semibold" for="confirmation_pwd">Xác Minh Mật Khẩu:</label>
					  <input required="true" type="password" class="w-full ring-1 ring-gray-200 outline-none my-4 px-4 py-2 rounded-md focus:ring-blue-500" id="confirmation_pwd" minlength="6">
					</div>
					<div class="flex">
						<a href="login.php" class="flex justify-center items-center w-full mt-4 border-2 border-gray-200 bg-gray-100 rounded-md px-10 py-2 font-semibold hover:bg-gray-200 duration-200 ring-2 ring-transparent focus:ring-blue-200 mr-10">Đăng nhập</a>
						<button class="flex justify-center items-center w-full mt-4 border-2 border-blue-500 bg-blue-500 rounded-md px-10 py-2 text-white font-semibold hover:bg-blue-700 duration-200 ring-2 ring-transparent focus:ring-blue-200">Đăng ký</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<script type="text/javascript">
	function validateForm() {
		$pwd = $('#pwd').val();
		$confirmPwd = $('#confirmation_pwd').val();
		if($pwd != $confirmPwd) {
			alert("Mật khẩu không khớp, vui lòng kiểm tra lại")
			return false
		}
		return true
	}
</script>
</body>
</html>