<!DOCTYPE html>
<html lang="en">

<head>
  <title>Thêm sản phẩm | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
  <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
  <script>

    // function readURL(input, thumbimage) {
    //   if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
    //     var reader = new FileReader();
    //     reader.onload = function (e) {
    //       $("#thumbimage").attr('src', e.target.result);
    //     }
    //     reader.readAsDataURL(input.files[0]);
    //   }
    //   else { // Sử dụng cho IE
    //     $("#thumbimage").attr('src', input.value);

    //   }
    //   $("#thumbimage").show();
    //   $('.filename').text($("#uploadfile").val());
    //   $('.Choicefile').css('background', '#14142B');
    //   $('.Choicefile').css('cursor', 'default');
    //   $(".removeimg").show();
    //   $(".Choicefile").unbind('click');

    // }
    // $(document).ready(function () {
    //   $(".Choicefile").bind('click', function () {
    //     $("#uploadfile").click();

    //   });
    //   $(".removeimg").click(function () {
    //     $("#thumbimage").attr('src', '').hide();
    //     $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
    //     $(".removeimg").hide();
    //     $(".Choicefile").bind('click', function () {
    //       $("#uploadfile").click();
    //     });
    //     $('.Choicefile').css('background', '#14142B');
    //     $('.Choicefile').css('cursor', 'pointer');
    //     $(".filename").text("");
    //   });
    // })
  </script>
</head>

<body class="app sidebar-mini rtl">
  <style>
    .Choicefile {
      display: block;
      background: #14142B;
      border: 1px solid #fff;
      color: #fff;
      width: 150px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      padding: 5px 0px;
      border-radius: 5px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
    }

    .Choicefile:hover {
      text-decoration: none;
      color: white;
    }

    #uploadfile,
    .removeimg {
      display: none;
    }

    #thumbbox {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .removeimg {
      height: 25px;
      position: absolute;
      background-repeat: no-repeat;
      top: 5px;
      left: 5px;
      background-size: 25px;
      width: 25px;
      /* border: 3px solid red; */
      border-radius: 50%;

    }

    .removeimg::before {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      content: '';
      border: 1px solid red;
      background: red;
      text-align: center;
      display: block;
      margin-top: 11px;
      transform: rotate(45deg);
    }

    .removeimg::after {
      /* color: #FFF; */
      /* background-color: #DC403B; */
      content: '';
      background: red;
      border: 1px solid red;
      text-align: center;
      display: block;
      transform: rotate(-45deg);
      margin-top: -2px;
    }
  </style>
  <?php
include_once '../../../connect/open.php';
$sql = "SELECT *, categories.name as category_name, categories.id 
    as cate_id FROM watch INNER JOIN categories ON watch.category_id = categories.id";
$watch_id = $_GET['watch_id'];
$sql = "SELECT * FROM watch WHERE watch_id = '$watch_id'";
$watch = mysqli_query($connect,$sql);

$sql_categories = "SELECT * FROM categories";
$categories = mysqli_query($connect,$sql_categories);
include_once '../layout/header-navbar.php';

include_once '../../../connect/close.php';
  ?>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách sản phẩm</li>
        <li class="breadcrumb-item"><a href="#">Chỉnh sửa sản phẩm</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Chỉnh sửa thông tin sản phẩm</h3>
          <div class="tile-body">
            <!-- <div class="row element-button">
               <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i
                    class="fas fa-folder-plus"></i> Thêm nhà cung cấp</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i
                    class="fas fa-folder-plus"></i> Thêm danh mục</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i
                    class="fas fa-folder-plus"></i> Thêm tình trạng</a>
              </div> 
            </div> -->

              <form class="row" method="post" action="update.php" enctype="multipart/form-data">
                  <?php
                  foreach ($watch as $product){
                  ?>
              <!-- <div class="form-group col-md-3">
                <label class="control-label">Mã sản phẩm </label>
                <input class="form-control" type="number" placeholder="">
              </div> -->
              
              <div class="form-group col-md-3">
                <label class="control-label">Tên sản phẩm</label>
                <input class="form-control" type="text" name="watch_name" value="<?= $product['watch_name'] ?>">
              </div>

              <div class="form-group  col-md-3">
                <label class="control-label">Thời gian xuất khẩu</label>
                <input class="form-control" type="number"  min="1900" max="2099" name="publication_year" value="<?= $product['publication_year'] ?>">
              </div>
              <div class="form-group  col-md-3">
                <label class="control-label">Số lượng</label>
                <input class="form-control type=" name="quantity" value="<?= $product['quantity'] ?>">
              </div>
              <div class="form-group  col-md-3">
                <label class="control-label">Giá bán</label>
                <input class="form-control" type="number" name="price" value="<?= $product['price'] ?>">
              </div>
              <div class="form-group col-md-3 ">
                <label for="exampleSelect1" class="control-label">Tình trạng</label>
                <select class="form-control" id="exampleSelect1" name="status" required>
                  <option>-- Chọn tình trạng --</option>
                  <option value="1">Còn hàng</option>
                  <option value="2">Khóa hàng</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="exampleSelect1" class="control-label">Danh mục</label>
                <select class="form-control" id="exampleSelect1" name="category_id">
                  <option>-- Chọn danh mục --</option>
                  <?php foreach($categories as $item){?>
                  <option value ="<?= $item['id']?>"><?= $item['name']?>
                  <?php } ?>
                  </option>
                </select>
              </div>
                      <div class="form-group  col-md-3">
                          <input class="form-control=" type="hidden" name="watch_id" value="<?= $product['watch_id'] ?>">
                      </div>
              <div class="form-group col-md-12">
                  <label>Ảnh sản phẩm</label>
                  <input type="file"  name="image" value="<?= $product['image'] ?>">
                  <img src=".../../../Asset/img/<?= $product['image'] ?>">
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea class="form-control" name="description" id="description"
                          value="<?= $product['description'] ?>"><?=$product['description']?></textarea>
              </div>

          <button class="btn btn-save" type="submit">Lưu lại</button>
          <a class="btn btn-cancel" href="table-data-product.php">Hủy bỏ</a>
                 <?php
                 }
                ?>
            </form>

        </div>
  </main>


 


  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/plugins/pace.min.js"></script>
  
</body>

</html>