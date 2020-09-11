check_list = document.getElementsByName("check_list[]");
check_count = check_list.length;
on = 1;

function check_all() {
    if (on == 1) {
        for (i = 0; i < check_count; i++) {
            check_list[i].checked = true;
        }
        on = 0;
    } else {
        for (i = 0; i < check_count; i++) {
            check_list[i].checked = false;
        }
        on = 1;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    var status = document.getElementsByClassName("status");
    for (i = 0; i < status.length; i++) {
        if (status[i].innerText == "served") {
            status[i].style.color = "#61d659";
        } else if (status[i].innerText == "pending approval") {
            status[i].style.color = "#619bff";
        } else if (status[i].innerText == "approved") {
            status[i].style.color = "#ffdd00";
        } else {
            status[i].style.color = "#ff6868";
        }
    }
})