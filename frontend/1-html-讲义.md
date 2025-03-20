# HTML 零基础 - 讲义

---

## 第一章：HTML 基础与核心概念

### 1. 什么是 HTML？

HTML（HyperText Markup Language，超文本标记语言）是用来描述网页内容结构的标记语言。它由标签（Tags）组成，通过元素（Elements）来组织内容。

HTML 的特点：
- 用于定义网页结构。
- 不区分大小写（推荐使用小写）。
- HTML 文档以 `.html` 或 `.htm` 作为文件扩展

---

### 2. HTML 基本文档结构

每个 HTML 文档都有一个基本结构，示例如下：

```
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML 学习</title>
  </head>
  <body>
    <h1>欢迎学习 HTML</h1>
  </body>
</html>
```

#### 详细讲解：

1. **`<!DOCTYPE html>`**：
   - 声明文档类型，告诉浏览器这是 HTML5 文档。

2. **`<html>` 和 `</html>`**：
   - HTML 文档的根标签，包含所有内容。
   - `lang` 属性指定页面语言（如 `lang="en"` 表示英语，`lang="zh-CN"` 表示简体中文）。

3. **`<head>` 和 `</head>`**：
   - 包含文档的元信息，例如标题、编码、样式等。
   - 常用标签：
     - `<meta charset="UTF-8">`：设置字符编码为 UTF-8。
     - `<title>`：网页标题，显示在浏览器标签上。
     - `<meta name="viewport" content="width=device-width, initial-scale=1.0">`：适配移动设备。

4. **`<body>` 和 `</body>`**：
   - 定义网页的可见内容部分。

---

## 第二章：HTML 常用标签详解

### 1. 文本标签

#### **标题标签（Headings）**

HTML 提供 6 个层级的标题标签：
```
<h1>主标题</h1>
<h2>副标题</h2>
<h3>三级标题</h3>
<h4>四级标题</h4>
<h5>五级标题</h5>
<h6>六级标题</h6>
```

#### **段落标签（Paragraphs）**

`<p>` 用于定义段落：
```
<p>这是一个段落。</p>
```

#### **换行标签（Line Break）**

`<br>` 表示强制换行，无需闭合：
```
这是第一行内容<br>这是第二行内容。
```

#### **水平线标签（Horizontal Rule）**

`<hr>` 用于插入水平分割线：
```
<p>段落 1</p>
<hr>
<p>段落 2</p>
```

---

### 2. 字体样式标签

#### **加粗文本（Bold）**

`<b>` 或 `<strong>` 用于加粗文本：
```
<p>这是 <b>加粗</b> 的文本。</p>
<p>这是 <strong>重要的加粗</strong> 文本。</p>
```

#### **斜体文本（Italic）**

`<i>` 或 `<em>` 用于斜体文本：
```
<p>这是 <i>斜体</i> 文本。</p>
<p>这是 <em>强调的斜体</em> 文本。</p>
```

#### **删除线文本（Strikethrough）**

`<del>` 或 `<s>` 用于标记删除内容：
```
<p>这是 <del>删除线</del> 文本。</p>
<p>这是 <s>不再准确的文本</s>。</p>
```

#### **下划线文本（Underline）**

`<u>` 表示文本下划线：
```
<p>这是 <u>带下划线</u> 的文本。</p>
```

---

### 3. 列表标签

#### **无序列表（Unordered List）**

`<ul>` 创建无序列表，使用 `<li>` 定义列表项：
```
<ul>
  <li>苹果</li>
  <li>香蕉</li>
  <li>橘子</li>
</ul>
```

#### **有序列表（Ordered List）**

`<ol>` 创建有序列表，使用 `<li>` 定义列表项：
```
<ol>
  <li>第一步</li>
  <li>第二步</li>
  <li>第三步</li>
</ol>
```

#### **嵌套列表**

列表可以嵌套使用：
```
<ul>
  <li>水果
    <ul>
      <li>苹果</li>
      <li>香蕉</li>
    </ul>
  </li>
  <li>蔬菜</li>
</ul>
```

---

### 4. 链接和图片标签

#### **超链接（Hyperlinks）**

`<a>` 用于创建超链接：
```
<a href="https://example.com">点击访问示例网站</a>
```

属性说明：
- `href`：链接地址。
- `target="_blank"`：在新标签页打开链接。

#### **图片（Images）**

`<img>` 用于插入图片：
```
<img src="image.jpg" alt="描述文字">
```

属性说明：
- `src`：图片路径。
- `alt`：图片描述。

---

### 5. 表格标签

`<table>` 定义表格，常用子标签包括：
```
<table>
  <tr>
    <th>姓名</th>
    <th>年龄</th>
  </tr>
  <tr>
    <td>张三</td>
    <td>25</td>
  </tr>
</table>
```

---

---

## 第三章：HTML 表单标签详解

HTML 表单用于用户输入数据，并将数据提交到服务器。

---

### 1. 表单基本结构

`<form>` 用于创建表单，主要属性包括：
- `action`：指定提交数据的目标地址。
- `method`：提交数据的方式（如 `GET` 或 `POST`）。

示例：
```
<form action="/submit" method="POST">
  <label for="name">姓名：</label>
  <input type="text" id="name" name="name">
  <button type="submit">提交</button>
</form>
```

---

### 2. 表单控件

#### **文本输入框**

`<input>` 标签创建输入框，常用 `type` 属性值：
- `type="text"`：单行文本输入框。
- `type="password"`：密码输入框。
- `type="email"`：电子邮箱输入框。

示例：
```
<input type="text" name="username" placeholder="请输入用户名">
<input type="password" name="password" placeholder="请输入密码">
<input type="email" name="email" placeholder="请输入电子邮箱">
```

---

#### **多行文本框**

`<textarea>` 创建多行文本输入框：
```
<textarea name="comments" rows="4" cols="50" placeholder="请输入评论"></textarea>
```

---

#### **单选按钮**

`<input type="radio">` 创建单选按钮：
```
<label>
  <input type="radio" name="gender" value="male"> 男
</label>
<label>
  <input type="radio" name="gender" value="female"> 女
</label>
```

---

#### **复选框**

`<input type="checkbox">` 创建复选框：
```
<label>
  <input type="checkbox" name="hobby" value="reading"> 阅读
</label>
<label>
  <input type="checkbox" name="hobby" value="sports"> 运动
</label>
```

---

#### **下拉菜单**

`<select>` 创建下拉菜单，使用 `<option>` 定义选项：
```
<select name="city">
  <option value="beijing">北京</option>
  <option value="shanghai">上海</option>
  <option value="guangzhou">广州</option>
</select>
```

---

#### **按钮**

`<button>` 创建按钮：
```
<button type="submit">提交</button>
<button type="reset">重置</button>
```

---

## 第四章：HTML 多媒体标签详解

HTML 支持多种多媒体内容，如音频、视频等。

---

### 1. 音频标签

`<audio>` 用于插入音频文件：
```
<audio controls>
  <source src="audio.mp3" type="audio/mpeg">
  您的浏览器不支持音频播放。
</audio>
```

属性说明：
- `controls`：显示播放控件。
- `autoplay`：自动播放（可选）。
- `loop`：循环播放（可选）。

---

### 2. 视频标签

`<video>` 用于插入视频文件：
```
<video controls width="600">
  <source src="video.mp4" type="video/mp4">
  您的浏览器不支持视频播放。
</video>
```

属性说明：
- `controls`：显示播放控件。
- `width` 和 `height`：设置视频尺寸。

---

## 第五章：HTML 布局标签详解

HTML 提供了一些布局标签，用于组织网页结构。

---

### 1. 块级元素和行内元素

#### **块级元素（Block-level Elements）**
块级元素独占一行，常见的块级元素有：
- `<div>`：通用容器。
- `<p>`：段落。
- `<h1>` 到 `<h6>`：标题。

#### **行内元素（Inline Elements）**
行内元素不会独占一行，常见的行内元素有：
- `<span>`：通用内联容器。
- `<a>`：超链接。
- `<img>`：图片。

---

### 2. 语义化标签

语义化标签提升代码可读性和可维护性。常见的语义化标签包括：
- `<header>`：定义头部内容。
- `<nav>`：定义导航链接。
- `<section>`：定义内容区域。
- `<article>`：定义独立内容块。
- `<footer>`：定义页脚内容。

示例：
```
<header>
  <h1>我的网站</h1>
  <nav>
    <a href="#home">首页</a>
    <a href="#about">关于</a>
  </nav>
</header>
<section>
  <h2>文章标题</h2>
  <p>这是文章内容。</p>
</section>
<footer>
  <p>版权所有 &copy; 2025</p>
</footer>
```

---

## 第六章：HTML 表格标签详解

HTML 表格用于组织和展示数据。

---

### 1. 表格结构

`<table>` 定义表格，常用子标签包括：
- `<tr>`：表格行。
- `<th>`：表头单元格。
- `<td>`：表格单元格。

示例：
```
<table border="1">
  <tr>
    <th>姓名</th>
    <th>年龄</th>
    <th>职业</th>
  </tr>
  <tr>
    <td>张三</td>
    <td>25</td>
    <td>工程师</td>
  </tr>
  <tr>
    <td>李四</td>
    <td>30</td>
    <td>设计师</td>
  </tr>
</table>
```

---

### 2. 表格属性

表格常用属性包括：
- `border`：设置边框。
- `cellpadding`：单元格内边距。
- `cellspacing`：单元格间距。

---