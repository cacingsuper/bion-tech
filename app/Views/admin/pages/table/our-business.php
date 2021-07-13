<style>
    td {
        vertical-align: top !important;
        max-height: 200px !important;
        height: 400px !important;
        max-width: 400px !important;
        overflow: hidden;
    }
    .title{
        font-weight: 800;
    }
    .detail_business{
        font-size: 14pt;
    }
    .detail_html{
        font-size: 14pt;
    }
    textarea {
        background-color:#E2E5E9 !important;
        border: none !important;
        outline: none !important;
        outline: none !important;
        font-size: 14pt !important;
        border-radius: 0 !important;
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        box-shadow: none !important;
        resize: none;
        padding: 1rem !important;
        /*remove the resize handle on the bottom right*/
    }

    textarea::-webkit-scrollbar {
        display: none;
    }
</style>
<div id="our-business" class="row px-4"></div>

<script type="text/javascript">
    function changeContent(e) {
        const id = e.target.closest(".business").dataset.id
        console.log(id)
        $.ajax({
            type: 'POST',
            data: {
                value: e.target.innerHTML
            },
            url: '/api/table-our-business/' + id + "/" + e.target.className,
            success: function(data) {
                console.log(data)
            },
            error: function() {
                console.log("error")
            }
        });
    }

    function onChange(e) {
        let textarea = e.target.closest(".widget-header").querySelectorAll("textarea")
        const id = e.target.closest(".business").dataset.id
        $.ajax({
            type: 'POST',
            data: {
                value: e.target.value
            },
            url: '/api/table-our-business/' + id + "/" + e.target.name,
            success: function(data) {
                console.log(data)
            },
            error: function() {
                console.log("error")
            }
        });
    }
</script>
<script type="text/javascript">
    function btnClose(e) {
        e.target.closest(".widget-header").querySelector(".detail_html").innerHTML = e.target.closest(".widget-header").querySelector(".detail_html").querySelector("textarea").value
        e.target.closest(".widget-header").querySelector(".detail_business").innerHTML = e.target.closest(".widget-header").querySelector(".detail_business").querySelector("textarea").value
        e.target.closest("div").innerHTML = `<a href="javascript:void(0)" onclick="btnEdit(event)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>`
    }

    function btnEdit(e) {
        console.log(e.target.closest(".widget-header"))
        let detailBusiness = e.target.closest(".widget-header").querySelector(".detail_business").innerHTML
        let detailHtml = e.target.closest(".widget-header").querySelector(".detail_html").innerHTML
        e.target.closest(".widget-header").querySelector(".detail_business").innerHTML = `<textarea style="" oninput="onChange(event)" name="detail_business" rows="20" class="form-control p-0 m-0">${detailBusiness}</textarea>`
        e.target.closest(".widget-header").querySelector(".detail_html").innerHTML = `<textarea style="" oninput="onChange(event)" name="detail_html" rows="20" class="form-control p-0 m-0">${detailHtml}</textarea>`
        e.target.closest("div").innerHTML = `<a href="javascript:void(0)" onclick="btnClose(event)" class="btnClose"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></a>`
    }
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: '/api/table-our-business',
            success: function(data) {
                let html = "";
                for (item in data) {
                    html += `<div class="business col-lg-12 mb-4" data-id="${data[item].id}"><div class="statbox widget box box-shadow"><div class="widget-header">`;
                    html += `<div class="d-flex justify-content-between">`
                    html += `<div>`;
                    html += `<h3 class="title text-primary">${data[item].name_business || ""}</h3>`
                    html += `<h6>${data[item].abbreviation || ""}</h6>`
                    html += `</div>`
                    html += `<div>`
                    html += `<a href="javascript:void(0)" onclick="btnEdit(event)">`;
                    html += `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>`
                    html += `</div>`
                    html += `</div>`;
                    html += `<div class="row"><div class="col-12"><hr>`;
                    html += `<div contentEditable="true" oninput="changeContent(event)" class="detail_business">${data[item].detail_business || ""}</div>`
                    html += `</div></div>`;
                    html += `<div class="row"><div class="col-12"><hr>`;
                    html += `<div contentEditable="true" oninput="changeContent(event)" class="detail_html">${data[item].detail_html || ""}</div>`
                    html += `</div></div>`;
                    html += `<div></div>`
                    html += `</div></div></div>`
                    html += `<div class=""></div>`
                }
                document.getElementById("our-business").innerHTML = html

            },
            error: function() {
                console.log("error")
            }
        });

    });
</script>