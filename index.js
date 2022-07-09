$(document).ready(() => {
    getExistingData(0, 10) ;
});

function getExistingData(start, limit) {
  $.ajax({
    url: "ajax.php",
    method: "post",
    dataType: "text",
    data: {
      key: "getData",
      start: start,
      limit: limit,
    },
    success: (data) => {
      if (data != "end") {
        $(tbody).append(data);
        start += limit;
        getExistingData(start, limit);
      }
    },
  });
}
