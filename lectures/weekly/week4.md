# PHP 培训讲义

## 第4周：Laravel入门

### 第20天：Laravel简介和安装

#### Laravel 简介

Laravel 是一个基于 PHP 的现代化框架，具有优雅的语法和丰富的功能，帮助开发者构建强大而灵活的 web 应用程序。

- **特性**：
  - 清晰简洁的语法
  - 强大的路由系统
  - 灵活的 ORM（Eloquent）
  - 方便的中间件机制
  - 强大的任务调度和队列系统
  - 丰富的社区和生态系统

#### Laravel 安装

1. **安装 Composer**：Laravel 依赖于 Composer 来管理其依赖关系。首先确保已安装 Composer。

    ```bash
    curl -sS https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
    ```

2. **创建 Laravel 项目**：使用 Composer 创建一个新的 Laravel 项目。

    ```bash
    composer create-project --prefer-dist laravel/laravel myapp
    ```

3. **配置环境**：复制 .env.example 文件为 .env，并生成应用程序密钥。

    ```bash
    cd myapp
    cp .env.example .env
    php artisan key:generate
    ```

4. **启动开发服务器**：使用 Laravel 内置的开发服务器启动应用程序。

    ```bash
    php artisan serve
    ```

5. **访问应用程序**：在浏览器中访问 http://localhost:8000 以查看默认的 Laravel 欢迎页面。

### 第21天：路由和控制器

#### 路由

Laravel 提供了一个简单而强大的路由系统，用于定义 URL 与处理逻辑之间的对应关系。

- **定义路由**：在 routes/web.php 文件中定义路由。

    ```php
    // 基本路由
    Route::get('/', function () {
        return view('welcome');
    });

    // 带参数的路由
    Route::get('user/{id}', function ($id) {
        return 'User '.$id;
    });
    ```

- **命名路由**：为路由命名，可以在生成 URL 或重定向时使用路由名称。

    ```php
    Route::get('profile', function () {
        // 使用路由名称生成 URL
    })->name('profile');
    ```

- **路由组**：使用路由组来共享路由属性，如中间件、命名空间、前缀等。

    ```php
    Route::prefix('admin')->group(function () {
        Route::get('/users', function () {
            // 匹配 /admin/users URL
        });
    });
    ```

#### 控制器

控制器用于组织和处理路由请求的逻辑。

- **创建控制器**：使用 Artisan 命令创建控制器。

    ```bash
    php artisan make:controller UserController
    ```

- **定义控制器方法**：在控制器中定义处理逻辑的方法。

    ```php
    <?php

    namespace AppHttpControllers;

    use IlluminateHttpRequest;

    class UserController extends Controller
    {
        // 处理显示用户信息的逻辑
        public function show($id)
        {
            return "显示用户信息：".$id;
        }
    }
    ```

- **使用控制器路由**：在 routes/web.php 中定义使用控制器的方法。

    ```php
    Route::get('user/{id}', [UserController::class, 'show']);
    ```

### 第22天：视图和模板引擎

#### 视图

视图是 Laravel 中用于呈现 HTML 内容的部分。视图通常存储在 resources/views 目录中。

- **创建视图**：创建一个 Blade 视图文件。

    ```html
    <!-- resources/views/greeting.blade.php -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>Laravel 视图</title>
    </head>
    <body>
        <h1>你好，{{ $name }}！</h1>
    </body>
    </html>
    ```

- **返回视图**：在路由或控制器中返回视图。

    ```php
    Route::get('greeting', function () {
        return view('greeting', ['name' => 'Laravel']);
    });
    ```

#### 模板引擎

Laravel 使用 Blade 作为其模板引擎。Blade 提供了强大的模板继承和数据显示功能。

- **模板继承**：使用 Blade 的布局功能创建可复用的模板。

    ```html
    <!-- resources/views/layouts/app.blade.php -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>应用名称 - @yield('title')</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
    </html>
    ```

- **子视图**：扩展布局视图。

    ```html
    <!-- resources/views/child.blade.php -->
    @extends('layouts.app')

    @section('title', '子视图标题')

    @section('content')
        <p>这是子视图的内容。</p>
    @endsection
    ```

- **显示数据**：使用 Blade 语法显示数据。

    ```html
    <p>{{ $name }}</p>
    ```

### 第23天：模型和数据库操作

#### 模型

模型是 Laravel 中用于与数据库进行交互的部分。每个模型通常对应数据库中的一个表。

- **创建模型**：使用 Artisan 命令创建模型。

    ```bash
    php artisan make:model User
    ```

- **定义模型**：在模型中定义属性和关系。

    ```php
    <?php

    namespace AppModels;

    use IlluminateDatabaseEloquentFactoriesHasFactory;
    use IlluminateDatabaseEloquentModel;

    class User extends Model
    {
        use HasFactory;

        // 定义可批量赋值的属性
        protected $fillable = ['name', 'email', 'password'];
    }
    ```

#### 数据库操作

- **迁移**：使用迁移来创建和修改数据库表。

    ```bash
    php artisan make:migration create_users_table
    ```

- **定义迁移**：在迁移文件中定义表结构。

    ```php
    <?php

    use IlluminateDatabaseMigrationsMigration;
    use IlluminateDatabaseSchemaBlueprint;
    use IlluminateSupportFacadesSchema;

    class CreateUsersTable extends Migration
    {
        public function up()
        {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('users');
        }
    }
    ```

- **运行迁移**：使用 Artisan 命令运行迁移。

    ```bash
    php artisan migrate
    ```

- **数据库查询**：使用 Eloquent ORM 进行数据库操作。

    ```php
    // 创建用户
    $user = User::create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => bcrypt('secret'),
    ]);

    // 查询用户
    $users = User::all();

    // 更新用户
    $user->name = 'Jane Doe';
    $user->save();

    // 删除用户
    $user->delete();
    ```

### 第24天：Laravel中的中间件和请求生命周期

#### 中间件

中间件用于过滤进入应用程序的 HTTP 请求。Laravel 提供了一组内置的中间件，并且可以自定义中间件。

- **创建中间件**：使用 Artisan 命令创建中间件。

    ```bash
    php artisan make:middleware CheckAge
    ```

- **定义中间件**：在中间件中定义请求过滤逻辑。

    ```php
    <?php

    namespace AppHttpMiddleware;

    use Closure;
    use IlluminateHttpRequest;

    class CheckAge
    {
        public function handle(Request $request, Closure $next)
        {
            if ($request->age <= 200) {
                return redirect('home');
            }

            return $next($request);
        }
    }
    ```

- **注册中间件**：在 app/Http/Kernel.php 文件中注册中间件。

    ```php
    protected $routeMiddleware = [
        'checkAge' => AppHttpMiddlewareCheckAge::class,
    ];
    ```

- **使用中间件**：在路由中使用中间件。

  ```php
  Route::get('profile', function () {
  // 只有满足条件的请求才能访问此路由
  })->middleware('checkAge');
  ```

#### 请求生命周期

了解 Laravel 中的请求生命周期有助于理解请求是如何被处理的。

1. **HTTP 请求**：浏览器向应用发送 HTTP 请求。
2. **入口文件**：所有请求都通过 public/index.php 文件，该文件引导框架的启动。
3. **HTTP 内核**：请求被发送到 HTTP 内核（AppHttpKernel），内核加载所有全局中间件。
4. **路由调度**：请求被路由器（Router）处理，根据路由表将请求分发到相应的控制器或闭包。
5. **中间件**：路由级中间件在请求进入控制器之前和响应发送到浏览器之前执行。
6. **控制器方法**：控制器处理请求，执行相应的业务逻辑。
7. **响应**：控制器返回响应，响应通过中间件层级返回给客户端。

### 第25天：Laravel中的表单处理和验证

#### 表单处理

Laravel 提供了方便的方式来处理表单输入数据。

- **显示表单**：创建一个 Blade 视图来显示表单。

  ```html
    <!-- resources/views/form.blade.php -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>表单示例</title>
    </head>
    <body>
        <form action="/submit" method="POST">
            @csrf
            <label for="name">姓名：</label>
            <input type="text" id="name" name="name">
            <button type="submit">提交</button>
        </form>
    </body>
    </html>
    ```

- **处理表单提交**：在控制器中处理表单提交。

  ```php
    <?php

    namespace AppHttpControllers;

    use IlluminateHttpRequest;

    class FormController extends Controller
    {
        public function submit(Request $request)
        {
            $name = $request->input('name');
            return '提交的姓名：'.$name;
        }
    }
    ```

- **定义路由**：在 routes/web.php 中定义路由。

  ```php
  Route::get('form', function () {
  return view('form');
  });

  Route::post('submit', [FormController::class, 'submit']);
  ```

#### 表单验证

Laravel 提供了强大的表单验证功能，确保用户输入的数据符合预期。

- **基础验证**：在控制器中使用 `validate` 方法进行表单验证。

  ```php
    <?php

    namespace AppHttpControllers;

    use IlluminateHttpRequest;

    class FormController extends Controller
    {
        public function submit(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|max:255',
            ]);

            return '提交的姓名：'.$request->input('name');
        }
    }
    ```

- **自定义错误消息**：在验证时提供自定义的错误消息。

  ```php
    <?php

    namespace AppHttpControllers;

    use IlluminateHttpRequest;

    class FormController extends Controller
    {
        public function submit(Request $request)
        {
            $messages = [
                'required' => '字段 :attribute 为必填项。',
                'max' => '字段 :attribute 的最大长度为 :max。',
            ];

            $validated = $request->validate([
                'name' => 'required|max:255',
            ], $messages);

            return '提交的姓名：'.$request->input('name');
        }
    }
    ```

- **自定义验证规则**：创建自定义验证规则。

  ```bash
  php artisan make:rule Uppercase
  ```

  ```php
    <?php

    namespace AppRules;

    use IlluminateContractsValidationRule;

    class Uppercase implements Rule
    {
        public function passes($attribute, $value)
        {
            return strtoupper($value) === $value;
        }

        public function message()
        {
            return '字段 :attribute 必须为大写。';
        }
    }
    ```

    在控制器中使用自定义验证规则：

    ```php
    <?php

    namespace AppHttpControllers;

    use IlluminateHttpRequest;
    use AppRulesUppercase;

    class FormController extends Controller
    {
        public function submit(Request $request)
        {
            $validated = $request->validate([
                'name' => ['required', new Uppercase],
            ]);

            return '提交的姓名：'.$request->input('name');
        }
    }
    ```

通过前面的介绍和示例，我们已经覆盖了 Laravel 框架的基本概念和常用功能。然而，还有一些常用的功能和最佳实践没有详细介绍，例如更深入的 ORM 操作、文件存储、事件和监听器、队列、任务调度、API 开发等。以下是这些内容的详细示例和解释：

### Eloquent ORM 操作

Eloquent ORM 是 Laravel 的一个强大而直观的对象关系映射（ORM）工具，使得数据库操作变得更加简洁和可读。下面是一些常用的 Eloquent ORM 操作示例：

#### 创建和保存模型实例

```php
<?php

use AppModelsUser;

// 创建并保存一个新的用户
$user = new User();
$user->name = 'John Doe';
$user->email = 'john@example.com';
$user->password = bcrypt('secret');
$user->save();

// 使用 create 方法创建并保存用户
$user = User::create([
    'name' => 'Jane Doe',
    'email' => 'jane@example.com',
    'password' => bcrypt('secret'),
]);
```

#### 查询数据库

```php
<?php

use AppModelsUser;

// 获取所有用户
$users = User::all();

// 根据主键查找用户
$user = User::find(1);

// 使用查询构造器查找用户
$users = User::where('active', 1)
             ->orderBy('name', 'desc')
             ->take(10)
             ->get();
```

#### 更新模型

```php
<?php

use AppModelsUser;

// 查找用户并更新属性
$user = User::find(1);
$user->name = 'New Name';
$user->save();

// 使用 update 方法批量更新
User::where('active', 0)->update(['active' => 1]);
```

#### 删除模型

```php
<?php

use AppModelsUser;

// 查找用户并删除
$user = User::find(1);
$user->delete();

// 使用条件删除多个模型
User::where('active', 0)->delete();
```

### 文件存储

Laravel 提供了简单的文件存储接口，支持多种存储驱动（如本地文件系统、Amazon S3 等）。

#### 文件上传

```php
<?php

namespace AppHttpControllers;

use IlluminateHttpRequest;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file('file')->store('uploads');

            return '文件上传成功，存储路径：' . $path;
        }

        return '文件上传失败';
    }
}
```

#### 文件下载

```php
<?php

namespace AppHttpControllers;

use IlluminateSupportFacadesStorage;

class FileController extends Controller
{
    public function download($filename)
    {
        return Storage::download('uploads/' . $filename);
    }
}
```

### 事件和监听器

Laravel 提供了简单的事件和监听器机制，用于实现事件驱动的编程模型。

#### 定义事件

```bash
php artisan make:event UserRegistered
```

```php
<?php

namespace AppEvents;

use AppModelsUser;
use IlluminateBroadcastingInteractsWithSockets;
use IlluminateFoundationEventsDispatchable;
use IlluminateQueueSerializesModels;

class UserRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
```

#### 定义监听器

```bash
php artisan make:listener SendWelcomeEmail --event=UserRegistered
```

```php
<?php

namespace AppListeners;

use AppEventsUserRegistered;
use IlluminateContractsQueueShouldQueue;
use IlluminateQueueInteractsWithQueue;

class SendWelcomeEmail
{
    public function handle(UserRegistered $event)
    {
        // 发送欢迎邮件
        Mail::to($event->user->email)->send(new WelcomeEmail($event->user));
    }
}
```

#### 注册事件和监听器

在 `app/Providers/EventServiceProvider.php` 文件中注册事件和监听器。

```php
<?php

namespace AppProviders;

use AppEventsUserRegistered;
use AppListenersSendWelcomeEmail;
use IlluminateFoundationSupportProvidersEventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserRegistered::class => [
            SendWelcomeEmail::class,
        ],
    ];
}
```

### 队列

Laravel 的队列功能可以将耗时的任务（如发送邮件）推送到后台处理，从而提高应用的响应速度。

#### 配置队列

在 `.env` 文件中配置队列驱动：

```env
QUEUE_CONNECTION=database
```

#### 创建队列表

```bash
php artisan queue:table
php artisan migrate
```

#### 定义队列任务

```bash
php artisan make:job SendEmailJob
```

```php
<?php

namespace AppJobs;

use AppMailWelcomeEmail;
use IlluminateBusQueueable;
use IlluminateContractsQueueShouldQueue;
use IlluminateFoundationBusDispatchable;
use IlluminateQueueInteractsWithQueue;
use IlluminateQueueSerializesModels;
use IlluminateSupportFacadesMail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        Mail::to($this->user->email)->send(new WelcomeEmail($this->user));
    }
}
```

#### 调度队列任务

```php
<?php

use AppJobsSendEmailJob;
use AppModelsUser;

// 调度任务
$user = User::find(1);
SendEmailJob::dispatch($user);
```

### 任务调度

Laravel 提供了强大的任务调度功能，可以通过定义计划任务来自动执行各种操作。

#### 配置计划任务

在 `app/Console/Kernel.php` 文件中定义计划任务：

```php
<?php

namespace AppConsole;

use IlluminateConsoleSchedulingSchedule;
use IlluminateFoundationConsoleKernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('report:generate')
                 ->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
```

#### 创建自定义命令

```bash
php artisan make:command GenerateReport
```

```php
<?php

namespace AppConsoleCommands;

use IlluminateConsoleCommand;

class GenerateReport extends Command
{
    protected $signature = 'report:generate';
    protected $description = '生成每日报告';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // 生成报告的逻辑
        $this->info('报告生成成功！');
    }
}
```

### API 开发

Laravel 提供了方便的工具来开发 RESTful API。

#### 创建 API 路由

在 `routes/api.php` 文件中定义 API 路由：

```php
<?php

use IlluminateHttpRequest;
use IlluminateSupportFacadesRoute;
use AppHttpControllersApiUserController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [UserController::class, 'index']);
```

#### 创建 API 控制器

```bash
php artisan make:controller Api/UserController --api
```

```php
<?php

namespace AppHttpControllersApi;

use AppHttpControllersController;
use AppModelsUser;
use IlluminateHttpRequest;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
```

通过以上的扩展示例，你可以更全面地掌握 Laravel 框架的功能和最佳实践。这些知识将帮助你在实际项目中更加高效地使用 Laravel 开发强大的 web 应用。

### 扩展部分：其他 PHP 框架

除了 Laravel，PHP 社区还有许多其他强大的框架，它们各自具有独特的功能和特性，适用于不同类型的项目。以下是一些常见的 PHP 框架及其简要介绍：

#### Symfony

Symfony 是一个高性能的 PHP 框架，旨在加速 web 应用程序的开发和维护。它提供了一组可重用的 PHP 组件，并且具有高度的可扩展性和灵活性。

- **特性**：
  - 丰富的组件库（如 HTTP 基础组件、路由、表单等）
  - 强大的调试工具和开发环境
  - 支持最佳实践和设计模式
  - 活跃的社区和丰富的文档

#### CodeIgniter

CodeIgniter 是一个轻量级的 PHP 框架，适用于那些希望保持简洁和快速开发周期的项目。它易于学习和使用，非常适合小型和中型项目。

- **特性**：
  - 轻量级和高性能
  - 简单易学，适合初学者
  - 灵活的 MVC 架构
  - 丰富的内置库和帮助函数

#### Zend Framework / Laminas

Zend Framework 是一个企业级的 PHP 框架，现已更名为 Laminas。它提供了一组专业的 PHP 库和工具，用于构建健壮和可扩展的 web 应用程序。

- **特性**：
  - 模块化架构，便于代码复用
  - 强大的性能和安全特性
  - 支持 MVC 和事件驱动编程
  - 丰富的文档和企业支持

#### Yii Framework

Yii 是一个高性能的 PHP 框架，专注于简化复杂的 web 应用程序开发。它提供了强大的工具和最佳实践，帮助开发者快速构建高效的应用程序。

- **特性**：
  - 高性能和灵活性
  - 支持自动生成代码的 Gii 工具
  - 强大的 ActiveRecord ORM
  - 内置的安全特性和测试框架

#### Phalcon

Phalcon 是一个高性能的 PHP 框架，它的独特之处在于其底层是用 C 语言编写的扩展。这使得 Phalcon 在性能上具有显著优势，非常适合对性能要求高的项目。

- **特性**：
  - 高性能，接近原生速度
  - 低资源消耗
  - 全功能 MVC 框架
  - 丰富的内置库和工具

#### Slim

Slim 是一个微框架，适用于快速构建简单但强大的 web 应用程序和 API。它非常轻量，专注于核心功能，适合需要高性能和简洁代码的项目。

- **特性**：
  - 轻量级和高效
  - 易于学习和使用
  - 灵活的路由系统
  - 适用于构建 RESTful API

#### CakePHP

CakePHP 是一个快速开发框架，旨在让开发者能够用最少的代码编写应用程序。它提供了许多内置功能，帮助开发者快速启动并运行项目。

- **特性**：
  - 快速开发
  - 强大的代码生成工具
  - 内置 ORM 和验证
  - 灵活的视图模板引擎

这些 PHP 框架各有特色，开发者可以根据项目需求选择合适的框架。每个框架都有其独特的优势和适用场景，通过深入学习和实践这些框架，可以帮助开发者在不同的项目中高效地完成任务。