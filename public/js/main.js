document.getElementById('want_btn').addEventListener('click', function(){
document.getElementById('form_price').value = document.getElementById('price').innerHTML;
document.getElementById('form_product').value = document.getElementById('product').innerHTML;
document.getElementById('form_url').value = document.getElementById('product').getAttribute('href');
});