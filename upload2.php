<?php include 'header.php' ;

 //include 'config/config.php';

if (isset($_POST['uploading'])) {

      if (is_uploaded_file($_FILES ['imgupload'] ['tmp_name'])) {
        //process file to upload
        $imgFile = $_FILES['imgupload']['name'];
        $tmp_dir = $_FILES['imgupload']['tmp_name'];
        $imgSize = $_FILES['imgupload']['size'];

        //Processing the image
        {
          $upload_dir = 'uploads/'; // upload directory

          $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

          // valid image extensions
          $valid_extensions = array('xml', 'json'); // valid extensions

          // rename uploading image
          $file_to_upload = rand(1000,1000000).".".$imgExt;

          // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){			
                    // Check file size '500MB'
                    if($imgSize < 500000000){
                            move_uploaded_file($tmp_dir,$upload_dir.$file_to_upload);

                            //file directory
                            $json_file ="$upload_dir/$file_to_upload";
                           
                          //read the json file content
                           $file = file_get_contents($json_file);

                           //decode the file array
                            $data_array =json_decode($file, true);

                            
                          //store each of the json feild as variable
                            foreach($data_array as $row){
                                $title = $row['title'];
                                $isbn = $row['isbn'];
                                $pageCount = $row['pageCount'];
                                $quantity = $row['quantity'];
                                $customer = $row['customer'];
                                $price = $row['price'];
                                $total = $row['total'];
                                $sold = $row['sold'];
                                $publishedDate = $row['publishedDate'];
                                $thumbnailUrl = $row['thumbnailUrl'];
                                $shortDescription = $row['shortDescription'];
                                $longDescription = $row['longDescription'];
                                $status = $row['status'];
                                $authors = $row['authors'];
                                $categories = $row['categories'];

                                //insert record into the database
                                $insertRec = dbConnect()->prepare("INSERT INTO sales SET title=?, isbn = ?, pageCount =?, quantity=?, customer=?,
                                price=?, total=?, sold=?, publishedDate=?, thumbnailUrl=?, shortDescription=?, longDescription=?,
                                status=?, authors=?,categories=? ");

                                $insertRec->execute([$title, $isbn, $pageCount, $quantity, $customer, $price, $total, $sold, $publishedDate, $thumbnailUrl, $shortDescription, $longDescription, $status, $authors, $categories]);

                            }

                            echo "<script>alert('Data imported successfully'); window.location='index'</script>";

                            
                    }else{
                        echo "<script> alert('Oops! Image size is too large !!!');</script>";
                    }

            }
            else{
              echo "<script> alert('Oops! Ivalid file extension !!!');</script>";
          }

        }

        }
        else{
          echo "<script> alert('Oop! Upload an image !!!');</script>";
      }

  }

?>
 

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Upload File</h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <form method="POST">
             <button type="submit" name="submit" class="btn btn-sm btn-outline-secondary">Process Data</button>
            </form>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div> -->
      </div>   

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
      

          <div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">File Upload</h6>
						<hr/>
						<form method="POST" enctype="multipart/form-data">
						<div class="card">
							<div class="card-body">
									<input name="imgupload" type="file" >
							</div>
						</div>
            <button type="submit" name="uploading" class="btn btn-sm btn-outline-secondary">Upload</button>
						</form>
					</div>
				</div>
    </main>
  </div>
</div>
</body>
</html>
