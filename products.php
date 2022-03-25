<?php include 'header.php' ;?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div> -->
      </div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
      <form method="POST">
      <div class="row" style="margin-bottom: 50px;">
        <div class="col-md-3">
            <input type="text" name="product" placeholder="Product Name" class="form-control"/>
        </div>
        <div class="col-md-3">
            <input type="text" name="price" placeholder="Price" class="form-control"/>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-default" name="search">
                <i class="fa fa-search"></i>
            </button>
        </div>
      </div>
      </form>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"></th>
              <th scope="col">Title</th>
              <th scope="col">Price</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
          <tbody>

          <?php 
           if(isset($_POST['search']))
           {
               $prod = check_input($_POST['product']);
               $price = check_input($_POST['price']);

               if(empty($prod) && empty($price)){
                    echo "<script>alert('Please enter search term'); window.location='index'</script>";
                }

              elseif(!empty($prod) && empty($price)){

                $i = 0;
                $total = 0;
                $que = dbConnect()->prepare("SELECT * FROM sales WHERE title LIKE '%$prod%'");
                $que->execute();
                while($rw = $que->fetch()){
                    $i++;
                    $img = $rw['thumbnailUrl'];
                    $totqp = $rw['total'];
                    $total += $totqp;
                ?>
                <tr>
                <td><?php echo $i ?></td>
                <td><img src="<?php echo $img;?>" alt="" width="50" height="50"></td>

                <td><?php echo $rw['title']; ?></td>
                <td><?php echo $rw['price']; ?></td>
                <td><?php echo $rw['shortDescription']; ?></td>
                </tr>
                <?php } }
                elseif(empty($prod) && !empty($price)){

                    $i = 0;
                    $total = 0;
                    $que = dbConnect()->prepare("SELECT * FROM sales WHERE price=$price");
                    $que->execute();
                    while($rw = $que->fetch()){
                        $i++;
                        $img = $rw['thumbnailUrl'];
                        $totqp = $rw['total'];
                        $total += $totqp;
                    ?>
                    <tr>
                    <td><?php echo $i ?></td>
                    <td><img src="<?php echo $img;?>" alt="" width="50" height="50"></td>
    
                    <td><?php echo $rw['title']; ?></td>
                    <td><?php echo $rw['shortDescription']; ?></td>
                    </tr>
                    <?php } }
                elseif( !empty($prod) && !empty($price)){

                    $i = 0;
                    $total = 0;
                    $que = dbConnect()->prepare("SELECT * FROM sales WHERE title LIKE '%$prod%' AND price=$price");
                    $que->execute();
                    while($rw = $que->fetch()){
                        $i++;
                        $img = $rw['thumbnailUrl'];
                        $totqp = $rw['total'];
                        $total += $totqp;
                    ?>
                    <tr>
                    <td><?php echo $i ?></td>
                    <td><img src="<?php echo $img;?>" alt="" width="50" height="50"></td>
    
                    <td><?php echo $rw['title']; ?></td>
                    <td><?php echo $rw['price']; ?></td>
                    <td><?php echo $rw['shortDescription']; ?></td>
                    </tr>
                    <?php } }
                
                }
                else{
                $i = 0;
                $total = 0;
                $que = dbConnect()->prepare("SELECT * FROM sales");
                $que->execute();
                while($rw = $que->fetch()){
                    $i++;
                    $img = $rw['thumbnailUrl'];
                    $totqp = $rw['total'];
                    $total += $totqp;
                ?>
                <tr>
                <td><?php echo $i ?></td>
                <td><img src="<?php echo $img;?>" alt="" width="50" height="50"></td>
                <td><?php echo $rw['title']; ?></td>
                <td><?php echo $rw['price']; ?></td>
                <td><?php echo $rw['shortDescription']; ?></td>
                </tr>
                <?php } } ?>


            
          </tbody>
        </table>
        
      </div>
    </main>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
