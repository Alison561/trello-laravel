var icones = document.querySelectorAll('.ico')
var href = window.location.href
var url = href.split('/')
icones.forEach(icone => {
    icone.addEventListener("dblclick", icon)
});

function icon(){
    $('input[type="text"]').hide()
    let assis = this.getAttribute("assignment")
    $('#'+assis).show();
}

var texts = document.querySelectorAll('input[type=text]')

texts.forEach(text => {
    text.addEventListener("keyup", textarea)
})

function textarea(ev){
    let attr = $(this).attr("id");
    if (ev.keyCode == 13) {
        if (this.value != '') {
            $.ajax({
                type: "post",
                url: "/app/create/assignment",
                data: {"nome": this.value, "id_project": url[url.length - 1], "assignment": attr},
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(res=>{
                $("."+attr).append(`<div assignment="${res.id}" class="drag " draggable="true">${this.value}</div>`);
                this.value = ''
                drags = document.querySelectorAll('.drag')
                drags.forEach(drag => {
                    drag.addEventListener("dragstart", dragstart)
                    drag.addEventListener("drag", dragg)
                    drag.addEventListener("dragend", dragend)
                });
            })
            // $("."+attr).append(`<div id="${res.id}" class="drag " draggable="true">${res.nome}</div>`);
            // this.value = ''
            // drags = document.querySelectorAll('.drag')
            // drags.forEach(drag => {
            //     drag.addEventListener("dragstart", dragstart)
            //     drag.addEventListener("drag", dragg)
            //     drag.addEventListener("dragend", dragend)
            // });

        }
    }
    
}