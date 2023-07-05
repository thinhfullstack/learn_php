1. OOP
- Là kỹ thuật lập trình trong đó nó sẽ quy toàn bộ bài toán về từng đối tượng cụ thể

2. Class, Object
- Class: là nơi quy định, định nghĩa các thuộc tính(tính chất của đối tượng, được tạo ra từ class)
Ex: class className {
    // Thuộc tính
    // Method
}
- Object: Đối tượng là thông tin cụ thể được tạo ra từ Class
Ex: $object = new ClassName

3. property, method
- Property: 
    + Biến được khai trong class có kèm theo cơ chế
    + Cơ chế (Quyền truy cập (access))
        public
        protected
        private
Ex: public $name = '';
    protected $email = '';
    private $phone = '';
- Method: là function được khai báo trong Class và có kèm theo cơ chế
Ex: public function getFullName() {
    //
}

4. Access: public, protected, private, static, const
- static: khai báo thuộc tính tĩnh, ta sử dụng static
Ex: static $address = 'Hà Nam';
    Cách dùng: 
        -> Ngoài class: dùng giống hằng 
            Ex: className::$address;
        -> Trong class: sử dung self or static để access
            Ex: self::$address
                static::$address
- const: định nghĩa hằng số, ta sử dụng từ khoá này
Ex: const EMAIL = 'aaa@gmail.com';
 + Và để access vào hằng:
  -> Bên ngoài class: access thông qua tên class Ex: className::EMAIL;
  -> Bên trong class: 
        Sử dụng từ khoá: static::EMAIL;
        Sử dụng từ khoá self: self::EMAIL;

5. extends, parent
- extends: Khi một class con kế thừa từ class cha. Class con có thể sử dụng toàn bộ các phương thức, thuộc tính, const của class cha. Với điều kiện là phương thức, thuộc tính của class cha phải mang cơ chế public | protected
Ex: class classChild extends classParent {
    //
}
- Nếu dữ liệu ở class Cha mà trong class con có giống class cha thì orverride: ghi đè dữ liệu của class cha
- parent: Chống ghi đè (orverride): 
Ex: parent::className()

6. clone (object)
- gán lại đối tượng của class trước đó
Ex: $Object1 = new className
    -> $Object2 = clone $Object1;

7. trait (liên quan đến đa kế thừa)
- là một tính năng cho phép kế thừa từ nhiều class bằng từ khoá use + className ở trong class con
- class cha phải đổi từ class -> trait
Ex: Tạo ra 3 className hoặc nhiều hơn, cách viết:

    trait className1  { // class cha
        public function meThod1() { // định nghĩa các method

        }
    }

    trait className2 { // class cha
        public function meThod2() { // định nghĩa các method
            
        }
    }

    class className3 { // class con
        use className1, className3

        public function meThod3() { // định nghĩa các method
            
        }
    }

    class ChildClass extends className3 {
        public function meThod4() { // định nghĩa các method
            
        }
    }

8. final (Chống override, không cho phép kế thừa)
Ex: 
class ParentClass {
    public function sayHello() {
        echo "Hello from ParentClass!";
    }
}

class ChildClass extends ParentClass {
    public function sayHello() {
        echo "Hello from ChildClass!";
    }
}

$child = new ChildClass();
$child->sayHello();

class FinalClass {
    public final function sayHello() {
        echo "Hello from FinalClass!";
    }
}

class ChildFinalClass extends FinalClass {
    public function sayHello() {
        echo "Hello from ChildFinalClass!";
    }
}

$childFinal = new ChildFinalClass();
$childFinal->sayHello();

9. abstract: Lớp trừu tượng, phương thức trừu tượng
    - Lớp trừu tượng là lớp có hoặc không có phương thức trừu tượng
    - Những class con kế thừa lớp trừu tượng này sẽ 
        phải định nghĩa lại các phương thức trừu tượng của lớp trừu tượng
    
    - Connect Database (connect) : Database 
        class Database
            + connect()
        class User {
            // Sử dụng đối tượng user //  access vào database
        }

        class Product {
            // Sử dụng đối tượng Product // access vào database
        }

10. __construct(): 
- Là hàm khởi tạo chạy đầu tiên bên trong class
Ex: public function __construct($name) {
    $this->name = $name;
}

11. __destruct()
- Là hàm chạy cuối cùng bên trong class
Ex: public function __destruct() {
    // Dùng để huỷ kết nối database, ....
    // ......
}

12. namepsace (không gian đặt tên)
- Không gian đặt tên duy nhất cho 1 file tên class 