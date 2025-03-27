// 计时器开始
let timer = document.getElementById('timer');
let start = document.getElementById('start');
let stop = document.getElementById('stop');
let reset = document.getElementById('reset')

let count = 0;
let interval;

start.addEventListener('click', () => {
    // setInterval(callback, time) 这是计时器函数，每隔 time 时间执行一次 callback 函数
    interval = setInterval(() => {
        count++; // count = count + 1
        timer.innerText = count;
    }, 1000); // 1000ms = 1s
});

stop.addEventListener('click', () => {
    // clearInterval(interval) 这是清除计时器函数
    clearInterval(interval);
    interval = null;
});

reset.addEventListener('click', () => {
    clearInterval(interval);
    interval = null;
    count = 0;
    timer.innerText = count;
});
// 计时器结束

// 计算 BMI 开始
function calculateBMI() {
    let weight = parseFloat(document.getElementById('weight').value);
    let height = parseFloat(document.getElementById('height').value);

    // NaN 是 Not a Number 的缩写, 表示不是一个数字
    if (isNaN(weight) || weight <= 2.5) {
        alert("请输入有效体重");
        return;
    }

    if (isNaN(height) || height <= 50) {
        alert("请输入有效身高");
        return;
    }

    // 计算 BMI
    let bmi = weight / (height * height) * 10000;
    bmi = bmi.toFixed(2);
    let resultElement = document.getElementById('bmi-result');

    let innerHTML = "你的 BMI 值是: " + bmi;

    // 计算结果result
    if (bmi < 18.5) {
        resultElement.innerHTML = innerHTML + " 体重过轻";
    } else if (bmi < 24) {
        resultElement.innerHTML = innerHTML + " 体重正常";
    } else if (bmi < 28) {
        resultElement.innerHTML = innerHTML + " 体重过重";
    } else if (bmi < 35) {
        resultElement.innerHTML = innerHTML + " 体重肥胖";
    } else {
        resultElement.innerHTML = innerHTML + " 体重非常肥胖";
    }
}

// 阻止表单提交的默认行为
document.getElementById('bmi-form').onsubmit = function (event) {
    event.preventDefault();
};

// 监听按钮点击事件
document.getElementById('btn-calculate').onclick = function () {
    calculateBMI();
};
// 计算 BMI 结束