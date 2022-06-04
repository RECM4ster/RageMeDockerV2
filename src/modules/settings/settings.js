function settings() {
    let place = document.getElementById("form");
    let form =
        "    <form action=\"./modules/settings/settingsManager.php?action=nick \" method=\"post\" id=\"settingForm\">\n" +
        "        <label id=\"settingsLabel\">Zmień nick</label></br>\n" +
        "        <input  id=\"settingsInput\" name=\"nickname\" type=\"text\" placeholder=\"Nowy nick\"></br>\n" +
        "        <button  id=\"settingsButton\" type=\"submit\"> Zmień nick</button>\n" +
        "    </form>\n" +
        "    <form action=\"./modules/settings/settingsManager.php?action=img \" method=\"post\" id=\"settingForm\" enctype=\"multipart/form-data\">\n" +
        "    <label id=\"settingsLabel\">Zmień Awatar</label></br>\n" +
        "    <input name=\"userfile\" type=\"file\" accept=\"image/png, image/jpeg\"/> \n" +
        "        <button id=\"settingsButton\" type=\"submit\" > Zmień Awatar</button>\n" +
        "    </form>";

    place.innerHTML = form;

}

function security() {
    let place = document.getElementById("form");
    let form = "    <form action=\"modules/settings/settingsManager.php?action=passwd\" method=\"post\" id=\"settingForm\">\n" +
        "        <label id=\"settingsLabel\">Zmień hasło</label></br>\n" +
        "       <input  id=\"settingsInput\" required name=\"newPasswd1\" type=\"password\" minlength='8' placeholder=\"Nowe hasło\"></br>\n" +
        "       <input  id=\"settingsInput\" required name=\"newPasswd2\" type=\"password\" minlength='8' placeholder=\"Potwierdź nowe hasło\"></br>\n" +
        "       <input  id=\"settingsInput\" required name=\"confirm\" type=\"password\" placeholder=\"Podaj stare hasło by zatwierdzić\"></br>\n" +
        "        <button id=\"settingsButton\" type=\"submit\" onclick='password()'> Zmień Hasło</button>\n" +
        "    </form>\n" +
        "\n" +
        "    <form action=\"modules/settings/settingsManager.php?action=email\" method=\"post\" id=\"settingForm\">\n" +
        "        <label id=\"settingsLabel\">Zmień Email konta</label></br>\n" +
        "        <input  id=\"settingsInput\" name=\"oldEmail\" type=\"email\" placeholder=\"Stary Email\"></br>\n" +
        "        <input  id=\"settingsInput\" name=\"newEmail1\" type=\"email\" placeholder=\"Nowy Email\"></br>\n" +
        "        <input  id=\"settingsInput\" name=\"newEmail2\" type=\"email\" placeholder=\"Potwierdź nowy Email\"></br>\n" +
        "        <input  id=\"settingsInput\" name=\"password\" type=\"password\" placeholder=\"Podaj hasło by zatwierdzić\"></br>\n" +
        "        <button id=\"settingsButton\" type=\"submit\" > Zmień email</button>\n" +
        "    </form>";
    place.innerHTML = form;


}

function deleteAccount() {
    let place = document.getElementById("form");
    let form = "  <span id=\"form\"></span>\n" +
        "    <form action=\"modules/settings/settingsManager.php?action=del\" method=\"post\" id=\"settingForm\">\n" +
        "        <label id=\"settingsLabel\">Usuń konto</label></br>\n" +
        "         <input  id=\"settingsInput\" name=\"password\" type=\"password\" placeholder=\"Podaj hasło by zatwierdzić\"></br>\n" +
        "        <button id=\"settingsButton\" type=\"submit\" > Usuń Konto</button>\n" +
        "    </form>";
    place.innerHTML = form;

}


