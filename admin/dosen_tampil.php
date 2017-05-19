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

	function getQueryVariable(variable)
	{
		   var query = window.location.search.substring(1);
		   var vars = query.split("&");
		   for (var i=0;i<vars.length;i++) {
				   var pair = vars[i].split("=");
				   if(pair[0] == variable){return pair[1];}
		   }
		   return(false);
	}
	
	$(document).ready(function(){
		if(getQueryVariable("search")!=""){
			var search= getQueryVariable("search");
			$.ajax({
				url:"ajax_func/search_dosen.php?search="+search,
				type:"GET",
				dataType:"html",
				
				beforeSend: function(){
					$("#hasil_cari").html('<img src="img/loader.gif" height="20px"/>');
					
				},
				success: function(data){
					$("#hasil_cari").html(data);
				},
				error: function(){
					$("#hasil_cari").html("The page can't be loaded");
				}
			});
		}
		$('#search').keyup(function(){
			if($("#search").val()==undefined){
				var search="";
			}else{
				var search= $("#search").val();
			}
			$.ajax({
				url:"ajax_func/search_dosen.php?search="+search,
				type:"GET",
				dataType:"html",
				
				success: function(data){
					$("#hasil_cari").html(data);
				},
				error: function(){
					$("#hasil_cari").html("The page can't be loaded");
				}
			});
			
			if(search==''){
				window.history.pushState("object or string", "Daftar TR2 : "+search, "daftar_tr2.php");				
			}else{
				window.history.pushState("object or string", "Daftar TR2 : "+search, "daftar_tr2.php?search="+search);	
			}
		});
</script>
<!-- //tables -->
		<div class="main-grid">
			<div class="agile-grids">	
				<!-- tables -->
				
				<div class="table-heading">
					<h2>Daftar Dosen</h2>
				</div>
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <div class="col-md-7 col-sm-12 col-xs-12">
							<input class="form-control" type="text" name="search" placeholder="Masukkan nama atau nip" id="search" autofocus value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>"/>
					  </div>
					    <table id="table">
						<thead>
						  <tr>
						  	<th>NO</th>
							<th>NIP</th>
							<th>NAMA</th>
						  </tr>
						</thead>
						<tbody id="hasil_cari">
						<?php
							// Assign a query
							$query = "SELECT nip, nama FROM dosen ";
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
									if ($status=="admin") {
										echo "<td>
												<a href='dosen_edit.php?nip=".$row['nip']."'><i class='fa fa-edit'></i></a>&nbsp;
												<a href='delete.php?data=dosen&nip=".$row['nip']."' class='delete'><i class='fa fa-trash-o'></i></a>&nbsp;
												<a href='repass.php?data=dosen&nip=".$row['nip']."'><i class='fa fa-lock'></i></a>
											 </td>";				
									}
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
