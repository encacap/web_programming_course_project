<?php
session_start();
require_once "../../utils/utility.php";
require_once "../../database/dbhelper.php";

$user = getUserToken();
if ($user == null) {
    die();
}

if (!empty($_POST)) {
    $action = getPost("action");

    switch ($action) {
        case "delete":
            deleteCategory();
            break;
    }
}

function deleteCategory()
{
    $id = getPost("id");

    $sql = "SELECT count(*) AS total FROM Product WHERE category_id = $id AND deleted = 0";
    $data = executeResult($sql, true);
    // var_dump($data);
    $total = $data["total"];
    if ($total > 0) {
        echo "Hiện không thể xoá danh mục này. <br /> Nguyên nhân: danh mục đang có " .
            $total .
            " sản phẩm.";
        die();
    }

    $sql = "DELETE FROM Category WHERE id = $id";
    execute($sql);
}
