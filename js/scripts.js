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