<?php 
// hàm include để nhập nội dung file header vào đây
// hàm này có thể nhập được các mã PHP để xử lý trên file này
$page_title = 'Quản lý Thư Mục';
include('header.php');
 ?>
<?php
if(isset($_SESSION['user'])){
include('fold.php');
}else{
	echo 'bạn cần đăng nhập để xem được danh sách';
}
?>