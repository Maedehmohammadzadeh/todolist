const input=document.querySelectorAll('.select-input');
const error=document.querySelectorAll('.lable-error');

for(let i=0;i<input.length;i++){
     input[i].addEventListener('blur',function (){
        if(input[i].value.length<=8){
            error[i].style.display="block";
        }
     });
};

const email_input=document.getElementById('input-email');
const lable_email=document.getElementById('lable-email');
console.log(email_input);
 email_input.addEventListener('blur' ,function(){
    console.log(lable_email);
    if(email_input.value.indexof('@')==-1){
        
    }
 })