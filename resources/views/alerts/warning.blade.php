@if (session('warning'))
		<div class="alert alert-warning" id="div-1">
			<i class="fa fa-bell"></i> {{ session('warning') }} 
		</div>
		@endif


<script type="text/javascript">
	
	setTimeout(() => {
    const elem = document.getElementById("div-1");
    elem.parentNode.removeChild(elem);
}, 5000);
</script>