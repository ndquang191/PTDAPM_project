const printBtn = document.querySelector(".print-btn");

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
        name: "Ngo Thi Tam",
        address: "Albania, Tirane, Astir",
        phone: "(+355) 069 22 22 222",
        email: "client@website.al",
    },
    invoice: {
        label: "Thoi gian:",
        num: 2023,
        invDate: "Payment Date: 01/01/2021 18:12",
        invGenDate: "Invoice Date: 02/02/2021 10:17",
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
                    width: 100,
                },
            },
            {
                title: "SoTien",
                style: {
                    width: 50,
                },
            },
        ],
        table: [
            ["01", "Luong Co Ban", "50.000.000VND"],
            ["02", "He So Luong", ""],
            ["03", "Ngay Nghi Qua Han", ""],
            ["04", "Khen Thuong", "50.000.000VND"],
            ["05", "Ky Luat", "20.000.000VND"],
            ["", "Tong", ""],
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
