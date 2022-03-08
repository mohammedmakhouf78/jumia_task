$("#country").change(function () {
  $.ajax({
    url: "/country",
    method: "POST",
    data: { country: this.value },
    dataType: "json",
    success: function (data) {
      $("#tbody").html("");
      var data = data["data"];
      data.forEach((element) => {
        var stateClass =
          element["state"] == true ? "text-success" : "text-danger";
        var stateWord = element["state"] == true ? "OK" : "Not OK";
        $("#tbody").append(`
                    <tr>
                        <th scope="row">${element["country"]}</th>

                        <th class="${stateClass}">${stateWord}</th>
                        
                        <th>${element["code"]}</th>
                        <td>${element["phone"]}</td>
                    </tr>
                `);
      });
    },
    error: function (jqXHR, text, errorThrown) {
      console.warn(jqXHR.responseText);
      console.log(jqXHR + " " + text + " " + errorThrown);
    },
  });
});

$("#state").change(function () {
  $.ajax({
    url: "/state",
    method: "POST",
    data: { state: this.value },
    dataType: "json",
    success: function (data) {
      $("#tbody").html("");
      var data = data["data"];
      data.forEach((element) => {
        var stateClass =
          element["state"] == true ? "text-success" : "text-danger";
        var stateWord = element["state"] == true ? "OK" : "Not OK";
        $("#tbody").append(`
                    <tr>
                        <th scope="row">${element["country"]}</th>

                        <th class="${stateClass}">${stateWord}</th>
                        
                        <th>${element["code"]}</th>
                        <td>${element["phone"]}</td>
                    </tr>
                `);
      });
    },
    error: function (jqXHR, text, errorThrown) {
      console.warn(jqXHR.responseText);
      console.log(jqXHR + " " + text + " " + errorThrown);
    },
  });
});

$(".page_btn").each(function (index, element) {
  $(element).click(function () {
    let number = $(this).text();
    $.ajax({
      url: "/page",
      method: "POST",
      data: { pageNumber: number },
      dataType: "json",
      success: function (data) {
        $("#tbody").html("");
        var data = data["data"];
        data.forEach((element) => {
          var stateClass =
            element["state"] == true ? "text-success" : "text-danger";
          var stateWord = element["state"] == true ? "OK" : "Not OK";
          $("#tbody").append(`
                      <tr>
                          <th scope="row">${element["country"]}</th>
  
                          <th class="${stateClass}">${stateWord}</th>
                          
                          <th>${element["code"]}</th>
                          <td>${element["phone"]}</td>
                      </tr>
                  `);
        });
      },
      error: function (jqXHR, text, errorThrown) {
        console.warn(jqXHR.responseText);
        console.log(jqXHR + " " + text + " " + errorThrown);
      },
    });
  });
});
