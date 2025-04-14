# CSS 零基础 - 讲义

---

## 第一章：CSS 基础概念

### 1. 什么是 CSS？

CSS，全称为 Cascading Style Sheets（层叠样式表），是一种样式表语言，用于为 HTML 文档设置样式。通过 CSS，可以控制网页的外观和布局，使其更具吸引力和实用性。

---

### 2. 为什么学习 CSS？

1. **增强网页美观性**：改变颜色、字体、间距等外观。
2. **实现复杂布局**：支持弹性布局、网格布局等。
3. **提升用户体验**：使用动画、过渡效果等增强交互性。
4. **提高代码可维护性**：通过分离结构与样式，使代码更清晰。

---

### 3. CSS 的特点

- **层叠性**：当多个样式作用于同一元素时，遵循特定优先级规则。
- **继承性**：某些属性（如颜色、字体）可以从父元素继承。
- **响应性**：支持媒体查询，适配不同屏幕大小。

---

### 4. CSS 的基本语法

CSS 的基本结构如下：

```
选择器 {
  属性: 值;
  属性: 值;
}
```

#### 示例：

```
p {
  color: red;
  font-size: 16px;
}
```

**说明：**
1. **选择器**：指定样式作用的 HTML 元素（如 `p` 表示段落）。
2. **属性**：定义要修改的样式（如 `color`）。
3. **值**：为属性设置的具体值（如 `red` 表示红色）。

---

## 第二章：CSS 选择器详解

CSS 选择器用于定位 HTML 元素以应用样式。以下是详细分类：

---

### 1. 基本选择器

#### **元素选择器**

选择指定的 HTML 标签：
```
h1 {
  color: blue;
}
```
作用：为所有 `<h1>` 标签设置文字颜色为蓝色。

---

#### **类选择器**

通过 `.` 表示，选择带有指定 `class` 属性的元素：
```
.card {
  background-color: #f9f9f9;
  border: 1px solid #ddd;
}
```

HTML 示例：
```
<div class="card">内容</div>
```

---

#### **ID 选择器**

通过 `#` 表示，选择带有指定 `id` 属性的元素：
```
#header {
  background-color: #333;
  color: white;
}
```

HTML 示例：
```
<div id="header">这是标题</div>
```

**注意：**
- ID 选择器的优先级高于类选择器。
- 同一页面的 `id` 值应唯一。

---

### 2. 组合选择器

#### **后代选择器**

选择某元素内的所有指定后代元素：
```
div p {
  color: green;
}
```

HTML 示例：
```
<div>
  <p>这是绿色段落。</p>
</div>
```

---

#### **子代选择器**

选择某元素的直接子元素：
```
div > p {
  color: orange;
}
```

HTML 示例：
```
<div>
  <p>直接子元素段落。</p>
</div>
<p>这不是子元素。</p>
```

---

#### **兄弟选择器**

1. **紧邻兄弟选择器**（`+`）：
   选择某元素的下一个兄弟元素：
   ```
   h1 + p {
     font-size: 14px;
   }
   ```

2. **通用兄弟选择器**（`~`）：
   选择某元素的所有兄弟元素：
   ```
   h1 ~ p {
     font-size: 12px;
   }
   ```

---

### 3. 属性选择器

#### **基本属性选择器**

选择带有指定属性的元素：
```
input[type="text"] {
  border: 1px solid #ccc;
}
```

HTML 示例：
```
<input type="text">
<input type="password">
```
作用：仅为 `type="text"` 的输入框设置样式。

---

#### **常用属性选择器**

1. **存在属性**：
   ```
   [title] {
     color: blue;
   }
   ```

2. **指定值**：
   ```
   [lang="en"] {
     font-style: italic;
   }
   ```

3. **部分匹配**：
   - `[attr^="value"]`：属性值以 `value` 开头。
   - `[attr$="value"]`：属性值以 `value` 结尾。
   - `[attr*="value"]`：属性值包含 `value`。

---

### 4. 伪类选择器

伪类用于选择元素的特定状态。

#### **链接伪类**

按顺序书写规则：
```
a:link { color: blue; }    /* 未访问的链接 */
a:visited { color: purple; } /* 已访问的链接 */
a:hover { color: red; }      /* 鼠标悬停时 */
a:active { color: orange; }  /* 激活时 */
```

---

#### **用户交互伪类**

```
input:focus {
  border-color: #007BFF;
  outline: none;
}
button:hover {
  background-color: lightblue;
}
```

---

## 第三章：CSS 属性详解

### 1. 颜色与背景

#### **颜色属性**

- **文字颜色**：
  ```
  p {
    color: red;
  }
  ```

- **背景颜色**：
  ```
  div {
    background-color: lightyellow;
  }
  ```

#### **背景图片**

- 设置背景图片：
  ```
  div {
    background-image: url('background.jpg');
  }
  ```

- 常见属性：
  ```
  background-repeat: no-repeat; /* 背景不重复 */
  background-size: cover;       /* 拉伸覆盖 */
  background-position: center;  /* 居中显示 */
  ```

---

### 2. 边框与阴影

#### **边框属性**

- 基础设置：
  ```
  div {
    border: 2px solid black;
    border-radius: 10px;
  }
  ```

- 单边设置：
  ```
  div {
    border-top: 2px dashed red;
  }
  ```

---

#### **阴影属性**

- 元素阴影：
  ```
  box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.5);
  ```

- 文本阴影：
  ```
  text-shadow: 2px 2px 3px gray;
  ```

---

### 3. 字体与文本

#### **字体属性**

- 设置字体：
  ```
  p {
    font-family: "Arial", sans-serif;
    font-size: 16px;
  }
  ```

- 字体粗细：
  ```
  font-weight: bold;
  ```

---

#### **文本属性**

- 文本对齐：
  ```
  text-align: center;
  ```

- 行高设置：
  ```
  line-height: 1.5;
  ```

---

## 第四章：布局详解（含盒模型、Flexbox、Grid 等）

# CSS 布局详解

---

## 第四章：CSS 布局技术

布局是网页设计的重要组成部分，用于控制页面元素的位置、大小和排列方式。

---

### 1. 盒模型（Box Model）

CSS 盒模型是每个元素的基本组成结构，它包括以下部分：

#### **盒模型结构**

```
+---------------------------+
|         Margin            |
| +-----------------------+ |
| |       Border          | |
| | +-------------------+ | |
| | |     Padding       | | |
| | | +---------------+ | | |
| | | |    Content    | | | |
| | | +---------------+ | | |
| | +-------------------+ | |
| +-----------------------+ |
+---------------------------+
```

#### **属性详解**

1. **`content`**：元素的内容区域。
   ```
   width: 200px;
   height: 100px;
   ```

2. **`padding`**：内容与边框之间的内边距。
   ```
   padding: 10px;
   ```

3. **`border`**：元素边框的宽度、样式和颜色。
   ```
   border: 2px solid black;
   ```

4. **`margin`**：元素与外部其他元素之间的外边距。
   ```
   margin: 20px;
   ```

#### **盒模型的计算公式**

总宽度 = `width + padding-left + padding-right + border-left + border-right + margin-left + margin-right`

---

### 2. 弹性布局（Flexbox）

Flexbox（弹性盒子布局）用于创建灵活、响应式的布局。

#### **基础概念**

- **父容器属性：**
  1. `display: flex;`：定义为弹性容器。
  2. `flex-direction`：设置主轴方向：
     - `row`（默认）：从左到右排列。
     - `column`：从上到下排列。

- **子元素属性：**
  1. `flex`：设置子元素的占比。
  2. `align-self`：单独设置子元素的对齐方式。

#### **示例代码**

HTML：
```
<div class="container">
  <div class="item">1</div>
  <div class="item">2</div>
  <div class="item">3</div>
</div>
```

CSS：
```
.container {
  display: flex;
  justify-content: center; /* 水平居中 */
  align-items: center;    /* 垂直居中 */
  height: 200px;
}
.item {
  flex: 1; /* 平均分配空间 */
  margin: 10px;
  background-color: lightblue;
}
```

---

### 3. 网格布局（Grid）

Grid 布局是更高级的二维布局系统，可以同时管理行和列。

#### **基础概念**

- **父容器属性：**
  1. `display: grid;`：定义为网格容器。
  2. `grid-template-columns`：定义列的宽度。
  3. `grid-template-rows`：定义行的高度。

- **子元素属性：**
  1. `grid-column`：设置元素所在列的范围。
  2. `grid-row`：设置元素所在行的范围。

#### **示例代码**

HTML：
```
<div class="grid-container">
  <div class="grid-item">1</div>
  <div class="grid-item">2</div>
  <div class="grid-item">3</div>
  <div class="grid-item">4</div>
</div>
```

CSS：
```
.grid-container {
  display: grid;
  grid-template-columns: repeat(2, 1fr); /* 两列，宽度均分 */
  gap: 10px; /* 设置间距 */
}
.grid-item {
  background-color: lightgreen;
  padding: 20px;
  text-align: center;
}
```

---

### 4. 定位（Position）

#### **定位类型**

1. **静态定位（Static）**：
   默认值，元素按照文档流排列。

2. **相对定位（Relative）**：
   相对于自身的正常位置进行偏移：
   ```
   position: relative;
   top: 10px;
   left: 20px;
   ```

3. **绝对定位（Absolute）**：
   相对于最近的 `position` 为 `relative` 或 `absolute` 的父元素：
   ```
   position: absolute;
   top: 50px;
   left: 100px;
   ```

4. **固定定位（Fixed）**：
   相对于浏览器窗口定位：
   ```
   position: fixed;
   bottom: 10px;
   right: 10px;
   ```

5. **粘性定位（Sticky）**：
   根据滚动情况切换为相对或固定定位：
   ```
   position: sticky;
   top: 0;
   ```

---

## 第五章：CSS 高级特性

---

### 1. 动画与过渡

#### **CSS 过渡（Transitions）**

过渡效果用于平滑元素的样式变化。

示例：
```
.button {
  background-color: blue;
  transition: background-color 0.3s ease;
}
.button:hover {
  background-color: red;
}
```

---

#### **CSS 动画（Animations）**

定义复杂的动画效果。

1. **定义动画名称和关键帧：**
   ```
   @keyframes move {
     0% {
       transform: translateX(0);
     }
     100% {
       transform: translateX(100px);
     }
   }
   ```

2. **应用动画：**
   ```
   div {
     animation: move 2s infinite;
   }
   ```

---

### 2. 媒体查询（Media Queries）

通过媒体查询实现响应式设计。

#### **语法**

```
@media (max-width: 600px) {
  body {
    background-color: lightgray;
  }
}
```

#### **示例**

HTML：
```
<div class="box">响应式内容</div>
```

CSS：
```
.box {
  width: 100%;
  height: 100px;
  background-color: lightblue;
}

@media (max-width: 768px) {
  .box {
    background-color: lightgreen;
  }
}
```

---

# CSS 高级详解 - 单位、变量与实践

---

## 第五章：CSS 单位详解

### 1. 绝对单位

绝对单位的大小固定，不随屏幕或容器变化：
- `px`：像素，最常用单位。
- `cm`、`mm`：厘米和毫米。
- `in`：英寸（1in = 96px）。
- `pt`：磅（1pt = 1/72 英寸）。

示例：
```
div {
  width: 300px;
  height: 150px;
}
```

---

### 2. 相对单位

相对单位的大小基于上下文或容器的尺寸：
- **`%`**：基于父元素的百分比。
  ```
  div {
    width: 50%; /* 父元素宽度的一半 */
  }
  ```

- **`em` 和 `rem`**：
  - `em`：基于父元素字体大小的倍数。
  - `rem`：基于根元素 `<html>` 的字体大小。

  示例：
  ```
  html {
    font-size: 16px;
  }
  div {
    font-size: 2em;  /* 32px */
    line-height: 1.5rem; /* 24px */
  }
  ```

- **视口单位（Viewport Units）**：
  - `vw`：视口宽度的 1%。
  - `vh`：视口高度的 1%。
  - `vmin` 和 `vmax`：视口宽高中较小或较大的 1%。

  示例：
  ```
  div {
    width: 50vw; /* 占视口宽度的一半 */
    height: 100vh; /* 占满视口高度 */
  }
  ```

---

## 第六章：CSS 自定义变量

CSS 自定义变量（也称为 CSS 变量）提高了代码的可维护性。

---

### 1. 定义与使用

#### **定义变量**

CSS 变量以 `--` 开头，通常定义在 `:root` 中：
```
:root {
  --primary-color: #007BFF;
  --secondary-color: #6C757D;
  --font-size-large: 18px;
}
```

#### **使用变量**

通过 `var()` 函数调用变量：
```
button {
  background-color: var(--primary-color);
  color: white;
  font-size: var(--font-size-large);
}
```

---

### 2. 默认值与动态改变

#### **设置默认值**

```
div {
  color: var(--text-color, black); /* 如果变量未定义，则使用黑色 */
}
```

#### **动态改变变量**

结合 JavaScript 改变 CSS 变量：
```
document.documentElement.style.setProperty('--primary-color', 'red');
```

---

## 第七章：伪元素详解

伪元素用于为元素的特定部分设置样式。

---

### 1. 常用伪元素

#### **`::before` 和 `::after`**

用于在元素内容前后插入内容：
```
h1::before {
  content: '🎉 ';
}
h1::after {
  content: ' 🎉';
}
```

HTML 示例：
```
<h1>欢迎来到我的网站</h1>
```

效果：
🎉 欢迎来到我的网站 🎉

---

#### **`::first-letter` 和 `::first-line`**

- `::first-letter`：选择段落的首字母。
- `::first-line`：选择段落的首行。

示例：
```
p::first-letter {
  font-size: 2em;
  color: red;
}
p::first-line {
  font-weight: bold;
}
```

---

## 第八章：响应式设计技巧

响应式设计是创建适配各种设备的网页布局。

---

### 1. 媒体查询

#### **基本语法**

```
@media (max-width: 768px) {
  body {
    background-color: lightgray;
  }
}
```

#### **组合条件**

- `and`：满足所有条件。
- `or`：满足任一条件。
- `not`：排除条件。

示例：
```
@media (min-width: 768px) and (max-width: 1024px) {
  body {
    background-color: lightblue;
  }
}
```

---

### 2. 流式布局

#### **百分比宽度**

使用百分比设置元素宽度，使其随容器缩放：
```
.container {
  width: 90%;
  margin: 0 auto;
}
```

#### **弹性图片**

使用 `max-width: 100%;` 限制图片宽度：
```
img {
  max-width: 100%;
  height: auto;
}
```

---

### 3. 实现网格化布局

结合媒体查询与 `grid` 实现响应式网格布局：

HTML：
```
<div class="grid-container">
  <div class="item">1</div>
  <div class="item">2</div>
  <div class="item">3</div>
  <div class="item">4</div>
</div>
```

CSS：
```
.grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  gap: 10px;
}
.item {
  background-color: lightcoral;
  padding: 20px;
  text-align: center;
}
```

---

## 第九章：综合实践案例

以下是一个综合运用 CSS 技术实现的案例。

---

### 响应式个人名片

HTML：
```
<div class="card">
  <img src="profile.jpg" alt="头像">
  <h1>张三</h1>
  <p>全栈开发工程师</p>
  <button>联系我</button>
</div>
```

CSS：
```
.card {
  max-width: 300px;
  margin: 20px auto;
  padding: 20px;
  text-align: center;
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-bottom: 10px;
}

.card h1 {
  font-size: 20px;
  color: #333;
}

.card p {
  font-size: 16px;
  color: #777;
}

.card button {
  padding: 10px 20px;
  font-size: 16px;
  color: white;
  background-color: #007BFF;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.card button:hover {
  background-color: #0056b3;
}
```

---
