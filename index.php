<?php 
 include 'includes/header.php';
?>

<div class='container-fluid' id="containerFluid" style="background-color: red;">
<?php  
if(isset($_SESSION['id'])) //if the session is set
{
  if($_SESSION['id']<2)//if the user id =1 that is an admin 
   {?>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <!-- calling a div for issuing books book -->
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Issue Book</a>
  </li>
  <!-- calling a div for issued book -->
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Issued books</a>
  </li>
 
</ul>
<!-- FORM FOR ISSUING BOOKS -->
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

       <form id='issuebookFORM' action='issuebook.php' method='POST' >
            <h2  style="text-align:center;">Issue Book</h2><br>
        <!-- ERROR HANDLERS -->
        <?php
          if(isset($_GET['issued']))
          {

            $issuedCheck=$_GET['issued'];
            if ($issuedCheck=='d')
              {
              echo "<div class='alert alert-danger'>The return date should be a day ahead!!!</div>";
              }
            
            elseif ($issuedCheck=='unavailable')
              {
              echo "<div class='alert alert-danger'>Book is Unavailable in stock, please come later!</div>";
              }
            elseif ($issuedCheck=='success')
              {
              echo "<div class='alert alert-success'>Saved!</div>";
              }
          }
      
        ?>  


            <input class='form-control' type="text" name="name" placeholder="username" required><br>
            <input class='form-control' type="number" name="id_number"  min="100000" max="40000000" placeholder="id number" required><br>
            <select class='form-control' name='bookname' placeholder='Book Name' name="bookname" required>
              <option value="" disabled selected>Select the Book name</option>
              <?php 
              $sql='SELECT name FROM BOOKS';
              $res=mysqli_query($conn,$sql);

              if (mysqli_num_rows($res)) 
              {
                while ($row=mysqli_fetch_assoc($res)) 
                {
                  echo "<option>".$row['name']."</option>";
                }
              }
               ?>
              </select><br>
            <input class='form-control' type="text" name="status" placeholder="status" required><br>
            <?php echo "<input class='form-control' type='hidden' name='issuedate' value='".date('Y-m-d')."'> "; ?>
            <div class="input-group">
                  <div class="input-group-prepend">
                  <div class="input-group-text" id="btnGroupAddon">Return date</div>
                  </div>
                  <input class='form-control' type="date" placeholder="issue date"  placeholder="Input group example" name="returndate" required='required'>
             </div><br>
            <button class="btn btn-primary" name="submit_issue">&nbsp&nbsp&nbsp Save &nbsp&nbsp&nbsp</button><br>

   

</form>
</div>


<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div id="displayissue">
     <h2  style="text-align:center;">Issued Book</h2><br>
  <?php
    $sql="SELECT * FROM issue_book ";
    $res=mysqli_query($conn, $sql);
    if (mysqli_num_rows($res)<1) 
    {
      echo "<div class='alert alert-danger'>No book available!</div>";
    }

   
    else
    {
       echo "<table class='table table-bordered table-hover'><tr>
      <th>Name</th>
      <th>ID number</th>
      <th>Book name</th>
      <th>Status</th>
      <th>Issue Date</th>
      <th>Return Date</th>
       </tr> "; 


      while ($row=mysqli_fetch_assoc($res)) 
      { 
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['id_number']."</td>";
        echo "<td>".$row['b_name']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "<td>".$row['issue_date']."</td>";
        echo "<td>".$row['return_date']."</td>";
        echo "</tr>";

      }
    }
    
  echo "</table>";
   

  ?>

 
 </div>
 </div>

</div>
  <?php  
   }
else
   {
    echo "
      <div id='slideshow'>
        <div class='bd-example' >
          <div id='carouselExampleCaptions' class='carousel slide' data-ride='carousel'>
            <ol class='carousel-indicators'>
              <li data-target='#carouselExampleCaptions' data-slide-to='0' class='active'></li>
              <li data-target='#carouselExampleCaptions' data-slide-to='1'></li>
              <li data-target='#carouselExampleCaptions' data-slide-to='2'></li>
            </ol>
            <div class='carousel-inner'>
              <div class='carousel-item active'>
                <img src='images/library.jpg' class='d-block w-100' alt='...'>
                <div class='carousel-caption d-none d-md-block'>
                  <h4>Get the Hard copy</h4>
                  <p>There are varieties of books in our library.</p>
                </div>
              </div>
              <div class='carousel-item'>
                <img src='images/profession.png' class='d-block w-100' alt='...'>
                <div class='carousel-caption d-none d-md-block'>
                  <h4>Professional Books</h4>
                  <p>Get Professional books in our library.</p>
                </div>
              </div>
              <div class='carousel-item'>
                <img src='images/lib1.jpg' class='d-block w-100' alt='...'>
                <div class='carousel-caption d-none d-md-block'>
                  <h4>Online Reading</h4>
                  <p>Read books available in pdf from our site.</p>
                </div>
              </div>
            </div>
            <a class='carousel-control-prev' href='#carouselExampleCaptions' role='button' data-slide='prev'>
              <span class='carousel-control-prev-icon' aria-hidden='true'></span>
              <span class='sr-only'>Previous</span>
            </a>
            <a class='carousel-control-next' href='#carouselExampleCaptions' role='button' data-slide='next'>
              <span class='carousel-control-next-icon' aria-hidden='true'></span>
              <span class='sr-only'>Next</span>
            </a>
          </div>
        </div>
    </div><!--closing the slideshow-->
    ";

   }
}//closing the session statement
else
{

  $q1="SELECT * from books where type='Documentaries' ";
  $res1=mysqli_query($conn,$q1);
  $countDOC=mysqli_num_rows($res1);


   $q2="SELECT * from books where type='Gvt press gazette' ";
  $res2=mysqli_query($conn,$q2);
  $countGAZ=mysqli_num_rows($res2);


  $q4="SELECT * from books";
  $res4=mysqli_query($conn,$q4);
  $countTOTAL=mysqli_num_rows($res4);
echo "
 
     <!-- Content Row -->
     <div id='displays'>
          <div class='row'>

            <!-- Earnings (Monthly) Card Example -->
            <div class='col-xl-3 col-md-6 mb-4'>
              <div class='card border-left-primary shadow h-100 py-2'>
                <div class='card-body'>
                  <div class='row no-gutters align-items-center'>
                    <div class='col mr-2'>
                      <div class='text-xs font-weight-bold text-primary text-uppercase mb-1'>Documentaries</div>
                      <div class='h5 mb-0 font-weight-bold text-gray-800'>".$countDOC."</div>
                    </div>
                    <div class='col-auto'>
                      <i class='fas fa-calendar fa-2x text-gray-300'></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class='col-xl-3 col-md-6 mb-4'>
              <div class='card border-left-success shadow h-100 py-2'>
                <div class='card-body'>
                  <div class='row no-gutters align-items-center'>
                    <div class='col mr-2'>
                      <div class='text-xs font-weight-bold text-success text-uppercase mb-1'>Gvt press gazette</div>
                      <div class='h5 mb-0 font-weight-bold text-gray-800'>".$countGAZ."</div>
                    </div>
                    <div class='col-auto'>
                      <i class='fas fa-tv fa-2x text-gray-300'></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class='col-xl-3 col-md-6 mb-4'>
              <div class='card border-left-info shadow h-100 py-2'>
                <div class='card-body'>
                  <div class='row no-gutters align-items-center'>
                    <div class='col mr-2'>
                      <div class='text-xs font-weight-bold text-info text-uppercase mb-1'>Poverty studies</div>
                      <div class='row no-gutters align-items-center'>
                        <div class='col-auto'>
                          <div class='h5 mb-0 mr-3 font-weight-bold text-gray-800'>50%</div>
                        </div>
                        <div class='col'>
                          <div class='progress progress-sm mr-2'>
                            <div class='progress-bar bg-info' role='progressbar' style='width: 50%' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100'></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class='col-auto'>
                      <i class='fas fa-clipboard-list fa-2x text-gray-300'></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class='col-xl-3 col-md-6 mb-4'>
              <div class='card border-left-warning shadow h-100 py-2'>
                <div class='card-body'>
                  <div class='row no-gutters align-items-center'>
                    <div class='col mr-2'>
                      <div class='text-xs font-weight-bold text-warning text-uppercase mb-1'>Total Books</div>
                      <div class='h5 mb-0 font-weight-bold text-gray-800'>".$countTOTAL."</div>
                    </div>
                    <div class='col-auto'>
                      <i class='fas fa-book-open fa-2x text-gray-300'></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- closing the row -->
       

       <div class='row'>
       <div id='openHOURS'>
            <h4>Opening Hours</h4>
            <h6>8:00AM-4:00PM Weekdays</h6>
            <h6>Closed on Weekends</h6>
       </div>
      </div><!-- closing the display -->



          



</div>";//closing the echo  //closing the container-fluid
}//closing the else satement?>


<?php 
 include 'includes/footer.php';
?>
  


