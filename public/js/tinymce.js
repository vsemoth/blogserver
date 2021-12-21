
    tinymce.init({
        selector: 'textarea#file-picker',
        height: 500,
        menubar: true,
        plugins: [
          'advlist autolink lists link image code charmap print preview anchor textcolor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount',
          'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        ],
        min_height: 240,
        toolbar: 'undo redo | formatselect | bold italic | backcolor forecolor| link image media | code | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | a11ycheck addcomment showcomments casechange checklist export formatpainter pageembed permanentpen table',
        image_title: true,
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        file_picker_types: 'file image media',
  automatic_uploads: true,
  images_upload_url: './postAcceptor.php',
  
  /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
  
      input.onchange = function () {
        var file = this.files[0];
  
        var reader = new FileReader();
        reader.onload = function () {
  
          var id = 'blobid' + (new Date()).getTime();
          var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          var base64 = reader.result.split(',')[1];
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);
  
          /* call the callback and populate the Title field with the file name */
          cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
      };
  
      input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
  });