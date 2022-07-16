<?php
require_once "HelperFunctions.php" ;

$action = $_REQUEST['action'];

if (!empty($action)) {
    include_once "ContactDetails.php";
    $Details = new ContactDetails();

    //When GetExistingData() is called/ TO get all the rows paginated
    if ($action == "getData") {

        $rows = $Details->getRows($_REQUEST['start'], $_REQUEST['limit']);

        if (empty($rows))
            exit("end");

        else {
            $data = "";
            foreach ($rows as $row) {
                //append db id to the TableRow 
                $str = "<tr id='row-" . $row['id'] . "'> 
                <th>" . $row['id'] . "</th>
                <td>" . $row['full_name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['phone'] . "</td>
                <td><button id='EditRow' class='btn btn-dark btn-sm ' style='font-size: 60%' type='button'>Edit</button>/<button id='DeleteRow' class='btn btn-danger btn-sm ' style='font-size: 60%' type='button'>Delete</button></td>
                </tr>";
                $data .= $str;
            }
            exit($data);
        }
    }

    if ($action == "insertRow") {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone']
        ];

        $data['error'] = 0;

        $data = validateInputs($data);

        //If Validation succeeds and no error occurs then Insert Row
        if ($data['error'] == 0) {
            $data = $Details->insertRow($data);
        } else {
            $data['err'] = "";
            foreach ($data['error_status'] as $err) {
                // var_dump($err) ;
                $data['err'] .= $err . "\n" ;
            }
        }

        exit(json_encode($data));
    }
}
