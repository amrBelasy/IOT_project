<!DOCTYPE html>
<html>
	<body>

		<!--- this div contain the TABLE that contain the alerts data   ---->
		
		<div id="data" style="float: right; font-size: 15px;color: #000;text-decoration: none;padding: 20px;">
			
		</div>
		<script type="text/javascript">
			function fetch_notifiction() {
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET","monitor_volts_from_db.php",false);
				xmlhttp.send(null);
				document.getElementById("data").innerHTML=xmlhttp.responseText;
			}
			fetch_notifiction();
			setInterval(function(){
			fetch_notifiction();},4000);
		</script>
	</body>
</html>