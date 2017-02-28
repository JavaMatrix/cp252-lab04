var output;
var emps = {};
var jobs = {};
var pubs = {};
var current_emp;

function add_employee(emp)
{
    var begin = '<tr><td>';
    var delim = '</td><td>';
    var delim_center = '</td><td class="text-center">';
    var end = '</td></tr>';
    var edit = '<a href="#" class="edit-button" id="' + emp.emp_id + '"><span class="glyphicon glyphicon-pencil"></span></a>';
    emps[emp.emp_id] = emp;
    output.append(begin + emp.fname + delim + emp.lname + delim + jobs[emp.job_id].job_desc + delim + emp.job_lvl + delim + pubs[emp.pub_id] + delim_center + edit + end);
}

function refresh()
{
    output = $( '#authors' ).first();

    $.getJSON('jobs.php', processJobs);
}

function processJobs(_jobs) {
    for (var i = 0; i < _jobs.length; i++)
    {
        var job = _jobs[i];
        jobs[job.job_id] = job;
    }

    $.getJSON('pubs.php', processPubs);
    
}

function processPubs(_pubs) {
    for (var i = 0; i < _pubs.length; i++)
    {
        var pub = _pubs[i];
        pubs[pub.pub_id] = pub.pub_name;
    }

    $.getJSON('view.php', processView);
}

function processView(_view)
{
    for (var i = 0; i < _view.length; i++)
    {
        var emp = _view[i];
        add_employee(emp);
    }

    $.each(jobs, function(key, value) {
        $( '#job_id' )
            .append($( '<option></option>' )
                        .attr('value', key)
                        .text(value.job_desc));
    });

    $.each(pubs, function(key, value) {
        $( '#pub_id' )
            .append($( '<option></option>' )
                        .attr('value', key)
                        .text(value));
    });

    $( '.edit-button' ).click(
        function() {
            $( '#edit-popup' ).removeClass('popup-hidden');
            var id = $( this ).attr('id');
            console.log(id);
            var emp = emps[id];
            console.log(emp);
            $( '#fname' ).val(emp.fname);
            $( '#lname' ).val(emp.lname);
            $( '#job_id' ).val(emp.job_id);
            $( '#job_lvl' ).val(emp.job_lvl);
            $( '#pub_id' ).val(emp.pub_id);

            $( '#job_lvl' ).attr('min', jobs[$( '#job_id' ).val()].min_lvl);
            $( '#job_lvl' ).attr('max', jobs[$( '#job_id' ).val()].max_lvl);

            current_emp = emp;
        }
    );

    $( '#job_id' ).change(
        function() {
            $( '#job_lvl' ).attr('min', jobs[$( '#job_id' ).val()].min_lvl);
            $( '#job_lvl' ).attr('max', jobs[$( '#job_id' ).val()].max_lvl);
            if ($( '#job_lvl' ).val() < $( '#job_lvl' ).attr('min'))
            {
                $( '#job_lvl' ).val($( '#job_lvl').attr('min'));
            }
            if ($( '#job_lvl' ).val() > $( '#job_lvl' ).attr('max'))
            {
                $( '#job_lvl' ).val($( '#job_lvl').attr('max'));
            }
        }
    );

}

$( document ).ready(
    function() {
        refresh();
    }
);

$( '.close-js' ).click(
    function() {
        $( this ).parent().addClass('popup-hidden');
    }
);

$( '.save-btn' ).click(
    function() {
        current_emp.fname = $( '#fname' ).val();
        current_emp.lname = $( '#lname' ).val();
        current_emp.job_id = $( '#job_id' ).val();
        current_emp.job_lvl = $( '#job_lvl' ).val();
        current_emp.pub_id = $( '#pub_id' ).val();

        $.post(
            'update.php',
            JSON.stringify(current_emp),
            function(response) {
                alert(response);
                refresh();
                $( '.close-js' ).parent().addClass('popup-hidden');
            }
        );
    }
);
