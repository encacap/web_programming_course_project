<?php
$title = "Quản lý người dùng";
$baseUrl = "../";
$selected = "user";
require_once "../layouts/header.php";

$id = $msg = $fullname = $email = $phone_number = $address = $role_id = "";
require_once "form_save.php";

$id = getGet("id");
if ($id != "" && $id > 0) {
    $sql = "select * from User where id = '$id'";
    $userItem = executeResult($sql, true);
    if ($userItem != null) {
        $fullname = $userItem["fullname"];
        $email = $userItem["email"];
        $phone_number = $userItem["phone_number"];
        $address = $userItem["address"];
        $role_id = $userItem["role_id"];
    } else {
        $id = 0;
    }
} else {
    $id = 0;
}

$sql = "select * from Role";
$roleItems = executeResult($sql);
?>

<div class="px-10 py-9">
	<div class="col-md-12" style="margin-bottom: 20px;">
		<h3 class="text-2xl">
			<?php if (!empty($id)) {
       echo "Thay đổi thông tin người dùng";
   } else {
       echo "Thêm người dùng mới";
   } ?>
		</h3>
	</div>
		<div class="mt-10 border-2 border-gray-100 rounded-md px-10 py-8">
			<div>
				<?php if (!empty($msg)) {
        echo '<h5 class="border-2 border-red-500 text-red-500 bg-red-200 rounded-md px-4 py-2 mb-6">' .
            $msg .
            "</h5>";
    } ?>
				
			</div>
			<div class="panel-body">
				<form method="post" onsubmit="return validateForm();">
					<div class="grid grid-cols-2 gap-10">
						<div>
							<div class="pb-2">
							  <label class="font-semibold" for="usr">Họ và tên:</label>
							  <input required="true" type="text" class="w-full ring-1 ring-gray-200 outline-none my-4 px-4 py-2 rounded-md focus:ring-blue-500" id="usr" name="fullname" value="<?= $fullname ?>" placeholder="Nhập họ và tên">
							  <input type="text" name="id" value="<?= $id ?>" hidden="true">
							</div>
							<div class="pb-2">
							  <label class="font-semibold" for="usr">Chức vụ:</label>
							  <select class="w-full ring-1 ring-gray-200 outline-none my-4 px-4 py-2 rounded-md focus:ring-blue-500" name="role_id" id="role_id" required="true">
								  <option value="">-- Chọn một chức vụ --</option>
								  <?php foreach ($roleItems as $role) {
              if ($role["id"] == $role_id) {
                  echo '<option selected value="' .
                      $role["id"] .
                      '">' .
                      $role["name"] .
                      "</option>";
              } else {
                  echo '<option value="' .
                      $role["id"] .
                      '">' .
                      $role["name"] .
                      "</option>";
              }
          } ?>
							  </select>
							</div>
							<div class="pb-2">
							  <label class="font-semibold" for="email">Email:</label>
							  <input required="true" type="email" class="w-full ring-1 ring-gray-200 outline-none my-4 px-4 py-2 rounded-md focus:ring-blue-500" id="email" name="email" value="<?= $email ?>">
							</div>
							<div class="pb-2">
							  <label class="font-semibold" for="phone_number">Số điện thoại:</label>
							  <input required="true" type="tel" class="w-full ring-1 ring-gray-200 outline-none my-4 px-4 py-2 rounded-md focus:ring-blue-500" id="phone_number" name="phone_number" value="<?= $phone_number ?>">
							</div>
						</div>
						<div>
							<div class="pb-2">
							  <label class="font-semibold" for="address">Địa Chỉ:</label>
							  <input required="true" type="text" class="w-full ring-1 ring-gray-200 outline-none my-4 px-4 py-2 rounded-md focus:ring-blue-500" id="address" name="address" value="<?= $address ?>">
							</div>
							<div class="pb-2">
							  <label class="font-semibold" for="pwd">Mật Khẩu:</label>
							  <input <?= $id > 0
             ? ""
             : 'required="true"' ?> type="password" class="w-full ring-1 ring-gray-200 outline-none my-4 px-4 py-2 rounded-md focus:ring-blue-500" id="pwd" name="password" minlength="6">
							</div>
							<div class="form-group">
							  <label class="font-semibold" for="confirmation_pwd">Xác nhận mật khẩu:</label>
							  <input <?= $id > 0
             ? ""
             : 'required="true"' ?> type="password" class="w-full ring-1 ring-gray-200 outline-none my-4 px-4 py-2 rounded-md focus:ring-blue-500" id="confirmation_pwd" minlength="6">
							</div>
						</div>
					</div>
					<button class="flex justify-center items-center w-full mt-4 border-2 border-blue-500 bg-blue-500 rounded-md px-10 py-2 text-white font-semibold hover:bg-blue-700 duration-200 ring-2 ring-transparent focus:ring-blue-200">Xác nhận</button>
				</form>
			</div>
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

<?php require_once "../layouts/footer.php";
?>
