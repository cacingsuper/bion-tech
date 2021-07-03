<style>

    td {
        vertical-align: top !important;
        max-height: 200px !important;
        height: 200px !important;
    }

    textarea {
        border: none !important;
        outline: none !important;
        outline: none !important;
        font-size: 10pt;
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
<div class="col-lg-12 col-12">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Simple Table</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Business Nama</th>
                            <th>Abbreviation</th>
                            <th>Detail</th>
                            <th>Detail Html</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="our-business">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function onChange(e) {
        let textarea = e.target.closest("tr").querySelectorAll("textarea")
        const id = e.target.closest("tr").dataset.id
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
        e.target.closest("tr").querySelector(".detail_html").innerHTML = e.target.closest("tr").querySelector(".detail_html").querySelector("textarea").value
        e.target.closest("tr").querySelector(".detail_business").innerHTML = e.target.closest("tr").querySelector(".detail_business").querySelector("textarea").value
        e.target.closest("td").innerHTML = `<a href="javascript:void(0)" onclick="btnEdit(event)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>`
    }

    function btnEdit(e) {
        let detailBusiness = e.target.closest("tr").querySelector(".detail_business").innerHTML
        let detailHtml = e.target.closest("tr").querySelector(".detail_html").innerHTML
        e.target.closest("tr").querySelector(".detail_business").innerHTML = `<textarea style="background-color:#E2E5E9" oninput="onChange(event)" name="detail_business" rows="20" class="form-control p-0 m-0">${detailBusiness}</textarea>`
        e.target.closest("tr").querySelector(".detail_html").innerHTML = `<textarea style="background-color:#E2E5E9" oninput="onChange(event)" name="detail_html" rows="20" class="form-control p-0 m-0">${detailHtml}</textarea>`
        e.target.closest("td").innerHTML = `<a href="javascript:void(0)" onclick="btnClose(event)" class="btnClose"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></a>`    
    }
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: '/api/table-our-business',
            success: function(data) {
                let html = "";
                for (item in data) {
                    html += `<tr data-id="${data[item].id}">`;
                    html += `<td>${data[item].id}</td>`,
                        html += `<td>${data[item].name_business || ""}</td>`
                    html += `<td>${data[item].abbreviation || ""}</td>`
                    html += `<td class="detail_business">${data[item].detail_business || ""}</td>`
                    html += `<td style="min-width:400px;max-height:400px" class="detail_html">${data[item].detail_html || ""}</td>`
                    html += `<td><a href="javascript:void(0)" onclick="btnEdit(event)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></td>`
                    html += `</tr>`
                }
                document.getElementById("our-business").innerHTML = html

            },
            error: function() {
                console.log("error")
            }
        });

    });
</script>