# jQuery 讲义（第一章）：基础语法与选择器

本章将讲解 jQuery 的基础语法结构、常用选择器以及它们的使用方法和应用场景，适合初学者建立起对 jQuery 的整体理解。

---

## 一、什么是 jQuery？

jQuery 是一个快速、简洁的 JavaScript 库，它极大地简化了 HTML 文档遍历、事件处理、动画效果以及与服务器的数据交互（Ajax）。它的口号是：“Write less, do more.”

---

## 二、引入 jQuery

在 HTML 文件中通过 `<script>` 标签引入 jQuery，可以使用官方 CDN 或本地文件。

### 示例：

```html
<!-- 推荐使用 CDN 链接引入 jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
```

---

## 三、jQuery 的基本语法结构

jQuery 的语法由三个部分组成：

```
$(selector).action();
```

- **$**：jQuery 函数，用于选中元素。
- **selector**：选择器，告诉 jQuery 你想操作哪个元素。
- **action()**：你希望对选中的元素执行的操作。

### 示例：

```javascript
$("#title").hide(); // 隐藏 ID 为 title 的元素
```

---

## 四、常用选择器详解

jQuery 允许我们像 CSS 一样使用选择器选中元素，并进行操作。

---

### 1. ID 选择器

使用 $("#id") 选中某个具有特定 ID 的元素。

#### 示例：

```javascript
$("#header").css("background-color", "#f5f5f5");
// 将 ID 为 header 的元素背景色设置为灰白色
```

---

### 2. 类选择器

使用 $("class") 选中所有具有某个 class 的元素。

#### 示例：

```javascript
$(".button").addClass("active");
// 为所有 class 为 button 的元素添加 active 类
```

---

### 3. 标签选择器

选中所有指定类型的标签。

#### 示例：

```javascript
$("p").text("这是一段段落文字。");
// 修改所有 <p> 标签的文本
```

---

### 4. 通配选择器（*）

选中页面上的所有元素。

#### 示例：

```javascript
$("*").css("margin", "0");
// 移除所有元素的外边距
```

---

### 5. 多重选择器

同时选中多种元素。

#### 示例：

```javascript
$("h1, p, .note").hide();
// 隐藏所有 h1 标签、p 标签以及 class 为 note 的元素
```

---

### 6. 后代选择器（空格）

选中某个元素内部的所有指定元素。

#### 示例：

```javascript
$("#content p").css("color", "blue");
// 设置 ID 为 content 元素内所有段落文字为蓝色
```

---

### 7. 直接子元素选择器（>）

仅选中某个元素的直接子元素。

#### 示例：

```javascript
$("#menu > li").addClass("top-item");
// 为 menu 中的顶级列表项添加类名
```

---

### 8. 相邻兄弟选择器（+）

选中紧接在指定元素后的那个兄弟元素。

#### 示例：

```javascript
$("#title + p").css("font-weight", "bold");
// 将紧随 ID 为 title 的段落加粗
```

---

### 9. 后续兄弟选择器（~）

选中某元素之后所有的兄弟元素。

#### 示例：

```javascript
$("#section ~ div").hide();
// 隐藏紧随 ID 为 section 的所有 div 兄弟元素
```

---

本章小结：

- 熟练掌握 jQuery 的基本语法结构是后续学习的基础；
- 选择器种类丰富，灵活使用可以大大简化 DOM 操作；
- 建议通过浏览器控制台或 CodePen 等平台多做练习。

下一章将进入 **DOM 操作与元素属性控制** 的内容。


# jQuery 讲义（第二章）：DOM 操作与属性方法

本章将介绍如何使用 jQuery 操作网页上的 HTML 元素（DOM）内容、属性、值、类名以及结构（增删节点）。

---

## 一、内容操作

jQuery 提供了多种方法用于读取和修改元素中的内容。

---

### 1. .html() 方法

用于获取或设置 HTML 内容（包括标签）。

#### 示例：

```javascript
// 获取 HTML 内容
var html = $("#box").html();

// 设置 HTML 内容
$("#box").html("<strong>加粗文本</strong>");
```

---

### 2. .text() 方法

用于获取或设置纯文本内容（不解析标签）。

#### 示例：

```javascript
// 获取文本内容
var txt = $("#box").text();

// 设置文本内容
$("#box").text("这是一个纯文本段落");
```

---

### 3. .val() 方法

用于表单元素（input、textarea、select）值的获取与设置。

#### 示例：

```javascript
// 获取值
var name = $("#username").val();

// 设置值
$("#username").val("张三");
```

---

## 二、属性操作

---

### 1. .attr() 方法

用于获取或设置元素的任意属性。

#### 示例：

```javascript
// 获取链接地址
var link = $("a").attr("href");

// 设置链接地址
$ ("a").attr("href", "https://example.com");
```

---

### 2. .removeAttr() 方法

移除元素上的指定属性。

#### 示例：

```javascript
$ ("input").removeAttr("disabled");
```

---

### 3. .prop() 方法

推荐用于获取/设置布尔类型的 DOM 属性，如 checked、selected、disabled 等。

#### 示例：

```javascript
// 获取 checkbox 状态
var isChecked = $("#agree").prop("checked");

// 设置为选中
$("#agree").prop("checked", true);
```

---

## 三、类名操作

---

### 1. .addClass() 方法

添加一个或多个类名。

#### 示例：

```javascript
$("#title").addClass("highlight bold");
```

---

### 2. .removeClass() 方法

移除指定类名。

```javascript
$("#title").removeClass("highlight");
```

---

### 3. .toggleClass() 方法

有则移除，无则添加，实现开关效果。

```javascript
$("#title").toggleClass("dark-mode");
```

---

### 4. .hasClass() 方法

判断元素是否拥有某个类名，返回布尔值。

```javascript
if ($("#title").hasClass("active")) {
alert("标题已激活");
}
```

---

## 四、结构操作（添加/删除 DOM 元素）

---

### 1. .append() / .prepend()

向元素内部添加子节点。

#### 示例：

```javascript
// 添加到末尾
$("#list").append("<li>新的列表项</li>");

// 添加到开头
$("#list").prepend("<li>优先项</li>");
```

---

### 2. .after() / .before()

在元素外部添加兄弟节点。

#### 示例：

```javascript
$("#item").after("<p>后插段落</p>");
$("#item").before("<p>前插段落</p>");
```

---

### 3. .remove()

删除当前元素（包括其内容和事件）。

```javascript
$(".temp").remove();
```

---

### 4. .empty()

清空当前元素内部的内容，保留标签本身。

```javascript
$("#container").empty();
```

---

本章小结：

- .html() / .text() / .val() 是内容读写三剑客；
- .attr() 和 .prop() 用于属性操作，注意布尔属性推荐用 .prop()；
- 类名操作方法适用于样式切换，结构操作方法则可创建或销毁页面元素。

下一章将讲解 **事件绑定与解绑、事件对象与代理机制**。


# jQuery 讲义（第三章）：事件绑定与解绑、事件对象与代理

本章将系统讲解如何使用 jQuery 给 DOM 元素添加、移除事件监听器，如何使用事件对象获取交互信息，以及如何通过事件代理提高性能。

---

## 一、事件绑定的基本语法

jQuery 提供了多种方式来监听用户与网页的交互事件（如点击、键盘输入、鼠标悬停等）。

---

### 1. .on() —— 推荐的主力绑定方法

用于绑定一个或多个事件到一个或多个元素上。

#### 语法：

```javascript
$(selector).on(eventType, childSelector (可选), function);
```

#### 示例：绑定点击事件

```javascript
$("#btn").on("click", function() {
alert("按钮被点击了！");
});
```

---

### 2. 一次性事件绑定：.one()

该事件只触发一次，绑定后执行一次就自动解绑。

```javascript
$("#box").one("mouseenter", function() {
console.log("只触发一次的鼠标进入事件");
});
```

---

### 3. 常用快捷方法

jQuery 提供了简写方法用于绑定常见事件：

- .click()
- .dblclick()
- .mouseover()
- .mouseout()
- .mouseenter()
- .mouseleave()
- .keydown()
- .keyup()
- .focus()
- .blur()
- 等等

#### 示例：

```javascript
$("#image").click(function() {
$(this).toggleClass("active");
});
```

---

## 二、事件解绑

当不再需要响应事件时，可以使用 .off() 方法解绑事件。

#### 示例：

```javascript
function handleClick() {
alert("处理点击事件");
}

// 绑定
$("#btn").on("click", handleClick);

// 解绑
$("#btn").off("click", handleClick);
```

---

## 三、事件对象（event）

jQuery 为事件处理函数提供了一个参数 `event`，它是一个包含了当前事件相关信息的对象。

---

### 1. 获取事件类型与目标元素

```javascript
$("#panel").on("click", function(e) {
console.log("事件类型：" + e.type);     // click
console.log("事件目标：" + e.target);   // 被点击的元素
});
```

---

### 2. 阻止默认行为：e.preventDefault()

#### 示例：阻止链接跳转

```javascript
$("a").on("click", function(e) {
e.preventDefault();
alert("点击链接，但不跳转！");
});
```

---

### 3. 阻止事件冒泡：e.stopPropagation()

#### 示例：

```javascript
$("#child").on("click", function(e) {
e.stopPropagation();
alert("只触发子元素，不冒泡到父元素");
});
```

---

## 四、事件委托（事件代理）

事件委托是一种通过父元素来监听子元素事件的方法，适用于动态生成的元素，性能更高。

#### 原理：

利用事件冒泡，父元素绑定事件，子元素触发时由父元素统一处理。

#### 示例：

```javascript
// list 是 ul 元素，li 是动态添加的
$("#list").on("click", "li", function() {
alert("点击了列表项：" + $(this).text());
});
```

---

## 本章小结：

- 推荐使用 .on() 方法进行事件绑定；
- 所有事件都可通过事件对象 e 获取交互信息；
- 使用 .off() 解绑事件，.one() 绑定一次性事件；
- 事件委托可提升性能，尤其在处理动态内容时；

下一章将讲解 **动画与效果方法**，包括 show/hide、fade、slide、animate 等常用视觉交互手段。


# jQuery 讲义（第四章）：动画与效果方法

本章将深入讲解 jQuery 中用于展示、隐藏、淡入淡出、滑动等视觉动态交互的方法，帮助你轻松实现交互动画效果。

---

## 一、基础显示与隐藏

jQuery 提供了 .show()、.hide()、.toggle() 三个基本方法来控制元素的可见性。

---

### 1. .hide()

立即或缓慢隐藏元素。

#### 示例：

```javascript
$("#box").hide(); // 立即隐藏
$("#box").hide(1000); // 1 秒内渐隐隐藏
```

---

### 2. .show()

立即或缓慢显示元素。

```javascript
$("#box").show(); // 立即显示
$("#box").show("slow"); // 以慢速淡入显示
```

---

### 3. .toggle()

在显示与隐藏之间切换。

```javascript
$("#box").toggle(); // 若显示则隐藏，若隐藏则显示
```

---

## 二、淡入淡出动画

---

### 1. .fadeIn()

元素淡入（从透明变为可见）。

```javascript
$(".popup").fadeIn(); // 默认速度
$(".popup").fadeIn(500); // 0.5 秒内淡入
```

---

### 2. .fadeOut()

元素淡出（从可见变为透明）。

```javascript
$(".popup").fadeOut("slow");
```

---

### 3. .fadeToggle()

在 .fadeIn() 和 .fadeOut() 之间切换。

```javascript
$(".popup").fadeToggle();
```

---

### 4. .fadeTo()

将元素淡出到指定透明度（0~1）。

```javascript
$("#box").fadeTo(1000, 0.3); // 1 秒内淡到 30% 透明
```

---

## 三、滑动动画

---

### 1. .slideDown()

元素从上向下展开显示。

```javascript
$("#menu").slideDown();
```

---

### 2. .slideUp()

元素向上折叠隐藏。

```javascript
$("#menu").slideUp(400);
```

---

### 3. .slideToggle()

上下滑动切换状态。

```javascript
$("#menu").slideToggle();
```

---

## 四、自定义动画：.animate()

### 用于对元素执行 CSS 属性过渡动画。必须是数值型属性，如 left、opacity、height 等。

#### 语法：

```javascript
$(selector).animate({ properties }, speed, callback);
```

#### 示例：移动盒子

```javascript
$("#box").animate({
left: "200px",
opacity: 0.5,
width: "300px"
}, 1000, function() {
alert("动画完成！");
});
```

---

## 五、停止动画：.stop()

用于立即停止当前动画并保持状态。

```javascript
$("#box").stop(); // 停止正在运行的动画
```

---

## 六、延迟执行：.delay()

添加一个延迟等待时间（单位毫秒），常与动画链式操作结合使用。

```javascript
$("#box").fadeOut(500).delay(1000).fadeIn(500);
```

---

## 本章小结：

- .hide() / .show() / .toggle() 为基本可视控制；
- .fade* 系列用于实现透明度变化；
- .slide* 系列实现上下展开折叠；
- .animate() 可自定义复杂的动画过程；
- .stop() / .delay() 用于控制动画流的细节；

下一章将进入 jQuery 的核心数据通信功能：**Ajax 与远程数据交互**。


# jQuery 讲义（第五章）：Ajax 与远程数据交互

本章将深入讲解 jQuery 提供的 Ajax 功能，包括异步请求的基本用法、GET/POST 请求、加载外部数据、错误处理、JSON 解析等。

---

## 一、什么是 Ajax？

Ajax（Asynchronous JavaScript and XML）是一种在网页无需重新加载的情况下，能够与服务器交换数据并更新部分页面的技术。jQuery 对其进行了极大封装和简化。

---

## 二、$.ajax() —— 核心方法

这是最底层、最灵活的 Ajax 接口，可自定义各种参数。

### 语法结构：

```javascript
$.ajax({
url: "请求地址",
type: "GET" 或 "POST",
data: { key1: "value1", key2: "value2" },
dataType: "json", // 或 text, html, script
success: function(response) {
// 成功回调
},
error: function(xhr, status, error) {
// 错误回调
}
});
```

### 示例：获取 JSON 数据

```javascript
$.ajax({
url: "/api/user",
type: "GET",
dataType: "json",
success: function(data) {
console.log("用户名：" + data.name);
},
error: function() {
alert("请求失败");
}
});
```

---

## 三、快捷方法：$.get() 与 $.post()

---

### 1. $.get() —— 发送 GET 请求

```javascript
$.get("/api/time", function(data) {
$("#time").text(data);
});
```

---

### 2. $.post() —— 发送 POST 请求

```javascript
$.post("/login", { username: "admin", password: "123456" }, function(response) {
alert("登录结果：" + response.message);
});
```

---

## 四、加载外部 HTML 内容

---

### 1. .load() —— 将服务器返回的 HTML 加载进某个元素

```javascript
$("#content").load("/fragment.html");
```

### 带选择器加载局部内容：

```javascript
$("#content").load("/fragment.html #part1");
```

---

## 五、发送 JSON 数据

---

### 使用 $.ajax() + JSON.stringify() 发送 JSON：

```javascript
$.ajax({
url: "/api/save",
type: "POST",
contentType: "application/json",
data: JSON.stringify({
title: "新文章",
content: "这里是内容"
}),
success: function(res) {
alert("保存成功！");
}
});
```

---

## 六、全局 Ajax 事件监听（可选）

### 常用于 loading 效果、统一错误处理等。

```javascript
$(document).ajaxStart(function() {
$("#loading").show();
});

$(document).ajaxStop(function() {
$("#loading").hide();
});
```

---

## 七、JSON 数据处理注意事项

- JSON 是 Ajax 的常见数据格式；
- 响应头必须为 `Content-Type: application/json`；
- jQuery 会自动将 JSON 字符串转换为 JavaScript 对象；

---

## 本章小结：

- $.ajax() 提供了完整的参数配置，适用于复杂场景；
- $.get() / $.post() / .load() 是快速调用的简化接口；
- JSON 数据格式是前后端通信的主流；
- jQuery Ajax 提供了强大的回调与错误处理机制；