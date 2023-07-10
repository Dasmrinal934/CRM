<script src="{{url('frontend/locjs/jquery-1.9.1.js')}}"></script>
<script src="{{url('frontend/locjs/jquery-ui.js')}}"></script>
<script type="text/javascript">
var myVar;

function hello($newurl) {
		myVar = Android.getFromAndroid();
		if (myVar=="null,null") {
		 alert("Please turn On Location");
		// window.location = "index.php";
	//	window.location.href = "{{ route('login-user')}}";

		}
		else {
			myVar = Android.getFromAndroid();
	//alert("Wellcome To LLD");
	var url = '{{ route($newurl, ":myVar") }}';
	url = url.replace(':myVar', myVar);
	window.location = url;

}
}
hello();
</script>
