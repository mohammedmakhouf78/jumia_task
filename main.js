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
