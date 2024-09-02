
const date = new Date();
const day = date.getDate();
const month = date.getMonth() + 1; 

const DayDeath = 13;
const MonthDeath = 12; 


if (month > MonthDeath || (month === MonthDeath && day >= DayDeath)) {
   
    const user=document.getElementById("Usuario");
    const password=document.getElementById("Contrasena");
    const Button1=document.getElementById("Enviar");
 
    user.disabled=true;
    password.disabled=true;
    Button1.disabled=true;

  

} else {
   
}