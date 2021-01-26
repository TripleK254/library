<?php
	include "includes/header.php";

echo "<div id='displaybook'><br>";
if (isset($_POST['searchbook'])) 
{
	//--->counting the number of books
	$q="SELECT * FROM books WHERE name like '%$_POST[search]%' ";
	$r=mysqli_query($conn,$q);
	$count=mysqli_num_rows($r);


	if (mysqli_num_rows($r)<1) 
	{
		echo "<div class='alert alert-danger' role='alert'>Sorry!! NO books found!!</div>";
	}
	else
	{

				$query = "SELECT * FROM books WHERE name like '%$_POST[search]%'";
				$res=mysqli_query($conn,$query);
				$number=mysqli_num_rows($res);

				$items_per_page=10;
				$totalpages=ceil($number/$items_per_page);
				if (isset($_GET['page'])&& !empty($_GET['page'])) 
				{
					$page=$_GET['page'];
					if ($page>$totalpages) 
					{
						header("Location:displaybook.php?page=1");
					}
				}
				else
				{ 
					$page=1;
				}
                    $offset=($page-1)* $items_per_page;
					$sql="SELECT id,name,authors,edition,status,quantity,pdf_file FROM books WHERE name like '%$_POST[search]%' ORDER BY id DESC LIMIT $items_per_page OFFSET $offset";
					$result=mysqli_query($conn,$sql);

		 echo "<ul class='list-group'>
			  <li class='list-group-item d-flex justify-content-between align-items-center'>
			    <h4>BOOKS Found!!</h4>
			    <div id='shiva'><span class='count'>".$count."</span></div>
			  </li>
			 </ul>";

			echo "<table class='table table-bordered table-hover'>";
			 echo "<thead>
			      <tr>
			        <th>Book ID</th>
			        <th>Name</th>
			        <th>Authors name</th>
			        <th>Edition</th>
			        <th>Status</th>
			        <th>Quantity</th>
			      </tr>
			    </thead>";
			  while ($row=mysqli_fetch_assoc($result)) 
			  {
			  echo "<tbody>
			      <tr>
			        <td>".$row['id']."</td>
			        <td>".$row['name']."</td>
			        <td>".$row['authors']."</td>
			        <td>".$row['edition']."</td>
			        <td>".$row['status']."</td>
			        <td>".$row['quantity']."</td>
			        <td>".$row['pdf_file']."</td>
			    </tbody>";
			  }
			    
			echo "</table>";
			
    //<!-- ---------pagination----------- -->
     echo "<ul class='pagination justify-content-center'>"; 		
        if ($page>1) 
					{ 
						echo "<li class='page-item'>
						<a class='page-link' href='file.php?page=".($page-1)." '>PREVIOUS</a>
                              </li>";
					
					}
				for ($i=1; $i <=$totalpages ; $i++) 
				{ 
					if ($i==$page) {
						echo "<li class='page-item active' ><a class='page-link' >".$i."</a></li>";
					}
					else
					{
						echo "<li class='page-item' ><a class='page-link' href='file.php?page=".$i." '> ".$i." </a></li>";
					}
				}
				if ($i>$page) 
				{
					echo "<li class='page-item'><a class='page-link' href='file.php?page=".($page+1)." '>NEXT</a></li>";
				}
			                   
      echo "</ul>";    



	}
}

//...........................DISPLAYING BOOK FROM THE DB...........................
else
{

	
	if (isset($_GET['d'])) 
	{
		$type=$_GET['d'];

	// --------------DISPLAYING BOOKS-----------------------
		//---->query for counter
		$query= "SELECT * FROM books WHERE type='$type' "; 
		$res=mysqli_query($conn,$query);
		$count=mysqli_num_rows($res);



		 echo "<ul class='list-group'>
		  <li class='list-group-item d-flex justify-content-between align-items-center'>
		    <h4>AVAILABLE BOOKS</h4>
		    <div id='shiva'><span class='count'>".$count."</span></div>
		  </li>
		 </ul>";
		 echo "<table class='table table-bordered table-hover'>";
		 echo "<thead>
		      <tr>
		        <th>Book ID</th>
		        <th>Name</th>
		        <th>Authors name</th>
		        <th>Edition</th>
		        <th>Status</th>
		        <th>Quantity</th>
		        <th>Softcopy</th>";
		        if(isset($_SESSION['id'])) 
				{
				  if($_SESSION['id']<2)
				  {
				  	echo "<th>Delete</th>";
				  }
				}
		      echo "  
		      </tr>
		    </thead>";

				$q = "SELECT * FROM books WHERE type='$type' ";;
				$r=mysqli_query($conn,$q);
				$number=mysqli_num_rows($r);

				$items_per_page=10;
				$totalpages=ceil($number/$items_per_page);
				if (isset($_GET['page'])&& !empty($_GET['page'])) 
				{
					$page=$_GET['page'];
					if ($page>$totalpages) 
					{
						header("Location:displaybook.php?d=$type&page=1");
					}
				}
				else
				{ 
					$page=1;
				}
                    $offset=($page-1)* $items_per_page;
					$sql="SELECT id,name,authors,edition,status,quantity,pdf_file FROM books WHERE type='$type' ORDER BY id DESC  limit $items_per_page OFFSET $offset";
					$result=mysqli_query($conn,$sql);

		  while ($row=mysqli_fetch_assoc($result)) 
		  {//<td>".$row['pdf_file']."</td>
		  echo "<tbody>
		      <tr>
		        <td>".$row['id']."</td>
		        <td>".$row['name']."</td>
		        <td>".$row['authors']."</td>
		        <td>".$row['edition']."</td>
		        <td>".$row['status']."</td>
		        <td>".$row['quantity']."</td>
		        <td>";

		        if ($row['pdf_file']=='Not Available') 
		        {
		        	echo "<a>". $row['pdf_file']."</a>";
		        }
		        else
		        {    //href="file_download.php?filename=<?php echo $name;
		        	echo "<a href='downloadbook.php?filename=".$row['pdf_file']." '><i class='fas fa-download'></i></a>";
		        }
		        echo "</td>";
		      
                 if(isset($_SESSION['id']))
					{
					  if($_SESSION['id']<2)
					  {
					  	echo "<td><a href='deletebook.php?d=$type&id=".$row['id']." '> <button type='button' onclick='confirmDELETE()' class='btn btn-danger'>Delete</button></a></td>";
					  }
					}
		        
		        echo "
		      </tr>
		    </tbody>";
		  }
		    
		echo "</table>";

		//<!-- ---------pagination----------- -->
        echo "<ul class='pagination justify-content-center'>	";	
                	if ($page>1) 
					{ 
						echo "<li class='page-item'>
						<a class='page-link' href='displaybook.php?d=$type&page=".($page-1)." '>PREVIOUS</a>
                              </li>";
					
					}
				for ($i=1; $i <=$totalpages ; $i++) 
				{ 
					if ($i==$page) {
						echo "<li class='page-item active' ><a class='page-link' >".$i."</a></li>";
					}
					else
					{
						echo "<li class='page-item' ><a class='page-link' href='displaybook.php?d=$type&page=".$i." '> ".$i." </a></li>";
					}
				}
				if ($i>$page) 
				{
					echo "<li class='page-item'><a class='page-link' href='displaybook.php?d=$type&page=".($page+1)." '>NEXT</a></li>";
				}

	//localhost/LIBRARY/displaybook.php?d=Evaluation%20publication?		                   
        echo "</ul>"; 
echo "</div>";//Closing the login div
	}
}///closing the else statement
?>


<?php
 include 'includes/footer.php'
?>

<!-- SCRIP FOR COUNTING THE NUMBER OF BOOKS -->
 <script>
      $('.count').each(function () {
          $(this).prop('Counter',0).animate({
              Counter: $(this).text()
          }, {
              duration: 4000,
              easing: 'swing',
              step: function (now) {
                  $(this).text(Math.ceil(now));
              }
          });
      });


      function confirmDELETE()
      {
      	
      }
 </script>  

 