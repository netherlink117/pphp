<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index do PHP</title>
</head>
<body>
    <h1>1 Functions</h1>
    <p>Function is an structure of programming where a block of code can be called multiple times to do a task. It can receive zero or more parameters, and return values if desired. The next gretting is the product of a function (see the source code L12):</p>
    <?php
    // create the function
    function greeting() {
        echo "\"Hello world!\"";
    }
    // call the function
    greeting();
    ?>
    <p>Currently, as for the date this script is made, the last version of PHP allows types for parameters and returning value (see the source code L21).</p>
    <?php
    // this example requires int values as parameters
    function agregateInt(int $a, int $b) {
        return $a + $b;
    }
    // this ecample requires floats as parameters and possibly returns float or null by using question mark
    function divideInt(float $a, float $b) : ?float {
        $c = $a / $b;
        return is_nan($c) ? null : $c;
    }
    ?>
    <h1>2 Classes</h1>
    <p>Class is an structure of code that represents an object, a class is like a template for instances of objects. The next line is a dump of a Person class (see the source code L34).</p>
    <h2>2.1 Scope</h2>
    <p>Scope is the level of access a value has depending its structure (class properties or functions). It can be:</p>
    <ul>
        <li>public: access to the value from anywhere.</li>
        <li>protected: access only within the class instance and child classes.</li>
        <li>private: access only within the class instance.</li>
    </ul>
    <h2>2.2 Properties or attributes</h2>
    <p>A property is a varible that composes the class structure. It can have any of the previous access leves described in scope and can have a type if desired (as for the las version of PHP at the time this script is writen, PHP accepts type on variables and functions).</p>
    <h2>2.2 Functions</h2>
    <p>Functions within the classes work tha same way as the previuos example (see the source code L14) but them can have access levels and there are also special functions special to the class behavior.</p>
    <ul>
        <li>Normal functions</li>
        <li>Class special functions like <code>__construct()</code> and <code>__get()</code> or <code>__set()</code>, etc</li>
    </ul>
    <h2>2.3 Inheritance and abstraction</h2>
    <p>Inheritance is the capacity of a structure (class) to inherit to another structures (clases) to give them a similar behavior and abstraction is the way a class is implemented, an abstract class is that one that works merely as an empty template that can not be an instance. There is also a final state of a class where it can no longer inherit, the text below is the dump of diferent classes (see the source code L47).</p>
    <textarea cols="80" rows="25" readonly><?php
    // this is a normal class, it can be instanciate anlone
    class Person {
        // private props are available only inside class
        private string $first_name;
        private string $last_name;
        // public functions are available everywhere on the code, in this case they work as getters and setters
        public function get_full_name() : string {
            return $this->first_name." ".$this->last_name;
        }
        // __construct is an special function to construct an instance of the object, there it can be some logic to define default values
        public function __construct(string $firstname, string $lastname) {
            $this->first_name = $firstname;
            $this->last_name = $lastname;
        }
    }
    echo "Person dump:\n";
    $person = new Person("Wn", "Kl"); 
    var_dump($person);
    echo "\n";
    // this is an abstract class, it can not be instanciate
    abstract class Student extends Person {
        // props on abstract classes work the same as the normal classes, here and on any class, protected values can be accessed from within the class and child classes
        protected string $career;
        // functions on abstract classes work the same as the normal classes, but they can be abstract as well, so them must be implemented on child classes
        public abstract function set_career(string $value) : void;
        public abstract function get_career() : ?string;
    }
    // this try fails due abstract class
    try {
        $student = new Student();
    } catch (Error $ex) {
        echo "Message when trying to instantiate an abstract class like Student:\n";
        echo $ex->getMessage();
        echo "\n\n";
    }
    // a final class can not inheritate to another classes, but have the same behavior as the normal ones
    final class Pinpon extends Student {
        // these functions are required due the abstraction from the Student functions
        public function set_career(string $value) : void {
            $this->career = $value;
        }
        public function get_career() : string {
            return $this->career;
        }
    }
    echo "Pinpon dump:\n";
    $pinpon = new Pinpon("Cosme", "Fulanito");
    var_dump($pinpon);
    echo "\n";
    // set_career can be used on the instance due the extend of abstracc class Student
    $pinpon->set_career("software development");
    echo "Pinpon dump after called the function set_career:\n";
    var_dump($pinpon);
    echo "\n";
    ?></textarea>
    <h1>3 Interfaces</h1>
    <p>An interface is similar to an abstract class but with the ability to implement as many interfaces as necesary and not only one inheritance like the classes, here are some dumps of some classes using class inheritance and interface implementation (see the souce code L105).</p>
    <textarea cols="80" rows="25"><?php
    // interfaces can be implemented or/and extended but can not be instanciated like a class
    interface Explotable {
        public function work() : string;
    }
    // classes can inherit from classes and implement as many interfaces as desired
    final class PinponSlave extends Student implements Explotable {
        // static props dont need an instance to be accessed and can be defined inline
        public static int $INSTANCES_COUNTER = 0;
        // non static props (instance props) requires instanciation
        private bool $work;
        public function __construct(bool $work) {
            // look for how many args we passed, if 3 call the parent constructor with the last 2
            if(func_num_args() === 3) {
                $f = func_get_arg(1);// get the arg at index 1 (index start at 0)
                $a = func_get_args();// get the entire array of args
                $l = $a[2];// get the arg at index 2
                parent::__construct($f, $l); // call parent constructor
            }
            // define this prop
            $this->work = $work;
        }
        public function set_career(string $value) : void {
            $this->career = $value;
        }
        public function get_career() : string {
            return $this->career;
        }
        private function develop($state) : bool {
            if(func_num_args() === 1) {
                $this->work = $state;
                return $this->work;
            } else {
                return false;
            }
        }
        public function work() : string {
            return $this->develop(true) ? "Pinpon is doing: ".$this->career."." : "Pinpon is eating asada tacos.";
        }
    }
    echo "PinponSlave dump:\n";
    $pinponslave = new PinponSlave(false, "pinpon", "crack");
    $pinponslave->set_career("software development");
    var_dump($pinponslave);
    // change the work value to true, also returns the pinpon actual actions
    echo "\n\nValue returned by work() function:\n";
    $action = $pinponslave->work();
    echo $action."\n";
    echo "\n";
    echo "PinponSlave dump after called the function work:\n";
    var_dump($pinponslave);
    ?></textarea>
    <style>
        * {
            background-color: rgba(40,40,40,1);
            color: rgba(200,200,200,1);
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }
        h1 {
            color: rgba(100,200,200,1);
        }
        h2 {
            color: rgba(200,100,200,1);
        }
        h3 {
            color: rgba(200,200,100,1);
        }
        textarea {
            font-family: monospace;
        }
    </style>
</body>
</html>