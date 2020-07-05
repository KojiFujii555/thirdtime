// document.querySelector('.want_btn').addEventListener('click', function() {
// document.getElementById('form_product').value = document.querySelector('.product').innerHTML;
// document.getElementById('form_url').value = document.querySelector('.product').getAttribute('href');  
// document.getElementById('form_price').value = document.querySelector('.price').innerHTML;
// });

document.querySelectorAll('.want_btn').forEach(want_btn => {
        want_btn.addEventListener('click', function() {
    document.getElementById('form_product').value = this.parentNode.parentNode.querySelector('.product').innerHTML;
    document.getElementById('form_url').value = this.parentNode.parentNode.querySelector('.product').getAttribute('href');  
    document.getElementById('form_price').value = this.parentNode.parentNode.querySelector('.price').innerHTML;

} )});

