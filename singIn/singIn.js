const input = document.querySelectorAll('.select-input');
const lable = document.querySelectorAll('label');
let formIsOk = false;
for (let i = 0; i < input.length; i++) {
    input[i].addEventListener('blur', function () {
        if (input[i].value.length <= 2) {
            lable[i].style.display = 'block';
        }

    });
};
const email = document.getElementById('input-email');
const lable_email = document.getElementById('lable-email')
email.addEventListener('blur', function () {
    if (email.value.indexOf("@") == -1) {
        lable_email.style.display = "block";
    }
});
const div_singIn = document.querySelector('.cont-page');
const button_singIn = document.getElementById('button-singIn');
button_singIn.addEventListener('click', function (e) {
    if (formIsOk === false) {
        div_singIn.className += ' shake';
        setTimeout(()=>{
            div_singIn.className='cont-page';
        },200)
        e.preventDefault();
        return null;
    }
    else {
        div_singIn.className = 'cont-page';
        formIsOk = true;
    }
})
