// calculateBMI.js

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

    // 计算结果result
    if (bmi < 18.5) {
        resultElement.innerHTML = "你的 BMI 值是: " + bmi + " 体重过轻";
    } else if (bmi < 24) {
        resultElement.innerHTML = "你的 BMI 值是: " + bmi + " 体重正常";
    } else if (bmi < 28) {
        resultElement.innerHTML = "你的 BMI 值是: " + bmi + " 体重过重";
    } else if (bmi < 35) {
        resultElement.innerHTML = "你的 BMI 值是: " + bmi + " 体重肥胖";
    } else {
        resultElement.innerHTML = "你的 BMI 值是: " + bmi + " 体重非常肥胖";
    }
}

// 监听按钮点击事件
document.getElementById('btn-calculate').onclick = function () {
    calculateBMI();
}