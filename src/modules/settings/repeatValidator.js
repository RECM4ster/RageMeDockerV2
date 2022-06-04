function password()
{
let pass1 = document.querySelector('input[name=newPasswd1]').value;
let pass2 = document.querySelector('input[name=newPasswd2]').value;

if (pass1 !== pass2)
{
    window.alert("Podane hasła różnią się od siebie");
    window.location.replace("http://localhost:9000/settings.php")
}
}

function email()
{

}