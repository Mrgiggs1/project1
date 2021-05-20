     function readURL(input) {
         var filePath = input.value;

         var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

         if (!allowedExtensions.exec(filePath)) {
             //  alert('Invalid file type');
             document.getElementById("unsupported").style.display = "block";
             input.value = '';
             return false;
         } else {
             if (this.files.size > 307200) {

                 alert("File is too big!");
                 this.value = ""

             } else {
                 if (input.files && input.files[0]) {
                     var reader = new FileReader();

                     reader.onload = function(e) {
                         $('#profile-preview')
                             .attr('src', e.target.result);
                     };

                     reader.readAsDataURL(input.files[0]);
                 }
             }
         }
     }