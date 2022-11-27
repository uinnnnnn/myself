window.onload = function () {
    current_time();

}

function current_time() {
    var nowDate = new Date();

    var year = nowDate.getFullYear();
    var month = nowDate.getMonth();
    var day = nowDate.getDate();
    var hour = nowDate.getHours();
    var min = nowDate.getMinutes();
    var sec = nowDate.getSeconds();

    if (min <= 9) {
        var min = "0" + min
    }

    var suffix;
    if (hour >= 0 && hour < 12) {
        suffix = "上午";
    }
    else {
        suffix = "下午";
    }

    document.getElementById("date").innerHTML = year + "年" + (month + 1) + "月" + day + "日";
    document.getElementById("time").innerHTML = suffix + " " + hour + "時" + min + "分" + sec + "秒";

    setTimeout(function () { current_time(); }, 1000);
}
