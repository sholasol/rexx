<?php 
 include 'config/config.php';



 if(isset($_POST['submit'])){

    $file_name = "sales.json";

    $file = file_get_contents('sales.json');
   
    $data_array =json_decode($file, true);

    

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


        $insertRec = dbConnect()->prepare("INSERT INTO sales SET title=?, isbn = ?, pageCount =?, quantity=?, customer=?,
        price=?, total=?, sold=?, publishedDate=?, thumbnailUrl=?, shortDescription=?, longDescription=?,
        status=?, authors=?,categories=? ");

        $insertRec->execute([$title, $isbn, $pageCount, $quantity, $customer, $price, $total, $sold, $publishedDate, $thumbnailUrl, $shortDescription, $longDescription, $status, $authors, $categories]);

    }

    echo "<script>alert('Data imported successfully'); window.location='index'</script>";

    // $insertRec = dbConnect()->prepare("INSERT INTO sales SET title=?, isbn = ?, pageCount =?, quantity=?, customer=?,
    // price=?, total=?, sold=?, publishedDate=?, thumbnailUrl=?, shortDescription=?, longDescription=?,
    // status=?, authors=?,categories=? ");

    // if($insertRec->execute([$title, $isbn, $pageCount, $quantity, $customer, $price, $total, $sold, $publishedDate, $thumbnailUrl, $shortDescription, $longDescription, $status, $authors, $categories]))
    // {
    //     echo "<script>alert('Data imported successfully'); window.location='index'</script>";
    // }else{
    //     echo "<script>alert('Oops! Operation failed'); window.location='index'</script>";
    // }


    
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>BookStore</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
    <link  href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <link href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css"/>
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" />
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .nav-link {
          color: #1f1744a3;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">ABC BookStore</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span class="fa fa-desktop"></span>
              Dashboard 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="fa fa-file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="fa fa-shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="fa fa-user"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="fa fa-sort"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
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
        </div>
      </div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <h2>Sales Record</h2>
      <div class="table-responsive">
        <!-- <table class="table table-striped table-sm" id="myTable"> -->
        <table id="example" class="table table-striped table-sm display nowrap" style="width:100%">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"></th>
              <th scope="col">Customer</th>
              <th scope="col">Title</th>
              <th scope="col">Unit Price</th>
              <th scope="col">Qty</th>
              <th scope="col">Total</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            $que = dbConnect()->prepare("SELECT * FROM sales");
            $que->execute();
            while($rw = $que->fetch()){
                $i++;
                $img = $rw['thumbnailUrl'];
            ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><img src="<?php echo $img;?>" alt="" width="50" height="50"></td>
              <td><?php echo $rw['customer']; ?></td>
              <td><?php echo $rw['title']; ?></td>
              <td><?php echo $rw['price']; ?></td>
              <td><?php echo $rw['quantity']; ?></td>
              <td><?php echo $rw['total']; ?></td>
              <td><?php echo $rw['sold']; ?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            } );
        } );
    </script>
  </body>
</html>
