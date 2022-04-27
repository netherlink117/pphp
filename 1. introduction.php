<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction</title>
</head>
<body>
    <?php
    // Beforehand, let's see some of comments (we will use in examples below), this is a single line comment
    
    # Also this is a single line comment
    
    /* This is a multi-  
    line comment
    */
    
    ?>


    <h1>1 Syntax</h1>

    <h2>1.1 PHP tags</h2>
    <p>There are 3 type of PHP tags (see the source code L27):
    <ul>
    <?php echo "<li>&lt;?php  ?&gt;</li>"; // This is the most common, see the tag form arround this, not the string ?>
    <?= "<li>&lt;?=  ?&gt;</li>"; // echo form ?>
    <?php echo "<li>&lt;?  ?&gt;</li>"; // Short form (only uses greater than and lessthan with question mark), you need some extra config to this to work ?>
    </ul>
    
    <h2>1.2 Escaping HTML</h2>
    <p>PHP interpretates everything between php tags, that means everything after the line containig ?> will output wihtout interpreting (see the source code L34)...</p>
    <?php if(true): ?>
        <!--True, this will be basic HTML without PHP interpretation even in a PHP file-->
    <?php else: ?>
        <!--False, also this will be basic HTML without PHP interpretation-->
    <?php endif; ?>
    
    <h2>1.3 Instruction separation</h2>
    <p>As of the if show before (see the source code L34), tags can be opened and closed mutiple times to separate instructions.</p>
    <?php echo "<p>This is an instruction with echo using normal tags (see the source code L42).</p>"; ?>
    <?= "<p>This is an instruction without echo but usign echo form of tag (see the source code L45), some times ending php's tag is not required... but I will use ending tag by now, here...</p>"; ?>

    
    <h1>2 Varibles</h1>
    <p>Variables in PHP are represented by a dollar sign followed by the name of the variable. The variable name is case-sensitive.</p>
    <ul>
        <li>
            Normal (see the source code L51)
            <?php
            // $4site     // Invalid; starts with a number
            // $_4site    // Valid; starts with an underscore
            // $täyte     // valid; 'ä' is (Extended) ASCII 228.
            ?>
        </li>
        <li>
            Constant (see the source code L59)
            <?php
            define("CONSTANT", "Hello world.");
            const CONSTANT = 'Hello World';
            ?>
        </li>
        <li>
            Predefined (see the source code L66)
            <?php
            $_GET["query"]; // Predefiend variables are varibles defined by the PHP, such $_GET, $_POST, and some other stuff, a for more info look this link https://www.php.net/manual/en/language.variables.predefined.php
            $_POST["query"];
            ?>
        </li>
    </ul>

    
    <h1>3 Operators</h1>

    <h2>3.1 Operator precedende</h2>
    <p>Defines how operators are evaluate first, a table with info is <a href="https://www.php.net/manual/en/language.operators.precedence.php">here</a>.</p>
    <p>Nevertheless, precedence is prety similar to any other language.</p>
    
    <h2>3.2 Arithmetic operatos</h2>
    <p>They just work as were teached at school, look <a href="https://www.php.net/manual/en/language.operators.arithmetic.php">this</a> table.</p>
    
    <h2>3.3 Assigment operators</h2>
    <h3>3.3.1 The basic assignment operator "=".</h3>
    <p>Your first inclination might be to think of this as "equal to". Don't. It really means that the left operand gets set to the value of the expression on the right (that is, "gets set to", see the source code L86).</p>
    <?php
    $a = ($b = 4) + 5; // $a is equal to 9 now, and $b has been set to 4.
    ?>
    <h3>3.3.2 Addition to the basic assignment operator (.=, +=, -=, *=, /=)</h3>
    <p>There are "combined operators" for all of the binary arithmetic, array union and string operators that allow you to use a value in an expression and then set its value to the result of that expression  (see the source code L91).</p>
    <?php
    $a = 3;
    $a += 5; // Sets $a to 8, as if we had said: $a = $a + 5;
    $b = "Hello ";
    $b .= "There!"; // Sets $b to "Hello There!", just like $b = $b . "There!";
    ?>
    <h3>3.3.3 Assignment by reference (&$)</h3>
    <p>Refencing also supported, using the "$var = &$othervar;" syntax. Assignment by reference means that both variables end up pointing at the same data, and nothing is copied anywhere  (see the source code L99).</p>
    <?php
    $a = 3;
    $b = &$a; // $b is a reference to $a
    ?>

    <h2>3.4 Bitwise operator (&, |, ^, ~, <<, >>)</h2>
    <p>Bitwise operators allow evaluation and manipulation of specific bits within an integer. A list is <a href="https://www.php.net/manual/en/language.operators.bitwise.php">here</a>.</p>
    
    <h2>3.5 Comparation operators (==, ===, !=, !==, <>, <, >, >=, <=, <=>)</h2>
    <p>Comparison operators, as their name implies, allow you to compare two values. You may also be interested in viewing the type comparison tables, as they show examples of various type related comparisons. <a href="https://www.php.net/manual/en/language.operators.comparison.php">Here</a> is a table with usefull info.</p>
    <p>Other operator types can be found <a href="https://www.php.net/manual/en/language.operators.php">here</a>.</p>

    
    <h1>4 Types</h1>
    <h2>4.1 Scalar types</h2>
    <p>Escalar types are the basic form of types, like: bool, int, float, string.</p>
    <ul>
        <li>
            Boolean (see the source code L118)
            <?php
            $foo = True; // Assign the value TRUE to $foo, true is case insensitive
            ?>
        </li>
        <li>
            Int (see the source code L124)
            <?php
            $a = 1234;       // Decimal number
            $a = 0123;       // Octal number (equivalent to 83 decimal)
            // $a = 0o123;      // Octal number (as of PHP 8.1.0)
            $a = 0x1A;       // Hexadecimal number (equivalent to 26 decimal)
            $a = 0b11111111; // Binary number (equivalent to 255 decimal)
            $a = 1_234_567;  // Decimal number (as of PHP 7.4.0)
            ?>
        </li>
        <li>
            Float (see the source code L135)
            <?php
            $a = 1.234; 
            $b = 1.2e3; 
            $c = 7E-10;
            $d = 1_234.567; // As of PHP 7.4.0
            ?>
        </li>
        <li>
            String (see the source code L144)
            <?php
            $s = 'This is a simple quoted string';
            $d = "This is a double quoted string"; // Double quoted string cna be expanded and interpret some characters. https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.double
            $e = <<<END
            Heredoc is a especial type of string
            it can also expand some stuff
            END;
            ?>
        </li>
        <li>
            Numeric string (see the source code L155)
            <?php
            $foo = 1 + "10.5";                // $foo is float (11.5)
            $foo = 1 + "-1.3e3";              // $foo is float (-1299)
            $foo = 1 + "bob-1.3e3";           // TypeError as of PHP 8.0.0, $foo is integer (1) previously
            $foo = 1 + "bob3";                // TypeError as of PHP 8.0.0, $foo is integer (1) previously
            $foo = 1 + "10 Small Pigs";       // $foo is integer (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
            $foo = 4 + "10.2 Little Piggies"; // $foo is float (14.2) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
            $foo = "10.0 pigs " + 1;          // $foo is float (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
            $foo = "10.0 pigs " + 1.0;        // $foo is float (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
            ?>
        </li>
    </ul>

    <h2>4.2 Compound types</h2>
    <p>Compound types are a more structured kind of types, like: array, object, iterable, callable.</p>
    <ul>
        <li>
            Array (see the source code L173)
            <?php
            $array = array( // Using full array syntax
                "foo" => "bar",
                "bar" => "foo",
            );
            $array = [ // Using the short array syntax
                "foo" => "bar",
                "bar" => "foo",
            ];
            $array = array("foo", "bar", "hello", "world"); // Use numeric array with numeric indexes (not key index)
            ?>
        </li>
        <li>
            Object (see the source code L187)
            <?php
            class foo
            {
                function do_foo()
                {
                    echo "Doing foo."; 
                }
            }
            $bar = new foo; // or $bar = new foo();
            $bar->do_foo();
            // PHP includes a complete object model. Some of its features are: visibility, abstract and final classes and methods, additional magic methods, interfaces, and cloning. https://www.php.net/manual/en/oop5.intro.php
            ?>
        </li>
    </ul>
    <p>We will omit iterables (wich means can be iterable by using an interface), callable, and etc.</p>
    
    <h2>4.3 Special types</h2>
    <p>There are 2 special types, like: null and resource</a>
    <ul>
        <li>
            Resource (see the source code L208)
            <?php
            // As resource variables hold special handles to opened files, database connections, image canvas areas and the like, converting to a resource makes no sense.
            // A list of complete resource types is here: https://www.php.net/manual/en/resource.php
            ?>
        </li>
        <li>
            Null
        </li>
    </ul>
    

    <h1>5 Control structures</h1>
    <p>Any PHP script is built out of a series of statements. A statement can be an assignment, a function call, a loop, a conditional statement or even a statement that does nothing (an empty statement). Statements usually end with a semicolon. In addition, statements can be grouped into a statement-group by encapsulating a group of statements with curly braces. A statement-group is a statement by itself as well (see the source code L221).</p>
    <?php
    // These are some basic control structure examples
    // IF
    if (True) {
        // ...
    } else if(False) {
        // ...
    } else {
        // ...
    }
    if (true):
        // ...
    else:
        // ...
    endif;

    // While
    while (false) {
        // ...
    }
    while(false):
        // ...
    endwhile;

    // Do-While
    do {
        // ...
    } while(false);

    // For
    for ($i = 1; $i <= 10; $i++) {
        // echo $i;
    }
    // for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);
    
    // Foreach
    foreach ($arr as &$value) { // Also works without & but in that cas would not be referenced varible
        $value = $value * 2;
    }
    foreach ($arr as $key => &$value) { // this form is util to work with arrays using key indexes
        $value = $value * 2;
    }

    // Switch
    switch ($i) {
        case 0:
            echo "i equals 0";
            break;
        case 1:
            echo "i equals 1";
            break;
        case 2:
            echo "i equals 2";
            break;
    }
    // More control estructures and examples can be read here: https://www.php.net/manual/en/language.control-structures.php
    ?>
    <a href="https://www.php.net/manual/en/langref.php" style="display: block; width: 100%; margin-bottom: 1rem;">For more info about PHP stuff, use this link</a>
    <a href="/2. functions and poo.php" style="display: block; width: 100%; font-size: 21pt;">Next</a>
    <br>
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
    </style>
</body>
</html>