$(document).ready(function () {
    toggleNav();

    $(window).resize(function () {
        if ($(window).width() < 720) {
            $("#sidenav").attr("style", "display:none;width:0px;");
            $(".sidenavToggle").attr(
                "style",
                "display:inline-block;margin-right:10px"
            );
            $(".sidenavHide").attr("style", "display:block");
        } else {
            $("#sidenav").attr("style", "display:block;width:100%;");
            $(".sidenavToggle").attr("style", "display:none;margin-right:0px");
            $(".sidenavHide").attr("style", "display:none");
        }
    });

    // Filter Table
    if ($(".product-list").length > 10) {
        $("#loadProduct").show();
        $("#hideProduct.hp").show();
    }

    $("#searchProduct").on("keyup", function () {
        var value = $(this);
        if (value.val() == "") {
            if ($(".product-list").length < 10) {
                $(".summary-btn").hide();
            } else {
                $(".summary-btn").show();
            }
            $("#listProduct tr").filter(function () {
                $(this).toggle(
                    $(this)
                        .text()
                        .toLowerCase()
                        .indexOf(value.val().toLowerCase()) > -1
                );
            });
        } else {
            $(".summary-btn").hide();
            $("#listProduct tr").filter(function () {
                $(this).toggle(
                    $(this)
                        .text()
                        .toLowerCase()
                        .indexOf(value.val().toLowerCase()) > -1
                );
            });
        }
    });

    $(".product-list").slice(0, 10).show();
    $("#loadProduct").on("click", function (e) {
        e.preventDefault();
        $(".product-list:hidden").slice(0, 10).slideDown();
        if ($(".product-list:hidden").length == 0) {
            $("#loadProduct").hide();
            $("#hideProduct").attr("style", "margin:auto");
        }
    });
    $("[id='hideProduct']").on("click", function (e) {
        e.preventDefault();
        $(".product-list")
            .slice(10, $(".product-list").length)
            .attr("style", "display:none");
        $("#loadProduct").show();
        $("toggleProduct .btn-danger").attr("style", "margin-left:10px");
        $(".summary-btn").attr("style", "display:none");
    });

    /*var parseMonth = [newLocal,"February","March","April","May","June","July","August","September","October","November","December"];
    var parseMonth2 = ["01","02","03","04","05","06","07","08","09","10","11","12"];
    $("#date_due").datepicker({
        onSelect: function() {
            var date = $(this).datepicker('getDate').getDate();
            var month = $(this).datepicker('getDate').getMonth();
            var year = $(this).datepicker('getDate').getFullYear();
            $("#test_output").html("Filter Revenue By Date : " + date + " " + parseMonth[month] + " " + year);
            $("#revenue_date").html("<i class='fi fi-rr-calendar'></i>&nbsp;&nbsp; " + parseMonth[month] + " " + year);
        }
    });*/
});

filterSelection("khusus");
function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
}

function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
        }
    }
}

function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}

//var btnContainer = document.getElementById("myBtnContainer");
//var btns = btnContainer.getElementsByClassName("btn");
//for (var i = 0; i < btns.length; i++) {
//    btns[i].addEventListener("click", function () {
//        var current = document.getElementsByClassName("active");
//        current[0].className = current[0].className.replace(" active", "");
//        this.className += " active";
//    });
//}

$("#valued").on("keyup", function (val) {
    const exval = $(".discn:selected").html();
    valueHarga = exval.split(" ").pop();
    $("#percentc").val(
        Math.round((parseInt(val.target.value) / parseInt(valueHarga)) * 100)
    );
});

$("#percentc").on("keyup", function (val) {
    const exval = $(".discn:selected").html();
    valueHarga = exval.split(" ").pop();
    $("#valued").val(
        Math.round((parseInt(valueHarga) / 100) * parseInt(val.target.value))
    );
});

var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById("previewImage");
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

/* Voucher AJAX */
$("#voucherBtn").on("click", function (e) {
    e.preventDefault();
    $.ajax({
        url: "URL_DIDIEU",
        type: "POST",
        dataType: "json",
        // buat data jan pake serialize()
        data: { voucher: $("#voucher").val() },
        // encode_json result di file proses buat object error untuk menampilkan error
        success: function (data) {
            console.log(data);
        },
        error: function (error) {
            console.log("Error:");
            console.log(error);
        },
    });
});

/* ChartJS */
//const ctx = document.getElementById("myChart").getContext("2d");
//const myChart = new Chart(ctx, {
//    type: "line",
//    data: {
//        labels: ["Mon", "Tue", "Wed", "The", "Fri", "Sat", "Sun"],
//        datasets: [
//            {
//                label: "revenue",
//                data: [10, 18, 20, 15, 11, 9, 23],
//                backgroundColor: "rgba(13, 117, 253, 0.5)",
//                borderColor: "rgba(13, 117, 253, 1)",
//                borderWidth: 1,
//                tension: 0.5,
//            },
//        ],
//    },
//});

function toggleNav() {
    $("#sidenavShow").on("click", function () {
        $("#sidenav").attr(
            "style",
            "display:block;width:250px;position:fixed;top:0;left:0;z-index:10"
        );
    });
}

function closeNav() {
    $("#sidenav").attr("style", "display:none;width:0px");
}

function openModaal(id) {
    $("#" + id).attr("style", "display:block");
}

function closeModaal(id) {
    $("#" + id).attr("style", "display:none");
}

function percentage(partialValue, totalValue) {
    return (100 * partialValue) / totalValue;
}

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
