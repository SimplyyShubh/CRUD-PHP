$(document).ready(() => {
  //Get Exisiting data when clicking on Load Button
  $("#load").on("click", function () {
    getExistingData(0, 10);
    $(this).hide();
  });

  //Insert Data For Submit function
  $("#contactForm").submit(function (e) {
    e.preventDefault();
    insertRow();
  });
});

//attaches Event Listners on Delete Buttons and delete on Click ;
$(document).on("click", "#DeleteRow", function (e) {
  let rowId = this.parentElement.parentElement.id;
  let id = rowId.substr(4) ;

  console.log(id) ;
  $.ajax({
    url: "ajax.php",
    method: "post",
    dataType: "TEXT",
    data: {
      action: "deleteRow",
      id : id
    },
    success: (data) => {
      if (!data["err" == 0]) {
        $("#" + rowId).remove(); // Removes that Row.
      } else {
        alert("Error Occured");
      }
    },
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

// function editRow(this){

// }

function insertRow() {
  let name = $("#name").val();
  let email = $("#email").val();
  let phone = $("#phone").val();
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
      if (data["error"] == 0 && data["id"]) {
        alert("Inserted Successfully");
        str = `<tr><th>${data["id"]}</th>
            <td>${name}</td>
            <td>${email}</td>
            <td>${phone}</td>
            <td><button id="EditRow" class="btn btn-dark btn-sm " style="font-size: 60%" type="button">Edit</button>/<button id="DeleteRow" class="btn btn-danger btn-sm " style="font-size: 60%" type="button">Delete</button></td>
            </tr>`;

        $("tbody").prepend(str);
      } else {
        str = data["err"];
        console.log(str);
        alert("Error Occured : \n" + str);
      }
    },
  });
}
