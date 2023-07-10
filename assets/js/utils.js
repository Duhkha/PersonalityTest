var Utils = {
  /* 
    datatable: function (table_id, columns, data) { 
      if ($.fn.dataTable.isDataTable("#" + table_id)) { 
        $("#" + table_id) 
          .DataTable()
          .destroy();
      }
  
      $("#" + table_id).DataTable({ 
        data: data, 
        columns: columns, 
        pageLength: 5, 
        lengthMenu: [2, 5, 10, 25, 50, "All"], 
      });
    },*/
  
    parseJwt: function (token) {
      if (token) { 
        var base64Url = token.split(".")[1]; 
        var base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/"); 
        var jsonPayload = decodeURIComponent( 
          atob(base64) 
            .split("") 
            .map(function (c) {
              return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
            })
            .join("")
        );
  
        return JSON.parse(jsonPayload); 
      } else {
        return null;
      }
    },
  };
  