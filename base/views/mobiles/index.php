<?php 
    require("./handle/process.php");
?>

<h3>Đây là trang Mobile</h3>
<div class="form-input">
    <label for="fullname">Họ và tên:</label>
    <input type="text" id="fullname" class="<?= $fullnameErr ? 'input-error' : '' ?>" value="<?= $fullname ?>" name="fullname" placeholder="Nhập họ và tên...">
    <?= $fullnameErr ? "<div class='error'>$fullnameErr</div>" : '' ?>
    <br />
    <label for="phone">Điện thoại:</label>
    <input type="text" id="phone" class="<?= $phoneErr ? 'input-error' : '' ?>" value="<?= $phone ?>" name="phone" placeholder="Nhập số điện thoại...">
    <?= $phoneErr ? "<div class='error'>$phoneErr</div>" : '' ?>
    <br />
    <label for="address">Địa chỉ nhận hàng:</label>
    <input type="text" id="address" class="<?= $addressErr ? 'input-error' : '' ?>" value="<?= $address ?>" name="address" placeholder="Nhập địa chỉ nhận hàng...">
    <?= $addressErr ? "<div class='error'>$addressErr</div>" : '' ?>
    <br />

    <?php require_once("./handle/create.php") ?>
    <?php require_once("./handle/cancel.php") ?>
    
    <div style="margin: 20px 0;">
        <?php 
            require("./handle/content.php");
        ?>
    </div>
</div>
