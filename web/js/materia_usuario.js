/**
 * Created by Fede Marquesto on 30/4/2017.
 */
$( document ).ready(function() {
    console.log( "ready!" );
    console.log(idAlumno);
    console.log(idCarrera);
    $('#datatable-responsive').DataTable( {
        ajax: {
            url: "/alumno/"+idAlumno+"/carrera/"+idCarrera+"/materias",
            dataSrc: ""
        },
        columns: [
            { "data": "Materia" },
            { "data": "Estado" },
            { "data": "Nota" },
            { "data": "Nota" }
        ]
    } );
});