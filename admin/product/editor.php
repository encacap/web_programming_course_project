<?php
$title = "Quản lý sản phẩm";
$baseUrl = "../";
$selected = "product";
require_once "../layouts/header.php";

$id = $thumbnail = $title = $price = $discount = $category_id = $description =
    "";
require_once "form_save.php";

$id = getGet("id");
if ($id != "" && $id > 0) {
    $sql = "select * from Product where id = '$id' and deleted = 0";
    $userItem = executeResult($sql, true);
    if ($userItem != null) {
        $thumbnail = $userItem["thumbnail"];
        $title = $userItem["title"];
        $price = $userItem["price"];
        $discount = $userItem["discount"];
        $category_id = $userItem["category_id"];
        $description = $userItem["description"];
    } else {
        $id = 0;
    }
} else {
    $id = 0;
}

$sql = "select * from Category";
$categoryItems = executeResult($sql);
?>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<link rel="old stylesheet" href="../../assets/css/dashboard.min.css" title="bootstrap" />
<link rel="newest stylesheet" href="../../assets/css/app.min.css">
<style>
	.note-editor {
		border-radius: 6px;
		margin-top: 20px;
	}
	label {
		margin: 0;
		padding: 0;
		margin-bottom: -2px;
	}
</style>

<div class="px-10 py-9">
	<div class="col-md-12" style="margin-bottom: 20px;">
		<h3 class="text-2xl"><?php if (empty($id)) {
      echo "Thêm sản phẩm mới";
  } else {
      echo "Thay đổi thông tin sản phẩm";
  } ?></h3>
	</div>
		<div class="mt-10 border-2 border-gray-100 rounded-md px-10 py-8">
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
				<div class="grid grid-cols-3 gap-10">
					<div class="col-span-2"> 
						<div class="pb-2">
						  <label class="font-semibold" for="usr">Tên sản phẩm:</label>
						  <input required="true" type="text" class="h-12 w-full ring-1 ring-gray-200 outline-none my-3 px-4 py-2 rounded-md focus:ring-blue-500" id="usr" name="title" value="<?= $title ?>" placeholder="Nhập tên sản phẩm">
						  <input type="text" name="id" value="<?= $id ?>" hidden="true">
						</div>
						<div>
						  <label class="font-semibold" for="pwd">Chi tiết sản phẩm:</label>
						  <textarea class="w-full ring-1 ring-gray-200 outline-none my-3 px-4 py-2 rounded-md focus:ring-blue-500" rows="5" name="description" id="description" placeholder="Nhập chi tiết sản phẩm"><?= $description ?></textarea>
						</div>

						
					</div>
					<div>
						<div class="pb-2">
						  <label class="font-semibold" for="thumbnail">Thumbnail:</label>
						  <input type="file" class="h-12 w-full ring-1 ring-gray-200 outline-none my-3 px-4 py-2 rounded-md focus:ring-blue-500" id="thumbnail" name="thumbnail" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
						  <?php if (!empty($thumbnail)) {
            echo '<img id="thumbnail_img" src="' .
                fixUrl($thumbnail) .
                '" style="max-height: 160px; margin-top: 5px; margin-bottom: 15px;" />';
        } ?>
						  
						</div>

						<div class="pb-2">
						  <label class="font-semibold" for="usr">Danh Mục Sản Phẩm:</label>
						  <select class="w-full h-12 ring-1 ring-gray-200 outline-none my-3 px-4 py-2 rounded-md focus:ring-blue-500" name="category_id" id="category_id" required="true">
						  	<option value="">-- Chọn --</option>
						  	<?php foreach ($categoryItems as $item) {
             if ($item["id"] == $category_id) {
                 echo '<option selected value="' .
                     $item["id"] .
                     '">' .
                     $item["name"] .
                     "</option>";
             } else {
                 echo '<option value="' .
                     $item["id"] .
                     '">' .
                     $item["name"] .
                     "</option>";
             }
         } ?>
						  </select>
						</div>
						<div class="pb-2">
						  <label class="font-semibold" for="price">Giá:</label>
						  <input required="true" type="number" class="w-full h-12 ring-1 ring-gray-200 outline-none my-3 px-4 py-2 rounded-md focus:ring-blue-500" id="price" name="price" value="<?= $price ?>">
						</div>
						<div class="pb-2">
						  <label class="font-semibold" for="discount">Giảm Giá:</label>
						  <input required="true" type="text" class="w-full h-12 ring-1 ring-gray-200 outline-none my-3 px-4 py-2 rounded-md focus:ring-blue-500" id="discount" name="discount" value="<?= $discount ?>">
						</div>
					</div>
				</div>
				<button class="flex justify-center items-center w-full mt-4 border-2 border-blue-500 bg-blue-500 rounded-md px-10 py-2 text-white font-semibold hover:bg-blue-700 duration-200 ring-2 ring-transparent focus:ring-blue-200">Hoàn thành</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function updateThumbnail() {
		$('#thumbnail_img').attr('src', $('#thumbnail').val())
	}
</script>
<script>
  $('#description').summernote({
    placeholder: 'Nhập nội dung dữ liệu',
    tabsize: 2,
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
</script>

<?php require_once "../layouts/footer.php";
?>
