function getListTemplate(item, id) {
    let template = `
    <li class="list-group-item d-flex justify-content-between align-items-center my-list-item"> 
    <span >
        ${item}
    </span>
        <span>
            <a href="/update/${id}" class="link link-primary m-1 fas fa-edit" onclick="update_item">
               
            </a>
            <a href="/delete/${id}/" class="link link-danger m-1 fas fa-trash del-link" >
                
            </a>
        </span>
    </li>
    `;
    return template;
}


function update_item() {
    let 
}


// function for to do form submit
function todoFormAction ( e ) { 

    // stoping default event
    e.preventDefault();

   


    // fetch current todo
    let todo_item = document.getElementsByName("todo_item")[0].value;
    // show user msg if empty
    if( todo_item === "" ) {
        alert("Please insert your work first.");
    }
    
    // passing token
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    $.ajax({
        
        url: "/store",
        type: "POST",
        data: {
            'todo_item' : $("#id_todo_item").val(),
        },
        success: ( data ) => {
            let length = data.todo.length;
            //if records found then show list area
            if( length > 0 ) {
                $("#todo_list_area").css("visibility", "visible");
            } 
            // console.log( );            
            $("#todo_list").html(""); // resetting
            for( let i = 0; i < length; i++ ) {
                // displaying items
                todo_item = data.todo[i].todo_item;
                let template = getListTemplate( todo_item, data.todo[i].id );
                let html = $("#todo_list").html();
                html += template;
                $("#todo_list").html( html );
                todo_item = ""; // reset
            }
        },
        error: (data) => {
           alert("Data can't be inserted! Error!");
        }


    });




   

}






// app function 



let todoApp = (title) => {
    // adding site title
    document.getElementsByTagName("title")[0].text = title;

    // updating list according to database
    $.ajax({
        url: "/fetch",
        type: "GET",
        success: ( result ) => {
            let length = result.todo.length;
            //if records found then show list area
            if( length > 0 ) {
                $("#todo_list_area").css("visibility", "visible");
            }
            $("#todo_list").html(""); // resetting

            for(let i = 0; i < length; i++) {
                let item = result.todo[i].todo_item;
                // console.log(`${ result.todo[i].id }\n`);
                let id = result.todo[i].id;
                // console.log(id);

                let template = getListTemplate( item, id );
                let html = $("#todo_list").html();
                html += template;
                $("#todo_list").html( html );
            }
            
        }
    });

    // after fetching successfully binding events for delete and update button
    // notice : search in template variable
 

}   


// when window loaded 
window.onload = () => {
    // calling todoFunction
    todoApp(title="Todo Application");
    // binding events to form (todoform)
    document.querySelector("#todo_form").addEventListener("submit", todoFormAction);

};