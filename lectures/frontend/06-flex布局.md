**Flex** 是一种强大的 CSS 布局工具，它的中文名是 **弹性盒子布局**，可以帮助我们轻松实现页面元素的对齐和分布。以下是详细介绍和代码示例。

---

### 基本概念
1. **弹性容器（Flex Container）**：
   - 使用 `display: flex;` 或 `display: inline-flex;` 定义。
   - 容器中的直接子元素会自动成为 **弹性项目（Flex Items）**。
   - 弹性容器可以控制其子元素的排列方向、对齐方式等。

2. **弹性项目（Flex Items）**：
   - 是弹性容器内的直接子元素。
   - 可以根据属性设置自由扩展或缩小以填充容器空间。

---

### 弹性容器的属性
#### **1. flex-direction**
决定主轴方向（子元素排列的方向）。
- `row`：从左到右（默认）。
- `row-reverse`：从右到左。
- `column`：从上到下。
- `column-reverse`：从下到上。

示例：
```html
<div class="container">
  <div class="item">1</div>
  <div class="item">2</div>
  <div class="item">3</div>
</div>

<style>
.container {
  display: flex;                /* 设置弹性容器 */
  flex-direction: column;       /* 子元素从上到下排列 */
}
.item {
  width: 50px;
  height: 50px;
  background: coral;
  margin: 5px;
}
</style>
```

---

#### **2. justify-content**
设置子元素在主轴上的对齐方式。
- `flex-start`：从主轴起点对齐（默认）。
- `center`：主轴居中对齐。
- `flex-end`：从主轴终点对齐。
- `space-between`：两端对齐，子元素之间的间距平均分配。
- `space-around`：子元素周围的间距相等。
- `space-evenly`：子元素之间的间距完全均匀。

示例：
```html
<div class="container">
  <div class="item">A</div>
  <div class="item">B</div>
  <div class="item">C</div>
</div>

<style>
.container {
  display: flex;                /* 设置弹性容器 */
  justify-content: space-between; /* 子元素两端对齐，间距平分 */
}
.item {
  width: 50px;
  height: 50px;
  background: lightcoral;
}
</style>
```

---

#### **3. align-items**
设置子元素在交叉轴上的对齐方式。
- `flex-start`：从交叉轴的起点对齐。
- `center`：交叉轴居中对齐。
- `flex-end`：从交叉轴的终点对齐。
- `stretch`：子元素拉伸以填满交叉轴（默认）。
- `baseline`：子元素的文本基线对齐。

示例：
```html
<div class="container">
  <div class="item" style="height: 50px;">A</div>
  <div class="item" style="height: 100px;">B</div>
  <div class="item" style="height: 75px;">C</div>
</div>

<style>
.container {
  display: flex;                /* 设置弹性容器 */
  align-items: flex-end;        /* 子元素沿交叉轴底部对齐 */
}
.item {
  width: 50px;
  background: lightgreen;
}
</style>
```

---

### 弹性项目的属性
#### **1. flex**
设置弹性项目的伸缩行为。格式为 `flex: [grow] [shrink] [basis];`，其中：
- `grow`：扩展比例（当有多余空间时）。
- `shrink`：缩小比例（当空间不足时）。
- `basis`：设置初始宽度或高度。

示例：
```html
<div class="container">
  <div class="item" style="flex: 1;">A</div>
  <div class="item" style="flex: 2;">B</div>
  <div class="item" style="flex: 1;">C</div>
</div>

<style>
.container {
  display: flex;                /* 设置弹性容器 */
}
.item {
  height: 50px;
  background: skyblue;
  margin: 5px;
}
</style>
```

解释：
- 第一个和第三个子元素会占用 1 份空间。
- 第二个子元素会占用 2 份空间。

---

### 总结
**Flex 布局** 的核心是通过弹性容器和弹性项目的属性控制子元素的排列和分布：
- 主轴方向由 `flex-direction` 决定。
- 子元素在主轴和交叉轴的对齐由 `justify-content` 和 `align-items` 控制。
- 子元素的尺寸和比例由 `flex` 控制。

通过灵活运用这些属性，可以简化复杂的布局，适应各种屏幕尺寸和内容变化。

---

### 场景：响应式导航栏布局
- 包含一个 Logo 和多个导航链接。
- 使用 Flex 布局实现 Logo 靠左，导航链接靠右，且在屏幕变窄时导航栏可以适配。

```html
<div class="navbar">
  <div class="logo">我的网站</div>
  <div class="nav-links">
    <a href="#">首页</a>
    <a href="#">关于我们</a>
    <a href="#">服务</a>
    <a href="#">联系</a>
  </div>
</div>

<style>
/* 导航栏容器 */
.navbar {
  display: flex;                  /* 设置弹性容器 */
  justify-content: space-between; /* 左右两端对齐 */
  align-items: center;            /* 垂直居中对齐 */
  padding: 10px 20px;             /* 内边距 */
  background-color: #333;         /* 背景色 */
  color: white;                   /* 文字颜色 */
}

/* Logo 部分 */
.logo {
  font-size: 1.5em;               /* 字体大小 */
  font-weight: bold;              /* 加粗 */
}

/* 导航链接容器 */
.nav-links {
  display: flex;                  /* 设置为弹性容器 */
  gap: 15px;                      /* 子元素间距 */
}

/* 导航链接样式 */
.nav-links a {
  text-decoration: none;          /* 去掉下划线 */
  color: white;                   /* 文字颜色 */
  padding: 5px 10px;              /* 内边距 */
  transition: background 0.3s;    /* 背景色变化过渡 */
}

/* 鼠标悬停效果 */
.nav-links a:hover {
  background-color: #555;         /* 背景色变灰 */
  border-radius: 5px;             /* 圆角 */
}

/* 响应式：在屏幕宽度小于600px时，导航栏垂直排列 */
@media (max-width: 600px) {
  .navbar {
    flex-direction: column;       /* 垂直方向排列 */
    align-items: flex-start;      /* 左对齐 */
  }
  .nav-links {
    flex-direction: column;       /* 导航链接垂直排列 */
    width: 100%;                  /* 链接容器宽度撑满 */
  }
  .nav-links a {
    width: 100%;                  /* 链接宽度撑满 */
    text-align: left;             /* 左对齐文本 */
  }
}
</style>
```

---

### 示例解析
1. **主布局**：
   - 使用 `display: flex;` 实现 Logo 和导航链接的左右分布。
   - `justify-content: space-between;` 保证 Logo 靠左，导航链接靠右。

2. **导航链接排列**：
   - 导航链接使用 `display: flex;` 和 `gap` 属性实现横向排列和间距。

3. **响应式设计**：
   - 使用媒体查询 `@media (max-width: 600px)`，在小屏幕下调整为垂直布局，方便在手机上查看。

4. **交互效果**：
   - 增加了鼠标悬停时的背景色变化和圆角效果，提升用户体验。

---

### 使用场景
此代码适用于实际开发中的响应式导航栏布局，例如企业网站、博客网站或个人作品集展示页面等。可以根据需要修改颜色、间距或交互效果以适应不同的设计风格。