<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ここにタイトル</title>
    <link href="./css/style_jav.css" rel="stylesheet" type="text/css">
    <link href="./css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container">
    <div class="breadcrumbs">
    パンくずリスト > <a href="">パンくずリスト</a>
    </div>
</div>
    
<main>
    <?php 
        
        $organization = $affiliates = 
        $name = $zip1 = $zip2 = $address = 
        $phone = $email = $password = '';

        $organization_err = $affiliates_err = $name_err =
        $zip1_err = $zip2_err = $address_err =
        $phone_err = $email_err = $password_err = '';

        $content = '';


        if(isset($_POST['submit'])) {
            $organization = $_POST['organization'];
            $affiliates = $_POST['affiliates'];
            $name = $_POST['name'];
            $zip1 = $_POST['zip1'];
            $zip2 = $_POST['zip2'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        }

        // Tên tổ chức
        if(empty($organization)) {
            $organization_err = 'Vui lòng nhập thông tin để hoàn thành';
        }

        // Đơn vị liên kết
        if(empty($affiliates)) {
            $affiliates_err = 'Vui lòng nhập thông tin để hoàn thành đơn liên kết';
        }

        // Tên đơn vị
        if(empty($name)) {
            $name_err = 'Vui lòng nhập thông tin để hoàn thành tên đơn vị';
        }

        // Zip code 1
        if(empty($zip1)) {
            $zip1_err = 'Vui lòng nhập đầy đủ thông tin số zip code 1';
        } else if(!is_numeric($zip1)) {
            $zip1_err = 'Số zip code 1 nhập phải là số';
        } else if(strlen($zip1) > 3 || strlen($zip1) < 3) {
            $zip1_err = 'Số zip code 2 nhập không vượt quá hoặc nhỏ hơn 3 ký tự';
        } 

        // Zip code 2
        if(empty($zip2)) {
            $zip2_err = 'Vui lòng nhập đầy đủ thông tin số zip code 2';
        } else if(!is_numeric($zip2)) {
            $zip2_err = 'Số zip code 2 nhập phải là số';
        } else if(strlen($zip2) > 4 || strlen($zip2) < 4) {
            $zip2_err = 'Số zip code 2 nhập không vượt quá hoặc nhỏ hơn 4 ký tự';
        } 

        // Địa chỉ
        if(empty($address)) {
            $address_err = 'Vui lòng nhập đầy đủ thông tin địa chỉ';
        }

        // Phone
        if(empty($phone)) {
            $phone_err = 'Vui lòng nhập đầy đủ thông tin số điện thoại';
        } else if(!is_numeric($phone)) {
            $phone_err = 'Số điện thoại nhập phải là số';
        } else if(strlen($phone) > 10 || strlen($phone) < 10) {
            $phone_err = 'Số điện thoại nhập không vượt quá hoặc nhỏ hơn 10 ký tự';
        } 

        // Email 
        if(empty($email)) {
            $email_err = 'Vui lòng nhập đầy đủ thông tin email';
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = 'Email nhập phải đúng định dạng';
        }

        // Password
        if(empty($password)) {
            $password_err = 'Vui lòng nhập đầy đủ thông tin mật khẩu';
        } else if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).*$/', $password)) {
            $password_err = 'Mật khẩu phải có cả chữ hoa và thường';
        } else if(strlen($password) < 8) {
            $password_err = 'Mật khẩu không được nhỏ hơn 8 ký tự';
        }

        if($organization && $affiliates && $name && $zip1 && $zip2 && $address && $phone && $email) {
            $content .= "<p>Tên tổ chức của bạn: ${organization}";
            $content .= "<p>Chi nhánh - Liên kết của bạn: ${affiliates}";
            $content .= "<p>Tên của bạn: ${name}";
            $content .= "<p>Zip_code 1 của bạn: ${zip1}";
            $content .= "<p>Zip_code 2 của bạn: ${zip2}";
            $content .= "<p>Địa chỉ của bạn: ${address}";
            $content .= "<p>Số điện thoại của bạn: ${phone}";
            $content .= "<p>Email của bạn: ${email}";
        }
    
    ?>

    <form action="" method="POST">
        <section>
            <div class="section_header">
                <h2 class="section_title">お客様登録</h2>
            </div>

            <div class="container">
                <div class="form_frame">

                <div class="form_box">

                    <div class="form_headline">
                    商品引渡し先
                    </div>

                    <?php 
                        function generateRadioInput($name, $value, $label, $checked) {
                            echo '<label class="side_label">';
                            echo '<input type="radio" onchange="changePlaceholder(this)" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : '') . '>';
                            echo $label;
                            echo '</label>';
                        }
                        
                        $type = '';
                        $destination = isset($_POST['destination']) ? $_POST['destination'] : '';
                        
                        generateRadioInput('destination', '1', ($type === '1' || $type === '') ? '会社' : '学校', $destination === '1');
                        generateRadioInput('destination', '2', ($type === '1' || $type === '') ? '学校' : '会社', $destination === '2');


                    ?>

                </div>

                <!-- 会社･勤務先フォーム -->
                <div class="company_form">
                    
                    <div class="form_box">
                        <div class="form_headline" style="margin-top: 20px;">
                            団体名
                        </div>
                        <input type="text" class="<?= $organization_err ? 'input_error' : '' ?>" value="<?= $organization ?>" name="organization" placeholder="株式会社〇〇">
                        <?= $organization_err ? "<span class='error'>$organization_err</span>" : '' ?>
                    </div>

                    <div class="form_box">
                        <div class="form_headline">
                            <span id="label_destination"><?= ($type === '1' || $type === '') ? '所属（引渡し先）' : '所属（学年・クラス）' ?></span>
                            <!-- 所属（引渡し先）-->
                        </div>
                        <input type="text" id="department" class="<?= $affiliates_err ? 'input_error' : '' ?>" name="affiliates" value="<?= $affiliates ?>" placeholder="営業部">
                        <?= $affiliates_err ? "<span class='error'>$affiliates_err</span>" : '' ?>
                    </div>

                    <div class="form_box">
                        <div class="form_headline">
                            管理者名
                        </div>
                        <input type="text" name="name" class="<?= $name_err ? 'input_error' : '' ?>" value="<?= $name ?>" placeholder="山田　太郎">
                        <?= $name_err ? "<span class='error'>$name_err</span>" : '' ?>
                    </div>

                    <div class="form_box">
                        <div class="form_headline">
                            郵便番号
                        </div>
                        <div class="flex_wrap zip_frame">
                            <div>
                                <input type="text" name="zip1" class="<?= $zip1_err ? 'input_error' : '' ?>" value="<?= $zip1 ?>" maxlength="3" placeholder="000">
                                <?= $zip1_err ? "<span class='error'>$zip1_err</span>" : '' ?>
                            </div>
                            <div>
                                <input type="text" name="zip2" class="<?= $zip2_err ? 'input_error' : '' ?>" value="<?= $zip2 ?>" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zip31','zip32','pref','pref','addr1');" placeholder="0000">
                                <?= $zip2_err ? "<span class='error'>$zip2_err</span>" : '' ?>
                            </div>
                        </div>
                    </div>

                    <div class="form_box">
                        <div class="form_headline">
                            ご住所
                        </div>
                        <div class="pref"></div>
                        <input type="text" name="address" class="<?= $address_err ? 'input_error' : '' ?>" value="<?= $address ?>" placeholder="〇〇町1-1　〇〇マンション301">
                        <?= $address_err ? "<span class='error'>$address_err</span>" : '' ?>
                    </div>

                    <div class="form_box">

                        <div class="form_headline">
                            電話番号
                        </div>
                        <input type="text" name="phone" class="<?= $phone_err ? 'input_error' : '' ?>" value="<?= $phone ?>" placeholder="000-0000-0000">
                        <?= $phone_err ? "<span class='error'>$phone_err</span>" : '' ?>
                    </div>

                    <div class="form_box">

                        <div class="form_headline">
                            メールアドレス
                        </div>
                        <input type="email" name="email" class="<?= $email_err ? 'input_error' : '' ?>" value="<?= $email ?>" placeholder="example@example.com">
                        <?= $email_err ? "<span class='error'>$email_err</span>" : '' ?>
                    </div>

                    <div class="form_box">

                        <div class="form_headline">
                            パスワード
                        </div>
                        <input type="text" name="password" class="<?= $password_err ? 'input_error' : '' ?>" value="<?= $password ?>" placeholder="※半角英数字１５文字以内">
                        <?= $password_err ? "<span class='error'>$password_err</span>" : '' ?>
                    </div>
                    
                </div>

                <!-- 学校フォーム -->
                <!-- <div class="school_form">

                    <div class="form_box">
                        <div class="form_headline">
                            団体名
                        </div>
                        <input type="text" name="" placeholder="〇〇中学校">
                    </div>

                    <div class="form_box">
                        <div class="form_headline">
                            所属（学年・クラス）
                        </div>
                        <input type="text" name="" placeholder="〇年〇組">
                    </div>

                    <div class="form_box">
                        <div class="form_headline">
                            管理者名
                        </div>
                        <input type="text" name="" placeholder="山田太郎">
                    </div>

                    <div class="form_box">
                    <div class="form_headline">
                        郵便番号
                    </div>
                    <div class="flex_wrap zip_frame">
                        <div>
                        <input type="text" name="zip31" maxlength="3" placeholder="000">
                        </div>
                        <div>
                        <input type="text" name="zip32" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zip31','zip32','pref','pref','addr1');" placeholder="0000">
                        </div>
                    </div>
                    </div>

                    <div class="form_box">
                    <div class="form_headline">
                        ご住所
                    </div>
                    <div name="pref"></div>
                    <input type="text" name="addr1" placeholder="〇〇町1-1　〇〇マンション301">
                    </div>

                    <div class="form_box">

                    <div class="form_headline">
                        電話番号
                    </div>
                    <input type="text" name="" placeholder="00-0000-0000">

                    </div>

                    <div class="form_box">

                    <div class="form_headline">
                        メールアドレス
                    </div>
                    <input type="email" name="" placeholder="example@example.com">

                    </div>

                    <div class="form_box">

                    <div class="form_headline">
                        パスワード
                    </div>
                    <input type="text" name="" placeholder="※半角英数字１５文字以内">

                    </div>

                </div> -->

                </div>

                <div class="button">
                <div>
                    <input type="submit" class="button01" name="submit" value="確認画面へ">
                </div>
                </div>


            </div>

        </section>
    </form>

    <div class='result'><?= $content ?></div>

</main>

</body>
</html>

<script>
    const radioInputs = document.querySelectorAll('input[name="destination"]');
    const labelDestination = document.querySelector('#label_destination');

    radioInputs.forEach((input) => {
        input.addEventListener('change', function() {
            if (this.value === '1') {
                labelDestination.textContent = '所属（引渡し先）';
            } else {
                labelDestination.textContent = '所属（学年・クラス）';
            }
        });
    });

    function changePlaceholder(radio) {
        let departmentInput = document.querySelector("#department");
        if (radio.value === "1") {
            departmentInput.placeholder = "営業部";
        } else if (radio.value === "2") {
            departmentInput.placeholder = "〇年〇組";
        }
    }
</script>