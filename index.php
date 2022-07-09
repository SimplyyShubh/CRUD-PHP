<!-- <?php
        include_once 'ContactDetails.php';
        $connect = new ContactDetails();

        $data = [
            'name' => 'SShubh',
            'email' => 'xxxyz@abc.com',
            'phone' => "123456789000"
        ];

        $log = $connect->insertRow($data);
        print_r($log);
        ?>
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRUD APP - PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container border p-4 mt-4">
        <div class="border border-dark px-5 py-4 mt-4">
            <h3>Contact us:</h3>
            <!-- Form Starts for inserting data to DB -->
            <form id="contactForm" method="POST">
                <div class="row mt-3">
                    <div class="col">
                        <label class="form-label" for="name">Full Name:</label>
                        <input class="form-control" id="name" type="text" placeholder="Name" />
                    </div>
                    <div class="col">
                        <label class="form-label" for="emailAddress">Email: </label>
                        <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" />
                    </div>

                    <div class="col">
                        <label class="form-label" for="number">Phone:</label>
                        <input class="form-control" type="number" id="number" name="number" Placeholder="Phone No.">
                    </div>
                    <div class="col mt-auto ">
                        <button id="InsertSubmit" class="btn btn-primary " type="submit">Submit</button>
                    </div>
                </div>
            </form>
            <!-- Form Ends -->
        </div>
        <div class="border border-dark px-5 py-4 mt-4">
            <h3>Contact Us List:</h3>
            <!-- Table for showing all the inserted data -->
            <table class="table">
                <!-- Table Header -->
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">No</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Edit/Delete</th>
                    </tr>
                </thead>
                <!-- Table Header ends -->
                <tbody>
                    <!-- One Single Row -->
                    <tr>
                        <th>1</th>
                        <td>Shubh Gupta</td>
                        <td>simplyy11@gmail.com</td>
                        <td>8860664490</td>
                        <td>
                            <button id="EditRow" class="btn btn-dark btn-sm " style="font-size: 60%" type="button" >Edit</button>
                            /
                            <button id="DeleteRow" class="btn btn-danger btn-sm " style="font-size: 60%" type="button" >Delete</button>
                        </td>
                    </tr>
                    <!-- Row Ends -->
                </tbody>
            </table>
            <div class="text-center">
                <button id ="load" class="btn btn-primary mx-5">Load</button>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="index.js"></script>

</body>

</html>