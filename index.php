<html lang="en">
<head>
  <title>UAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <script src="jQuery/jquery.min.js"></script>
   <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 100%}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
	.table-responsive{
  padding: 10px;
  overflow: scroll;
  height: 530px;
  </style>
</head>

<script>
		$(function() {
			
			$("#s_prov").change(function() {
			
				var $dropdown = $(this);
				var kode_kab = $dropdown.val();
			
				$.getJSON("https://kodepos-2d475.firebaseio.com/list_kotakab/" + kode_kab + ".json", function(data) {
				
					var key = $dropdown.val();
					var vals = data;
										

					
					var $jsontwo = $("#s_kab");
					$jsontwo.empty();
					
					$.each(vals, function(index, value) {
						$jsontwo.append("<option value=" + index + ">" + value + "</option>");
					});
			
				});
			});
			

		});
</script>
<script>
$(function() {
			$("#s_kab").change(function() {
			
				var $dropdown2 = $(this);
				var kode_kec = $dropdown2.val();
			
				$.getJSON("https://kodepos-2d475.firebaseio.com/kota_kab/" + kode_kec + ".json", function(data) {
					var key = $dropdown2.val();
					var vals = data;
					var list = "";
					for(var i=0; i<vals.length; i++){
						console.log(i);
						var isi = vals[i];
						
						list +=	'<tr>'+
											'<td>'+(i+1)+'</td>'+
											'<td>'+isi.kecamatan+'</td>'+
											'<td>'+isi.kelurahan+'</td>'+
											'<td>'+isi.kodepos+'</td>'+
			
										'</tr>';
					}
					$("#body-result").html(list);
			
				});
			});
});
</script>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Pilih Lokasi</h4>
<?php

// membuka file JSON
$file_prov = file_get_contents("https://kodepos-2d475.firebaseio.com/list_propinsi.json");
$json_prov = json_decode($file_prov, true);




echo '<label for="sel1">Pilih Provinsi : </label><br />';
echo '<select name="s_prov" id="s_prov" class="form-control">';
echo '<option align=center selected class="form-control">---pilih---</option>';
  foreach ($json_prov as $key_prov=> $value_prov)
  {
	echo '<option value='.$key_prov.'>'.$value_prov.'</option>';
  }

	echo '</select> <br /> <br />';
	
echo '<label for="sel1">Pilih Kabupaten/Kota :</label><br />';
echo '<select name="s_kab" id="s_kab" class="form-control" >';
echo '<option align=center>---pilih---</option>';
echo '</select> <br />';


?>
<div class="input-group">
</div>
</div>
<div class="col-sm-9">
      <hr>
      <h2>Daftar Kode Pos</h2>
	  <div class="table-responsive">
<table class="table table-hover">
    <thead>
      <tr>
		<th>No</th>
        <th>Kecamatan</th>
        <th>Kelurahan</th>
        <th>Kode Pos</th>
      </tr>
    </thead>
	<tbody id="body-result">
				  
	</tbody>
    
  </table>
  </div>
</div>
</div>



<footer class="container-fluid">
  <p>Footer Text</p>
</footer>
<script type="text/javascript">
function show_value(){
  var val=document.getElementById("s_kab").value;

alert(val);
}

</script>