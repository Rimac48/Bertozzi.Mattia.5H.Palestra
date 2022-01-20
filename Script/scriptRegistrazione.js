function ControllaForm()
{
    //Faccio il controllo sui dati inseriti nella form
    clearErr();

    var Nome=document.FormDati.Nome.value;
    var Cognome=document.FormDati.Cognome.value;
    var Email=document.FormDati.Email.value;
    var ConfermaEmail=document.FormDati.ConfermaEmail.value;
    var Username=document.FormDati.Username.value;
    var Password=document.FormDati.Password.value;
    var ConfermaPassword=document.FormDati.ConfermaPassword.value;
    var DataNascita=document.FormDati.DataNascita.value;
    var Sesso=document.FormDati.Sesso.value;
    var Maschio=document.getElementById("Maschio").checked;
    var Femmina=document.getElementById("Femmina").checked;
    var Cellulare=document.FormDati.Cellulare.value;

    var corretto=true;

    if(Nome=="")
    {
        document.FormDati.Nome.className = "err";
        corretto=false;
    }   
    if(Cognome=="")
    {
        document.FormDati.Cognome.className = "err";
        corretto=false;
    }   
    if(Email=="" || Email!=ConfermaEmail)
    {
        document.FormDati.Email.className = "err";
        document.FormDati.ConfermaEmail.className = "err";
        corretto=false;
    }
    if(Username=="")
    {
        document.FormDati.Username.className = "err";
        corretto=false;
    }
    if(Password=="")
    {
        document.FormDati.Password.className = "err";
        corretto=false;
    }   
    if(Password=="" || Password!=ConfermaPassword)
    {
        document.FormDati.Password.className = "err";
        document.FormDati.ConfermaPassword.className = "err";
        corretto=false;
    }

    var vincoli=false;
    if(vincoli==false)
    {
        if(Password.length<8){
            alert("la password deve essere lunga almeno 8 caratteri")
            document.FormDati.Password.className = "err";
            corretto=false;
        }

        for(var i=0; i<Password.length;i++)
        {
            if (Password[i] >= 'a' & Password[i] <= 'z' & Password[i] >= '1' & Password[i] <= '9') {
                //trova la posizione della lettera nell'alfabeto
                vincoli=true; 
            }
        }
    }

    if(DataNascita=="")
    {
        document.FormDati.DataNascita.className = "err";
        corretto=false;
    }
    if(Maschio==false & Femmina==false)
    {
        alert("Seleziona il Sesso!");
        corretto=false;
    }

    if(corretto==true)
    {
        alert("TUTTO BENE! sai leggere e scrivere e ti sei iscritto");
        Registra();
        return true;
    }
    else
    {
        alert("Utente non aggiunto");
        return false;
    }
    

}

function Registra()
{
    document.FormDati.submit();
}

function clearErr()
{
    document.FormDati.Nome.className="";
    document.FormDati.Cognome.className="";
    document.FormDati.Email.className="";
    document.FormDati.ConfermaEmail.className="";
    document.FormDati.Username.className="";
    document.FormDati.Password.className="";
    document.FormDati.ConfermaPassword.className="";
    document.FormDati.DataNascita.className="";
    document.FormDati.Sesso.className="";
    document.FormDati.Cellulare.className="";
}