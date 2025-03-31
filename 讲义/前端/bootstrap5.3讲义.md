# Bootstrap 讲义（第一章）：引入与基本结构

---

## 一、Bootstrap 是什么？

Bootstrap 是由 Twitter 开发的、用于快速开发响应式、移动优先的前端项目的 CSS 框架。它提供了预设好的样式、布局系统和交互组件，帮助你更快构建网页。

当前版本：v5.3.x（不依赖 jQuery）

---

## 二、CDN 引入方式（推荐）

你可以通过以下方式直接引入 Bootstrap 的 CSS 和 JS 文件：

```html
<!-- 引入 Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- 引入 Bootstrap JavaScript（包含 Popper） -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
```

---

## 三、基本页面结构

一个基本的 Bootstrap 页面通常包含以下结构：

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Bootstrap Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container">
      <h1 class="text-primary">Hello, Bootstrap!</h1>
      <p class="lead">这是一个基础示例。</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
```

---

## 四、容器系统（container）

Bootstrap 提供三种容器类用于包裹内容并控制最大宽度：

- `.container`：响应式固定宽度容器
- `.container-fluid`：始终 100% 宽度
- `.container-xxl` 等：最大宽度自定义（从 576px 到 1400px）

### 示例：

```html
<div class="container">
  <p>这是一个标准容器</p>
</div>

<div class="container-fluid bg-light">
  <p>这是一个全宽容器</p>
</div>
```

---

# Bootstrap 讲义（第二章）：栅格系统（Grid System）

---

## 一、栅格系统简介

Bootstrap 的栅格系统采用 Flexbox 构建，用于快速创建响应式布局。它将页面划分为最多 12 列，结合断点和类名可以实现自动换行、适配各种设备的网格布局。

---

## 二、基本结构

使用 `.row` 创建一行，使用 `.col` 或 `.col-*-d` 创建列。

```html
<div class="container">
  <div class="row">
    <div class="col">列 1</div>
    <div class="col">列 2</div>
    <div class="col">列 3</div>
  </div>
</div>
```

- 默认情况下，`.col` 会等宽分配（3 个即每个占 1/3）
- 一行内总列数应为 12（或少于 12）

---

## 三、指定列宽

使用 `.col-数字` 指定具体列宽，数字范围为 1 ~ 12。

```html
<div class="row">
  <div class="col-4">宽度 4</div>
  <div class="col-8">宽度 8</div>
</div>
```

---

## 四、响应式断点类（重点）

你可以为不同屏幕尺寸设置不同列宽。

| 类名前缀 | 含义 | 最小屏幕宽度 |
|----------|------|---------------|
| col-sm-  | 手机横屏以上 | ≥ 576px |
| col-md-  | 平板以上 | ≥ 768px |
| col-lg-  | 桌面显示器 | ≥ 992px |
| col-xl-  | 大显示器 | ≥ 1200px |
| col-xxl- | 超大屏幕 | ≥ 1400px |

### 示例：小屏一列，大屏三列

```html
<div class="row">
  <div class="col-12 col-md-4">内容 A</div>
  <div class="col-12 col-md-4">内容 B</div>
  <div class="col-12 col-md-4">内容 C</div>
</div>
```

---

## 五、自动换行（Wrap）

默认情况下，列宽超过 12 会自动换行。

```html
<div class="row">
  <div class="col-6">第一列</div>
  <div class="col-6">第二列</div>
  <div class="col-6">第三列（会换行）</div>
</div>
```

---

## 六、列对齐方式（Alignment）

使用 Flex 工具类实现垂直/水平对齐：

- `.align-items-start / center / end`
- `.justify-content-start / center / end / between / around / evenly`

### 示例：

```html
<div class="row align-items-center justify-content-between">
  <div class="col-4 bg-primary text-white">A</div>
  <div class="col-4 bg-success text-white">B</div>
</div>
```

---

## 七、嵌套网格

栅格系统可以嵌套在列内，继续划分子列。

```html
<div class="row">
  <div class="col-6">
    <div class="row">
      <div class="col-6">嵌套列 1</div>
      <div class="col-6">嵌套列 2</div>
    </div>
  </div>
  <div class="col-6">外层列</div>
</div>
```

---

## 八、本章总结

- 每个 `.row` 最多容纳 12 份 `.col`
- 使用响应式类 `col-sm-*` 等控制不同设备的列宽
- 栅格系统基于 Flexbox，自动换行、自适应
- 可结合对齐类、嵌套结构，实现各种复杂布局

---

# Bootstrap 讲义（第三章）：常用组件（Components）

---

## 一、按钮（Button）

Bootstrap 提供一系列预设按钮样式，使用 `.btn` 和 `.btn-* ` 组合构建。

### 基本用法：

```html
<button class="btn btn-primary">主按钮</button>
<button class="btn btn-secondary">次按钮</button>
<button class="btn btn-success">成功</button>
<button class="btn btn-danger">警告</button>
<button class="btn btn-warning">黄色警告</button>
<button class="btn btn-info">信息</button>
<button class="btn btn-light">浅色</button>
<button class="btn btn-dark">深色</button>
```

### 尺寸与块级按钮：

```html
<button class="btn btn-primary btn-sm">小按钮</button>
<button class="btn btn-primary btn-lg">大按钮</button>

<!-- 块级按钮 -->
<button class="btn btn-outline-secondary w-100">100% 宽按钮</button>
```

---

## 二、警告框（Alert）

`.alert` 组件用于提示用户信息。

```html
<div class="alert alert-success">操作成功！</div>
<div class="alert alert-danger">发生错误！</div>
<div class="alert alert-warning">请注意！</div>
```

### 可关闭警告框（带 JS）：

```html
<div class="alert alert-info alert-dismissible fade show" role="alert">
  这是一个可关闭的提示框。
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
```

---

## 三、卡片（Card）

卡片是 Bootstrap 的通用展示容器，可用于商品、文章、资料等模块。

```html
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="图片">
  <div class="card-body">
    <h5 class="card-title">卡片标题</h5>
    <p class="card-text">这是一些简短的说明内容。</p>
    <a href="#" class="btn btn-primary">操作按钮</a>
  </div>
</div>
```

---

## 四、导航条（Navbar）

响应式网站的常用顶部导航组件。

```html
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">品牌名</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navCollapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="#">首页</a></li>
        <li class="nav-item"><a class="nav-link" href="#">功能</a></li>
        <li class="nav-item"><a class="nav-link" href="#">联系</a></li>
      </ul>
    </div>
  </div>
</nav>
```

---

## 五、模态框（Modal）

用于弹出层操作（如提示、表单、确认等）。

### 触发按钮：

```html
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
打开模态框
</button>
```

### 模态框结构：

```html
<div class="modal fade" id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">模态框标题</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        这里是模态框内容
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">关闭</button>
        <button class="btn btn-primary">确认</button>
      </div>
    </div>
  </div>
</div>
```

---

## 六、本章小结

- Bootstrap 的组件设计高度模块化
- 所有组件都支持颜色、尺寸、状态修饰
- 交互组件（模态框、警告框）依赖 Bootstrap JS（含 Popper）
- 可结合栅格系统与工具类使用，快速搭建常用界面结构

---

# Bootstrap 讲义（第四章）：表单系统（Forms）

---

## 一、基本输入字段

使用 `.form-control` 创建标准输入框：

```html
<form>
  <label for="email" class="form-label">邮箱地址</label>
  <input type="email" class="form-control" id="email" placeholder="name@example.com">
</form>
```

---

## 二、其他输入类型

```html
<input type="password" class="form-control" placeholder="密码">
<input type="number" class="form-control" placeholder="数量">
<input type="file" class="form-control">
<textarea class="form-control" rows="3"></textarea>
```

---

## 三、选择框（下拉菜单）

```html
<select class="form-select">
  <option selected>请选择</option>
  <option value="1">选项一</option>
  <option value="2">选项二</option>
  <option value="3">选项三</option>
</select>
```

---

## 四、单选与多选

### 单选按钮（Radio）

```html
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="radio1">
  <label class="form-check-label" for="radio1">男</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="radio2">
  <label class="form-check-label" for="radio2">女</label>
</div>
```

### 复选框（Checkbox）

```html
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="agree">
  <label class="form-check-label" for="agree">我同意条款</label>
</div>
```

---

## 五、表单行布局（form-group）

Bootstrap 不再推荐使用 `form-group` 类（已废弃），改为直接使用 `div + label + input` 结构。

---

## 六、表单内联布局

使用 `.row` 与 `.col-*` 实现多字段并排布局。

```html
<div class="row g-3">
  <div class="col-md-6">
    <label for="firstname" class="form-label">名</label>
    <input type="text" class="form-control" id="firstname">
  </div>
  <div class="col-md-6">
    <label for="lastname" class="form-label">姓</label>
    <input type="text" class="form-control" id="lastname">
  </div>
</div>
```

---

## 七、表单验证状态

使用类名反馈验证样式：

- `.is-valid`：输入有效
- `.is-invalid`：输入无效

```html
<input class="form-control is-valid" type="text" value="正确">
<div class="valid-feedback">看起来不错！</div>

<input class="form-control is-invalid" type="text" value="错误">
<div class="invalid-feedback">请输入正确内容</div>
```

---

## 八、禁用与只读字段

```html
<input class="form-control" type="text" value="禁用字段" disabled>
<input class="form-control" type="text" value="只读字段" readonly>
```

---

## 九、本章小结

- 表单元素统一使用 `.form-control` 和 `.form-select` 风格化
- 推荐使用 `.form-label` 绑定标签样式
- 支持响应式布局、验证反馈、只读禁用状态等多种状态
- 所有表单组件均支持嵌套在栅格系统中构建复杂布局

---

# Bootstrap 讲义（第五章）：工具类（Utilities）

---

## 一、工具类简介

Bootstrap 提供了大量实用的 CSS 工具类（utility classes），可用于：

- 控制布局（边距、填充、尺寸）
- 控制文本样式（颜色、对齐、大小写）
- 控制元素显示（隐藏、可见、响应控制）
- Flexbox 工具
- 背景色、边框、圆角、阴影等样式快速调整

这些工具类可独立使用或结合其他组件灵活定制界面。

---

## 二、边距（margin）与内边距（padding）

语法规则：`{property}{sides}-{breakpoint?}-{size}`

- 属性：m（margin），p（padding）
- 方向：t（上），b（下），s（左），e（右），x（左右），y（上下）
- 尺寸：0 ~ 5（也支持 auto）

### 示例：

```html
<div class="mt-3">上边距 1rem</div>
<div class="px-2 py-4">左右 0.5rem，上下 1.5rem</div>
<div class="ms-auto">左边距自动（推到右侧）</div>
```

---

## 三、文本工具类（排版）

```html
<p class="text-start">左对齐</p>
<p class="text-end">右对齐</p>
<p class="text-center">居中对齐</p>

<p class="text-lowercase">全小写</p>
<p class="text-uppercase">全大写</p>
<p class="text-capitalize">首字母大写</p>

<p class="fw-bold">粗体</p>
<p class="fst-italic">斜体</p>
```

---

## 四、背景与边框工具类

```html
<div class="bg-primary text-white">蓝底白字</div>
<div class="bg-light border border-secondary p-2">浅色背景 + 灰色边框</div>
<div class="border border-danger rounded-pill">圆角胶囊边框</div>
```

---

## 五、显示与隐藏控制

### 静态控制：

- `.d-none`：隐藏元素
- `.d-block`：强制块级显示
- `.d-inline`：强制行内显示

### 响应式控制（按断点）：

```html
<!-- 小屏隐藏，大屏显示 -->
<div class="d-none d-lg-block">仅桌面可见</div>
```

---

## 六、Flexbox 工具类

使用 `.d-flex` 开启 flex，搭配以下类控制布局方向和对齐方式。

- `.justify-content-*`：主轴对齐（start, center, end, between, around, evenly）
- `.align-items-*`：交叉轴对齐（start, center, end）
- `.flex-row / flex-column`：方向控制
- `.flex-wrap / flex-nowrap`：换行控制

### 示例：

```html
<div class="d-flex justify-content-between align-items-center">
  <span>左</span>
  <span>右</span>
</div>
```

---

## 七、尺寸工具

- `w-25 / w-50 / w-75 / w-100`：宽度百分比
- `h-25 / h-50 / h-100`：高度百分比
- `min-vh-100`：最小高度占满屏幕

---

## 八、阴影、圆角与透明度

```html
<div class="shadow-sm">小阴影</div>
<div class="shadow-lg rounded-3">大阴影 + 圆角</div>
<div class="opacity-50">透明度 50%</div>
```

---

## 九、本章小结

- 工具类是 Bootstrap 最强大也最轻量的模块之一
- 不依赖 HTML 结构即可随时改样式
- 与组件、栅格系统结合可快速构建灵活页面
- 建议熟练掌握间距、显示、文字、Flex 工具

---

# Bootstrap 讲义（第六章）：交互组件（JavaScript Components）

---

## 一、组件依赖说明

所有 JS 组件都依赖 Bootstrap 官方脚本文件：

```html
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
```

其中已包含必要的 Popper.js，适用于 Tooltip、Dropdown 等组件。

---

## 二、折叠面板（Collapse）

### 示例：点击按钮展开/收起内容

```html
<button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseContent">
切换内容
</button>

<div id="collapseContent" class="collapse mt-2">
  <div class="card card-body">
    这是可以展开/收起的内容区域。
  </div>
</div>
```

---

## 三、标签切换（Tabs）

用于在多个内容区域之间切换显示。

### 示例：

```html
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1">选项一</button>
  </li>
  <li class="nav-item">
    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2">选项二</button>
  </li>
</ul>

<div class="tab-content mt-2">
  <div class="tab-pane fade show active" id="tab1">内容 1</div>
  <div class="tab-pane fade" id="tab2">内容 2</div>
</div>
```

---

## 四、提示框（Tooltip）

提示框通过 JS 启用（需手动初始化）：

```html
<button class="btn btn-secondary" data-bs-toggle="tooltip" title="提示内容">悬停我</button>

<script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));
</script>
```

---

## 五、弹出框（Popover）

### 示例：

```html
<button class="btn btn-warning" data-bs-toggle="popover" title="标题" data-bs-content="这是详细内容">
显示弹出层
</button>

<script>
  const popoverList = document.querySelectorAll('[data-bs-toggle="popover"]');
  popoverList.forEach(el => new bootstrap.Popover(el));
</script>
```

---

## 六、轮播图（Carousel）

轮播图是用于展示多张图片或内容的幻灯片组件。

```html
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
```

---

## 七、Toast 消息提示

用于展示自动消失的简短反馈信息。

```html
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div class="toast show" role="alert">
    <div class="toast-header">
      <strong class="me-auto">系统</strong>
      <small>刚刚</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
    <div class="toast-body">
      操作已完成！
    </div>
  </div>
</div>
```

---

## 八、本章小结

- 交互组件需引入 Bootstrap JS（含 Popper）
- 多数组件支持通过 `data-bs-*` 属性直接使用
- 少数组件（如 Tooltip/Popover）需手动初始化
- 可与 Utility 类和栅格系统灵活组合构建完整页面结构

---

# Bootstrap 讲义（第七章）：响应式设计与主题定制

---

## 一、响应式断点系统

Bootstrap 内建五个主流断点（也称为 Breakpoints）：

| 断点名 | 最小宽度 | 类名前缀 |
|--------|-----------|------------|
| Extra small（xs） | 无 | `col-` |
| Small（sm） | 576px | `col-sm-` |
| Medium（md） | 768px | `col-md-` |
| Large（lg） | 992px | `col-lg-` |
| Extra large（xl） | 1200px | `col-xl-` |
| Extra extra large（xxl） | 1400px | `col-xxl-` |

---

## 二、响应式实战示例

### 示例：不同屏幕显示不同列数

```html
<div class="row">
  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="p-3 border bg-light">响应式列</div>
  </div>
</div>
```

---

## 三、响应式工具类

### 显示控制：

```html
<div class="d-none d-md-block">仅平板以上可见</div>
<div class="d-block d-sm-none">仅移动端可见</div>
```

### 排版与间距：

```html
<p class="text-start text-md-center">小屏左对齐，大屏居中</p>
<div class="p-2 p-lg-5">间距随屏幕变化调整</div>
```

---

## 四、自定义主题变量（使用 Sass）

若使用构建工具（如 Vite/Webpack），你可以重写 Bootstrap 的 SCSS 变量来自定义颜色、字体、圆角等风格。

### 步骤：

1. 安装 Bootstrap 源码版：
   `npm install bootstrap`

2. 引入源 SCSS：
   ```scss
   // 自定义变量必须在引入 bootstrap 之前声明
   $primary: #7b2cbf;
   $border-radius: 1rem;

@import "node_modules/bootstrap/scss/bootstrap";
```

3. 编译你的 SCSS 文件为 CSS 使用

---

## 五、CSS 变量（原生定制方法）

Bootstrap 5.3 引入了大量 CSS 变量，可直接在浏览器中覆盖样式而无需编译。

### 示例：自定义主题色

```html
<style>
  :root {
    --bs-primary: #0d6efd;
    --bs-border-radius: 1rem;
  }
</style>
```

---

## 六、自定义字体、间距、按钮样式

使用类名或 SCSS 变量，均可自定义风格。

### 示例：自定义按钮大小

```scss
$btn-padding-y: 0.75rem;
$btn-padding-x: 2rem;
$btn-font-size: 1.1rem;
```

---

## 七、本章小结

- Bootstrap 提供完善的响应式支持，可用于适配各种设备
- 可通过 Sass 变量、CSS 变量或工具类自定义样式
- 推荐结合组件库使用品牌色、圆角、字体系统一致化设计
- 学会响应式设计是从“能跑”到“专业”的关键一跃

---

## 后续建议（可选内容）

- Bootstrap Icons：引入官方图标库
- RTL 支持（从右到左语言）
- 深色模式（Dark Mode）
- Bootstrap 与 JavaScript 框架集成（React/Vue）

---

至此，Bootstrap 讲义主体内容已完结 ✅  