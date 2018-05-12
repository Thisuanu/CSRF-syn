

var csrf_token;

function loadDOC(method,url,htmlTag)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if(this.readyState==4 && this.status==200)
        {
            console.log("CSRF token scuessfully fetched : "+this.responseText);
            document.getElementById(htmlTag).value = this.responseText;
            //return this.responseText; //return response
            
            
        }
    };

    xhttp.open(method,url,true);
    xhttp.send();
}

