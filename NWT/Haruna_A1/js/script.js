
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
        if(xhttp.readyState === 4 && xhttp.status === 200) {
            grabXml(xhttp);
        }
};
xhttp.open("GET", "xml/classInfo.xml", true);
xhttp.send();

function grabXml(xml) {
    xmlDoc = xml.responseXML;
    classArray = xmlDoc.getElementsByTagName("class");
    txt = "";
    for(i=0; i<classArray.length; i+=1) {
        txt += "<tr><td>" + grabNode("title", i) + "</td><td>" +
        grabNode("instructor", i) + "</td><td>" +
        grabNode("day", i) + "</td><td>" +
        grabNode("hours", i) + "</td><td>" +
        grabNode("description", i) + "</td></tr>";
    }
    document.getElementById("class_table").innerHTML = "<tr><th>Title</th><th>Instructor</th><th>Day</th><th>Hour</th><th>Description</th></tr>" + txt;
}

function grabNode(node, int) {
    return classArray[int].getElementsByTagName(node)[0].childNodes[0].nodeValue;
}
