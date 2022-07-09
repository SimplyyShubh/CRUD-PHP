$(document).ready(() => {
  $("#load").on("click", function () {
    getExistingData(0, 10);
    $(this).hide() ;
  });

  $("#contactForm").submit(function (e) {
    e.preventDefault();
    insertRow();
  });
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
      if (data != "end") {
        $("tbody").append(data);
        start += limit;
        getExistingData(start, limit);
      }
    },
  });
}

function insertRow() {
  let name = $("#name").val() ;
  let email = $("#email").val() ;
  let phone = $("#phone").val() ;
  $.ajax({
    url: "ajax.php",
    method: "post",
    dataType: "JSON",
    data: {
      action: "insertRow",
      name: name,
      email: email,
      phone: phone,
    },
    success: (data) => {
        if(data['id']){
            alert("Inserted Successfully");
            str = `<tr><th>${data['id']}</th>
            <td>${name}</td>
            <td>${email}</td>
            <td>${phone}</td>
            <td><button id="EditRow" class="btn btn-dark btn-sm " style="font-size: 60%" type="button">Edit</button>/<button id="DeleteRow" class="btn btn-danger btn-sm " style="font-size: 60%" type="button">Delete</button></td>
            </tr>`;
            
            $("tbody").prepend(str);
        }else {
            alert("Error Occured=> " . data["error"]) ;
        }
    },
  });
}
