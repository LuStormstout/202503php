document.addEventListener('keydown', function (event) {
    // let key = event.key;
    // let code = event.code;
    //
    // document.getElementById('keydown-event-output').innerHTML = `你按下了 ${key} 鍵，代碼是 ${code}`;
});

document.addEventListener('submit', function (event) {
    event.preventDefault(); // 阻止表单地默认提交行为

    let form = event.target; // 获取表单元素
    let formData = new FormData(form); // 创建 FormData 对象

    console.log(formData.entries());

    let data = {}; // 创建一个空对象，用于存放表单数据
    for (let [key, value] of formData.entries()) {
        data[key] = value;
    }

    document.getElementById('submit-event-output').innerHTML = JSON.stringify(data);
});

// 移除事件监听
function handleClick(event) {
    alert('按钮被点击了');
}

let button = document.getElementById('remove-event-listener');
button.addEventListener('click', handleClick);
button.removeEventListener('click', handleClick);

let parent = document.getElementById('parent');
let child = document.getElementById('child');

parent.addEventListener('click', function () {
    alert('父元素被点击了');
});

child.addEventListener('click', function (event) {
    event.stopPropagation(); // 阻止事件冒泡
    alert('子元素被点击了');
});

// console.dir(parent);

// JS 中的对象和类
// 对象就是把一类事物抽象出来，用属性和方法(行为)来描述

// 直接创建对象
let person = {
    name: '张三', age: 20, sayHello: function () {
        console.log(`Hello, my name is ${this.name}`);
    }, eat: function () {
        console.log(this.name + ' am eating');
    }
};

person.sayHello();
person.eat();
console.log(person.name);

// 使用构造函数创建对象
function Person(name, age) {
    this.name = name;
    this.age = age;
}

let student = new Person('李四', 18);
console.log(student.name);

// 使用 class 关键字创建类
class Animal {
    constructor(name) {
        this.name = name;
    }

    sayHello() {
        console.log(`Hello, my name is ${this.name}`);
    }
}

let cat = new Animal('Tom'); // 通过类创建对象
cat.sayHello();

class Car {
    constructor(brand, price) {
        this.brand = brand;
        this.price = price;
    }

    run() {
        console.log(`${this.brand} is running`);
    }
}

let bmw = new Car('BMW', 300000);
console.log(bmw.brand);

// 继承
class Dog extends Animal {
    bark() {
        console.log('汪汪汪');
    }
}

let dog = new Dog('旺财');
dog.sayHello();
dog.bark();
// cat.bark(); // 报错

// JS 中的异步编程
// 同步代码, 顺序执行
// 异步代码, 不会阻塞后续代码执行
// Promise, async/await, callback

// let promise = new Promise((resolve, reject) => {
//     setTimeout(() => {
//         resolve('Hello, Promise');
//     }, 2000); // 2 秒后执行
// });
//
// promise.then((value) => {
//     console.log(value);
// });
//
// console.log('Promise called');

// async function fetchData() {
//     // 通过 fetch 获取数据
//     let response = await fetch('https://jsonplaceholder.typicode.com/posts');
//     // 把 response 对象转换为 JSON 格式
//     let data = await response.json();
//     console.log(data);
// }
//
// fetchData().then(r => console.log('fetchData done'));
//
// console.log('fetchData called');

// 错误处理
try {
    $element = document.getElementById('not-exist');
    $element.addEventListener('click', function () {
        alert('元素被点击了');
    });
    console.log($element);
} catch (error) {
    console.error('发生错误: ' + error.message);
} finally {
    // 无论是否发生错误，都会执行
    console.log('finally');
}

// 自定义错误
function divide(a, b) {
    if (b === 0) {
        throw new Error('除数不能为 0. (这是一个自定义错误)');
    }
    return a / b;
}

try {
    console.log(divide(10, 0));
} catch (error) {
    console.error('发生错误: ' + error.message);
}


// DOM 操作
// 获取元素
let heading = document.getElementById('heading');
// .textContent 获取元素的文本内容
console.log(heading.textContent);

let items = document.getElementsByClassName('item');
// console.log(items);
// console.log(items[0].textContent);
for (let item of items) {
    if (item.textContent === 'PHP') {
        item.style.color = 'red';
    }
    console.log(item.textContent);
}

let liElement = document.getElementsByTagName('li'); // 获取所有 li 元素
let liElementPython = document.getElementsByTagName('li')[1]; // 获取第二个 li 元素
liElementPython.style.color = 'blue';

let itemElementJava = document.querySelector('.item'); // 获取第一个匹配的元素
itemElementJava.style.color = 'green';
itemElementJava.textContent = 'Go';
// let itemElementGo = itemElementJava

let itemElements = document.querySelectorAll('.item'); // 获取所有匹配的元素
let itemElementJavaScript = document.querySelectorAll('.item')[2]; // 获取第三个匹配的元素
// .forEach() 方法遍历所有元素
itemElements.forEach(function (item) {
    console.log(item.textContent);
});
itemElementJavaScript.style.color = 'purple';

// JS 操作 DOM 对象的使用场景示例
// 这里因为我们没有学习后端网络请求相关的东西, 所以直接定义了一个 userinfo 用来模拟到服务器获取到的数据
let getUserinfoElement = document.getElementById('get-userinfo');
getUserinfoElement.addEventListener('click', function () {
    // 获取用户信息, 这里因为我们...
    // fetch('http://localhost:8080/get-userinfo')
    //     .then(
    //         // 这里就可以将获取到的数据显示在页面上
    //     )

    let userinfo = {
        username: 'LuStormstout', email: 'lustromstout@gmail.com'
    }

    // 将用户信息使用 JS 的 DOM 操作来显示在页面上
    let userinfoElement = document.getElementById('userinfo');
    for (let key in userinfo) {
        let liElement = document.createElement("li")
        liElement.textContent = key + " : " + userinfo[key];
        userinfoElement.appendChild(liElement)
        // console.log('key: ' + key + " value: " + userinfo[key])
    }
});
