<?php
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
                $str = "<tr><th>" . $row['id'] . "</th>
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

    if($action == "insertRow"){
        $inputs = ['name' => $_POST['name'],
                 'email' => $_POST['email'],
                 'phone' => $_POST['phone']] ;

        $data = $Details->insertRow($inputs) ;
       exit(json_encode($data)) ;
    }
}
