<accordion name="collapse-filesmap">

    <div slot="title" class="ll-head">
        DOCUMENTS
    </div>

    

    <frgroup>
        <label slot="label">
            Files :
        </label>
        <label for="images" class="ll-bgcolor ll-white btn-upload">
            <i class="fa fa-upload"></i>
           Choose File
        </label>
        <input type="file" name="images[]" id="images" multiple>
            <div id="images-to-upload">
                <form action="/upload">

                </form>
            </div>
         <a href="#" class="btn btn-sm ll-bgcolor ll-white" style="margin-top: 5px;"> Upload </a>


         
           <!-- <form id="myForm" method="post" enctype="multipart/form-data">
            <label slot="label">
                Files : 
            </label>
                <input type="file" name="files" id="files" multiple=""><br/>
                <div id="selectedFiles"></div>
                <input type="submit">
               
           </form> -->

          

    </frgroup>


</accordion>

