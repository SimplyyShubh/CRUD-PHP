$(document).ready(() => {
    $('#load').on('click', function(){
        getExistingData(0, 10) ;
    })
});

// Get exisiting data from DB and load it into html till all data is loaded.
function getExistingData(start, limit) {
  $.ajax({
    url: "ajax.php",
    method: "post",
    dataType: "TEXT",
    data: {
      action: "getData",
      start: start,
      limit: limit,
    },
    success: (data) => {
        console.info(data) ;
        
      if (data != "end") {
        $('tbody').append(data);
        start += limit;
        getExistingData(start, limit);
      }
    },
  });
}
