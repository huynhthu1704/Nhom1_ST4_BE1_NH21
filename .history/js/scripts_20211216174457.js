let gio = new Date("Jan 5, 2022 15:37:25").getTime();
function clock() {
  let now = new Date().getTime();
  let distance = gio - now;
  let day = Math.floor(distance / (1000 * 60 * 60 * 24));
  let hour = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minute = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  let second = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("D").innerHTML = day;
  document.getElementById("H").innerHTML = hour;
  document.getElementById("M").innerHTML = minute;
  document.getElementById("S").innerHTML = second;
  if (distance < 0) {
    document.getElementById("D").innerHTML = "Đã";
    document.getElementById("H").innerHTML = "hết";
    document.getElementById("M").innerHTML = "khuyễn";
    document.getElementById("S").innerHTML = "mãi";
  }
}
clock();
setInterval(clock, 1000);

function addCart(id, qty) {
  // nếu số lượng = 0 tức là sản phẩm đang được add từ input, kiểm tra input nhập vào có đủ sản phẩm hay không
  if (qty == 0) {
    let proID = "pro" + id;
    qty = Number(document.getElementById(proID).value);
    document.getElementById(proID).value = 1;
  }
  // Kiểm tra số lượng sản phẩm đã thêm vào
  let addedQty = 0;
  if (document.getElementById("qty" + id)) {
    addedQty = Number(document.getElementById("qty" + id).innerHTML);
  }
  // Kiểm tra sản phẩm trong kho
  let qtyInStock = 0;
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function () {
    qtyInStock = Number(this.responseText);
    // Nếu sản phẩm định thêm vào + đã thêm > sp trong kho thì thông báo hết hàng
    if (qty + addedQty > qtyInStock) {
      alert("Out of stock");
      // ngược lại thêm vào session và thay đổi hiển thị cho phù hợp
    } else {
      xmlhttp.onload = function () {
        let item = this.responseText.split("#");
        document.getElementById("qty").innerHTML = item[1];
        document.getElementById("totalPro").innerHTML = item[1];
        document.getElementById("subtotal").innerHTML = item[0]
          .toString()
          .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        if (document.getElementById("price-detail-subtotal")) {
          document.getElementById("price-detail-subtotal").innerHTML =
            item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
          document.getElementById("price-detail-total").innerHTML =
            item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
          document.getElementById("price-detail-qty").innerHTML = item[1];
        }
        let proQty = item[2];
        let cartList = document.getElementById("cart-list");
        let check = document.getElementById(proQty);
        if (check && check !== "null" && check !== "undefined") {
          let sl = Number(check.innerHTML);
          check.innerHTML = sl + qty;
        } else {
          cartList.insertAdjacentHTML("beforeend", item[3]);
        }
      };
      xmlhttp.open("GET", "cart-handle.php?id=" + id + "&pro-qty=" + qty);
      xmlhttp.send();
    }
  };
  xmlhttp.open("GET", "check-product-qty.php?id=" + id);
  xmlhttp.send();
}

function addToWishlist(id) {
  let wlID = "h" + id;
  let wlItem = document.querySelectorAll("." + wlID);
  //for (let i = 0; i < wlID.length; i++) {
  let xmlhttp = new XMLHttpRequest();
  if (wlItem[0].classList.contains("wishlist-icon-color-change")) {
    xmlhttp.onload = function () {
      document.getElementById("wishlist-qty").innerHTML = this.responseText;
    };
    xmlhttp.open("GET", "wishlist-remove.php?id=" + id);
    xmlhttp.send();
  } else {
    xmlhttp.onload = function () {
      document.getElementById("wishlist-qty").innerHTML = this.responseText;
    };
    xmlhttp.open("GET", "wishlist-handle.php?id=" + id);
    xmlhttp.send();
  }
  for (let i = 0; i < wlItem.length; i++) {
    wlItem[i].classList.toggle("wishlist-icon-color-change");
  }
}

function removeProductFrWL(id) {
  let wlId = "wl" + id;
  let wlElement = document.getElementById(wlId);
  wlElement.parentNode.removeChild(wlElement);
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function () {
    document.getElementById("wishlist-qty").innerHTML = this.responseText;
  };
  xmlhttp.open("GET", "wishlist-remove.php?id=" + id);
  xmlhttp.send();
}

function removeProductFrCart(id, action) {
  if (action == "remove") {
    let cartId = "cart" + id;
    let cartElement = document.querySelectorAll("." + cartId);
    for (let i = 0; i < cartElement.length; i++) {
      cartElement[i].parentNode.removeChild(cartElement[i]);
    }
  }
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function () {
    let item = this.responseText.split("#");
    let qty = Number(item[1]);
    document.getElementById("qty").innerHTML = item[1];
    document.getElementById("totalPro").innerHTML = item[1];
    document.getElementById("subtotal").innerHTML = item[0]
      .toString()
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    if (document.getElementById("price-detail")) {
      if (qty == 0) {
        document.getElementById("price-detail").remove();
      } else {
        document.getElementById("price-detail-subtotal").innerHTML =
          item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
        document.getElementById("price-detail-total").innerHTML =
          item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
        document.getElementById("price-detail-qty").innerHTML = item[1];
      }
    }
  };
  xmlhttp.open("GET", "cart-remove.php?id=" + id + "&action=" + action);
  xmlhttp.send();
}

function decreaseQty(id) {
  let pID = "pro" + id;
  let qty = Number(document.getElementById(pID).value);
  if (qty == 1) {
    let choice = confirm("Do you want to delete this product?");
    if (choice) {
      removeProductFrCart(id, "remove");
    }
  } else {
    document.getElementById(pID).value = qty - 1;
    removeProductFrCart(id, "decrease");
    let itemDecrease = document.getElementById("qty" + id);
    let itemDecQty = Number(itemDecrease.innerHTML);
    itemDecrease.innerHTML = itemDecQty - 1;
  }
}

function increaseQty(id) {
  let pID = "pro" + id;
  let qty = Number(document.getElementById(pID).value);
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function () {
    let qtyInStock = Number(this.responseText);
    if (qty >= qtyInStock) {
      alert("Sorry, out of stock");
      document.getElementById(pID).value = qty;
    } else {
      document.getElementById(pID).value = qty + 1;
      addCart(id, 1);
    }
  };
  xmlhttp.open("GET", "check-product-qty.php?id=" + id);
  xmlhttp.send();
}

function checkQty(id) {
  let pID = "pro" + id;
  let qty = Number(document.getElementById(pID).value);
  if (qty == 0) {
    let choice = confirm("Do you want to delete this product?");
    if (choice) {
      removeProductFrCart(id, "remove");
    }
  } else if (qty < 0) {
    alert("Sorry, quantity is not valid");
    document.getElementById(pID).value = 1;
  } else {
    let addedQty = 0;
    if (document.getElementById("qty" + id)) {
      addedQty = Number(document.getElementById("qty" + id).innerHTML);
    }
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
      let qtyInStock = Number(this.responseText);
      if (qty + addedQty >= qtyInStock) {
        alert("Sorry, out of stock");
        modifyCart(id, qtyInStock);
        document.getElementById(pID).value = qtyInStock;
      } else {
        modifyCart(id, qty);
        document.getElementById("qty" + id).innerHTML =
          document.getElementById(pID).value;
      }
    };
    xmlhttp.open("GET", "check-product-qty.php?id=" + id);
    xmlhttp.send();
  }
}

function checkQtyDetail(id) {
  let pID = "pro" + id;
  let qty = Number(document.getElementById(pID).value);
  if (qty < 0) {
    alert("Sorry, quantity is not valid");
    document.getElementById(pID).value = 1;
  } else {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
      let addedQty = 0;
      let qtyInStock = Number(this.responseText);
      if (document.getElementById("qty" + id)) {
        addedQty = Number(document.getElementById("qty" + id).innerHTML);
      }
      if (qty + addedQty > qtyInStock) {
        alert(
          "Sorry, stock just have " + (qtyInStock - addedQty) + " product left"
        );
        document.getElementById(pID).value = qtyInStock - addedQty;
      } else if (qty + addedQty > qtyInStock == 0) {
        alert("Sorry, out of stock");
        document.getElementById(pID).disabled = true;
      }
    };
    xmlhttp.open("GET", "check-product-qty.php?id=" + id);
    xmlhttp.send();
  }
}

function modifyCart(id, qty) {
  let pID = "pro" + id;
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function () {
    let item = this.responseText.split("#");
    document.getElementById("qty").innerHTML = item[1];
    document.getElementById("totalPro").innerHTML = item[1];
    document.getElementById("subtotal").innerHTML = item[0]
      .toString()
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("price-detail-subtotal").innerHTML =
      item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
    document.getElementById("price-detail-total").innerHTML =
      item[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
    document.getElementById("price-detail-qty").innerHTML = item[1];
  };
  xmlhttp.open("GET", "cart-modify.php?id=" + id + "&qty=" + qty);
  xmlhttp.send();
}

let rating_class = document.querySelectorAll(".rating-star");
rating_class.forEach(item, function() {
    item.addEventListener("click", function() {
        alert("hi");
    })
})

// review handle
function addReview() {
  alert("hi");
  let review_name = document.getElementById("review_name").value;
  let review_email = document.getElementById("review_email").value;
  let content = document.getElementById("content").value;
  let product_id = document.getElementById("pro-id").value;
  let rating = document.querySelector("");
  if (review_name == "" || review_email == "") {
    alert("Please fill in information");
  } else {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
      document
        .getElementById("review-list")
        .insertAdjacentHTML("beforeend", this.responseText);
    };
    xmlhttp.open(
      "GET",
      "review-handle.php?name=" +
        review_name +
        "&email=" +
        review_email +
        "&rv_content=" +
        content +
        "&rating=0&product_id=" +
        product_id
    );
    xmlhttp.send();
    document.getElementById("review_name").value = "";
    document.getElementById("review_email").value = "";
    document.getElementById("content").value = "";
  }
}
