<html>
   <head>
   <meta charset="utf-8">
      <title>
          Расписание
     </title>
     <script>
     var ajax; // глобальная переменная для хранения обработчика запросов 
     //InitAjax(); 
     ajax = new XMLHttpRequest();

function get1()
{
    if (!ajax)
    {
        alert("Ajax not initialized");
        return;  
    }

    let requestVal = document.getElementById("First").value;

    ajax.onload = function() {
        if(ajax.status===200) {

            let key = JSON.stringify({"Group": requestVal})
            localStorage.setItem(key, ajax.response);

            let res = JSON.parse(ajax.response);
            let result = "";
            result += '<table border="1"><tr><th>date</th><th>lesson_number</th><th>disciple</th><th>name</th><th>auditory</th>';
            for(let i in res) {
                result += '<tr>';
                result += '<td>' + res[i].date + '</td>'+
                          '<td>' + res[i].time + '</td>'+
                          '<td>' + res[i].discipl + '</td>'+
                          '<td>' + res[i].teachers + '</td>'+
                          '<td>' + res[i].auditory + '</td>';
                result += '<tr>';
            }
        document.getElementById("FirstResult").innerHTML = result;
        }
    }

    let params = "First=" + encodeURIComponent(requestVal);
    ajax.open("GET", "1.php?"+params, true);
    ajax.send(null)

    
}

function GroupStorage(){
    let requestVal = document.getElementById("First").value;
    let key = JSON.stringify({"Group": requestVal})
    let data = localStorage.getItem(key);

    if (data == null)
    {
        alert("Group storage empty");
        return;  
    }

    let res = JSON.parse(data);
    let result = "";
    result += '<table border="1"><tr><th>date</th><th>lesson_number</th><th>disciple</th><th>name</th><th>auditory</th>';
    for(let i in res) {
                result += '<tr>';
                result += '<td>' + res[i].date + '</td>'+
                          '<td>' + res[i].time + '</td>'+
                          '<td>' + res[i].discipl + '</td>'+
                          '<td>' + res[i].teachers + '</td>'+
                          '<td>' + res[i].auditory + '</td>';
                result += '<tr>';
            }

    document.getElementById("FirstResult").innerHTML = result;
}


function get2()
{
   if (!ajax)
    {
        alert("Ajax not initialized");
        return;  
    }

    let requestVal = document.getElementById("Second").value;

    ajax.onload = function() {
        if(ajax.status===200) {

            let key = JSON.stringify({"Teacher": requestVal})
            localStorage.setItem(key, ajax.response);

            let res = JSON.parse(ajax.response);
            let result = "";
            result += '<table border="1"><tr><th>date</th><th>lesson_number</th><th>disciple</th><th>Groups</th><th>Type</th><th>auditory</th>';
            for(let i in res) {
                result += '<tr>';
                result += '<td>' + res[i].date + '</td>'+
                          '<td>' + res[i].time + '</td>'+
                          '<td>' + res[i].discipl + '</td>'+
                          '<td>' + res[i].groups + '</td>'+
                          '<td>' + res[i].type + '</td>'+
                          '<td>' + res[i].auditory + '</td>';
                result += '<tr>';
            }
        document.getElementById("SecondResult").innerHTML = result;
        }
    }

    let params = "Second=" + encodeURIComponent(requestVal);
    ajax.open("GET", "2.php?"+params, true);
    ajax.send(null)

}

function TeacherStorage(){
    let requestVal = document.getElementById("Second").value;
    let key = JSON.stringify({"Teacher": requestVal})
    let data = localStorage.getItem(key);

    if (data == null)
    {
        alert("Teacher storage empty");
        return;  
    }

    let res = JSON.parse(data);
    let result = "";
    result += '<table border="1"><tr><th>date</th><th>lesson_number</th><th>disciple</th><th>Groups</th><th>Type</th><th>auditory</th>';
            for(let i in res) {
                result += '<tr>';
                result += '<td>' + res[i].date + '</td>'+
                          '<td>' + res[i].time + '</td>'+
                          '<td>' + res[i].discipl + '</td>'+
                          '<td>' + res[i].groups + '</td>'+
                          '<td>' + res[i].type + '</td>'+
                          '<td>' + res[i].auditory + '</td>';
                result += '<tr>';
            }

    document.getElementById("SecondResult").innerHTML = result;
}

function get3()
{
   if (!ajax)
    {
        alert("Ajax not initialized");
        return;  
    }

    let requestVal = document.getElementById("Third").value;

    ajax.onload = function() {
        if(ajax.status===200) {

            let key = JSON.stringify({"Aud": requestVal})
            localStorage.setItem(key, ajax.response);

            let res = JSON.parse(ajax.response);
            let result = "";
             result += '<table border="1"><tr><th>date</th><th>lesson_number</th><th>disciple</th><th>name</th><th>Group</th><th>type</th>';
            for(let i in res) {
                result += '<tr>';
                result += '<td>' + res[i].date + '</td>'+
                          '<td>' + res[i].time + '</td>'+
                          '<td>' + res[i].discipl + '</td>'+
                          '<td>' + res[i].teachers + '</td>'+
                          '<td>' + res[i].groups + '</td>'+
                          '<td>' + res[i].type + '</td>';
                result += '<tr>';
            }
        document.getElementById("ThirdResult").innerHTML = result;
        }
    }

    let params = "Third=" + encodeURIComponent(requestVal);
    ajax.open("GET", "3.php?"+params, true);
    ajax.send(null)

}

function AuditoryStorage(){
    let requestVal = document.getElementById("Third").value;
    let key = JSON.stringify({"Aud": requestVal})
    let data = localStorage.getItem(key);

    if (data == null)
    {
        alert("Auditory storage empty");
        return;  
    }

    let res = JSON.parse(data);
    let result = "";
     result += '<table border="1"><tr><th>date</th><th>lesson_number</th><th>disciple</th><th>name</th><th>Group</th><th>type</th>';
            for(let i in res) {
                result += '<tr>';
                result += '<td>' + res[i].date + '</td>'+
                          '<td>' + res[i].time + '</td>'+
                          '<td>' + res[i].discipl + '</td>'+
                          '<td>' + res[i].teachers + '</td>'+
                          '<td>' + res[i].groups + '</td>'+
                          '<td>' + res[i].type + '</td>';
                result += '<tr>';
            }
    document.getElementById("ThirdResult").innerHTML = result;
}     
     </script>
   </head>
   <body>
<?php 
include 'connect.php';

//-----------------------------------------------------------
    echo '     <form method="GET">
                   <b>Вывести расписание лабораторных группы</b>
                   <select id="First">';

$group = $collection->distinct('groups',[],["sort" =>["auditory" => 1]]);
foreach($group as $i)
{
    echo '<option value="'.$i.'">'.$i.'</option>';
}


      echo' </select>
                   <input type="button" value="Ок" onclick = "get1()">
                   <input type="button" value="Storage" onclick = "GroupStorage()">
                   
              <div id="FirstResult"></div>
                    </form>' ; 

//------------------------------------------------------------

   echo '     <form method="GET">
                   <b>Вывести расписание преподавателя:</b>
                   <select id="Second">';

$teacher = $collection->distinct('teachers');
foreach($teacher as $i)
{
    echo '<option value="'.$i.'">'.$i.'</option>';
}

      echo' </select>
                   <input type="button" value="Ок" onclick = "get2()">
                   <input type="button" value="Storage" onclick = "TeacherStorage()">
                   
                   <div id="SecondResult"></div>
                    </form>' ; 



//---------------------------------------------------------------

   echo '     <form method="GET">
                   <b>Вывести расписание для аудитории</b>
                   <select id ="Third">';

$aud = $collection->distinct("auditory",[],["sort" =>["auditory" => 1]]);  

foreach($aud as $i)
{
    echo '<option value="'.$i.'">'.$i.'</option>';
}

      echo' </select>
                   <input type="button" value="Ок" onclick = "get3()">
                   <input type="button" value="Storage" onclick = "AuditoryStorage()">
                   <div id="ThirdResult"></div>
                    </form>' ; 

//---------------------------------------------------------------

?>
</body>
</html>