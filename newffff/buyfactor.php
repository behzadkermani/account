<?php
require "./Helper/dataBase.php"; //"./Helper/dataBase.php";
require "./Helper/helpers.php";
global $db;
if (isset($_POST['submit'])) {
    $total = ((int)$_POST['product_qty'] * (int)$_POST['factor_fi']) - (int)$_POST['buy_off'];
    $sql = 'INSERT INTO `buyfactor` SET buy_date=?,cust_id=?,product_id=?,warehouse_id=?,product_qty=?,factor_fi=?,buy_off=?,buy_sum=?,factor_explanation=?,user_editfactor=?';
    $stmt = $db->prepare($sql);
    $user = '1';
    // dd($_POST);
    $stmt->execute([(int)$_POST['buy_date'], (int)$_POST['cust_id'], (int)$_POST['product_id'], (int)$_POST['warehouse_id'], (int)$_POST['product_qty'], (int)$_POST['factor_fi'], (int)$_POST['buy_off'], (int)$total, $_POST['factor_explanation'], (int)$user]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Factor</title>
    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="./CSS/bootstrap.min.css" />
    <link href="Public/jalalidatepicker/persian-datepicker.min.css" rel="stylesheet" type="text/css">


    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="./CSS/style3.css">

</head>

<body>
    <div class="heading" style="background:url(./CSS/purchase2.png) no-repeat">
        <h1> فاکتور خرید </h1>
    </div>

    <!-- purchasing section starts -->

    <section class="booking">
        <h1 class="heading-title"></h1>

        <form action="" method="POST" class="book-form">
            <div class="flex">
                <div class="inputBox">
                    <span> نام تامین کننده: </span>
                    <select name="cust_id" class="inputBox">
                        <option>لطفا یکی از تامین کنندگان زیر را انتخاب فرمایید</option>
                        <option value="1" class="inputBox">Behzad</option>
                        <option value="2" class="inputBox">fatemeh</option>
                        <option value="3" class="inputBox">ArmanGostar</option>
                    </select>
                </div>
                <div class="inputBox">

                    <span> نام کالا: </span>
                    <select name="product_id" class="inputBox">
                        <option>لطفا یکی از کالاهای زیر را انتخاب فرمایید</option>
                        <option value="1" class="inputBox">laptop</option>
                        <option value="2" class="inputBox">mobile</option>
                        <option value="3" class="inputBox">tablet</option>
                    </select>

                </div>
                <div class="inputBox">
                    <span>نام انبار: </span>
                    <select name="warehouse_id" class="inputBox">
                        <option>لطفا یکی از انبارهای زیر را انتخاب فرمایید</option>
                        <option value="1" class="inputBox">Warehouse 1</option>
                        <option value="2" class="inputBox">Warehouse 2</option>
                        <option value="3" class="inputBox">Warehouse 3</option>
                    </select>

                </div>

                <div class="inputBox">
                    <span>تعداد کالا : </span>
                    <input type="number" placeholder="تعداد کالا" name="product_qty">
                </div>
                <div class="inputBox">
                    <span>قیمت هر کالا: </span>
                    <input type="text" placeholder="قیمت فی کالا به تومان" name="factor_fi">
                </div>
                <div class="inputBox">
                    <span>تخفیف:</span>
                    <input type="text" placeholder="مقدار تخفیف به تومان" name="buy_off">
                </div>
                <!-- <div class="inputBox">
                    <span>تاریخ خرید : </span>
                    <input type="date" name="date">
                </div> -->
                <div class="inputBox">
                    <span>تاریخ خرید :</span>
                    <input type="text" class="form-control d-none" id="buy_date" name="buy_date" required autofocus>
                    <input type="text" class="form-control" id="date_view" required autofocus>
                </div>
                <div class="inputBox">
                    <span> توضیحات خرید:</span>
                    <textarea name="factor_explanation" rows="5" cols="45"></textarea>
                </div>


            </div>

            <input type="submit" value="ثبت فاکتور" class="btn" name="submit" id="submit">

        </form>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="./JS/bootstrap.min.js"></script>
    <script src="./Public/jalalidatepicker/persian-date.min.js"></script>
    <script src="./Public/jalalidatepicker/persian-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#date_view").persianDatepicker({
                    format: 'YYYY-MM-DD',
                    toolbax: {
                        calendarSwitch: {
                            enabled: true
                        }
                    },
                    observer: true,
                    altField: '#buy_date'
                }),
                $("#submit").on('click', function() {
                    swal.fire(
                        "Are you sure?",
                        "You will not be able to recover this imaginary file!",
                        "warning"
                    )
                })
        });
    </script>


</body>