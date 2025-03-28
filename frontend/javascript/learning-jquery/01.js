// 学习 jQuery

// document.getElementById('title').style.display = 'none';
$('#title').hide(); // 隐藏元素

// ID 选择器
// document.getElementById('title').style.background-color = '#B2B2B2';
$("#header").css("background-color", "#B2B2B2"); // 设置元素的样式

// 类选择器
$(".content").addClass('active'); // 添加类名

// 标签选择器
// $("p").text('Hello World!'); // 设置元素的文本内容

// 通配符选择器
// $("*").css("margin", "0"); // 设置所有元素的 margin 为 0

// 多重选择器
// $("h1, p, .note").hide(); // 隐藏多个元素

// 后代选择器(空格)
// $("p .note").css("color", "red"); // 设置后代元素的样式

// 直接子元素选择器(>), 会选择 class 为 content-5 的元素下面的所有 span 元素
$(".content-5 > span").css("color", "#00FF00"); // 设置子元素的样式

// 兄弟选择器(+), 会选择 class 为 content-2 的元素后面的第一个 p 元素
$("#content-2 + p").css("color", "#FF0000"); // 设置兄弟元素的样式


// 内容操作

// .html 和 .text 方法都可以用于获取元素的内容, 但是 .html 方法会返回元素的 HTML 内容, 而 .text 方法会返回元素的文本内容, 设置的时候也是一样的, .html 方法会设置元素的 HTML 内容, 而 .text 方法会设置元素的文本内容
// 获取元素
let titleElement = $("#title");

// 获取或设置 HTML 内容
let html = titleElement.html();

// 获取元素的文本内容
let text = titleElement.text();
console.log(html, text);

// 设置元素的 HTML 内容, 会覆盖原有标签内的内容
let content6 = $("#content-6")
content6.html("<h2>这是一个标题</h2>"); // 设置元素的 HTML 内容
content6.text("<h1>这是一个标题</h1>"); // 设置元素的文本内容, 会覆盖原有标签内的内容


// .val 方法用于获取或设置表单元素的值
let input = $("#input-1");
let value = input.val();
console.log(value);
input.val("Hello World!");

// .attr 方法用于获取或设置元素的属性
let link = $("#link-1");
let href = link.attr("href");
console.log(href);
link.attr("href", "https://lustormstout.com");
link.text("跳转到 Lustormstout");

// .removeAttr 方法用于移除元素的属性
let input2 = $("#input-2");
input2.removeAttr("disabled");
input2.removeAttr("placeholder");

// .prop 方法用于获取或设置元素的属性, 推荐获取或者设置布尔类型的属性时使用 .prop 方法, 如 checked, disabled, selected 等
let optionChengdu = $("#city option[value='chengdu']");
let isSelected = optionChengdu.prop("selected");
console.log(isSelected);

// .addClass 方法用于添加类名
// .removeClass 方法用于移除类名
// .hasClass 方法用于判断元素是否包含某个类名, 返回 true 或 false
let btn1 = $("#btn-1");
if (!btn1.hasClass("btn-bg")) {
    btn1.addClass("btn-bg");
}
// btn1.removeClass("btn-bg");

// 结构操作
// .append 方法用于在元素内部的最后面添加内容
// .prepend 方法用于在元素内部的最前面添加内容
// .after 方法用于在元素后面添加内容
// .before 方法用于在元素前面添加内容
// .remove 方法用于移除元素
// .empty 方法用于移除元素内部的所有内容

let main = $("#main");
// main.append("<h1>我在最后面添加了一个标题</h1>");
// main.prepend("<h1>我在最前面添加了一个标题</h1>");
let mainList = $("#main-ul");
mainList.prepend("<li>这是第零个 li</li>");
mainList.append("<li>这是第六个 li</li>");
mainList.after("<p>这是一个 p 标签</p>");
mainList.before("<p>这是一个 p 标签</p>");
mainList.children()[0].remove(); // 移除第一个 li, .children 方法返回的是一个数组, 里面包含了所有的子元素, 可以通过索引来获取子元素
mainList.empty(); // 移除所有的 li, 但是保留了 ul 标签

// 事件操作
// .on 方法用于绑定事件, 第一个参数是事件名称, 第二个参数是事件处理函数
let btn2 = $("#btn-2");
btn2.on("click", function () {
    alert("Hello World!");
});
btn2.on("mouseover", function () {
    btn2.css("background-color", "#FF0000");
});
btn2.on("mouseout", function () {
    btn2.removeAttr("style");
});

// .one 方法用于绑定事件, 但是只会执行一次
let btn3 = $("#btn-3");
btn3.one("click", function () {
    alert("Hello World!");
});

// .focus 方法用于绑定 focus 事件
let input3 = $("#input-3");
input3.focus(function () {
    input3.attr("value", "");
});

// .off 方法用于解绑事件
function clickHandler() {
    alert("这是 btn 4 的 click 事件");
}

let btn4 = $("#btn-4");
btn4.on("click", clickHandler);
btn4.off("click", clickHandler);

// 事件对象
let btn5 = $("#btn-5");
btn5.on("click", function (event) {
    console.log(event);
    console.log(event.target);
    console.log(event.currentTarget);
    console.log(event.type);
    console.log(event.clientX, event.clientY);
});

// 事件委托
let list = $("#list");
list.on("click", "li", function () {
    alert("点击了列表项：" + $(this).text());
});

// 动画操作
// .hide 方法用于隐藏元素
// .show 方法用于显示元素
// .toggle 方法用于切换元素的显示和隐藏
// .fadeIn 方法用于淡入元素
// .fadeOut 方法用于淡出元素
// .fadeToggle 方法用于切换元素的淡入和淡出
// .slideUp 方法用于滑动隐藏元素
// .slideDown 方法用于滑动显示元素
// .slideToggle 方法用于切换元素的滑动显示和隐藏
let box = $("#box");
// box.hide('slow');
box.hide();
box.show('slow');

let box2 = $("#box-2");
// box2.hide();
let toggleBox2Btn = $("#toggle-box-2");
toggleBox2Btn.on("click", function () {
    box2.toggle();
});

let box3 = $("#box-3");
// box3.fadeOut(1000);
// box3.fadeIn(2000);
// box3.fadeTo(1000, 0.5);
//
// list.hide();
// list.slideDown(3000); // 从上往下滑动显示
// list.slideUp(3000); // 从下往上滑动隐藏
// list.slideToggle(3000); // 切换滑动显示和隐藏

// Ajax 操作
let ajaxBtn = $("#ajax-btn");
let ajaxContentUl = $("#ajax-content-ul");
ajaxBtn.on("click", function () {
    $.ajax({
        url: "https://jsonplaceholder.typicode.com/posts",
        method: "GET",
        dataType: "json",
        success: function (data) {
            data.forEach(function (item) {
                ajaxContentUl.append(
                    "<li>UserID: " + item.userId +
                    ", ID: " + item.id +
                    ", Title: " + item.title +
                    ", Body: " + item.body + "</li>");
            });
        },
        error: function (error) {
            console.log(error.message);
        }
    });
});

// ajaxBtn.get(
//     "https://jsonplaceholder.typicode.com/posts",
//     function (data) {
//         data.forEach(function (item) {
//             ajaxContentUl.append(
//                 "<li>UserID: " + item.userId +
//                 ", ID: " + item.id +
//                 ", Title: " + item.title +
//                 ", Body: " + item.body + "</li>");
//         });
//     },
//     "json"
// ).success(function () {
//     console.log("请求成功");
// }).error(function () {
//     console.log("请求失败");
// });

ajaxBtn.on("click", function () {
    $.ajax({
        url: "https://jsonplaceholder.typicode.com/posts",
        method: "POST",
        dataType: "json",
        formData: {
            userId: 1,
            title: "Hello World!",
            body: "Hello World!"
        },
        success: function (data) {
            console.log(data);
        },
        error: function (error) {
            console.log(error.message);
        }
    });
});
