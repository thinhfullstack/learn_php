<?php 

class Student
{
    protected $fullname;
    protected $email;
    protected $phone;
    protected $gender;

    // Set giá trị cho student
    public function setFullName($fullname)
    {
        $this->fullname = $fullname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    // Get để in dữ liệu ra màn hình
    public function getFullName() 
    {
        return $this->fullname;
    }

    public function getEmail() 
    {
        return $this->email;
    }

    public function getPhone() 
    {
        return $this->phone;
    }

    public function getGender() 
    {
        return $this->gender;
    }

    // Kiểm tra lỗi khi nhập các thông tin vào form
    public static function getMessageError($inputName) 
    {
        if (!self::isFormSubmit()) {
            return;
        }
        
        if(empty($_POST[$inputName])) {
            if($inputName === 'fullname') {
                return 'Vui lòng nhập họ và tên đầy đủ';
            } else if($inputName === 'email') {
                return 'Vui lòng nhập email của bạn';
            } else if($inputName === 'phone') {
                return 'Vui lòng nhập số điện thoại của bạn';
            } else if($inputName === 'gender') {
                return 'Vui lòng chọn giới tính của bạn';
            }
        }
        
        return;
    }

    // Submit nút button
    public static function isFormSubmit() 
    {
        return isset($_POST['btn-save']);
    }

    // Reset button
    public static function isFormReset()
    {
        return isset($_POST['btn-reset']);
    }

    // Thực hiện xử lý submit form in dữ liệu ra
    public function processSubmit() 
    {
        $fullname = '';
        $email = '';
        $phone = '';
        $gender = '';

        if(self::isFormSubmit()) {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        }

        if(self::isFormReset()) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        $errFullName = self::getMessageError('fullname');
        if(!$errFullName) {
            $this->setFullName($fullname);
        }

        $errEmail = self::getMessageError('email');
        if(!$errEmail) {
            $this->setEmail($email);
        }

        $errPhone = self::getMessageError('phone');
        if(!$errPhone) {
            $this->setPhone($phone);
        } 

        $errGender = self::getMessageError('gender');
        if(!$errGender) {
            $this->setGender($gender);
        }

    }

}

?>
