let cart = [];

function addToCart(serviceName) {
    cart.push(serviceName);
    alert(`تمت إضافة الخدمة "${serviceName}" إلى السلة.`);
    console.log("السلة الحالية:", cart);
}
