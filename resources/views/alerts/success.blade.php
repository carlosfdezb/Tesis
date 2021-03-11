@if (session('success'))
		<div class="alert alert-success" id="div-1">
			<i class="fa fa-check-circle-o"></i> {{ session('success') }} 	
		</div>
		@endif



<script type="text/javascript">
	
	setTimeout(() => {
    const elem = document.getElementById("div-1");
    elem.parentNode.removeChild(elem);
}, 5000);
</script>