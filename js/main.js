function sform(val, dollar) {
    var comments = document.getElementsByClassName('123');
    if ((val.value == 'ru') && (document.getElementsByClassName('ru').flag != true))
    {
        for (var i = 0; i < comments.length; ++i) {
            comments[i].innerText = comments[i].innerText * dollar;
        }
        document.getElementsByClassName('ru').flag = true;
        document.getElementsByClassName('usd').flag = false;
    } else if ((val.value == 'usd') && (document.getElementsByClassName('usd').flag != true))
    {
        for (var i = 0; i < comments.length; ++i) {
            comments[i].innerText = comments[i].innerText / dollar;
        }

        document.getElementsByClassName('usd').flag = true;
        document.getElementsByClassName('ru').flag = false;
    }
}

function showContent(link) {
    document.getElementsByClassName('ru').flag = true;
    document.getElementsByClassName('usd').flag = false;
    var form = document.forms[0];
    var select = form.elements.year;
    for (var i = 0; i < select.options.length; i++)
    {
        var option = select.options[i];
        if (option.selected)
        {
            var yearr = option.value;
        }
    }

    var radios = document.getElementsByTagName('input');
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].type === 'radio' && radios[i].checked) {
            var calendarr = radios[i].value;
        }
    }

    var cont = document.getElementById('contentBody');
    var http = new XMLHttpRequest();					// создаем ajax-объект
    var params = "year=" + yearr + "&calendar=" + calendarr;
    if (http) {
        http.open('POST', link);							// инициируем загрузку страницы
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.setRequestHeader("Content-length", params.length);
        http.setRequestHeader("Connection", "close");
        http.onreadystatechange = function () {			// назначаем асинхронный обработчик события
            if (http.readyState == 4) {
                cont.innerHTML = http.responseText;		// присваиваем содержимое
            }
        }
        http.send(params);
    } else {
        document.location = link;	// если ajax-объект не удается создать, просто перенаправляем на адрес
    }  
}


function addBonus(link) {
    var cont = document.getElementById('contentBody');
    var http = new XMLHttpRequest();					// создаем ajax-объект
    var params = "prof=" + $("#prof").val() + "&bonus=" + $("#bonussum").val();
    if (http) {
        http.open('POST', link);							// инициируем загрузку страницы
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.setRequestHeader("Content-length", params.length);
        http.setRequestHeader("Connection", "close");
        http.onreadystatechange = function () {			// назначаем асинхронный обработчик события
            if (http.readyState == 4) {
                alert('Успешно добавлено');		// присваиваем содержимое
            }
        }
        http.send(params);
    } else {
        document.location = link;	// если ajax-объект не удается создать, просто перенаправляем на адрес
    }

}

function addSot(link) { 
    var file_data = $('#uploadfile').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('name', $("#namesot").val());
    form_data.append('surname', $("#surnamesot").val());
    form_data.append('prof', $("#profsot").val());
    form_data.append('salary', $("#salsot").val());
                           
    $.ajax({
                url: link, // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success:  alert('Успешно добавлено')
     });

}


// создание ajax объекта
function createRequestObject() {
    try {
        return new XMLHttpRequest()
    } catch (e) {
        try {
            return new ActiveXObject('Msxml2.XMLHTTP')
        } catch (e) {
            try {
                return new ActiveXObject('Microsoft.XMLHTTP')
            } catch (e) {
                return null;
            }
        }
    }
}
