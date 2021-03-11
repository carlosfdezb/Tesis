@if (session('danger'))
		<div class="alert alert-danger" id="div-1">
			<i class="fa fa-times-circle-o"></i> {{ session('danger') }}	
		</div>
		@endif


<script type="text/javascript">
	
	setTimeout(() => {
    const elem = document.getElementById("div-1");
    elem.parentNode.removeChild(elem);
}, 5000);
</script>