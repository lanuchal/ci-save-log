$(document).ready(function () {
  var table = $("#example").DataTable({
    dom: "Bfrtip",
    fixedHeader: true,
    responsive: {
      details: {
        display: $.fn.dataTable.Responsive.display.modal({
          header: function (row) {
            var data = row.data();
            return "Details for " + data[0] + " " + data[1];
          },
        }),
        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
          tableClass: "table",
        }),
      },
    },
    lengthChange: [
      [10, 25, 50, -1],
      ["10 rows", "25 rows", "50 rows", "Show all"],
    ],
    buttons: [
      "pageLength",
      {
        extend: "collection",
        text: "export ",
        buttons: ["excel", "print"],
      },
    ],
  });
  table.buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)");
});
$(document).ready(function () {
  var table = $("#example2").DataTable({
    dom: "Bfrtip",
    fixedHeader: true,
    responsive: {
      details: {
        display: $.fn.dataTable.Responsive.display.modal({
          header: function (row) {
            var data = row.data();
            return "Details for " + data[0] + " " + data[1];
          },
        }),
        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
          tableClass: "table",
        }),
      },
    },
    lengthChange: [
      [10, 25, 50, -1],
      ["10 rows", "25 rows", "50 rows", "Show all"],
    ],
    buttons: [
      [
        "pageLength",
        {
          text: "Select all",
          action: function () {
            table.rows().select();
          },
        },
        {
          text: "Select none",
          className: "select-none",
          action: function () {
            table.rows().deselect();
          },
        },
        {
          extend: "collection",
          text: "export ",
          messageTop: "title",
          buttons: [
            {
              extend: "csv",
              text: "csv",
              messageTop:
                "The information in this table is copyright to Sirius Cybernetics Corp.",
            },
            ,
            "excel",
            "pdf",
            "print",
          ],
        },
        "colvis",
      ],
    ],
    // buttons2: [{
    //     extend: 'collection',
    //     text: 'export ',
    //     buttons: [
    //         'csv', 'excel', 'pdf', 'print'
    //     ]
    // }, 'colvis', 'pageLength'],
    columnDefs: [
      {
        orderable: false,
        className: "select-checkbox",
        targets: 0,
      },
    ],
    select: {
      style: "multi",
      selector: "td:first-child",
    },
    order: [[1, "asc"]],
  });
  var data_select = [];
  table
    .on("select", function (e, dt, type, indexes) {
      var rowData = table.rows(indexes).data().toArray();
      data_select.push(rowData[0][1]);
      //console.log(data_select);
    })
    .on("deselect", function (e, dt, type, indexes) {
      var rowData = table.rows(indexes).data().toArray();
      let index = data_select.indexOf(rowData[0][1]);
      if (index > -1) {
        data_select.splice(index, 1);
      }
      //console.log(data_select);
    });

  table.buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)");
});

const logout_menu = () => {
  //console.log("55555555555555555555");
  document.getElementById("close_nav_menu").click();
}

