<?php

require_once "../helpers.php";

interface ProductResource
{
    /**
     * 获取产品详情
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id): mixed;

    /**
     * 获取产品列表
     *
     * @return mixed
     */
    public function index(): mixed;

    /**
     * 展示创建产品的表单页面
     *
     * @return mixed
     */
    public function create(): mixed;

    /**
     * 新增产品到数据库
     *
     * @param array $product
     * @return mixed
     */
    public function store(array $product): mixed;

    /**
     * 展示编辑产品的表单页面
     *
     * @param int $id
     * @return mixed
     */
    public function edit(int $id): mixed;

    /**
     * 更新产品到数据库
     *
     * @param int $id
     * @param array $product
     * @return mixed
     */
    public function update(int $id, array $product): mixed;

    /**
     * 删除产品
     *
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id): mixed;
}

// 抽象类不能直接实例化
// $productResource = new ProductResource();

class Product implements ProductResource
{
    public function show(int $id): string
    {
        return "Showing product with ID: $id<br>";
    }

    public function index(): string
    {
        return "Listing all products<br>";
    }

    public function create(): string
    {
        return "Creating a new product<br>";
    }

    public function store(array $product): string
    {
        return "Storing product: " . json_encode($product) . "<br>";
    }

    public function edit(int $id): string
    {
        return "Editing product with ID: $id<br>";
    }

    public function update(int $id, array $product): string
    {
        return "Updating product with ID: $id<br>";
    }

    public function destroy(int $id): string
    {
        return "Deleting product with ID: $id<br>";
    }

    public function search(string $keyword): string
    {
        return "Searching for product with keyword: $keyword<br>";
    }
}

$product = new Product("Sample Product");
$productInfo = $product->show(1);
echoWithBr($productInfo);

class Database
{
    public static string $host = "localhost";

    public string $dbName = "school";

    public static string $username;

    public static string $password;

    /**
     * @var object|null
     */
    private static ?object $instance = null;

    /**
     * @param $username
     * @param $password
     */
    private function __construct($username, $password)
    {
        self::$username = $username;
        self::$password = $password;
    }

    /**
     * @param $username
     * @param $password
     * @return self
     */
    public static function connect($username, $password): object
    {
        // 这里我们省略了数据库连接的实现细节
        // 使用 pdo 扩展来连接数据库
        return self::$instance = new self($username, $password);
    }

    public static function query(string $sql): string
    {
        return "Executing query: $sql<br>";
    }

    /**
     * 禁止克隆
     *
     * @throws Exception
     */
    private function __clone()
    {
        throw new Exception("Cannot clone a singleton class");
    }
}

$connection = Database::connect('root', 'password');
varDumpWithBr($connection);
echoWithBr(Database::$host);

// $database = new Database('root', 'password');
// $databaseClone = clone $database;

trait Shareable
{
    public function share(string $name): string
    {
        return "Sharing this {$name}<br>";
    }

    protected function log(string $message): string
    {
        return "Logging message: $message<br>";
    }

    abstract protected function getShareTitle(): string;
}

class Controller
{
    // ... 基础类!!!

    public function responseJson(array $data, int $status = 200, string $message = 'success'): string
    {
        return json_encode([
            'status' => 200,
            'message' => 'success',
            'data' => $data
        ]);
    }
}

class Post extends Controller
{
    use Shareable;

    public function getShareTitle(): string
    {
        return "Sharing a post<br>";
    }

    public function getShare(): string
    {
        return $this->share('食品衛生法の改正について');
    }

    /**
     * 获取 Post 详情
     *
     * @return string
     */
    public function show(): string
    {
        $post = [
            'id' => 1,
            'title' => 'Hello World',
            'content' => 'This is a sample post'
        ];

        return $this->responseJson($post);
    }
}

$post = new Post();
echoWithBr($post->getShare());
echoWithBr($post->show());

class TestMagic
{
    public string $name = "TestMagic";

    public function __construct()
    {
        echo "Constructor called<br>";
    }

    /**
     * 当 PHP 试图访问一个不存在的方法时, 会自动调用 __call() 方法
     *
     * @param string $name
     * @param mixed $arguments
     */
    public function __call(string $name, mixed $arguments)
    {
        echoWithBr("你正在尝试访问一个不存在的方法: $name 这时 __call 会被自动调用, 当前被自动调用的方法名是:" . __FUNCTION__ . "<br>");
        echo "Method $name does not exist. Arguments: " . implode(", ", $arguments) . "<br>";
    }

    public static function __callStatic($name, $arguments)
    {
        echo "Static method $name does not exist. Arguments: " . implode(", ", $arguments) . "<br>";
    }

    public function __get($name)
    {
        echo "Getting property '$name'<br>";
        return $this->name;
    }

    public function __set($name, $value)
    {
        echo "Setting property '$name' to '$value'<br>";
        $this->name = $value;
    }

    public function __isset($name)
    {
        echo "Checking if property '$name' is set<br>";
        return isset($this->$name);
    }

    public function __unset($name)
    {
        echo "Unsetting property '$name'<br>";
        unset($this->$name);
    }
}

echoHr();
$testMagic = new TestMagic();
$testMagic->nonExistentMethod("arg1", "arg2");
$testMagic->nonExistentProp = "这里是东京啊!";
unset($testMagic->nonExistentProp);