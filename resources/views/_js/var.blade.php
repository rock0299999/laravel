<script>
var url_web_login = "{{ url('web/login')}}";
var url_web_dologin = "{{ url('web/dologin')}}";
var url_web_register = "{{ url('web/register')}}";
var url_web_doregister = "{{ url('web/doregister')}}";

//ticket
var url_ticket_web_mall_product = "{{ url('ticket/web/mall/product')}}";
//Email格式檢查
var reg_Email = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
//電話格式檢查
var reg_phoneTel=/^[\+]?[0-9\-\s]+$/;
</script>