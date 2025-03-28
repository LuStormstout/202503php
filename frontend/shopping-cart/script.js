$(function () {

// 商品列表（固定）
    const productList = [
        {id: 1, name: "无线耳机", price: 199, img: "images/earbuds.jpg"},
        {id: 2, name: "充电宝", price: 129, img: "images/powerbank.jpg"},
        {id: 3, name: "显示器", price: 899, img: "images/monitor.jpg"},
        {id: 4, name: "键盘", price: 299, img: "images/keyboard.jpg"}
    ];

// 渲染商品
    $.each(productList, function (index, item) {
        const html = `
<div class="product-card">
<img src="${item.img}" alt="">
<div class="info">
<h3>${item.name}</h3>
<div class="price">￥${item.price}</div>
<button class="add" data-id="${item.id}">加入购物车</button>
</div>
</div>
`;
        $("#products-container").append(html);
    });

// 加入购物车（避免重复项）
    $("#products-container").on("click", ".add", function () {
        const id = $(this).data("id");
        const item = productList.find(p => p.id === id);
        const row = $("#cart-body tr[data-id='" + id + "']");

        if (row.length > 0) {
            const qty = parseInt(row.find(".qty").text()) + 1;
            row.find(".qty").text(qty);
            row.find(".subtotal").text((qty * item.price).toFixed(2));
        } else {
            const html = `
        <tr data-id="${item.id}">
          <td>${item.name}</td>
          <td>${item.price}</td>
          <td>
            <button class="dec">-</button>
            <span class="qty">1</span>
            <button class="inc">+</button>
          </td>
          <td class="subtotal">${item.price}</td>
          <td><button class="remove">删除</button></td>
        </tr>
      `;
            $("#cart-body").append(html);
        }

        updateTotal();
    });

// 数量加减
    $("#cart-body").on("click", ".inc, .dec", function () {
        const row = $(this).closest("tr");
        const id = row.data("id");
        const item = productList.find(p => p.id === id);
        let qty = parseInt(row.find(".qty").text());

        if ($(this).hasClass("inc")) {
            qty++;
        } else {
            if (qty > 1) qty--;
        }

        row.find(".qty").text(qty);
        row.find(".subtotal").text((qty * item.price).toFixed(2));
        updateTotal();
    });

// 删除商品
    $("#cart-body").on("click", ".remove", function () {
        $(this).closest("tr").remove();
        updateTotal();
    });

// 更新合计金额
    function updateTotal() {
        let total = 0;
        $("#cart-body .subtotal").each(function () {
            total += parseFloat($(this).text()); // total = total + parseFloat($(this).text());
        });
        $("#total-amount").text(total.toFixed(2));
    }

});