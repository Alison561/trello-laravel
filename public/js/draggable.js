var drags = document.querySelectorAll('.drag')
var drops = document.querySelectorAll('.content')




drags.forEach(drag => {
    drag.addEventListener("dragstart", dragstart)
    drag.addEventListener("drag", dragg)
    drag.addEventListener("dragend", dragend)
});


function dragg(ev){
    this.classList.add('is-draggin')
    // console.log("drag")
}
function dragstart(ev){
    // console.log("dragstart")
}
function dragend(){
    // console.log("dragend")
    this.classList.remove('is-draggin')
}

drops.forEach(drop => {
    drop.addEventListener("drop", dropp)
    drop.addEventListener("dragenter", dragenter)
    drop.addEventListener("dragleave", draleave)
    drop.addEventListener("dragover", dragover)
});


function dropp(){
    console.log('dropp')
}
function dragenter(){
    // console.log('dragenter')
}
function draleave(ev){
    let attr = this.getAttribute('assignment')
    let drag = document.querySelector('.is-draggin')
    this.append(drag)
    $.ajax({
        type: "put",
        url: "/app/update/assignment",
        data: {"id": drag.getAttribute("assignment"), "assignment": attr},
        dataType: "JSON",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        // success: function (res) {
        //     console.log(res)
        // }
    });

}
function dragover(){
    // console.log('dragover')
}