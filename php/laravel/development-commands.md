### ✨ 5 月 2 日 运行的命令

- 1、创建 Products model 文件, 并且创建数据库迁移文件
    ```bash
    php artisan make:model Products --migration
    ```
    - 1.1、编辑数据库迁移文件, 添加数据表字段
    - 1.2、运行数据库迁移
      ```bash
      php artisan migrate
      ```
    - 1.3、 生成 factory 文件
        ```bash
        php artisan make:factory ProductsFactory --model=Products
        ```
        - 1.3.1、编辑 factory 文件, 填充数据
    - 1.4、生成 seeder 文件
        ```bash
        php artisan make:seeder ProductsSeeder
        ```
        - 1.4.1、编辑 seeder 文件, 填充数据
        - 1.4.2、需要在 database\seeders\DatabaseSeeder.php 中注册 seeder
    - 1.5、运行数据库填充
        ```bash
        php artisan db:seed
        ```
        - 1.5.1、如果你存在多次运行数据库迁移的情况, 你可以使用下面的命令来刷新数据库, 这样能保证你数据库中的数据是最新的且只有一份
            ```bash
            php artisan migrate:refresh --seed
            ```

- 2、创建控制器并且同时创建控制器中的资源路由方法, 并且指定使用的 model, 如果模型不存在 laravel 会询问你是否需要创建
    ```bash
    php artisan make:controller ProductsController --resource --model=Products
    ```

- 3、然后我们需要在 routes/web.php 中定义 categories 的资源路由
    ```php
    Route::resource('categories', CategoriesController::class);
    ```
    ```php
    Route::resource('products', ProductsController::class);
    ```

- 3.1、查看已经定义好的路由
    ```bash
    php artisan route:list
    ```

---

#### 一些其他命令

- 运行数据库迁移并且指定迁移的文件
    ```bash
    php artisan migrate --path=/database/migrations/2023_10_01_000000_create_categories_table.php
    ```
- 1、下面这个命令会同时创建
    - 一个 model 文件 app\Models\Categories.php
    - 一个数据库迁移文件 database\migrations\2023_10_01_000000_create_categories_table.php
    - 一个工厂文件 database\factories\CategoriesFactory.php
    - 一个 seeder 文件 database\seeders\CategoriesSeeder.php
    - 一个控制器文件 app\Http\Controllers\CategoriesController.php 并且控制器文件中会包含所有的资源路由方法
    ```bash
    php artisan make:model Categories -mcrsf 
    ```
    - 其中 -mcrsf 的意思是
        - m: 创建数据库迁移文件
        - c: 创建控制器
        - r: 创建资源路由方法
        - s: 创建 seeder 文件
        - f: 创建工厂文件

- 运行数据库迁移文件的时候同时运行填充
    ```bash
    php artisan migrate --seed
    ```

- 运行数据库填充
    ```bash
    php artisan db:seed
    ```

- 运行数据库填充并且指定填充的 seeder
    ```bash
    php artisan db:seed --class=CategoriesSeeder
    ```

### 使用 barryvdh/laravel-ide-helper 来生成自动补全文件，彻底解决 PhpStorm 报错

- 1、安装 barryvdh/laravel-ide-helper
    ```bash
    composer require --dev barryvdh/laravel-ide-helper
    ```

- 2、生成模型注释时，指定 Model 路径
    ```bash
    php artisan ide-helper:models --dir=app/Models -W
    ```

- 重建 IDE 辅助文件
    ```bash
    php artisan ide-helper:generate
    ```

---

### ✨ 2025 年 05 月 07 日

#### Laravel 详细讲义 - Part 8: 数据库 - Eloquent 关系

#### Post、Author、Tag、PostTag、MetaData

- 1、使用下面的命令创建 Post、Author、Tag、PostTag、MetaData 模型, 并且创建数据库迁移文件, 数据库工厂文件, 数据库填充文件,
  控制器文件及其资源路由方法
    ```bash
    php artisan make:model Post -mcrsf
    php artisan make:model Metadata -mcrsf
    php artisan make:model Author -mcrsf 
    php artisan make:model Tag -mcrsf
    php artisan make:model articleTag -mcrsf
    php artisan make:model PostTag -mcrsf
    ```
    - 1.1、编辑数据库迁移文件, 添加数据表字段
    - 1.2、编辑数据库工厂文件, 填充数据
    - 1.3、编辑数据库填充文件, 填充数据, 完成这一步之后需要去
        - database\seeders\DatabaseSeeder.php 中注册 seeder
    - 1.4、去对应的模型中定义
        - 1.4.1、定义 belongsToMany 关系
        - 1.4.2、定义 belongsTo 关系
        - 1.4.3、定义 hasMany 关系
    - 1.n、在模型中使用 ide-helper 生成自动补全用的类声明
      ```bash
      php artisan ide-helper:models --dir=app/Models -W
      ```

- 2、执行数据库迁移和填充
    ```bash
    php artisan migrate:fresh --seed
    ```

- 3、定义对应的路由
    ```php
    Route::resource('posts', PostsController::class);
    Route::resource('authors', AuthorsController::class);
    Route::resource('tags', TagsController::class);
    ```
    - 3.1、查看已经定义好的路由
    ```bash
    php artisan route:list
    ```

- 4、在对应的控制器中实现对应的方法, 并且去创建对应需要的视图文件, 如果时间充足的话可以自照着敲一边. ⚠️下面只是一些生成视图文件的命令的示例
    ```bash
    php artisan make:view posts.index
    php artisan make:view posts.create
    php artisan make:view posts.edit
    php artisan make:view posts.show
    ```

- 还有就是大家要去详细阅读一下我整理的讲义文档

### ✨ 2025 年 05 月 08 日

- 使用下面的命令创建 Post 的 observer
    ```bash
    php artisan make:observer PostObserver --model=Post
    ```
- 使用下面的命令创建 Post 的 request
    ```bash
    php artisan make:request PostRequest
    ```
  

  
