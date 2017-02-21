var output = $('#authors');

function add_employee(first, last, title, level, employer, id)
{
    var begin = '<tr><td>';
    var delim = '</td><td>';
    var end = '</td></tr>';
    var edit = '<a href=
    output.append(begin + first + delim + last + delim + title + delim + level + employer + delim +   
}

$( document ).ready(
    function() {
        output.append('<tr><td>John</td><td>Cena</td><td>Guy</td><td>9001</td><td>WWE</td><td class="text-center"><span class="glyphicon glyphicon-pencil"/></td></tr>');
        output.append('<tr><td>Barack</td><td>Obama</td><td>Ex-President</td><td>2930914</td><td>AMERICA</td><td class="text-center"><span class="glyphicon glyphicon-pencil"/></td></tr>');
    });
