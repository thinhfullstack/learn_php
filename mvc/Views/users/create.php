<h2><?= $title ?></h2> 

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-5">User Infomation</h3>
    <a href="index.php?controller=user">Back</a>
</div>

<form action="index.php?controller=user&action=store" method="POST">
    <div class="form-group row">
        <label for="personal_id" class="col-sm-3 col-form-label">CCCD:</label>
        <div class="col-sm-9">
            <input type="text" id="personal_id" name="personal_id" class="form-control <?= $errPersonalId ? 'border-danger' : '' ?>" 
                placeholder="Nhập căn cước công dân của người dùng..."/>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label">Họ và Tên:</label>
        <div class="col-sm-9">
            <input type="text" id="name" name="name" class="form-control <?= $errName ? 'border-danger' : '' ?>" 
                placeholder="Nhập họ và tên của người dùng..."/>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email:</label>
        <div class="col-sm-9">
            <input type="text" id="email" name="email" class="form-control <?= $errEmail ? 'border-danger' : '' ?>" 
                placeholder="Nhập email của người dùng..." />
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label">Password:</label>
        <div class="col-sm-9">
            <input type="password" id="password" name="password" class="form-control <?= $errPassword ? 'border-danger' : '' ?>" 
                placeholder="Nhập mật khẩu của người dùng..."/>
        </div>
    </div>
    <div class="form-group row">
        <label for="birthday" class="col-sm-3 col-form-label">Năm sinh:</label>
        <div class="col-sm-9">
            <input type="text" id="birthday" name="birthday" class="form-control <?= $errBirthday ? 'border-danger' : '' ?>" 
                placeholder="Nhập năm sinh của người dùng..."/>
        </div>
    </div>
    <div class="form-group row">
        <label for="gender" class="col-sm-3 col-form-label">Giới tính:</label>
        <div class="col-sm-9">
            <label for="male">Nam</label>
            <input type="radio" id="male" name="gender" value="1" />
            <label for="famale">Nữ</label>
            <input type="radio" id="famale" name="gender" value="2" />
        </div>
    </div>
    
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9">
            <button type="submit" name="btn-save" class="btn btn-primary">Lưu lại</button> &nbsp;
            <button type="reset" class="btn btn-danger">Huỷ bỏ</button>
        </div>
    </div>
</form>