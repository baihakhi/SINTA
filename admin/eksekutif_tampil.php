<?php
	//require_once('../sidebar.php');
	require_once('sidebar.php');
	/*if($status=="admin"){
		header('Location:./index.php');
	}*/
?>
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
	$(document).ready(function(){
	    $("a.delete").click(function(e){
	        if(!confirm('Apakah anda yakin manghapus?')){
	            e.preventDefault();
	            return false;
	        }
	        return true;
	    });
	});
</script>
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		$('#page').change(function(){
			if($("#page").val()==undefined){
				var page="";
			}else{
				var page= $("#page").val();
			}
			$.ajax({
				url:"ajax_func/list_eksekutif.php?page="+page,
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#hasil").html('<img src="assets/img/loader.gif" height="20px"/>');
				},
				success: function(data){
					$("#hasil").html(data);
				},
				error: function(){
					$("#hasil").html("The page can't be loaded");
				}
			});
		});
	});
</script>
<!-- //tables -->
		<div class="main-grid">
			<div class="agile-grids">	
				<!-- tables -->
				
				<div class="table-heading">
					<h2>Daftar Eksekutif</h2>
				</div>
				<div class="agile-tables">
					<div class="w3l-table-info">
				
					    <table id="table">
						<thead>
						  <tr>
						  	<th>NO</th>
							<th>NIP</th>
							<th>NAMA</th>
							<th>USERNAME</th>
							<th>OPTION</th>
						  </tr>
						</thead>
						<tbody>
						<?php
							// Assign a query
							$query = "SELECT nip, nama, username FROM eksekutif ORDER BY nip";
							// Execute the query
							$result = $con->query( $query );
							if(!$result){
								die('Could not connect to database : <br/>'.$con->error);
							}
							if ($result->num_rows > 0) {
								$i=1;
								while($row = $result->fetch_assoc()){
									echo "<tr>";
									echo "<td>".$i."</td>";$i++;
									echo "<td>".$row['nip']."</td>";
									echo "<td>".$row['nama']."</td>";
									echo "<td>".$row['username']."</td>";
									echo "<td>
											<a href='eksekutif_edit.php?nip=".$row['nip']."'><i class='fa fa-edit'></i></a>&nbsp;
											<a href='delete.php?data=eksekutif&nip=".$row['nip']."' class='delete'><i class='fa fa-trash-o'></i></a>&nbsp;
											<a href='repass.php?data=eksekutif&nip=".$row['nip']."'><i class='fa fa-lock'></i></a>
										 </td>";
									echo "</tr>";
								}
							}else {
								echo "<tr>";
							    echo "<td>0 results</td>";
							    echo "</tr>";
							}
							$conn->close();
									
						?>
						</tbody>
					  </table>
					</div>
				 
				 

				</div>
				<!-- //tables -->
			</div>
		</div>
		<!-- footer -->
		<div class="footer">
			<p>© 2016 Colored . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>
		<!-- //footer -->
	</section>
	<script src="js/bootstrap.js"></script>
	
</body>
</html>
