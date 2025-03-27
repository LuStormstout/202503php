// 循环结构

// for (初始化; 条件; 迭代) {
//     // 循环体
// }

// i++ 代表 i = i + 1
// i 是变量，可以是任意的变量名, 但是需要注意的是, 变量的命名要有意义, 要做到见名知意

console.log("---------- for 循环 ----------");

for (let i = 0; i < 5; i++) {
    console.log("当前值为：" + i);
}

// 在这个 for 循环中的代码执行顺序是这样的：
// 1. 初始化：let i = 0; 这个只执行一次
// 2. 条件：i < 5; 每次循环都会执行, 如果条件为 true, 则执行循环体, 否则退出循环
// 3. 循环体：console.log("当前值为：" + i); 每次循环都会执行
// 4. 迭代：i++，i = i + 1; 每次循环都会执行
// 5. 条件：i < 5; 迭代完之后, 再次判断条件, 如果条件为 true, 则执行循环体, 否则退出循环
// 6. 循环体：console.log("当前值为：" + i); 继续执行循环体
// ...... 直到条件为 i < 5 不成立, 退出循环


// while 循环
// while (条件) {
//     // 循环体
// }

console.log("---------- while 循环 ----------");

let i = 0;
while (i < 5) {
    console.log("当前值为：" + i);
    i++;
}


// do while 循环
// do {
//     // 循环体
// } while (条件);

console.log("---------- do while 循环 ----------");

let j = 0;
do {
    console.log("当前值为：" + j);
    j++;
} while (j < 5);


// for in 循环, 用于遍历对象的属性, 也可以用于遍历数组
// for (let 变量 in 对象) {
//     // 循环体
// }

console.log("---------- for in 循环 ----------");

let userInfo = {
    username: "张三", age: 20, city: "东京"
};

let phones = ["iPhone", "三星", "小米"];

// 数组的最大索引值是数组长度减一

// phones[index] 代表数组 phones 中的第 index 个元素

// for (let i = 0; i < phones.length; i++) {
//     console.log(phone[i]);
// }

// console.log(userInfo["city"]);
// console.log(phones[0]);

for (let key in userInfo) {
    console.log(key + ": " + userInfo[key]);
}


// for of 循环, 用于遍历数组, 也可以用于遍历字符串
// for (let 变量 of 数组) {
//     // 循环体
// }

console.log("---------- for of 循环 ----------");

for (let phone of phones) {
    console.log(phone);
}

let username = "Lu";

for (let byte of username) {
    console.log(byte);
}


// break 语句, 用于退出循环. 一旦执行 break 语句, 循环就会立即终止
// continue 语句, 用于跳过当前循环中的代码, 直接进入下一次循环

console.log("---------- break ----------");

for (let i = 0; i <= 10; i++) {
    if (i === 3) {
        break;
    }
    console.log("当前值为：" + i);
}

console.log("---------- continue ----------");

for (let i = 0; i <= 10; i++) {
    if (i === 5) {
        continue;
    }
    console.log("当前值为：" + i);
}


// 函数
// function 函数名(参数1, 参数2, ...) {
//     // 函数体
// }
// 函数名(参数1, 参数2, ...); 调用函数

console.log("---------- 函数 ----------");

// 函数声明
function add(a, b) {
    return a + b;
}

let sum = add(10, 20);
console.log(sum);

// 函数表达式
let totalPrice = function (price, count) {
    return price * count;
}
console.log(totalPrice(5, 2));

// 箭头函数
let divide = (a, b) => a / b;
console.log(divide(10, 2));

// 函数的参数
// 1. 形式参数(形参)和实际参数(实参), 形参是函数定义时的参数, 实参是函数调用时传入的参数
// 2. 形参可以有默认值, 如果调用函数时没有传入实参, 则使用默认值
// 3. 函数的参数可以是任意类型, 包括函数
// 4. 函数的参数可以是不定参数, 通过 ... 来实现

console.log("---------- 函数的参数 ----------");

function sayHello(name = "张三") {
    console.log("你好, " + name);
}

sayHello("李四");
sayHello();

function sayHi(name, age, callback) {
    console.log("你好, " + name + ", 今年" + age + "岁");
    callback();
}

sayHi("王五", 25, function () {
    console.log("这是回调函数");
});

// a += b; -> a = a + b;
// a -= b; -> a = a - b;
// a *= b; -> a = a * b;

function sumAll(...args) {
    // console.log(typeof args);
    // console.log(args);

    let sum = 0;
    for (let arg of args) {
        sum += arg; // sum = sum + arg; -> sum = 0 + 1 -> sum = 1 + 3 -> sum = 4 + 4 -> sum = 8 + 5 -> sum = 13 + 100
    }
    return sum;
}

console.log(sumAll(1, 3, 4, 5, 100));

// 参数的解构赋值
// 1. 对象的解构赋值
// 2. 数组的解构赋值

console.log("---------- 参数的解构赋值 ----------");

function printInfo({name, age}) {
    console.log("姓名：" + name + ", 年龄：" + age);
}

let user = {name: "张三", age: 20};
printInfo(user);

// 在函数里面使用 return 语句, 可以返回任意类型的值, 也可以返回函数
// return 语句后面的代码不会被执行
// 如果函数没有 return 语句, 则返回 undefined

function sayGoodbye() {
    // return "再见";
}

let goodbye = sayGoodbye();
console.log(goodbye); // undefined

// 递归函数
// 递归函数是指在函数内部调用自身的函数
// 递归函数必须有一个结束条件, 否则会导致无限循环

console.log("---------- 递归函数 ----------");

// 某公司
// |
// |---> 财务部门
// |     |--- 出纳
// |     |--- 会计
// |
// |---> 人事部门
// |     |--- 招人的
// |     |--- 培训的
// |
// |---> 技术部门
//       |---- 前端
//       |---- 后端
//       |     |----- PHP
//       |     |----- Java
//       |     |----- Python
//       |---- 测试

const tree = {
    name: 'root', children: [{
        name: 'folder1', children: [{
            name: 'folder1-1', children: []
        }]
    }, {
        name: 'folder2', children: []
    }]
};

/**
 * 获取文件夹的深度
 *
 * @param node
 * @returns {number}
 */
function getTreeDepth(node) {
    // 结束条件, 如果节点没有子节点, 则返回 1
    if (!node.children || node.children.length === 0) {
        return 1;
    }

    let maxChildDepth = 0; // 子节点的最大深度

    // 遍历子节点
    for (const child of node.children) {

        // 递归调用 getTreeDepth 函数, 获取子节点的深度
        const childDepth = getTreeDepth(child);

        // 如果子节点的深度大于 maxChildDepth, 则更新 maxChildDepth
        if (childDepth > maxChildDepth) {
            maxChildDepth = childDepth;
        }
    }

    // 如果节点有子节点, 则返回子节点的最大深度 + 1
    return maxChildDepth + 1;
}

console.log(getTreeDepth(tree)); // 3

// 我们的电脑主要有哪些硬件呢？
// CPU、内存、硬盘、输入设备、输出设备

// 递归函数的缺点
// 1. 递归函数会占用大量的内存, 因为每次调用函数都会在内存中开辟一个新的栈帧
// 2. 递归函数的性能比较差, 因为每次调用函数都会有一定的开销
// 3. 递归函数的层级不能太深, 否则会导致栈溢出


// 作用域
// 1. 全局作用域
// 2. 函数作用域
// 3. 块级作用域

console.log("---------- 作用域 ----------");

// 全局作用域
let globalVar = 100;

function testScope() {
    // 函数作用域
    let localVar = 200;
    console.log("在函数体内部访问函数作用域下的变量：" + localVar);
    console.log("这是在函数内部访问全局作用域的变量：" + globalVar);
}

testScope();
console.log("这是在函数「外部」访问全局作用域的变量：" + globalVar);

// console.log(localVar); // ReferenceError: localVar is not defined

// 块级作用域
{
    let blockVar = 300;
    console.log("在「代码块内部」调用块级作用域下的变量：" + blockVar);
}

// console.log(blockVar); // ReferenceError: blockVar is not defined


// 闭包
// 闭包是指函数和函数内部能访问到的变量的组合
// 闭包可以让函数访问到函数外部的变量, 即使函数已经执行完成

console.log("---------- 闭包 ----------");

function createCounter() {
    let count = 0;
    return function () {
        count++; // count = count + 1;
        return count;
    }
}

let counter = createCounter();
// counter = function () {count++; return count;}
console.log(counter()); // 1
console.log(counter()); // 2

// 闭包的应用场景: 1. 模块化开发 2. 防抖和节流 3. 保存变量 4. 缓存数据


// JS 事件处理
// 事件是用户和浏览器之间的交互
// 事件处理是指在事件发生时执行的代码

// 常见的事件
// 1. 鼠标事件: click, dblclick, mouseover, mouseout, mousedown, mouseup, mousemove
// 2. 键盘事件: keydown, keyup, keypress
// 3. 表单事件: submit, change, focus, blur
// 4. 窗口事件: load, resize, scroll, unload
// 5. 其他事件: error, contextmenu, copy, cut, paste

console.log("---------- 事件处理 ----------");

// document 是一个对象, 代表整个 HTML 文档
// window 是一个对象, 代表浏览器窗口
// JS 中已经帮我们封装好了很多对象以及对象的方法, 我们只需要调用即可

// console.dir(document); // 查看对象的属性和方法

document.getElementById("btn-onclick").onclick = function () {
    alert("这是鼠标点击事件");
}

document.getElementById("btn-dblclick").ondblclick = function () {
    alert("这是鼠标双击事件");
}

// 鼠标移入事件, 当鼠标移入按钮时, 按钮的背景颜色变为 #FF0080
document.getElementById("btn-mouseover").onmouseover = function () {
    document.getElementById("btn-mouseover").style.backgroundColor = "#FF0080";
}
document.getElementById("btn-mouseover").onmouseout = function () {
    document.getElementById("btn-mouseover").style.backgroundColor = "#4C4C4C";
}

document.getElementById("username").onfocus = function () {
    document.getElementById("username").style.backgroundColor = "#E5E5E5";
}
document.getElementById("username").onblur = function () {
    document.getElementById("username").style.backgroundColor = "#ffffff";
}

// 同学们自己去尝试其他事件
