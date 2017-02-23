var output;
var employees;
var jobs;

function add_employee(emp)
{
    var begin = '<tr><td>';
    var delim = '</td><td>';
    var delim_center = '</td><td class="text-center">';
    var end = '</td></tr>';
    var edit = '<a href="#" class="edit-button" id="' + id + '"><span class="glyphicon glyphicon-pencil"></span></a>';
    output.append(begin + emp.fname + delim + emp.lname + delim + jobs[emp.job_id] + delim + emp.level + delim + emp.employer + delim_center + edit + end);
}

function refresh()
{
    output = $( '#authors' ).first();

    jobs['001'] = 'Guy';
    jobs['002'] = 'Ex-President';

    add_employee({'John', 'Cena', 'Guy', 9001, 'WWE', 001);
    add_employee('Barack', 'Obama', 'Ex-President', 12, 'AMERICA', 002);
}

$( document ).ready(
    function() {

        $( '.edit-button' ).click(
            function() {
                $( '#edit-popup' ).removeClass('popup-hidden');
            }
        );
    });

$( '.close-js' ).click(
    function() {
        $( this ).parent().addClass('popup-hidden');
    }
);

$( '.save-btn' ).click(
    function() {
        var form_data = {};
        form_data.id = $('#id').val();
        form_data.fname = $('#fname').val();
        form_data.lname = $('#lname').val();
        form_data.job_id = '';
        form_data.job_lvl = $('#job_lvl').val();
        form_data.pub_id = '';
        alert(JSON.stringify(form_data));
    }
);
