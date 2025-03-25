// alert("你好东京123!");

// 变量与数据类型
// 变量: 用来存储数据的容器
// 数据类型: 用来表示数据的类型

// 1. 声明变量
// var、let、const
// var username = "张三";
// const username = "张三";
// let username = "张三";
let age = 18;
const PI = 3.14;

// 2. 数据类型
// 基本数据类型: numBer、String、Boolean、Null、Undefined、Object、Array、Function
// numBer: 数字类型
let studentCount = 8; // 整数
let tall = 1.75; // 小数、浮点数

// String: 字符串类型
let username = "LuStormstout";
let address = '东京市港区';
console.log(username)

// Boolean: 布尔类型
let isAdmin = true; // 真、对、是
let isLogin = false; // 假、错、否

// Null: 空值
let orders = null; // 空值

// Undefined: 未定义
let age1; // undefined
console.log(age1);

// Object: 对象类型
let userInfo = {
    username: "LuStormstout", age: 18, address: "东京市港区"
};
console.log(userInfo);

// Array: 数组类型
let colors = ["red", "green", "blue"];
let scores = [80, 90, 100];
console.log(colors);
console.log(scores);

// Function: 函数类型
function sayHello(username) {
    return "Hello " + username;
}

console.log(sayHello("LuStormstout"));

// 3. 类型检测
console.log(typeof studentCount); // numBer
console.log(typeof username); // string
console.log(typeof isAdmin); // boolean
console.log(typeof orders); // object
console.log(typeof scores); // object

// 4. 运算符
// 算术运算符: +、-、*、/、%、++、--
let numA = 10;
let numB = 3;

console.log(numA + numB); // 13
console.log(numA - numB); // 7
console.log(numA * numB); // 30
console.log(numA / numB) // 3.3333333333333335
console.log(numA % numB); // 1
numA++; // 10 numA = numA + 1
console.log(numA); // 11
numB--; // 3 numB = numB - 1
console.log(numB); // 2

let productPrice = 100;
let productCount = 3;
let totalPrice = productPrice * productCount;
console.log(totalPrice);

// 比较运算符: >、<、>=、<=、==、!=、===、!==
let liScore = "80";
let zhangScore = 90;
let wangScore = 80;
console.log(liScore > zhangScore); // false
console.log(liScore < zhangScore); // true
console.log(liScore >= zhangScore); // false
console.log(liScore <= zhangScore); // true
console.log(liScore == wangScore); // true、等于, 不判断类型
console.log(liScore != wangScore); // false、不等于, 不判断类型
console.log(liScore === wangScore); // false、全等于, 类型也要相等, 且值相等
console.log(liScore !== wangScore); // true、不全等于, 类型不相等, 或值不相等
// 在工作中, 建议使用 ===、!==, 严格比较

// 逻辑运算符: &&、||、!
let isLogin1 = true;
let isAdmin1 = false;
console.log(isLogin1 && isAdmin1); // false, 且/与/并且/and, 两者都为真, 结果为真
console.log(isLogin1 || isAdmin1); // true, 或/or, 两者有一个为真, 结果为真
console.log(!isLogin1); // false, 非/not, 取反

// 流程控制
// 1. 条件语句 if...else
// if (条件) { 代码块 }
// if (条件) { 代码块 } else { 代码块 }
// if (条件) { 代码块 } else if (条件) { 代码块 } else { 代码块 }

let isLogin2 = true;
if (isLogin2) {
    console.log("已登录");
} else {
    console.log("未登录");
}

let score = 80;
if (score >= 90) {
    console.log("优秀");
} else if (score >= 80) {
    console.log("良好");
} else if (score >= 60) {
    console.log("及格");
}

// 2. 三元运算符
// 条件 ? 结果1 : 结果2
let isMember = true;
let price = isMember ? 80 : 100;
console.log(price);

// let price = null;
// if (isMember) {
//     price = 80;
// }else {
//     price = 100;
// }
// console.log(price);

// 3. switch...case
// switch (变量) { case 值1: 代码块1; break; case 值2: 代码块2; break; default: 代码块3; }
// 我们一般会在情况有限且明确的情况下使用 switch...case
let day = 2;
switch (day) {
    case 1:
        console.log("星期一");
        break;
    case 2:
        console.log("星期二");
        break;
    case 3:
        console.log("星期三");
        break;
    default:
        console.log("没有找到对应的星期");
}

