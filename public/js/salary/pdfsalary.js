function convert_vi_to_en(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    str = str.replace(
        /!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g,
        " "
    );
    str = str.replace(/  +/g, " ");
    return str;
}
const nowDate = new Date();
const printBtn = document.querySelector(".print-btn");
const nameEm = document.querySelector(".nameEm");
const idEm = document.querySelector(".idEm");
const nameEmployee = convert_vi_to_en(nameEm.textContent);
// bien bang luong
const luongCoBan = document.querySelector(".luongCoBan").textContent;
const heSoLuong = document.querySelector(".heSoLuong").textContent;
const LuongChinh = document.querySelector(".LuongChinh").textContent;
const soTienMat1Ngay = document.querySelector(".soTienMat1Ngay").textContent;
const soNgayNghi = document.querySelector(".soNgayNghi").textContent;
const TongSoTienMat = document.querySelector(".TongSoTienMat").textContent;
const khenthuong = document.querySelector(".khenthuong").textContent;
const kyluat = document.querySelector(".kyluat").textContent;
const Total = document.querySelector(".Total").textContent;

// console.log(luongCoBan.textContent);
printBtn.addEventListener("click", (e) => {
    e.preventDefault();
    generatePDF();
});
function generatePDF() {
    var pdfObject = jsPDFInvoiceTemplate.default(props); //returns number of pages created
    console.log("Object created: ", pdfObject);
}

var props = {
    returnJsPDFDocObject: true,
    fileName: "Lương",
    orientationLandscape: false,
    compress: true,
    business: {
        name: "Bang chi tiet luong                                ",
        style: {
            margin: {
                top: 20,
                left: 200,
            },
            fontSize: 30 + "rem",
            textAlign: "center",
        },
        width: 20,
    },
    contact: {
        label: "Ho Ten:",
        name: `${nameEmployee}, ${convert_vi_to_en(
            idEm.textContent.slice(13)
        )}`,
        address: "Truong Dai Hoc Thuy Loi ,175 Tay Son Dong Da , Ha Noi",
        phone: "(024) 38522201",
        email: "phonghcth@tlu.edu.vn",
    },
    invoice: {
        label: "Thoi gian:",
        num: nowDate.getFullYear(),
        invDate: `Ngay: ${nowDate.getDate()}/${nowDate.getMonth()}/${nowDate.getFullYear()}`,
        headerBorder: false,
        tableBodyBorder: false,
        header: [
            {
                title: "#",
                style: {
                    width: 10,
                },
            },
            {
                title: "Co Cau Luong",
                style: {
                    width: 50,
                },
            },
            {
                title: "Kiem Duoc",
                style: {
                    width: 50,
                },
            },
            {
                title: "Khau tru",
                style: {
                    width: 50,
                },
            },
            {
                title: "Tong",
                style: {
                    width: 50,
                },
            },
        ],
        table: [
            [
                "01",
                "Luong Co Ban",
                `${luongCoBan}`,
                `${heSoLuong}`,
                `${LuongChinh}`,
            ],
            [
                "02",
                "Ngay Nghi Qua Han",
                `${soTienMat1Ngay}`,
                `${soNgayNghi}`,
                `${TongSoTienMat}`,
            ],
            ["03", "Khen Thuong", `${khenthuong}`, "", `${khenthuong}`],
            ["04", "Ky Luat", `${kyluat}`, "", `${kyluat}`],
            ["", "Tong", "", "", `${Total}`],
        ],
        additionalRows: [
            {
                col1: "Total:",
                col2: "145,250.50",
                col3: "ALL",
                style: {
                    fontSize: 14, //optional, default 12
                },
            },
            {
                col1: "VAT:",
                col2: "20",
                col3: "%",
                style: {
                    fontSize: 10, //optional, default 12
                },
            },
            {
                col1: "SubTotal:",
                col2: "116,199.90",
                col3: "ALL",
                style: {
                    fontSize: 10, //optional, default 12
                },
            },
        ],
    },
    pageEnable: true,
    pageLabel: "Page ",
};
