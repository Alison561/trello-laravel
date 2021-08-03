var create = document.getElementById('projeto')
var app = document.getElementById('app')
document.getElementById('new').addEventListener("click", e=>{
    if (create.value != '') {
        $.ajax({
            type: "post",
            url: '/app/create',
            data: {'post': create.value},
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                var appendd = `
                <a href="${response.url}">
                    <div class="card">
                        <h3>${response.project.nome}</h3>
                    </div>
                </a>`;
                $(app).append(appendd)
                create.value = '';
            }
        });
    }
})