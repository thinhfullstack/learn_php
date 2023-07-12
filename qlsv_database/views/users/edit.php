<?php 
    $userObject = new User;

    $userId = $_GET['id'] ?? '';
    $userInfo = null;

    foreach($users as $user) {
        if($user->id == $userId) {
            $userInfo = $user;
            break;
        }
    }

    $userObject->update([
        
    ])
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-5">User Infomation</h3>
    <a href="index.php?module=user&action=list">Back</a>
</div>

<form action="index.php?module=user&action=edit&id=<?= $userId ?>" method="POST">
    <div class="form-group row">
        <label for="personal_id" class="col-sm-3 col-form-label">CCCD:</label>
        <div class="col-sm-9">
            <input type="text" id="personal_id" name="personal_id" value="<?= $user->personal_id ?>" class="form-control <?= $errPersonalId ? 'border-danger' : '' ?>" 
                placeholder="Nhập căn cước công dân của người dùng..."/>
            <?= $errPersonalId ? "<div class='text-danger'>$errPersonalId</div>" : "" ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label">Họ và Tên:</label>
        <div class="col-sm-9">
            <input type="text" id="name" name="name" class="form-control <?= $errName ? 'border-danger' : '' ?>" 
                placeholder="Nhập họ và tên của người dùng..."/>
            <?= $errName ? "<div class='text-danger'>$errName</div>" : "" ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email:</label>
        <div class="col-sm-9">
            <input type="text" id="email" name="email" class="form-control <?= $errEmail ? 'border-danger' : '' ?>" 
                placeholder="Nhập email của người dùng..." />
            <?= $errEmail ? "<div class='text-danger'>$errEmail</div>" : "" ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label">Password:</label>
        <div class="col-sm-9">
            <input type="password" id="password" name="password" class="form-control <?= $errPassword ? 'border-danger' : '' ?>" 
                placeholder="Nhập mật khẩu của người dùng..."/>
            <?= $errPassword ? "<div class='text-danger'>$errPassword</div>" : "" ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="birthday" class="col-sm-3 col-form-label">Năm sinh:</label>
        <div class="col-sm-9">
            <input type="text" id="birthday" name="birthday" class="form-control <?= $errBirthday ? 'border-danger' : '' ?>" 
                placeholder="Nhập năm sinh của người dùng..."/>
            <?= $errBirthday ? "<div class='text-danger'>$errBirthday</div>" : "" ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="gender" class="col-sm-3 col-form-label">Giới tính:</label>
        <div class="col-sm-9">
            <label for="male">Nam</label>
            <input type="radio" id="male" name="gender" value="1" <?= $gender == 1 ? 'checked' : '' ?> />
            <label for="famale">Nữ</label>
            <input type="radio" id="famale" name="gender" value="2" <?= $gender == 2 ? 'checked' : '' ?> />
            <?= $errGender ? "<div class='text-danger'>$errGender</div>" : "" ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="file" class="col-sm-3 col-form-label">Avatar:</label>
        <div class="col-sm-9">
            <input type="file" id="file" name="file" class="border border-white" />
            <?= $errFile ? "<div class='text-danger'>$errFile</div>" : "" ?>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9">
            <button type="submit" name="btn-save" class="btn btn-primary">Lưu lại</button> &nbsp;
            <button type="reset" name="btn-reset" class="btn btn-danger">Huỷ bỏ</button>
        </div>
    </div>
</form>