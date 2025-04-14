# PHP 培训讲义

## 第5周：项目实战

在本周的课程中，我们将进行一个实际项目的开发。这个项目将模拟一个简化版的微博（weibo）系统，涵盖前端和后端的开发、数据库设计和集成、项目部署和优化等环节。项目源码地址：[Weibo 项目源码](https://github.com/summerblue/weibo/tree/L01_6.x)

### 第26天：项目需求分析和设计

#### 需求分析

1. **用户管理**：
    - 用户注册和登录
    - 用户信息管理（头像、昵称、个人简介等）
    - 用户关注和取消关注

2. **微博功能**：
    - 发布微博
    - 查看微博列表
    - 点赞和评论微博

3. **通知系统**：
    - 关注通知
    - 点赞和评论通知

#### 系统设计

1. **模块划分**：
    - 用户模块
    - 微博模块
    - 通知模块

2. **功能流程图**：
    - 用户注册和登录流程
    - 微博发布和查看流程
    - 点赞和评论流程

### 第27天：项目结构和数据库设计

#### 项目结构

1. **目录结构**：
    - `app`：应用核心代码
    - `resources`：视图和静态资源
    - `routes`：路由定义
    - `public`：公开访问的资源

2. **MVC 设计模式**：
    - 控制器：处理用户请求，调用模型并返回视图
    - 模型：与数据库交互，封装数据操作
    - 视图：呈现数据，负责显示

#### 数据库设计

1. **数据表设计**：
    - `users` 表：用户信息
    - `statuses` 表：微博信息
    - `followers` 表：用户关注关系
    - `comments` 表：微博评论
    - `likes` 表：微博点赞
    - `notifications` 表：通知

2. **迁移文件**：
    - 创建用户表
      ```php
      // database/migrations/xxxx_xx_xx_create_users_table.php
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
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->string('avatar')->nullable();
      $table->text('bio')->nullable();
      $table->rememberToken();
      $table->timestamps();
      });
      }

            public function down()
            {
                Schema::dropIfExists('users');
            }
      }
      ```

    - 创建微博表
      ```php
      // database/migrations/xxxx_xx_xx_create_statuses_table.php
      use IlluminateDatabaseMigrationsMigration;
      use IlluminateDatabaseSchemaBlueprint;
      use IlluminateSupportFacadesSchema;

      class CreateStatusesTable extends Migration
      {
      public function up()
      {
      Schema::create('statuses', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->text('content');
      $table->timestamps();
      });
      }

            public function down()
            {
                Schema::dropIfExists('statuses');
            }
      }
      ```

    - 创建关注关系表
      ```php
      // database/migrations/xxxx_xx_xx_create_followers_table.php
      use IlluminateDatabaseMigrationsMigration;
      use IlluminateDatabaseSchemaBlueprint;
      use IlluminateSupportFacadesSchema;

      class CreateFollowersTable extends Migration
      {
      public function up()
      {
      Schema::create('followers', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->foreignId('follower_id')->constrained('users')->onDelete('cascade');
      $table->timestamps();
      });
      }

            public function down()
            {
                Schema::dropIfExists('followers');
            }
      }
      ```

    - 创建评论表
      ```php
      // database/migrations/xxxx_xx_xx_create_comments_table.php
      use IlluminateDatabaseMigrationsMigration;
      use IlluminateDatabaseSchemaBlueprint;
      use IlluminateSupportFacadesSchema;

      class CreateCommentsTable extends Migration
      {
      public function up()
      {
      Schema::create('comments', function (Blueprint $table) {
      $table->id();
      $table->foreignId('status_id')->constrained()->onDelete('cascade');
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->text('content');
      $table->timestamps();
      });
      }

            public function down()
            {
                Schema::dropIfExists('comments');
            }
      }
      ```

    - 创建点赞表
      ```php
      // database/migrations/xxxx_xx_xx_create_likes_table.php
      use IlluminateDatabaseMigrationsMigration;
      use IlluminateDatabaseSchemaBlueprint;
      use IlluminateSupportFacadesSchema;

      class CreateLikesTable extends Migration
      {
      public function up()
      {
      Schema::create('likes', function (Blueprint $table) {
      $table->id();
      $table->foreignId('status_id')->constrained()->onDelete('cascade');
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->timestamps();
      });
      }

            public function down()
            {
                Schema::dropIfExists('likes');
            }
      }
      ```

    - 创建通知表
      ```php
      // database/migrations/xxxx_xx_xx_create_notifications_table.php
      use IlluminateDatabaseMigrationsMigration;
      use IlluminateDatabaseSchemaBlueprint;
      use IlluminateSupportFacadesSchema;

      class CreateNotificationsTable extends Migration
      {
      public function up()
      {
      Schema::create('notifications', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->string('type');
      $table->text('data');
      $table->timestamp('read_at')->nullable();
      $table->timestamps();
      });
      }

            public function down()
            {
                Schema::dropIfExists('notifications');
            }
      }
      ```

### 第28天：前端部分开发

1. **前端框架**：
    - 使用 Laravel Mix 和 Bootstrap 开发前端页面

   ```bash
   npm install
   npm install bootstrap
   ```

   在 `resources/js/app.js` 中引入 Bootstrap：

   ```js
   require('./bootstrap');
   ```

   在 `resources/sass/app.scss` 中引入 Bootstrap：

   ```scss
   @import '~bootstrap/scss/bootstrap';
   ```

2. **开发首页和用户页面**：
    - 创建首页视图文件 `resources/views/home.blade.php`

   ```blade
   @extends('layouts.app')

   @section('content')
   <div class="container">
   <div class="row">
   <div class="col-md-8">
   <h1>首页</h1>
   <!-- 微博列表 -->
   </div>
   <div class="col-md-4">
   <h2>用户信息</h2>
   <!-- 用户信息展示 -->
   </div>
   </div>
   </div>
   @endsection
   ```

3. **开发用户注册和登录页面**：
    - 使用 Laravel 自带的 Auth 功能

   ```bash
   composer require laravel/ui
   php artisan ui bootstrap --auth
   npm install && npm run dev
   ```

### 第29天：前端部分开发

1. **开发微博发布和展示页面**：
    - 创建微博发布表单和微博列表视图

   ```blade
    <!-- resources/views/statuses/index.blade.php -->
   @extends('layouts.app')

   @section('content')
   <div class="container">
   <h1>微博</h1>
   @auth
   <form action="{{ route('statuses.store') }}" method="POST">
   @csrf
   <div class="form-group">
   <textarea name="content" class="form-control" rows="3" placeholder="说点什么..."></textarea>
   </div>
   <button type="submit" class="btn btn-primary">发布</button>
   </form>
   @endauth
   <div class="mt-4">
   @foreach ($statuses as $status)
   <div class="card mb-3">
   <div class="card-body">
   <p>{{ $status->content }}</p>
   <p>作者：{{ $status->user->name }}</p>
   </div>
   </div>
   @endforeach
   </div>
   </div>
    @endsection
    ```

2. **微博列表分页**：
    - 在控制器中使用分页功能

   ```php
    <?php

    namespace AppHttpControllers;

    use AppModelsStatus;
    use IlluminateHttpRequest;

    class StatusesController extends Controller
    {
        public function index()
        {
            $statuses = Status::with('user')->latest()->paginate(10);
            return view('statuses.index', compact('statuses'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'content' => 'required|max:255',
            ]);

            $status = new Status();
            $status->content = $request->content;
            $status->user_id = auth()->id();
            $status->save();

            return redirect()->route('statuses.index');
        }
    }
    ```

    - 在视图中显示分页链接

    ```blade
    <!-- resources/views/statuses/index.blade.php -->
    @extends('layouts.app')

    @section('content')
        <div class="container">
            <h1>微博</h1>
            @auth
                <form action="{{ route('statuses.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="3" placeholder="说点什么..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">发布</button>
                </form>
            @endauth
            <div class="mt-4">
                @foreach ($statuses as $status)
                    <div class="card mb-3">
                        <div class="card-body">
                            <p>{{ $status->content }}</p>
                            <p>作者：{{ $status->user->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $statuses->links() }}
        </div>
    @endsection
    ```

### 第30天：后端部分开发

1. **控制器和模型**：
    - 创建微博控制器和模型

   ```bash
   php artisan make:controller StatusesController --resource
   php artisan make:model Status
   ```

   在 `app/Models/Status.php` 中定义模型：

   ```php
    <?php

    namespace AppModels;

    use IlluminateDatabaseEloquentFactoriesHasFactory;
    use IlluminateDatabaseEloquentModel;

    class Status extends Model
    {
        use HasFactory;

        protected $fillable = ['content', 'user_id'];

        public function user()
        {
            return $this->belongsTo(User::class);
        }
    }
    ```

2. **路由定义**：
    - 在 `routes/web.php` 中定义微博路由

   ```php
   Route::resource('statuses', StatusesController::class);
   ```

### 第31天：后端部分开发

1. **用户关注功能**：
    - 创建关注控制器和模型

   ```bash
   php artisan make:controller FollowersController
   php artisan make:model Follower
   ```

   在 `app/Models/Follower.php` 中定义模型：

   ```php
    <?php

    namespace AppModels;

    use IlluminateDatabaseEloquentFactoriesHasFactory;
    use IlluminateDatabaseEloquentModel;

    class Follower extends Model
    {
        use HasFactory;

        protected $fillable = ['user_id', 'follower_id'];

        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        public function follower()
        {
            return $this->belongsTo(User::class, 'follower_id');
        }
    }
    ```

2. **路由定义**：
    - 在 `routes/web.php` 中定义关注路由

   ```php
   Route::post('follow/{user}', [FollowersController::class, 'store'])->name('follow.store');
   Route::delete('follow/{user}', [FollowersController::class, 'destroy'])->name('follow.destroy');
   ```

3. **控制器方法**：
    - 在 `app/Http/Controllers/FollowersController.php` 中实现控制器方法

   ```php
    <?php

    namespace AppHttpControllers;

    use AppModelsFollower;
    use AppModelsUser;
    use IlluminateHttpRequest;
    use IlluminateSupportFacadesAuth;

    class FollowersController extends Controller
    {
        public function store(User $user)
        {
            Auth::user()->follows()->create([
                'user_id' => $user->id,
            ]);

            return back();
        }

        public function destroy(User $user)
        {
            Auth::user()->follows()->where('user_id', $user->id)->delete();

            return back();
        }
    }
    ```

### 第32天：数据库集成与实现

1. **数据库迁移和填充**：
    - 运行迁移命令生成数据表

   ```bash
   php artisan migrate
   ```

    - 创建数据填充器

   ```bash
   php artisan make:seeder DatabaseSeeder
   php artisan make:seeder UserSeeder
   php artisan make:seeder StatusSeeder
   ```

   在 `database/seeders/UserSeeder.php` 中定义用户填充逻辑：

   ```php
    <?php

    namespace DatabaseSeeders;

    use AppModelsUser;
    use IlluminateDatabaseSeeder;
    use IlluminateSupportFacadesHash;

    class UserSeeder extends Seeder
    {
        public function run()
        {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
    ```

   在 `database/seeders/StatusSeeder.php` 中定义微博填充逻辑：

    ```php
    <?php

    namespace DatabaseSeeders;

    use AppModelsStatus;
    use AppModelsUser;
    use IlluminateDatabaseSeeder;

    class StatusSeeder extends Seeder
    {
        public function run()
        {
            $users = User::all();

            foreach ($users as $user) {
                Status::create([
                    'content' => '这是一条示例微博',
                    'user_id' => $user->id,
                ]);
            }
        }
    }
    ```

   在 `database/seeders/DatabaseSeeder.php` 中调用填充器：

    ```php
    <?php

    namespace DatabaseSeeders;

    use IlluminateDatabaseSeeder;

    class DatabaseSeeder extends Seeder
    {
        public function run()
        {
            $this->call([
                UserSeeder::class,
                StatusSeeder::class,
            ]);
        }
    }
    ```

    - 运行数据库填充命令

    ```bash
    php artisan db:seed
    ```

### 第33天：项目整合与测试

1. **集成前后端**：
    - 确保所有前端表单和页面正确提交数据并展示内容
    - 在浏览器中逐一测试各个功能，确保没有错误

2. **自动化测试**：
    - 创建单元测试和功能测试

   ```bash
   php artisan make:test UserTest
   php artisan make:test StatusTest
   ```

   在 `tests/Feature/UserTest.php` 中编写测试用例：

   ```php
    <?php

    namespace TestsFeature;

    use AppModelsUser;
    use IlluminateFoundationTestingRefreshDatabase;
    use TestsTestCase;

    class UserTest extends TestCase
    {
        use RefreshDatabase;

        public function test_user_can_register()
        {
            $response = $this->post('/register', [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertStatus(302);
            $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
        }
    }
    ```

### 第34天：项目部署和优化

1. **部署准备**：
    - 确保项目代码在本地运行正常
    - 在服务器上安装必要的环境，如 PHP、Composer、Nginx、MySQL

2. **代码部署**：
    - 将代码推送到服务器

   ```bash
   git push production master
   ```

    - 在服务器上克隆代码并安装依赖

   ```bash
   git clone https://github.com/your-repo/weibo.git
   cd weibo
   composer install
   npm install && npm run production
   ```

    - 配置环境变量

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

    - 运行数据库迁移和填充

   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```

3. **服务器配置**：
    - 配置 Nginx 或 Apache 以指向项目的 `public` 目录
    - 确保正确配置了 SSL 证书

   **Nginx 配置示例**：

   ```nginx
   server {
   listen 80;
   server_name yourdomain.com;
   root /path/to/weibo/public;

        index index.php index.html index.htm;

        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }

        location ~ .php$ {
            include snippets/fastcgi-php.conf;
            fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
        }

        location ~ /.ht {
            deny all;
        }
   }
   ```

4. **优化性能**：
    - 启用 Laravel 的缓存功能

   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

    - 使用队列处理耗时任务

### 第35天：项目演示和总结

1. **项目演示**：
    - 向全班演示项目功能
    - 展示用户注册、登录、发布微博、关注、评论等功能

2. **总结和反馈**：
    - 总结项目开发过程中的经验和教训
    - 收集学生的反馈和问题
    - 讨论进一步优化和扩展项目的可能性

通过这一周的项目实战，将综合运用所学的 Laravel 和 PHP 知识，完成一个功能较为完整的 web 应用开发，从需求分析到部署上线，全面掌握项目开发的流程和技巧。
   
   